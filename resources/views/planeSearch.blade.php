@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>
        
            <div class="col-md-9">
                <table class="table table-condensed">

                <?php
                foreach ($planes as $p) :
                    if ($p->seenScrape == "Seen") {
                        echo("<tr class='red'>");
                    } elseif ($p->seenScrape == "Scrape") {
                        echo("<tr class='green'>");
                    } else {
                        echo "<tr>";
                    }


                    echo "<th>";

                    if ($p->seenScrape == "Seen") {
                        echo("Seen");
                    } elseif ($p->seenScrape == "Scrape") {
                        echo("Scrape");
                    }
                    ?>

                    </th>
                    <?php
                    echo "<th>" . $p->reg . "</th><td>";
                    $id = $p->id;
                    echo $p->type . " </td><td>";
                    echo $p->conNumber . "</td>";

                    // echo "<td>" . $p->notes . "</td>";

                    ?>
                    <td>
                    <a href="/planes/details/{{ $id }}" class="button">More..</a>
                    </td>


                    <?php
                    echo "</tr>";
                endforeach;

                ?>

                </table>

        </div>
    </div>
</div>
@endsection
