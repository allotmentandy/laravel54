@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                @include('partials.londinium')
            </div>

        <div class="col-md-9">
            <div class="panel panel-default">     
                <div class="panel-body">
                    Random Site:
                    @foreach ($site as $item)<br>
                        {{$item['url']}}<br>
                        <br>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
