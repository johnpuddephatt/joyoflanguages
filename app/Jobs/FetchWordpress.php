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
    }

    public function remove_cdata($string)
    {
        return str_replace(["//<![CDATA[", "//]]>"], "", $string);
    }

    public function fetchPosts()
    {
        $file = file_get_contents(
            storage_path("/app/public/feeds/wordpress.xml")
        );

        if (!$file) {
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
                // echo \Illuminate\Support\Str::of($post->title)
                //     ->before(": ")
                //     ->replace("#", "") . "\n";
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

                        "wordpress_content" => $this->remove_cdata(
                            (string) $post->xpath("content:encoded")[0]
                        ),
                        "published_at" => $this->remove_cdata(
                            (string) $post->xpath("wp:post_date")[0]
                        ),
                    ]);
                }
            } else {
                Post::withoutGlobalScopes()->updateOrCreate(
                    ["wp_id" => (string) $post->xpath("wp:post_id")[0]],
                    [
                        "wp_id" => (string) $post->xpath("wp:post_id")[0],
                        // "author_id" => 1,
                        // "image" => (string) $post->xpath(
                        //     "wp:attachment_url"
                        // )[0],
                        "title" => $post->title,
                        "slug" => last(explode("/", rtrim($post->link, "/"))),
                        "introduction" => $this->remove_cdata(
                            (string) $post->xpath("excerpt:encoded")[0]
                        ),
                        "wordpress_content" => $this->remove_cdata(
                            (string) $post->xpath("content:encoded")[0]
                        ),
                        "published_at" => $this->remove_cdata(
                            (string) $post->xpath("wp:post_date")[0]
                        ),
                    ]
                );
            }

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
}
