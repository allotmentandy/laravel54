<?php

namespace App\Http\Controllers;

use Embed\Embed;
use Illuminate\Http\Request;

class EmbedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//Load any url:
        $info = Embed::create('https://www.youtube.com/watch?v=gF3xGzssFso');
        //$info = Embed::create('https:github.com/allotmentandy/laravel54/');
        //$info = Embed::create('');

        //Get content info

        $info->title; //The page title
$info->description; //The page description
$info->url; //The canonical url
$info->type; //The page type (link, video, image, rich)
$info->tags; //The page keywords (tags)

$info->images; //List of all images found in the page
$info->image; //The image choosen as main image
// $info->imageWidth; //The width of the main image
// $info->imageHeight; //The height of the main image

$info->code; //The code to embed the image, video, etc
$info->width; //The width of the embed code
$info->height; //The height of the embed code
$info->aspectRatio; //The aspect ratio (width/height)

$info->authorName; //The resource author
$info->authorUrl; //The author url

$info->providerName; //The provider name of the page (Youtube, Twitter, Instagram, etc)
$info->providerUrl; //The provider url
$info->providerIcons; //All provider icons found in the page
$info->providerIcon; //The icon choosen as main icon

$info->publishedDate; //The published date of the resource
$info->license; //The license url of the resource
$info->linkedData; //The linked-data info (http://json-ld.org/)
$info->feeds; //The RSS/Atom feeds

//print_r($info->title);

        $info->title; //The page title
$info->description; //The page description
$info->url; //The canonical url
$info->type; //The page type (link, video, image, rich)
$info->tags; //The page keywords (tags)

        return view('embed', compact('info'));
    }
}
