@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>

            <div class="col-md-8">

            <table >
            <?php
            foreach ($types as $p) :
                echo "<tr><td>";
                echo '<a href="/planes/type/' . $p->type . '">' . $p->type . '</a></td><td> ' . $p->count_row;
                echo "</td></tr>";
            endforeach;

            ?>

            </table>


        </div>
    </div>
</div>
@endsection
