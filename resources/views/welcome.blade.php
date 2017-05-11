@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Examples</div>
                    <div class="panel-body">
                        <a href="{{ route('planes') }}">Planes</a><br>
                        <a href="{{ route('londinium') }}">Londinium</a><br>
                        <a href="{{ route('rssJobs') }}">RSS job feeds</a><br>
                        <a href="{{ route('rssNews') }}">RSS news feeds</a><br>
                        <a href="{{ route('jquery') }}">Jquery Examples</a><br>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Welcome to my demo laravel site. 
                        <br>
                        There are a number of artisan commands to download and import data. Please see the readme.md file
                        <h4>Also see Andy's BLOG</h4>
                        <p>
                        Please visit my <a href="https://allotmentandy.github.io/" target="_blank">https://allotmentandy.github.io/</a> pages for useful links and info about php, laravel, html and other stuff i am interested in.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Planes</div>
                    <div class="panel-body">
                        <div class="panel-body">
                            I am a fan of private aviation, this is the start of a tool to help log 'bizjets' you have seen. 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Londinium</div>
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
@endsection
