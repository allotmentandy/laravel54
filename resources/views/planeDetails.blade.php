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
                    <div class="panel-heading">Info and Photos</div>
                    <div class="panel-body">
                        <?php
                        foreach ($details as $row) :
                        ?>
                        <h2>{{ $row->reg }}
                        
                        {{ $row->type }}
                        
                        {{ $row->conNumber   }}
                        </h2>
                        
                        <?php
                        endforeach;
                        ?>
                        seen / scrape?
                        <br>
                        undo - set to null
                        <?php
                        $path = "/var/www/laravel54/public";
                        foreach ($details as $row) :
                            $filename = "/planeImages/jetPhotos/" . $row->reg. ".jpg";
                            if (file_exists($path.$filename)) {
                                echo "<img src='". $filename . "'><br>" ;
                            }
                            $filename = "/planeImages/airlinersNet/" . $row->reg. ".jpg";
                            if (file_exists($path.$filename)) {
                                echo "<img src='". $filename . "'>" ;
                            }
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Links</div>
                    <div class="panel-body">
                        <br>
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
    @endsection