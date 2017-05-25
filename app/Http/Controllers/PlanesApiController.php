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

class PlanesApiController extends Controller
{
    public function index()
    {
        return view('planesApi');
    }

    public function getTypes()
    {
        $data['types'] = Planes::select('type')->groupBy('type')->get();
        return $data;
    }
}
