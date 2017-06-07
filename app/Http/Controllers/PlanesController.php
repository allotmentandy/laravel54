<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Planes;
use App\Countries;
use App\Jobs\downloadSeenAircraftImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;

//use PDF; // removed as too intense.

class PlanesController extends Controller
{
    public $output;

    public function index()
    {
        $data['reg'] = Planes::orderByRaw('RAND()')->take(1)->get();

        return view('planes', $data);
    }

    public function txtview()
    {
        echo("<html><head>");
        echo "<style>body {font-family: Verdana, Sans-Serif;} </style";
        echo "<style>th {background: #ddd; text-align: left; padding: 5px; } table, tr, td { line-height: 12px; margin: 0; padding: 0; border: 0; font-size: 11px } </style>";
        echo("</head>
			<body>");
        echo("<table cellspacing='0' cellpadding='0'>");

        $countryCodeArray = [];

        $result = Countries::select('A', 'B')->get();
        foreach ($result as $row) {
            $countryCodeArray[$row['A']] = $row['B'];
        }

        Planes::select('reg', 'type', 'conNumber', 'countryCode', 'seenScrape')
        ->orderBy('countryCode', 'asc')
        ->orderBy('id', 'asc')
        ->chunk(
            25000,
            function ($items) use ($countryCodeArray) {
                if (!isset($countryCode)) {
                    $countryCode = "";
                }
            
                foreach ($items as $item) {
                    if ($item['countryCode'] != $countryCode) {
                        //$name = Countries::select('B')->where('A', '=', $item['countryCode'] )->first();
                        echo "<tr><th colspan='3'>" . $item['countryCode'] . " " . $countryCodeArray[$item['countryCode']] ."</th></tr>" . PHP_EOL;
                        $countryCode = $item['countryCode'];
                    }

                    $underline =">";
                    if ($item['seenScrape'] == "seen") {
                        $underline = " style='border-bottom: 2px solid red;'>";
                    } elseif ($item['seenScrape'] == "scrape") {
                        $underline= " style='border-bottom: 2px solid green;'>";
                    }

                    echo "<tr><td " . $underline . " <b>☑</b> ";
                    echo "</td><td" . $underline . $item['reg'];
                    echo "</td><td" . $underline . $item['type'];
                    echo "</td><td" . $underline . $item['conNumber'] . "</td></tr>" .PHP_EOL;
                }
            }
        );
        echo("</table></body></html>");
    }
    
    public function planesList()
    {
        $data['planes'] = Planes::orderBy('countryCode')->orderBy('id')->paginate(15);
        return view('planesList', $data);
    }

    public function details($id)
    {
        $data['details'] = Planes::where("id", "=", $id)->get();
        return view('planeDetails', $data);
    }

    public function countries()
    {
        $data['planes'] = Countries::orderBy('B')->orderBy('A')->paginate(300);
        return view('countriesList', $data);
    }

    public function country($countryCode)
    {
        $data['planes'] = Planes::where("countryCode", "=", $countryCode)->orderBy('id')->orderBy('reg')->paginate(15);
        return view('planesList', $data);
    }

    public function countryPhotoJob($countryCode)
    {
        $data['planes'] = Planes::where("countryCode", "=", $countryCode)->get();

        foreach ($data['planes'] as $plane) {
            $this->dispatch(new downloadSeenAircraftImage($plane->id));
        }
    }


    public function types()
    {
        $data['types'] = Planes::select('type', DB::raw("COUNT(*) as count_row"))->groupBy('type')->get();
        return view('typesList', $data);
    }

    public function type($type)
    {
        $data['planes'] = Planes::where("type", "=", $type)->orderBy('countryCode')->orderBy('id')->paginate(15);
        return view('planesList', $data);
    }

    public function typePhotoJob($type)
    {
        $data['planes'] = Planes::where("type", "=", $type)->get();

        foreach ($data['planes'] as $plane) {
            $this->dispatch(new downloadSeenAircraftImage($plane->id));
        }
    }



    // public function seen($id)
    // {
    //     Planes::where('id', $id)->update(['seenScrape' => 'seen']);
    //     // now set the job to download an image of this
    //     $this->downloadImage($id);
    //     return back()->with('message', 'Operation Successful <b>' . $id .  '</b>');
    // }

    // public function scrape($id)
    // {
    //     Planes::where('id', $id)->update(['seenScrape' => 'scrape']);
    //     return back()->with('message', 'Operation Successful ' . $id);
    // }

    public function ajax()
    {
        $id = Input::get('id');
        $seenScrape = Input::get('seenScrape');

        Planes::where('id', $id)->update(['seenScrape' => $seenScrape]);

        // now set the job to download an image of this
        $this->downloadImage($id);

        $response = ".".$id;
        return $response;
    }

    private function downloadImage($id)
    {
        Log::info('downloadImageFunction called with : '.$id);
        $this->dispatch(new downloadSeenAircraftImage($id));
    }

    public function search(Request $request)
    {
        $this->validate($request, [
        'q' => 'required||min:3',
        ]);

        $data['title'] = Input::get('q');

        $data['planes'] =  Planes::where('reg', Input::get('q'))->orWhere('reg', 'like', '%' . Input::get('q') . '%')->orWhere('notes', 'like', '%' . Input::get('q') . '%')->get();

        return view('planeSearch', $data);
    }

    public function todo()
    {
        return view('planesTodo');
    }

    public function help()
    {
        return view('planesHelp');
    }





    // pdf view is too much for the server, use browser?
    //   function pdfview(){

        // set_time_limit(5000);
        // ini_set('memory_limit','1200M');

        // $output = ("<style>body {font-family: Helvetica, Arial, Sans-Serif;} th {background: #ddd; text-align: left; padding: 5px;}</style>");

        // Planes::select('reg', 'type', 'conNumber', 'countryCode')->orderBy('countryCode', 'asc')->chunk(5000, function($items)  use (&$output) {
        // $countryCode = "";
            
        // $output .= "<table>";

        // foreach ($items as $item){

        // 			if ($item['countryCode'] != $countryCode){
        // 				$output .= "<tr><th colspan='3'>" . $item['countryCode'] ."</th></tr>";
        // 				$countryCode = $item['countryCode'];
        // 			}
        // 			$output .= "<tr><td>" . $item['reg'] . "</td><td>";
        // 			$output .= $item['type'] . "</td><td>";
        // 			$output .= $item['conNumber'] . "</td></tr>";
        // 		}
        
        // 	$output .= "</table>";

        // 	}
        // );
    
        // $pdf = PDF::loadHTML($output);

        // return $pdf->download('planes.pdf');

        // }
}
