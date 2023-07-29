<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchPodcasts implements ShouldQueue
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

    public function fetchPodcasts(\App\Models\Language $language)
    {
        $client = new \GuzzleHttp\Client([
            "base_uri" => $language->podcast_rss_url,
            "timeout" => 20.0,
        ]);
        $response = $client->get("rss/");
        $data = $response->getBody()->getContents();

        // you cannot serialize `simplexml_load_string`, so we convert it after
        $feed = simplexml_load_string($data);

        $feed->registerXPathNamespace(
            "itunes",
            "http://www.itunes.com/dtds/podcast-1.0.dtd"
        );

        $feed->registerXPathNamespace(
            "content",
            "http://purl.org/rss/1.0/modules/content/"
        );

        foreach ($feed->xpath("channel/item") as $podcast) {
            $podcast = \App\Models\Podcast::withoutGlobalScopes()->updateOrCreate(
                ["guid" => $podcast->guid],
                [
                    "synced" => true,
                    "published_at" => date(
                        "Y-m-d H:i:s",
                        strtotime($podcast->pubDate)
                    ),
                    "rss_content" => (string) $podcast->xpath(
                        "content:encoded"
                    )[0],
                    "title" =>
                        explode(": ", $podcast->title)[1] ?? $podcast->title,
                    "slug" => \Illuminate\Support\Str::slug(
                        explode(": ", $podcast->title)[1] ?? $podcast->title
                    ),
                    "episode_number" =>
                        preg_replace(
                            "/[^0-9]/",
                            "",
                            explode(": ", $podcast->title)[0]
                        ) ?:
                        null,
                    "introduction" =>
                        (string) $podcast->xpath("itunes:subtitle")[0] ?? null,
                    "duration" => (string) $podcast->xpath(
                        "itunes:duration"
                    )[0],
                    "file" => $podcast->enclosure["url"],
                ]
            );

            $language->podcasts()->attach($podcast->id);
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \App\Models\Podcast::query()->update(["synced" => false]);

        foreach (\App\Models\Language::all() as $language) {
            if ($language->podcast_rss_url) {
                $this->fetchPodcasts($language);
            }
        }
    }
}
