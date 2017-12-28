@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-primary">

                    @foreach ($details as $item)
                                    <div class="panel-heading"></div>
                <div class="panel-body">
                        <h2>{{$item['reg']}}</h2>
                        {{$item['type']}}<br>
                        Construction number: <h3>{{$item['conNumber']}}</h3>
                        </div>
                    @endforeach



            </div>
        </div>
        <div>
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
@endsection
