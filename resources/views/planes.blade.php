@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Planes</div>
                    <div class="panel-body">
                        Seen/Scrape<br>
                        <a href="{{ route('txtview') }}">Download HTML</a><br>
                        Types List<br>
                        Country List<br>

                    </div>
                </div>
            </div>

        <div class="col-md-7">
            <div class="panel panel-default">
                
                    <div class="panel-body">
                        Random Plane:
                        @foreach ($reg as $item)<br>
                            {{$item['reg']}}<br>
                            {{$item['type']}}<br>
                            {{$item['conNumber']}}

                            <br>
                            <br>

                            <a href="http://www.airliners.net/search?registrationActual={{$item['reg']}}" target="_blank">Airliners.net reg search</a><br>

                            <a href="https://www.jetphotos.com/registration/{{$item['reg']}}" target="_blank">Jetphotos reg search</a><br>

                        @endforeach
                    
                    to make a pdf

                    <code>
                    wkhtmltopdf http://localhost/planes/txt planes2.pdf
                    </code>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
