@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                @include('partials.planes')
            </div>
        

            <div class="col-md-10">

            <table class="table table-condensed" id="datatables">
            <thead>
            <tr>
                <th>id</th>
                <th>code</th>
                <th>country</th>
            </tr>
            </thead>
            <?php 
            foreach ($planes as $p):

                echo "<tr>";
                echo "<td>" . $p->id . "</td>";
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

@section('scripts')

<link rel="stylesheet" type="text/css" href="/css/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">

 
<script type="text/javascript" src="/js/datatables.min.js"></script>

<script>
$(document).ready(function() {
    $('#datatables').DataTable( {
        "paging":   false,
        "info":     false
    } );
} );
</script>

@endsection

