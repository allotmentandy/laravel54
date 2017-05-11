@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-3">
                <div class="panel-info">Laravel RSS Feeds</div>
                    <div class="panel-body">
                        <a href="{{ route('rssJobs') }}">Job Feeds</a><br>
                        <a href="{{ route('rssNews') }}">News Feeds</a><br>
                    </div>
                </div>
        
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach ($items as $item)
                        <div class="item">
                            <h4><a href="{{ $item->get_permalink() }}" target="_blank">{{ $item->get_title() }}</a></h4>
                            <p>{{ $item->get_permalink() }}</p>
                            
                            <p class="text-right"><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection