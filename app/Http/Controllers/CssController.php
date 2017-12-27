<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CssController extends Controller
{
    public function index()
    {
        echo "index of css";

        echo '<h1>Buttons</h1>
<a href="#" class="button">Already Taken? <i class="icon-chevron-right"></i></a>
<a href="#" class="button">Already Taken</a>
<p>Extra small Size</p>
<p>
<button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-signal"></span> Signal</button>
<button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Trash</button>
</p>

<style>

  @import url(https://netdna.bootstrapcdn.com/font-awesome/2.0/css/font-awesome.css);
  body{
    background: #ECECEC;
    margin:0px ;
    color:#333;
  }
  a.button{
    background: #ECECEC;
    border-radius: 15px;
    padding: 10px 20px;
    display: block;
    font-family: arial;
    font-weight: bold;
    color:#7f7f7f;
    text-decoration: none;
    text-shadow:0px 1px 0px #fff;
    border:1px solid #a7a7a7;
    width: 145px;
    margin-top:10px;
    box-shadow: 0px 2px 1px white inset, 0px -2px 8px white, 0px 2px 5px rgba(0, 0, 0, 0.1), 0px 8px 10px rgba(0, 0, 0, 0.1);
    -webkit-transition:box-shadow 0.5s;
  }
  a.button i{
    float: right;
    margin-top: 2px;
  }
  a.button:hover{
    box-shadow: 0px 2px 1px white inset, 0px -2px 20px white, 0px 2px 5px rgba(0, 0, 0, 0.1), 0px 8px 10px rgba(0, 0, 0, 0.1);
  }
  a.button:active{
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.5) inset, 0px -2px 20px white, 0px 1px 5px rgba(0, 0, 0, 0.1), 0px 2px 10px rgba(0, 0, 0, 0.1);
    background:-webkit-linear-gradient(top, #d1d1d1 0%,#ECECEC 100%);
  }
  ';
    }
}
