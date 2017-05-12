@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>
            <div class="col-md-8">
            <table class="table table-condensed">
            <?php
            foreach ($details as $row) :
            ?>
                {{ $row->reg }}
                <br>
                {{ $row->type }}
                <br>
                {{ $row->conNumber   }}
                <br>
                <a href="http://www.airliners.net/search?registrationActual={{$row['reg']}}" target="_blank">Airliners.net</a>
                <br>

                <a href="https://www.jetphotos.com/registration/{{$row['reg']}}" target="_blank">Jetphotos</a></td>

                <?php
                echo "</tr>";
            endforeach;

            ?>

            </table>

        </div>
    </div>
</div>
@endsection
