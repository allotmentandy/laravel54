@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
                <div class="panel-heading">Examples</div>
                    <div class="panel-body">
                    <a href="{{ route('rssJobs') }}">RSS job feeds</a><br>
                    <a href="{{ route('rssNews') }}">RSS news feeds</a><br>
                    <a href="{{ route('jquery') }}">Jquery Examples</a><br>
                    <a href="{{ route('vue') }}">Vue Examples</a><br>
                    <a href="{{ route('cssE') }}">CSS Examples</a><br>
                    </div>
                <div>
                    <i class="fab fa-vuejs fa-3x"></i>
                    <i class="fab fa-github fa-3x"></i>
                    <i class="fab fa-twitter fa-3x"></i>
                    <i class="fab fa-youtube fa-3x"></i>
                    <i class="fab fa-laravel fa-3x"></i>
                </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="panel-body" style="background:black; color: green;">
                                <div class="css-typing">
                                    <p>
                                        Love Laravel <i class="fab fa-laravel fa-lg"></i>
                                    </p>
                                    <p>
                                        <i class="fa fa-plane fa-lg"></i>  Private Jets!
                                    </p>
                                    <p>
                                        what more u want?
                                    </p>
                                    <img src="/images/andy.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        There are a number of artisan commands to download and import data. Please see the readme.md file for more details on how to get it setup.
                        <h6>Private Jet Database Tools</h6>
                        I am a fan of private aviation, this is the start of a tool to help log 'bizjets' you have seen.
                        <h6>Londinium website directory</h6>
                        Tool to manage a website link directory
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection