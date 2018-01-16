@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-code fa-2x"></i>Examples</div>
                <div class="panel-body">
                    <a href="{{ route('planes') }}"><i class="fas fa-plane fa-2x"></i> Private Jet Tools</a><br>
                    <a href="{{ route('londinium') }}"><i class="fab fa-linode fa-2x"></i> Londinium directory</a><br>
                    <a href="{{ route('rssJobs') }}"><i class="fas fa-rss fa-2x"></i> RSS job feeds</a><br>
                    <a href="{{ route('rssNews') }}"><i class="fas fa-rss fa-2x"></i> RSS news feeds</a><br>
                    <a href="{{ route('jquery') }}"><i class="fab fa-node-js fa-2x"></i> Jquery Examples</a><br>
                    <a href="{{ route('vue') }}"><i class="fab fa-vuejs fa-2x"></i> Vue Examples</a><br>
                    <!-- <a href="{{ route('cssE') }}"><i class="fab fa-css3"></i>CSS Examples</a><br> -->
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="/images/andy.jpg" style="width:100%">    
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-body" style="background:black; color: green;">
                            <div class="css-typing">
                                <p>
                                    Love Laravel <i class="fab fa-laravel fa-lg"></i>
                                </p>
                                <p>
                                    <i class="fa fa-plane fa-lg"></i>  Private Jets!
                                </p>
                                <p>
                                    what more do you want?
                                </p>                                    
                            </div>
                        </div>

                        <div class="panel-body">
                        
                            <p>I am a London based full stack developer looking for a new role.</p>
                            <h4>Technology Stack</h4>
                            <ul>
                                <li>PHP</li>
                                <li>MySql</li>
                                <li>Laravel</li>
                                <li>Packagist</li>
                                <li>Vue.js</li>
                                <li>Bootstrap CSS</li>
                                <li>jQuery</li>
                                <li>Web Spiders</li>
                                <li>Shell Scripting</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h4>Get in contact  </h4>
                    <hr>
                    <i class="fab fa-github fa-1x"></i> github.com/allotmentandy 
                    <i class="fab fa-github fa-1x"></i> allotmentandy.github.io 
                    <i class="fab fa-twitter fa-1x"></i> twitter.com/londiniumcom
                </div>
            </div>
        </div>
    </div>
    @endsection