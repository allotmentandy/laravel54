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
            foreach ($planes as $p):

                echo "<tr><td>";

            if ($p->seenScrape == "seen") {
                echo("Seen");
            } elseif ($p->seenScrape == "scrape") {
                echo("Scrape");
            } else {
                echo "<a href=\"/planes/list/seen/$p->id\" class=\"button\">Seen</a>";
                echo "<a href=\"/planes/list/scrape/$p->id\" class=\"button\">Frame</a>";
            }

                echo "</td><td>" . $p->reg . "</td><td>";
                $id = $p->id;
                echo $p->type . " </td><td>";
                echo $p->conNumber . "</td>";

                // echo "<td>" . $p->notes . "</td>";

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
    <?php
    if (Session::get('message')){
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $.bootstrapGrowl("<?php echo Session::get('message'); ?>", { type: 'success', delay: 4000 , allow_dismiss: false,  });
        });
    </script>
    <?php  
    }
    ?>
@endsection
