<?php

namespace App\Http\Controllers;

use Feeds;

class RssController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'welcome to my feed reader, this isnt a real feed, it is just an example',
            'permalink' => 'http://www.londinium.com/',
            'items' => [],
        ];

        return View('feed', $data);
    }

    public function jobs()
    {
        $feed = Feeds::make([
            'http://www.indeed.co.uk/rss?q=laravel',
            'http://www.jobserve.com/MySearch/ED0589AD0579EEC9.rss',
            'https://remoteok.io/remote-jobs.rss',
            'http://www.indeed.co.uk/rss?q=PHP+Developer&l=Hammersmith',
            'http://uk.dice.com/rss/laravel/all-locations/en/jobs-feed.xml?JobTypeFilter=2&xc=247',
            'https://larajobs.com/feed',
        ], 20);
        $data = [
            'title' => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items' => $feed->get_items(),
        ];

        return View('feed', $data);
    }

    public function news()
    {
        $feed = Feeds::make([
            'http://stackoverflow.com/feeds/tag/laravel',
            'https://www.reddit.com/r/laravel/.rss',
            'http://laraveldaily.com/feed/',
        ], 20);
        $data = [
            'title' => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items' => $feed->get_items(),
        ];

        return View('feed', $data);
    }
}
