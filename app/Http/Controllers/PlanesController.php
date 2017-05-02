<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\PlanesLatest;
use App\Countries;

use PDF;


class PlanesController extends Controller
{

	public $output;

    function index(){
		$data['reg'] = PlanesLatest::orderByRaw('RAND()')->take(1)->get();

    	return view('planes', $data);
    }

    function txtview(){

		echo ("<html><head>");

		 echo "<style>body {font-family: Verdana, Sans-Serif;} </style";

		echo "<style>th {background: #ddd; text-align: left; padding: 5px; } table, tr, td { line-height: 12px; margin: 0; padding: 0; border: 0; font-size: 11px } </style>";
			
		echo ("</head>
			<body>");
		echo ("<table cellspacing='0' cellpadding='0'>");

		$countryCodeArray = [];

		$result = Countries::select('A' , 'B')->get();
		foreach ($result as $row){
			$countryCodeArray[$row['A']] = $row['B'];
		}


		PlanesLatest::select('reg', 'type', 'conNumber', 'countryCode')->orderBy('countryCode', 'asc')->orderBy('id', 'asc')->chunk(25000, function($items) use ($countryCodeArray) {
			
			if(!isset($countryCode) ){
				$countryCode = "";
			}
			
			foreach ($items as $item){

					if ($item['countryCode'] != $countryCode){
						//$name = Countries::select('B')->where('A', '=', $item['countryCode'] )->first();
						echo "<tr><th colspan='3'>" . $item['countryCode'] . " " . $countryCodeArray[$item['countryCode']] ."</th></tr>" . PHP_EOL;
						$countryCode = $item['countryCode'];
					}

			$seen =  rand(0,2);
			echo "<tr><td ";
			switch ($seen) {
			case '1':
			echo " style='
				border-bottom: 2px solid red;
			'
			><b>☑</b> ";
			break;

			case '2':
			echo " style='
			'
			><b>☐</b> ";
			 break;
				
				default:
			echo "><b>☐</b> ";

  
 					break;
			}



					echo "</td><td>" . $item['reg'] . "</td><td>";
					echo $item['type'] . "</td><td>";
					echo $item['conNumber'] . "</td></tr>" .PHP_EOL;
				}
		

			}
		);
			echo ("</table></body></html>");
	
		}
	
    
    function pdfview(){

		set_time_limit(5000);
		ini_set('memory_limit','1200M');

    	$output = ("<style>body {font-family: Helvetica, Arial, Sans-Serif;} th {background: #ddd; text-align: left; padding: 5px;}</style>");

		PlanesLatest::select('reg', 'type', 'conNumber', 'countryCode')->orderBy('countryCode', 'asc')->chunk(5000, function($items)  use (&$output) {
			$countryCode = "";
			
			$output .= "<table>";

			foreach ($items as $item){

					if ($item['countryCode'] != $countryCode){
						$output .= "<tr><th colspan='3'>" . $item['countryCode'] ."</th></tr>";
						$countryCode = $item['countryCode'];
					}
					$output .= "<tr><td>" . $item['reg'] . "</td><td>";
					$output .= $item['type'] . "</td><td>";
					$output .= $item['conNumber'] . "</td></tr>";
				}
		
			$output .= "</table>";

			}
		);
	
		$pdf = PDF::loadHTML($output);

		return $pdf->download('planes.pdf'); 

		}

}
