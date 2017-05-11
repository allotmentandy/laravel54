@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                @include('partials.jquery')
            </div>

        <div class="col-md-9">
            <div class="panel panel-default">     
                <div class="panel-body">
                Examples of Jquery i ike to use and have written
                <br><br>
                My <a href="https://allotmentandy.github.io/">blog</a> has a useful jquery class to make all links open in a new window, adding the target blank to all links!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
