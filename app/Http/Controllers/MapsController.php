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
        Mapper::streetview(51.513870, -0.098362, 1, 1, ['ui' => false]);

        return view('maps');
    }
}
