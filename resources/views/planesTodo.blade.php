@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">todo</div>
                <div class="panel-body">

                <ul>
                    <li>Error Checking:</li>
                    <li>- missing countries</li>
                    <li>- blank reg entries</li>
                    <li>clean up type typos</li>
                    <li>more details UNDO SEEN SCRAPE</li> 
                    <li>improve import new - new / changed</li>
                    <li>backup seen / scrapes to 2 tables for easy import</li>
                </ul>

                </div>
            </div>
        </div>
        

        </div>
    </div>
</div>
@endsection
