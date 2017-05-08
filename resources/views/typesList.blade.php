@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                @include('partials.planes')
            </div>

            <div class="col-md-9">

            <table class="table table-condensed">
            <?php 
            foreach ($types as $p):

                echo "<tr><td>";

                echo $p->type . " </td>";

                echo "</tr>";

            endforeach;

            ?>

            </table>


        </div>
    </div>
</div>
@endsection
