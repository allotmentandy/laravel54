@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>
        </div>
        <div class="col-md-9">

                   <form action="/planes/search" method="get">
                     {{ csrf_field() }}
                    Reg Search
                    <input type="text" size="10" name="q" value={{$title}}>
                    <input type="submit" value="search">
                    </form>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            <table class="table table-condensed">

            <?php
foreach ($planes as $p):
    if ($p->seenScrape == "Seen") {
        echo("<tr class='red'>");
    } elseif ($p->seenScrape == "Scrape") {
        echo("<tr class='green'>");
    } else {
        echo "<tr>";
    }

echo "<td>";

if ($p->seenScrape == "Seen") {
    echo("Seen");
} elseif ($p->seenScrape == "Scrape") {
    echo("Scrape");
} else {
    ?>
                    <form method="POST" class="{{$p->id}} seenScrape" id="seen" name="seenScrape">
                        <input type="hidden" name="id" value="{{$p->id}}">
                        <input type="hidden" name="seenScrape" value="Seen">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <input type="submit" value="Seen" id="button" class="button">
                    </form>

                    <form method="POST" class="{{$p->id}}scrape seenScrape" id="scrape" name="seenScrape">
                        <input type="hidden" name="id" value="{{$p->id}}">
                        <input type="hidden" name="seenScrape" value="Scrape">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <input type="submit" value="Scrape" id="scrape" name="scrape" class="button">
                    </form>
                <?php
}
?>

                </td>
                <?php
echo "<th>" . $p->reg . "</th><td>";
$id = $p->id;
echo $p->type . " </td><td>";
echo $p->conNumber . "</td>";

echo "<td>" . $p->notes . "</td>";

?>
                <td>
                <a href="/planes/details/{{ $id }}" class="button showMore">More..</a>
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

@section('scripts')

    <script src="{{ asset('js/ajax.js') }}"></script>

    <?php
if (Session::get('message')) {
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