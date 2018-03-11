<?php

namespace App\Http\Controllers;

use App\Subcategories;
use Illuminate\Http\Request;
use App\Londinium;

class VueController extends Controller
{
    public function index()
    {
        return view('vue');
    }

    public function ajax()
    {
        return view('vueAjax');
    }

    public function planesTypes()
    {
        return view('vuePlanesTypes');
    }

    public function planesTypesAxios()
    {
        return view('vuePlanesTypesAxios');
    }

    public function londiniumSitesAxios()
    {
        $data = Subcategories::active()
            ->select('id', 'name')
            ->with(['sites' => function ($query) {
                $query->active()->select('url', 'subcategory_id');
            }])
            ->get()
            ->toJson();

        return view('vueLondiniumSitesAxios', compact('data'));
    }
}
