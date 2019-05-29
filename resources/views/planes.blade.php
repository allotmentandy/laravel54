@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                @include('partials.planes')
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-primary whiteBG">
                @foreach ($details as $item)
                <div class="panel-heading">
                    <h2>{{$item['reg']}}</h2>
                </div>
                <div class="panel-body ">
                    <h3>{{$item['type']}}<br></h3>
                    Con no: {{$item['conNumber']}}
                    <br>
                    Notes: {{$item['notes']}}

                    <h4>Links</h4>
                    <a href="https://www.jetphotos.com/registration/{{$item['reg']}}" target="_blank">Jetphotos</a>
                    <br>
                    <a href="http://www.airliners.net/search?registrationActual={{$item['reg']}}" target="_blank">Airliners.net</a>
                    <br>
                    <a href="https://www.planespotters.net/Aviation_Photos/search.php?reg={{$item['reg']}}" target="_blank">planeSpotters.net</a>
                    <br>
                    <a href="http://www.airframes.org/reg/{{$item['reg']}}" target="_blank">Airframes</a>
                    <br>
                    <a href="https://planefinder.net/data/aircraft/{{$item['reg']}}" target="_blank">Plane Finder</a>
                    <br>
                    <a href="https://www.flightradar24.com/data/aircraft/{{$item['reg']}}" target="_blank">FlightRadar</a>


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php
            $path = public_path();
            foreach ($details as $row):
                $filename = "/planeImages/jetPhotos/" . $row->reg . ".jpg";
                if (file_exists($path . $filename)) {
                    echo "<img src='" . $filename . "'>";
                }
                $filename = "/planeImages/airlinersNet/" . $row->reg . ".jpg";
                if (file_exists($path . $filename)) {
                    echo "<img src='" . $filename . "'>";
                }
            endforeach;
            ?>

        </div>
        @endforeach
    </div>
</div>
</div>
</div>
@endsection
