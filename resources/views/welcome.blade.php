@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Examples</div>
                <div class="panel-body">
                    <a href="{{ route('planes') }}">Planes</a><br>
                    <a href="{{ route('planesApi') }}">Planes API</a><br>
                    <a href="{{ route('londinium') }}">Londinium</a><br>
                    <a href="{{ route('rssJobs') }}">RSS job feeds</a><br>
                    <a href="{{ route('rssNews') }}">RSS news feeds</a><br>
                    <a href="{{ route('jquery') }}">Jquery Examples</a><br>
                    <a href="{{ route('vue') }}">Vue Examples</a><br>
                    <a href="{{ route('cssE') }}">CSS Examples</a><br>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"></i>Welcome to my demo laravel site.</div>
                        <div class="panel-body">
                            There are a number of artisan commands to download and import data. Please see the readme.md file
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"></i>Andy</div>
                        <div class="panel-body">
                        <img src="/images/andy.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Planes</div>
                        <div class="panel-body">
                            <div class="panel-body">
                                I am a fan of private aviation, this is the start of a tool to help log 'bizjets' you have seen. 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading ">Londinium</div>
                        <div class="panel-body">
                            <div class="panel-body">
                                Tool to manage a website link directory.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
                    <i class="fab fa-vuejs fa-3x"></i>
                    <i class="fab fa-github fa-3x"></i>
                    <i class="fab fa-twitter fa-3x"></i>
                    <i class="fab fa-youtube fa-3x"></i>


        </div>
    </div>


</div>

@endsection
