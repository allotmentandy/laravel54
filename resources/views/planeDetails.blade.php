@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>




            <div class="col-md-8">
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
                    <br>
                    <a href="https://www.jetphotos.com/registration/{{$row['reg']}}" target="_blank">Jetphotos</a>
                    <br>
                    <a href="http://www.airliners.net/search?registrationActual={{$row['reg']}}" target="_blank">Airliners.net</a>

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
