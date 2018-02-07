<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class MapsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Mapper::map(53.381128999999990000, -1.470085000000040000);
        // St pauls 51.513, -0.0983
//        Mapper::streetview(51.513870, -0.098362, 1, 1, ['ui' => false]);
        Mapper::streetview(51.5138, -0.0983, 1, 1);

        return view('maps');
    }
}
