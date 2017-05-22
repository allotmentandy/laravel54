<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Londinium;
use App\Subcategories;
use Debugbar;

class LondiniumController extends Controller
{
    public function index()
    {
        $data['site'] = Londinium::orderByRaw('RAND()')->take(1)->get();
        return view('londinium', $data);
    }

    public function sites()
    {
        $data['sites'] = Londinium::orderBy('id')->where('active', '=', 1)->paginate(15);
        $data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=', 'saved')->orderBy('id', 'DESC')->take(1)->get();
        return view('londiniumSites', $data);
    }

    public function saved()
    {
        $data['sites'] = Londinium::orderBy('url')->where('saved', '=', 'saved')->paginate(2099);
        $data['countSaved'] = Londinium::where('saved', '=', 'saved')->count();
        $data['highestSavedId'] = Londinium::select('id')->where('saved', '=', 'saved')->orderBy('id', 'DESC')->take(1)->get();
        return view('londiniumSites', $data);
    }

    public function search()
    {
        echo "hi";
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
            $subcategories[$row['id'] ]= $row['name'];
        }


        $data['subcategories'] = $subcategories;
        $data['sites'] = Londinium::where('saved', '=', 'saved')->orderBy('subcategory_id')->paginate(1000);

        return view('londiniumSitesOutputBySubcategory', $data);
    }


    public function outputHtml()
    {
        \Debugbar::disable();
        return view('outputHtml');
    }
}
