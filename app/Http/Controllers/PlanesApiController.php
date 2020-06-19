<?php

namespace App\Http\Controllers;

use App\Countries;
use App\Jobs\downloadSeenAircraftImage;
use App\Planes;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

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
