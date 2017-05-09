<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Londinium;
use App\Subcategories;

class LondiniumController extends Controller
{
    function index(){
		$data['site'] = Londinium::orderByRaw('RAND()')->take(1)->get();
		return view('londinium', $data);
    }

    function sites(){
    	$data['sites'] = Londinium::orderBy('id')->where('active', '=', 1)->paginate(15);
    	$data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=' , 'saved')->orderBy('id', 'DESC')->take(1)->get();
    	return view('londiniumSites', $data);
    }

    function saved(){
    	$data['sites'] = Londinium::orderBy('id')->where('saved', '=', 'saved')->paginate(100);
    	$data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=' , 'saved')->orderBy('id', 'DESC')->take(1)->get();
    	return view('londiniumSites', $data);
    }

    function search(){
    	echo "hi";
    }

    function subcategories(){
        $data['subcategories'] = Subcategories::orderBy('name')->paginate(5000);

        return view('londiniumSubcategories', $data);
    }

    function subcategory($id){
        $data['sites'] = Londinium::where('subcategory_id', '=', $id)->orderBy('url')->paginate(500);
        $data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=' , 'saved')->orderBy('id', 'DESC')->take(1)->get();

        return view('londiniumSites', $data);
    }

    function save( $id){
        $Londinium = Londinium::where('id', '=', $id)->first();
        $Londinium->saved = 'saved';
        $Londinium->save();
		return back()->with('message','Operation Successful !');
    }
    
}
