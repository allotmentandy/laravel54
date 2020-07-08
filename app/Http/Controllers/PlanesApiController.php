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

    public function getSeenScrape()
    {
        $data['types'] = Planes::select('reg', 'type', 'conNumber', 'seenScrape')->
            where('seenScrape', "!=", 'null')->orderBy('countryCode', 'asc')->orderBy('id', 'asc')->get();
        return $data;
    }

    public function getPlanes()
    {
        $data['planes'] = Planes::select('reg', 'type', 'conNumber')->orderBy('countryCode', 'asc')->orderBy('id', 'asc')->get();
        return $data;
    }

    public function getCountries()
    {
        $data['countries'] = Countries::select('A', 'B')->get();
        return $data;
    }


}
