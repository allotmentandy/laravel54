@extends('layouts.app')

@section('content')
  <div class="header">
    <h1><a href="{{ $permalink }}">{{ $title }}</a></h1>
  </div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                Rss Job feeds
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">     
                @foreach ($items as $item)
                    <div class="item">
                      <h5><a href="{{ $item->get_permalink() }}" target="_blank">{{ $item->get_title() }}</a></h5>
                      <p>{{ $item->get_description() }}</p>
                      <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



@endsection