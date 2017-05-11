@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>

        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">Welcome to the planes sections</div>
                <div class="panel-body">
                    <h3>Random Plane:</h3>
                    @foreach ($reg as $item)<br>
                        {{$item['reg']}}<br>
                        {{$item['type']}}<br>
                        {{$item['conNumber']}}
                    @endforeach                
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Notes</div>
                    <div class="panel-body">

                        to make a pdf<br>

                        <code>
                        wkhtmltopdf http://localhost/planes/txt planes2.pdf
                        </code>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
