<?php

namespace App\Console\Commands;

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Page;
use App\Models\Podcast;

use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = SitemapGenerator::create(config('app.url'))->getSitemap();

        Page::all()->each(function (Page $page) use ($sitemap) {
            $sitemap->add(Url::create($page->url));
        });

        Post::all()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(Url::create($post->url));
        });

        Podcast::all()->each(function (Podcast $podcast) use ($sitemap) {
            $sitemap->add(Url::create($podcast->url));
        });


        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
