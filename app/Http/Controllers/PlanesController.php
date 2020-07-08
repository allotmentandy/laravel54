<?php

namespace App\Http\Controllers;

use App\Countries;
use App\Jobs\downloadSeenAircraftImage;
use App\Planes;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use File;

//use PDF; // removed as too intense.

class PlanesController extends Controller {
	public $output;

	public function index() {
//        $data['details'] = Planes::orderByRaw('RAND()')->where('type', '=', 'Dassault Falcon 900EX')->take(1)->get();
		// $data['details'] = Planes::orderByRaw('RAND()')->where('type', '=', 'Dassault Falcon 900')->take(1)->get();
		// $data['details'] = Planes::orderByRaw('RAND()')->where('type', '=', 'Gulfstream IV')->take(1)->get();

//        $data['details'] = Planes::orderByRaw('RAND()')->where('type', '=', 'Airbus A319CJ')->take(1)->get();
		// $data['details'] = Planes::orderByRaw('RAND()')->where('countryCode', '=' , 'G')->take(1)->get();
       $data['details'] = Planes::orderByRaw('RAND()')->where('type', '=', 'Gulfstream G650ER')->take(1)->get();

		return view('planes', $data);
	}

	public function txtview() {
		echo ("<html><head>");
		echo "<link href='http://localhost/bizjet.css' rel='stylesheet' type='text/css' media='screen, print' />";
		echo ("</head>
			<body>");
echo "<code>";
		// echo ("<table>");
		//tr {background-color: beige; }

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
							echo "</pre><table><tr><th colspan='4'>" . $item['countryCode'] . " - " . $countryCodeArray[$item['countryCode']] . "</th></tr></table><pre>" . PHP_EOL;
							$countryCode = $item['countryCode'];
						}
						$char = "☐";
						$regUnderline = " '>";
						$underline = " '>";
						if ($item['seenScrape'] == "Seen") {
							$regUnderline = " class='seen' style='border-bottom: 1px solid red; font-weight:bold;'>";
							$underline = " class='seen' style='border-bottom: 1px solid red; font-weight:bold;'>";
							$char = "☑";

						} elseif ($item['seenScrape'] == "Scrape") {
							$regUnderline = " class='scrape' style='border:0; font-weight:bold; color:green;'>";
							$underline = " class='scrape' style='border-bottom: 1px solid green; font-weight:bold;'>";
							$char = "☑";

						}

						echo "<p><span " . $regUnderline . $char . "&nbsp;</span>";
						echo "<span " . $regUnderline ;
						print pack('A10', $item['reg']);
						echo "</span><span ". $underline;
						print pack('A40A10', $item['type'], $item['conNumber']) ;
						echo "&nbsp;". "&nbsp;". "&nbsp;". "&nbsp;". "&nbsp;" . "</span>\n</p>";
						// echo . PHP_EOL;



						// echo "<tr><td width='2%' " . $regUnderline .  $char . "&nbsp;";
						// echo "</td><td width='18%' " . $regUnderline . $item['reg'];
						// echo "</td><td width='40%' " . $underline . $item['type'];
						// echo "</td><td width='20%' " . $underline . $item['conNumber'];
						// echo "</td></tr>" . PHP_EOL;

					}
				}
			);
		echo ("</code></body></html>");
	}

	public function planesInputScreen() {
		$data['planes'] = Planes::orderBy('countryCode')->orderBy('id')->paginate(150);
		return view('planesInputScreen', $data);
	}



	public function planesList() {
		$data['planes'] = Planes::orderBy('countryCode')->orderBy('id')->paginate(30);
		return view('planesList', $data);
	}

	public function details($id) {
		$data['details'] = Planes::where("id", "=", $id)->get();
		return view('planeDetails', $data);
	}

	public function countries() {
		$data['planes'] = Countries::orderBy('B')->orderBy('A')->paginate(300);
		return view('planeCountriesList', $data);
	}

	public function country($countryCode) {
		$data['planes'] = Planes::where("countryCode", "=", $countryCode)->orderBy('id')->orderBy('reg')->paginate(15);
		return view('planesList', $data);
	}

	public function countryPhotoJob($countryCode) {
		$data['planes'] = Planes::where("countryCode", "=", $countryCode)->get();

		foreach ($data['planes'] as $plane) {
			$this->dispatch(new downloadSeenAircraftImage($plane->id));
		}
	}

	public function types() {
		$data['types'] = Planes::select('type', DB::raw("COUNT(*) as count_row"))->groupBy('type')->get();
		return view('typesList', $data);
	}

	public function type($type) {
		$data['planes'] = Planes::where("type", "=", $type)->orderBy('countryCode')->orderBy('id')->paginate(15);
		return view('planesList', $data);
	}

	public function typePhotoJob($type) {
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

	public function json(){
		$aides = Planes::all();
		$aides->toJson(JSON_PRETTY_PRINT);
		return response()->json( $aides, 200);
			}

	public function ajax() {
		$id = Input::get('id');
		$seenScrape = Input::get('seenScrape');
		if ($seenScrape == 'Undo'){
			$seenScrape = null;
		}
		Planes::where('id', $id)->update(['seenScrape' => $seenScrape]);

		// now set the job to download an image of this
		$this->downloadImage($id);

		$response = "." . $id;
		return $response;
	}

	private function downloadImage($id) {
		Log::info('downloadImageFunction called with : ' . $id);
		$this->dispatch(new downloadSeenAircraftImage($id));
	}

	public function search(Request $request) {
		$this->validate($request, [
			'search' => 'required|min:3',
		]);

		$data['title'] = Input::get('search');

		$data['planes'] = Planes::where('reg', Input::get('q'))->orWhere('reg', 'like', '%' . Input::get('search') . '%')->orWhere('notes', 'like', '%' . Input::get('search') . '%')->get();

		return view('planeSearch', $data);
	}

	public function todo() {
		return view('planesTodo');
	}

	public function help() {
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
