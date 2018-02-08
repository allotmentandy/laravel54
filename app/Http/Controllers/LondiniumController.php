<?php

namespace App\Http\Controllers;

use allotmentandy\socialmedialinkextractor;
use App\Londinium;
use App\Spider;
use App\Subcategories;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LondiniumController extends Controller
{
    public function index()
    {
        $data['site'] = Londinium::where('saved', '=', 'saved')->orderByRaw('RAND()')->take(1)->get();
        return view('londinium', $data);
    }

    public function sites()
    {
        $data['sites'] = Londinium::orderBy('id')->where('active', '=', 1)->paginate(1500);
        $data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=', 'saved')->orderBy('id', 'DESC')->take(1)->get();
        return view('londiniumSites', $data);
    }

    public function site($id)
    {
        $data['id'] = $id;
        $data['sites'] = Londinium::orderBy('id')->where('id', '=', $id)->get();
        $data['spider'] = Spider::where('id', '=', $id)->get();

        return view('londiniumSite', $data);
    }

    public function moveSubcategory()
    {
        echo 'controller';
        echo $_POST['subcategory'];
    }

    public function siteEditUrl($id)
    {
        $site = Londinium::find($id);
        $site->url = $_POST['url'];
        $site->save();

        return back()->with('success', 'URL Changed!');
    }

    public function siteEditName($id)
    {
        $site = Londinium::find($id);
        $site->name = $_POST['name'];
        $site->save();

        return back()->with('success', 'Name Changed!');
    }

    public function unsaved()
    {
        $data['sites'] = Londinium::orderBy('url')->where('saved', '!=', 'saved')->paginate(2099);
        $data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=', 'saved')->orderBy('id', 'DESC')->take(1)->get();

        $subcategories = [];
        $result = Subcategories::orderBy('name')->get();
        foreach ($result as $row) {
            $subcategories[$row['id']] = $row['name'];
        }

        $data['subcategories'] = $subcategories;

        return view('londiniumSites', $data);
    }

    public function search(Request $request)
    {
        $q = $request->input('q');

        $data['searchResults'] = Londinium::select('url', 'saved', 'name', 'id', 'subcategory_id')->where('saved', '=', 'saved')->where('url', 'LIKE', "%$q%")->paginate(5000);

        $data['query'] = $q;

        $data['subcategories'] = Subcategories::orderBy('name')->paginate(5000);

        return view('londiniumSearchOrAdd', $data);
    }

    public function addAsSaved(Request $request)
    {
        $url = $request->input('url');
        $subcat = $request->input('subcategory');
        $values = array('url' => $url, 'saved' => 'saved', 'active' => 1, 'subcategory_id' => $subcat);
        DB::table('londinium.sites')->insert($values);

        return redirect('/londinium/site/' . DB::getPdo()->lastInsertId());
    }

    public function subcategories()
    {
        $data['subcategories'] = Subcategories::orderBy('name')->paginate(5000);

        return view('londiniumSubcategories', $data);
    }

    public function subcategory($id)
    {
        $data['sites'] = Londinium::where('subcategory_id', '=', $id)->orderBy('url')->paginate(500);
        $data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=', 'saved')->orderBy('id', 'DESC')->take(1)->get();

        return view('londiniumSites', $data);
    }

    public function save($id)
    {
        $Londinium = Londinium::where('id', '=', $id)->first();
        $Londinium->saved = 'saved';
        $Londinium->save();
        return back()->with('message', 'Operation Successful !');
    }

    public function unsave($id)
    {
        $Londinium = Londinium::where('id', '=', $id)->first();
        $Londinium->saved = '';
        $Londinium->save();
        return back()->with('message', 'Operation Successful !');
    }

    public function sitesBySubcategory()
    {
        $subcategories = [];
        $result = Subcategories::orderBy('name')->get();
        foreach ($result as $row) {
            $subcategories[$row['id']] = $row['name'];
        }

        $spiderStatus = [];
        $spiderTitle = [];
        $result = Spider::get();
        foreach ($result as $row) {
            $spiderStatus[$row['id']] = $row['status'];
            $spiderTitle[$row['id']] = $row['title'];
        }

        $data['spiderStatus'] = $spiderStatus;
        $data['spiderTitle'] = $spiderTitle;
        $data['subcategories'] = $subcategories;
        $data['sites'] = Londinium::where('saved', '=', 'saved')->orderBy('subcategory_id')->paginate(1000);

        return view('londiniumSitesOutputBySubcategory', $data);
    }

    public function savedSubcategory()
    {
        $subcategories = [];
        $result = Subcategories::orderBy('name')->get();
        foreach ($result as $row) {
            $subcategories[$row['id']] = $row['name'];
        }

        $spiderStatus = [];
        $spiderTitle = [];
        $result = Spider::get();
        foreach ($result as $row) {
            $spiderStatus[$row['id']] = $row['status'];
            $spiderTitle[$row['id']] = $row['title'];
        }

        $data['spiderStatus'] = $spiderStatus;
        $data['spiderTitle'] = $spiderTitle;
        $data['subcategories'] = $subcategories;
        $data['sites'] = Londinium::where('saved', '=', 'saved')->orderBy('subcategory_id')->paginate(10000);

        return view('londiniumSavedSubcategory', $data);
    }

    public function outputHtml()
    {
        // \Debugbar::disable();

        $data['adsense'] = env("LONDINIUM_ADSENSE");

        $subcategories = [];
        $result = Subcategories::orderBy('name')->get();
        foreach ($result as $row) {
            $subcategories[$row['id']] = $row['name'];
        }
        $data['subcategories'] = $subcategories;

        $twitter = [];
        $result = Spider::orderBy('id')->get();
        foreach ($result as $row) {
            $twitter[$row['id']] = $row['twitter_url'];
        }
        $data['twitter'] = $twitter;

        $facebook = [];
        $result = Spider::orderBy('id')->get();
        foreach ($result as $row) {
            $facebook[$row['id']] = $row['facebook_url'];
        }
        $data['facebook'] = $facebook;

        $instagram = [];
        $result = Spider::orderBy('id')->get();
        foreach ($result as $row) {
            $instagram[$row['id']] = $row['instagram_url'];
        }
        $data['instagram'] = $instagram;

        $linkedin = [];
        $result = Spider::orderBy('id')->get();
        foreach ($result as $row) {
            $linkedin[$row['id']] = $row['linkedin_url'];
        }
        $data['linkedin'] = $linkedin;

        $data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();

        $Travel = [262, 265, 268, 270, 330, 331, 341, 368, 332, 1495, 604, 457, 780, 829, 1518];
        $Tourism = [2, 5, 3, 154, 451, 452, 318, 292];
        $Food = [245, 249, 250, 957, 871, 358, 609, 611];
        $Shopping = [105, 139, 1470, 1484, 1494, 155, 157, 612, 615, 437, 168, 189, 863];
        $Finance = [284, 285, 348];
        $Sport = [29, 35, 36, 37, 40, 426, 460, 461, 462, 463, 464, 465, 466, 467, 468, 424, 644];
        $Property = [290, 293, 334, 423];
        $Media = [174, 176, 177, 178, 179, 181, 601];
        $Info = [327, 144, 147, 149, 1147, 940, 1066, 1138, 344, 431, 1517];
        $Events = [158, 172, 562, 355, 520, 335];

        $TravelString = implode(", ", $Travel);
        $data['Travel'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Travel)->orderByRaw("FIELD(subcategory_id, $TravelString )")->paginate(1000);

        $TourismString = implode(", ", $Tourism);
        $data['Tourism'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Tourism)->orderByRaw("FIELD(subcategory_id, $TourismString )")->paginate(1000);

        $FoodString = implode(", ", $Food);
        $data['Food'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Food)->orderByRaw("FIELD(subcategory_id, $FoodString )")->paginate(1000);

        $ShoppingString = implode(", ", $Shopping);
        $data['Shopping'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Shopping)->orderByRaw("FIELD(subcategory_id, $ShoppingString )")->paginate(1000);

        $FinanceString = implode(", ", $Finance);
        $data['Finance'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Finance)->orderByRaw("FIELD(subcategory_id, $FinanceString )")->paginate(1000);

        $SportString = implode(", ", $Sport);
        $data['Sport'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Sport)->orderByRaw("FIELD(subcategory_id, $SportString )")->paginate(1000);

        $PropertyString = implode(", ", $Property);
        $data['Property'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Property)->orderByRaw("FIELD(subcategory_id, $PropertyString )")->paginate(1000);

        $MediaString = implode(", ", $Media);
        $data['Media'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Media)->orderByRaw("FIELD(subcategory_id, $MediaString )")->paginate(1000);

        $InfoString = implode(", ", $Info);
        $data['Info'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Info)->orderByRaw("FIELD(subcategory_id, $InfoString )")->paginate(1000);

        $EventsString = implode(", ", $Events);
        $data['Events'] = Londinium::where('saved', '=', 'saved')->whereIn('subcategory_id', $Events)->orderByRaw("FIELD(subcategory_id, $EventsString )")->paginate(1000);

        $data['date'] = date('Y-m-d H:i:s');

        return view('outputHtml', $data);
    }

    public function outputJson()
    {
return '
{
"4": 5,
"6": 7
}';
    }

    public function screenshot($id)
    {
        $data['url'] = Londinium::where('id', '=', $id)->take(1)->first();

        echo "screenshot called<br>";

        if (!$data['url']) {
            echo "no id/url. finished";
            exit;
        }

        $url = $data['url']->url;

        // uses https://github.com/spatie/browsershot
        $browsershot = new \Spatie\Browsershot\Browsershot();
        $browsershot
            ->setURL($url)
            ->setWidth(640)
            ->setHeightToRenderWholePage()
            ->setTimeout(5000)
            ->save('/var/www/laravel54/public/screenshots/' . $id . '.jpg');
    }

    public function spider()
    {
        $data['url'] = Londinium::where('active', '=', 1)
            ->where('saved', '=', 'saved')
            ->where('updated_at', '=', '0000-00-00 00:00:00')
            ->whereNotIn('id', [2079])
            ->orderBy('updated_at')
            ->take(1)
            ->first();

        if (!$data['url']) {
            echo "all spidering and screendumps complete for today :)";
            exit;
        }
        $url = $data['url']->url;
        $id = $data['url']->id;

        $client = new \GuzzleHttp\Client([
            'timeout' => 200.0,
            'http_errors' => false,
            'base_uri' => $url,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36',
            ],
        ]);

        try {
            $response = $client->request('GET', $url);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // If there are network errors, we need to ensure the application doesn't crash.
            // if $e->hasResponse is not null we can attempt to get the message
            // Otherwise, we'll just pass a network unavailable message.
            if ($e->hasResponse()) {
                $exception = (string) $e->getResponse()->getBody();
                $exception = json_decode($exception);
                echo $e->getCode();
                echo "request exception" . $response->getStatusCode() . " " . $id;
                exit;
            } else {
                echo "request exception else " . $url . $id;
                exit;
            }
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            echo "connection exception";
            // var_dump($e);
            exit();
        }

        echo '<html>
    <head>
    <title>Londinium Spider</title>
        <meta http-equiv="refresh" content="1">
    </head>
    <body>';
        echo $id . " -> " . $url . "<hr>";

        echo "Status Code: " . $response->getStatusCode();

        $html = $response->getBody()->getContents();

        $doc = new \DOMDocument();
        $tidy_config = array(
            'clean' => true,
            'output-xhtml' => true,
            'show-body-only' => false,
            'wrap' => 0,
        );
        $tidy = tidy_parse_string($html, $tidy_config, 'UTF8');
        $tidy->cleanRepair();

        $html = $tidy->html();

        libxml_use_internal_errors(true);
        $doc->loadHTML(mb_convert_encoding($html, "UTF-8"));
        libxml_clear_errors();

        $xpath = new \DOMXpath($doc);
        $spiderTitle = $xpath->evaluate("string(//html/head/title[1])");
        echo "<h1>" . $spiderTitle . "</h1>";

        Londinium::find($id)->touch();

        $makeScreenshots = config('LONDINIUM_SPIDER_SCREENSHOTS_MAKE');

        echo $makeScreenshots . "<br>";

        if ($makeScreenshots) {
            $this->screenshot($id);
        }

        $desc = $xpath->query('/html/head/meta[@name="description"]/@content');
        foreach ($desc as $content) {
            echo $content->value . PHP_EOL;
        }
        echo "<hr>";
        $desc = $xpath->query('/html/head/meta[@name="keywords"]/@content');
        foreach ($desc as $content) {
            echo $content->value . PHP_EOL;
        }
        echo "<hr>";

        // extract links
        $linkArray = [];
        $hrefs = $xpath->evaluate("/html/body//a");

        for ($i = 0; $i < $hrefs->length; $i++) {
            $href = $hrefs->item($i);
            $url = $href->getAttribute('href');
            $title = @$href->firstChild->nodeValue;
            //echo "<br /> $url $title";
            array_push($linkArray, $url);
        }
        $smle = new \allotmentandy\socialmedialinkextractor\SocialMediaLinkExtractorController;
        echo "<h4>Social Media</h4>";
        echo $smle->getTwitter($linkArray) . "<br>";
        echo $smle->getFacebook($linkArray) . "<br>";
        echo $smle->getYoutube($linkArray) . "<br>";
        echo $smle->getInstagram($linkArray) . "<br>";
        echo $smle->getLinkedin($linkArray) . "<br>";
        echo $smle->getGoogle($linkArray) . "<br>";
        echo $smle->getPinterest($linkArray) . "<br>";
        echo $smle->getGithub($linkArray) . "<br>";
        echo $smle->getFlickr($linkArray) . "<br>";
        echo $smle->getTumblr($linkArray) . "<br>";
        echo $smle->getRss($linkArray) . "<br>";

        // store title in spider table with id and status

        $s = Spider::firstOrNew(array('id' => $id));
        $s->status = $response->getStatusCode();
        $s->title = $spiderTitle;
        $s->twitter_url = $smle->getTwitter($linkArray);
        $s->facebook_url = $smle->getFacebook($linkArray);
        $s->youtube_url = $smle->getYoutube($linkArray);
        $s->instagram_url = $smle->getInstagram($linkArray);
        $s->linkedin_url = $smle->getLinkedin($linkArray);
        $s->google_url = $smle->getGoogle($linkArray);
        $s->pinterest_url = $smle->getPinterest($linkArray);
        $s->github_url = $smle->getGithub($linkArray);
        $s->flickr_url = $smle->getFlickr($linkArray);
        $s->tumblr_url = $smle->getTumblr($linkArray);
        $s->rss_url = $smle->getRss($linkArray);
        $s->save();
    }

    public function socialMedia()
    {
        echo "socialmedia links to check for rubbish<hr>";

        $sm = Spider::get();
        foreach ($sm as $row) {
            // echo $row->twitter_url . "<br>";
            echo $row->id . " " . $row->instagram_url . "<br>";
            // echo $row->id . " " . $row->tumblr_url . "<br>";
            // echo $row->id . " " . $row->flickr_url . "<br>";
            // echo $row->id . " " . $row->facebook_url . "<br>";
            // echo $row->id . " " . $row->youtube_url . "<br>";
        }
    }

    public function londiniumErrors()
    {
        $idArray = [];

        echo "<h2>errors</h2>";
        echo "sites with http status NOT 200<br>";

        $blanks = Spider::where('status', '<>', "200")->get();
        foreach ($blanks as $row) {
            echo "<a target='_blank' href='/londinium/site/" . $row['id'] . "'>" . $row['id'] . " (" . $row['status'] . ") " . $row['title'] . "</a><br>";
            $idArray[] = $row['id'];
        }

        echo "<hr>";
        echo "sites with blank title tags<br>";
        $blanks = Spider::where('title', '=', "")->get();
        foreach ($blanks as $row) {
            echo "<a target='_blank' href='/londinium/site/" . $row['id'] . "'>" . $row['id'] . " </a><br>";
            $idArray[] = $row['id'];
        }
        echo "<hr>";
        echo "sites with missing screenshots or screenshots < 10kb";
        echo "<hr>";
        echo "title like site not found";

        if (sizeof($idArray) > 0) {
            $comma_separated = implode(",", $idArray);
            echo "<hr>";
            echo "all ids to reset the sql<pre>";
            echo "UPDATE sites set updated_at = '0000-00-00 00:00:00' and screenshot_at = '0000-00-00 00:00:00' where id in (" . $comma_separated . ");\n";

            echo "DELETE FROM spider WHERE id in (" . $comma_separated . ")";
        }
    }
}
