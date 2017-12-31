@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                @include('partials.planes')
            </div>
        </div>

            <div class="col-md-8">

            <table class="table table-condensed" id="datatables">
            <thead>
            <tr>
                <th>code</th>
                <th>country</th>
                <th>id</th>
            </tr>
            </thead>
            <?php
foreach ($planes as $p):
    echo "<tr>";
    echo "<td><a href='/planes/country/" . $p->A . "'>" . $p->A . "</a></td>";
    echo "<td>" . $p->B . "</td>";
    echo "<td>" . $p->id . "</td>";
    echo "<td>";
    echo "<a href='/planes/country/job/" . $p->A . "'>queue photo jobs for all</a>";

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

