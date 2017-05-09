<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feeds;

class RssController extends Controller
{
    function index(){
    	//path to directory to scan
        $directory = "/var/www/laravel54/rss/*.rss";

        $file= glob($directory);

        $filesArray =  array();

        //print each file name
        foreach ($file as $filew) {
            echo $filew . "<br>";
        }

    }

    function jobs() {
        $feed = Feeds::make([
            'http://www.indeed.co.uk/rss?q=laravel',
            'http://www.jobserve.com/MySearch/ED0589AD0579EEC9.rss',
            'https://remoteok.io/remote-jobs.rss',
            'http://www.indeed.co.uk/rss?q=PHP+Developer&l=Hammersmith'
        ], 20);
        $data = array(
          'title'     => $feed->get_title(),
          'permalink' => $feed->get_permalink(),
          'items'     => $feed->get_items(),
        );

        return View('feed', $data);
    }

    function news() {
        $feed = Feeds::make([
            'http://stackoverflow.com/feeds/tag/laravel',
            'https://www.reddit.com/r/laravel/.rss',
            'http://laraveldaily.com/feed/'
        ], 20);
        $data = array(
          'title'     => $feed->get_title(),
          'permalink' => $feed->get_permalink(),
          'items'     => $feed->get_items(),
        );

        return View('feed', $data);
    }


}
