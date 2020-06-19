<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JqueryController extends Controller
{
    public function index()
    {
        return view('jquery');
    }

    public function jquery_smsMessage()
    {
        return view('jquery_smsMessage');
    }

    public function jquery_togglePanels()
    {
        return view('jquery_togglePanels');
    }

    public function jquery_emailRecipients()
    {
        return view('jquery_emailRecipients');
    }
}
