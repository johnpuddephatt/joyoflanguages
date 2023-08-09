<?php

namespace App\Jobs;

use App\Models\Podcast;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

class FetchWordpressImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function remove_cdata($string)
    {
        return str_replace(["//<![CDATA[", "//]]>"], "", $string);
    }

    public function fetchImages()
    {
        $options = [
            "http" => [
                "ignore_errors" => true,
                "header" => "Content-Type: application/json\r\n",
            ],
        ];
        $context = stream_context_create($options);
        $file = file_get_contents(
            "http://joyoflanguages.com/thispagedoesntexist",
            false,
            $context
        );

        foreach (json_decode($file) as $post_id => $url) {
            if (!$url) {
                continue;
            }
            $info = pathinfo($url);

            $contents = file_get_contents($url);
            $file = "/tmp/" . $info["basename"];
            file_put_contents($file, $contents);
            $file = new \Illuminate\Http\UploadedFile($file, $info["basename"]);

            $collectionName = "default";

            try {
                $uploadedMedia = \Outl1ne\NovaMediaHub\MediaHub::fileHandler()
                    ->withFile($file)
                    ->deleteOriginal()
                    ->withCollection($collectionName)
                    ->save();
            } catch (Exception $e) {
                $exceptions[] = $e;
                report($e);
            }

            $post = \App\Models\Post::withoutGlobalScopes()->firstWhere(
                "wp_id",
                $post_id
            );

            if ($post) {
                $post->update(["image" => $uploadedMedia->id]);
            }
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->fetchImages();
    }
}
