@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                @include('partials.planes')
            </div>
        

            <div class="col-md-10">

            <table class="table table-condensed">
            <?php 
            foreach ($planes as $p):

                echo "<tr>";
                echo "<td>" . $p->A . "</td>";
                echo "<td>" . $p->B . "</td>";
                echo "</tr>";

            endforeach;

            ?>

            </table>

            <?php 
                echo $planes->links();
            ?>

        </div>
    </div>
</div>
@endsection

