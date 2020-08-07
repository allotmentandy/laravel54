@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>
        </div>
        <div class="col-md-5">

                <div class="panel panel-primary">
                    <div class="panel-heading">Info and Photos</div>
                    <div class="panel-body">
                    <?php
foreach ($details as $row):
?>
                    <h2>{{ $row->reg }}

                    {{ $row->type }}

                    {{ $row->conNumber   }}
                    </h2>
                    {{ $row->notes}}
                    <br>

                    <?php
endforeach;
if ($moreDetails){
?>
                    <h2>{{ $moreDetails->adsb }}
                    </h2>
                    {{ $moreDetails->typeCode3 }}
                    <br>
                    {{ $moreDetails->typeCode4 }}
                    <br>
                    {{ $moreDetails->typeCode5 }}
                    <br>
                    {{ $moreDetails->conNumber }}
                    {{ $moreDetails->owner1}}
                    <br>
                    {{ $moreDetails->owner2}}
                    <br>
                    {{ $moreDetails->owner3}}
                    <br>

                    <?php
}
?>


                    seen / scrape? <b>{{$row->seenScrape}}</b> <button>undo</button>
                    <br><br>


                    <?php
$path = "/var/www/laravel54/public";
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
</div>
</div>


                <h4>Links</h4>
                    <a href="https://www.jetphotos.com/registration/{{$row['reg']}}" target="_blank">Jetphotos</a>
                    <br>
                    <a href="http://www.airliners.net/search?registrationActual={{$row['reg']}}" target="_blank">Airliners.net</a>
                    <br>
                    <a href="https://www.planespotters.net/Aviation_Photos/search.php?reg={{$row['reg']}}" target="_blank">planeSpotters.net</a>
                    <br>
                    <a href="http://www.airframes.org/reg/{{$row['reg']}}" target="_blank">Airframes</a>
                    <br>
                    <a href="https://planefinder.net/data/aircraft/{{$row['reg']}}" target="_blank">Plane Finder</a>
                    <br>
                    <a href="https://www.flightradar24.com/data/aircraft/{{$row['reg']}}" target="_blank">FlightRadar</a>

                </div>
            </div>
        </div>

        </div>
    </div>
</div>
@endsection