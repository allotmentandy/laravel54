<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JqueryController extends Controller
{

    function index(){
    	return view('jquery');
    }

	function jquery_smsMessage(){
    	return view('jquery_smsMessage');
    }

	function jquery_togglePanels(){
    	return view('jquery_togglePanels');
    }



}
