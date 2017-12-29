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
                @foreach ($details as $item)
                <div class="panel-heading">
                    <i class="fa fa-plane fa-lg"></i> {{$item['reg']}}
                </div>
                <div class="panel-body">
                    <h3>{{$item['type']}}<br></h3>
                    Con no: <br>{{$item['conNumber']}}
                    <hr>
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
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection