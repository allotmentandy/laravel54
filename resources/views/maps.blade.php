@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-code fa-2x"></i>Maps</div>
                <div class="panel-body">
                    <!-- <a href="{{ route('cssE') }}"><i class="fab fa-css3"></i>CSS Examples</a><br> -->
                </div>
            </div>
        </div>
        <div class="col-md-9">
            google maps

            <div style="width: 500px; height: 500px;">
                {!! Mapper::render() !!}
            </div>
        </div>
    </div>

     
</div>
@endsection
