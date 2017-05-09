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

        <div class="col-md-7">
            <div class="panel panel-default">
                    <div class="panel-body">
                        Welcome to my demo laravel site. 
                        <br>
                        There are a number of artisan commands to download and import data. Please see the readme.md file
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
