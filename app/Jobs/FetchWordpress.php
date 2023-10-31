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
use Illuminate\Support\Facades\Storage;

class FetchWordpress implements ShouldQueue
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

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->fetchPosts();
        $this->fetchImages();
    }

    public function remove_cdata($string)
    {
        return str_replace(["//<![CDATA[", "//]]>"], "", $string);
    }

    public function fetchPosts()
    {
        $file = file_get_contents(
            Storage::disk("public")->path("/feed/wordpress.xml")
        );

        if (!$file) {
            echo "XML file not found. Please upload it first.";
            exit();
        }
        $feed = simplexml_load_string($file);

        $feed->registerXPathNamespace("wp", "http://wordpress.org/export/1.2/");

        $feed->registerXPathNamespace(
            "content",
            "http://purl.org/rss/1.0/modules/content/"
        );

        foreach ($feed->xpath("channel/item") as $post) {
            if (
                $this->remove_cdata((string) $post->xpath("wp:status")[0]) !==
                "publish"
            ) {
                continue;
            } elseif (
                \Illuminate\Support\Str::of($post->title)->startsWith("#")
            ) {
                $podcast = Podcast::withoutGlobalScopes()
                    ->where(
                        "episode_number",
                        \Illuminate\Support\Str::of($post->title)
                            ->before(": ")
                            ->replace("#", "")
                    )
                    ->first();

                if (!$podcast) {
                    continue;
                } else {
                    $podcast->update([
                        "wp_id" => (string) $post->xpath("wp:post_id")[0],
                        "slug" => last(explode("/", rtrim($post->link, "/"))),
                        "title" => $post->title,

                        "wordpress_content" => $this->remove_cdata(
                            (string) $post->xpath("content:encoded")[0]
                        ),
                        "published_at" => $this->remove_cdata(
                            (string) $post->xpath("wp:post_date")[0]
                        ),
                    ]);
                }
            }
            // else {
            //     Post::withoutGlobalScopes()->updateOrCreate(
            //         ["wp_id" => (string) $post->xpath("wp:post_id")[0]],
            //         [
            //             "wp_id" => (string) $post->xpath("wp:post_id")[0],
            //             // "author_id" => 1,
            //             // "image" => (string) $post->xpath(
            //             //     "wp:attachment_url"
            //             // )[0],
            //             "title" => $post->title,
            //             "slug" => last(explode("/", rtrim($post->link, "/"))),
            //             "introduction" => $this->remove_cdata(
            //                 (string) $post->xpath("excerpt:encoded")[0]
            //             ),
            //             "wordpress_content" => $this->remove_cdata(
            //                 (string) $post->xpath("content:encoded")[0]
            //             ),
            //             "published_at" => $this->remove_cdata(
            //                 (string) $post->xpath("wp:post_date")[0]
            //             ),
            //         ]
            //     );
            // }

            // \App\Models\Podcast::withoutGlobalScopes()->updateOrCreate(
            //     ["guid" => $podcast->guid],
            //     [
            //         "language_id" => $language->id,
            //         "synced" => true,
            //         "published_at" => date(
            //             "Y-m-d H:i:s",
            //             strtotime($podcast->pubDate)
            //         ),
            //         "rss_content" => (string) $podcast->xpath(
            //             "content:encoded"
            //         )[0],
            //         "title" =>
            //             explode(": ", $podcast->title)[1] ?? $podcast->title,
            //         "slug" => \Illuminate\Support\Str::slug(
            //             explode(": ", $podcast->title)[1] ?? $podcast->title
            //         ),
            //         "episode_number" =>
            //             preg_replace(
            //                 "/[^0-9]/",
            //                 "",
            //                 explode(": ", $podcast->title)[0]
            //             ) ?:
            //             null,
            //         "introduction" =>
            //             (string) $podcast->xpath("itunes:subtitle")[0] ?? null,
            //         "duration" => (string) $podcast->xpath(
            //             "itunes:duration"
            //         )[0],
            //         "file" => $podcast->enclosure["url"],
            //     ]
            // );
        }
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
}
