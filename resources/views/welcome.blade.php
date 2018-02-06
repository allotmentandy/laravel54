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
                    <a href="{{ route('maps') }}"><i class="fab fa-fa fa-2x"></i> Maps Examples</a><br>
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
                    <div class="well">The idea of this app is to provide a wide variety of examples of using laravel, bootstrap and javascipt examples in one place.  </div>
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
                        
                            <p class="lead">I am a London based full stack developer looking for a new role.</p>
                            <h4>Technology Stack</h4>
                            <ul>
                                <li>PHP</li>
                                <li>MySql</li>
                                <li><mark>Laravel</mark></li>
                                <li>Packagist</li>
                                <li>Vue.js</li>
                                <li>Bootstrap CSS</li>
                                <li>jQuery</li>
                                <li>Web Spiders</li>
                                <li>Shell Scripting <kbd>./bash.sh</kbd></li>
                                <li>Testing - Selenium, Dusk, PhpUnit</li>
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
                     <span class="badge">ContactAndy</span> 
                    <i class="fab fa-github fa-1x"></i> <a href="http://www.github.com/allotmentandy">github/allotmentandy</a> 
                    <i class="fab fa-github fa-1x"></i> <a href="http://allotmentandy.github.io">allotmentandy.github.io</a>
                    <i class="fab fa-twitter fa-1x"></i> <a href="http://www.twitter.com/londiniumcom">twitter/londiniumcom</a>
                    <i class="fa fa-link fa-1x"></i> <a href="https://packagist.org/packages/allotmentandy/socialmedialinkextractor">packagist/socialmedialinkextractor</a>
                    <i class="fab fa-stack-overflow fa-1x"></i> <a href="http://www.stackoverflow.com/users/2726031/andylondon">stackoverflow/users/2726031/andylondon</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
