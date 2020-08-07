@extends('layouts.blank')

@section('content')




<div class="container inputScreen">
    <div class="row">
        <?php
        echo $planes->links();
        ?>
    </div>


    <div class="row">

        <div class="col-md-6">
            <table class="table table-condensed">

            <?php
$country = '';
$counter = 0;
foreach ($planes as $p):

    if($counter == 75 ){
        echo '
            </table>
            </div>
            <div class="col-md-6">
            <table class="table table-condensed">';
    }
        $counter++;

if ($p->countryCode != $country){
    echo "<tr><th colspan=6>". $p->countryCode . " " . $countries[$p->countryCode];
    echo "</th></tr>";
    $country = $p->countryCode;

}


    if ($p->seenScrape == "Seen") {
        echo("<tr class='red'>");
    } elseif ($p->seenScrape == "Scrape") {
        echo("<tr class='green'>");
    } else {
        echo "<tr class='white'>";
    }

if ($p->seenScrape == "Seen") {
    echo("<td class=" .$p->id . ">Seen</td><td></td>");
} elseif ($p->seenScrape == "Scrape") {
    echo("<td class=" .$p->id . ">Scrape</td><td></td>");
} else {
    ?>
<td><form method="POST" class="{{$p->id}}seen seenScrape" id="{{$p->id}}seen" name="seenScrape">
    <input type="hidden" name="id" value="{{$p->id}}">
    <input type="hidden" name="seenScrape" value="Seen">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <input type="submit" value="Seen" id="seen" class="buttonSeen">
</form>
</td>
<td>
<form method="POST" class="{{$p->id}}scrape seenScrape" id="{{$p->id}}scrape" name="seenScrape">
    <input type="hidden" name="id" value="{{$p->id}}">
    <input type="hidden" name="seenScrape" value="Scrape">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <input type="submit" value="Scrape" id="scrape" name="scrape" class="buttonScrape">
</form>
</td>
<?php
}

echo "<td  style='font-weight: bold;'> " . $p->reg  . "</td><td style='width=50%;'>";
$id = $p->id; 
echo $p->type . " </td><td>";
echo $p->conNumber . "</td><td>";
if ($p->seenScrape != null) {
    echo'
<form method="POST" class="' . $p->id . 'undo seenScrape" id="' . $p->id . 'undo" name="seenScrape">
    <input type="hidden" name="id" value="' . $p->id . '">
    <input type="hidden" name="seenScrape" value="Undo">
    <input type="hidden" name="_token" id="csrf-token" value="' . Session::token() . '" />
    <input type="submit" value="Undo" id="undo" name="undo" class="buttonUndo">
</form>
';
}
?>

                <?php
echo "</tr>";
endforeach;

?>

            </table>

        </div>
    </div>

</div>

    <div class="row">
        <?php
        echo $planes->links();
        ?>
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
