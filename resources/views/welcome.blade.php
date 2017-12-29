@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Examples</div>
                <div class="panel-body">
                    <a href="{{ route('rssJobs') }}">RSS job feeds</a><br>
                    <a href="{{ route('rssNews') }}">RSS news feeds</a><br>
                    <a href="{{ route('jquery') }}">Jquery Examples</a><br>
                    <a href="{{ route('vue') }}">Vue Examples</a><br>
                    <a href="{{ route('cssE') }}">CSS Examples</a><br>
                </div>
            </div>
            <div class="panel panel-default">
                        <div class="panel-heading"></i>Welcome to my demo laravel site.</div>
                        <div class="panel-body">
                            There are a number of artisan commands to download and import data. Please see the readme.md file for more details on how to get it setup.
                            <h6>Private Jet Database Tools</h6>
                            I am a fan of private aviation, this is the start of a tool to help log 'bizjets' you have seen.
                            <h6>Londinium website directory</h6>
                            Tool to manage a website link directory
                        </div>
                    </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <p class="line-1 anim-typewriter">Full stack developer looking for a new role</p>
                    <style>
                    /* Google Fonts */
                    @import url(https://fonts.googleapis.com/css?family=Anonymous+Pro);
                    /* Global */
                    html{
                    min-height: 100%;
                    }
                    body{
                    /*height: calc(100vh - 8em);*/
                    /*padding: 4em;*/
                    /*color: rgba(255,255,255,.75);*/
                    /*font-family: 'Anonymous Pro', monospace;*/
                    }
                    .line-1{
                    position: relative;
                    top: 50%;
                    width: 24em;
                    margin: 0 auto;
                    border-right: 2px solid rgba(255,255,255,.75);
                    font-size: 180%;
                    text-align: center;
                    white-space: nowrap;
                    overflow: hidden;
                    transform: translateY(-50%);
                    color: green;
                    }
                    /* Animation */
                    .anim-typewriter{
                    animation: typewriter 4s steps(45) 1s 1 normal both,
                    blinkTextCursor 500ms steps(45) infinite normal;
                    }
                    @keyframes typewriter{
                    from{width: 0;}
                    to{width: 24em;}
                    }
                    @keyframes blinkTextCursor{
                    from{border-right-color: rgba(255,255,255,.75);}
                    to{border-right-color: transparent;}
                    }
                    </style>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="panel-body" style="background:black;">
                                <div class="css-typing">
                                    <p>
                                        Love Laravel
                                    </p>
                                    <p>
                                        Private Jets!
                                    </p>
                                    <p>
                                        what more u want?
                                    </p>
                                </div>
                                <style>
                                .css-typing p {
                                border-right: .15em solid orange;
                                font-family: "Courier";
                                font-size: 14px;
                                white-space: nowrap;
                                overflow: hidden;
                                }
                                .css-typing p:nth-child(1) {
                                width: 20.5em;
                                -webkit-animation: type 2s steps(100, end);
                                animation: type 2s steps(100, end);
                                -webkit-animation-fill-mode: forwards;
                                animation-fill-mode: forwards;
                                }
                                .css-typing p:nth-child(2) {
                                width: 11.5em;
                                opacity: 0;
                                -webkit-animation: type2 2s steps(20, end);
                                animation: type2 2s steps(30, end);
                                -webkit-animation-delay: 2s;
                                animation-delay: 2s;
                                -webkit-animation-fill-mode: forwards;
                                animation-fill-mode: forwards;
                                }
                                .css-typing p:nth-child(3) {
                                width: 11.5em;
                                opacity: 0;
                                -webkit-animation: type3 5s steps(20, end), blink .5s step-end infinite alternate;
                                animation: type3 5s steps(20, end), blink .5s step-end infinite alternate;
                                -webkit-animation-delay: 4s;
                                animation-delay: 4s;
                                -webkit-animation-fill-mode: forwards;
                                animation-fill-mode: forwards;
                                }
                                @keyframes type {
                                0% {
                                width: 0;
                                }
                                99.9% {
                                border-right: .15em solid orange;
                                }
                                100% {
                                border: none;
                                }
                                }
                                @-webkit-keyframes type {
                                0% {
                                width: 0;
                                }
                                99.9% {
                                border-right: .15em solid orange;
                                }
                                100% {
                                border: none;
                                }
                                }
                                @keyframes type2 {
                                0% {
                                width: 0;
                                }
                                1% {
                                opacity: 1;
                                }
                                99.9% {
                                border-right: .15em solid orange;
                                }
                                100% {
                                opacity: 1;
                                border: none;
                                }
                                }
                                @-webkit-keyframes type2 {
                                0% {
                                width: 0;
                                }
                                1% {
                                opacity: 1;
                                }
                                99.9% {
                                border-right: .15em solid orange;
                                }
                                100% {
                                opacity: 1;
                                border: none;
                                }
                                }
                                @keyframes type3 {
                                0% {
                                width: 0;
                                }
                                1% {
                                opacity: 1;
                                }
                                100% {
                                opacity: 1;
                                }
                                }
                                @-webkit-keyframes type3 {
                                0% {
                                width: 0;
                                }
                                1% {
                                opacity: 1;
                                }
                                100% {
                                opacity: 1;
                                }
                                }
                                @keyframes blink {
                                50% {
                                border-color: transparent;
                                }
                                }
                                @-webkit-keyframes blink {
                                50% {
                                border-color: tranparent;
                                }
                                }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="/images/andy.jpg">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection