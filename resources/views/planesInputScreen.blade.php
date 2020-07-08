@extends('layouts.blank')

@section('content')

<ul class="nav nav-pills">
   <li role="presentation" class="nav-item"><a href="#" class="nav-link active" data-toggle="pill">AP</a></li>
   <li role="presentation" class="nav-item"><a class="nav-link" data-toggle="pill" href="#">A6</a></li>
   <li role="presentation" class="nav-item"><a class="nav-link" data-toggle="pill" href="#">A7</a></li>
</ul>

<div class="container inputScreen">
    <div class="row">
        <div class="col-md-6">
            <table class="">

            <?php
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
?>


    <?php
echo "<td> " . $p->reg . "</td><td>";
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
            <?php
echo $planes->links();
?>

</div>

   AP A2 A4O A6 A7 A9C B B-T C CC CN CP CS CX C5 C6 C9 D D2 EC EI EK EP ES EW EZ E3 E5 E7 F G HA HB HC HI HK HL HP HR HS HZ I JA JY J2 J8 LN LV LX LY LZ M N OB OD OE OH OK OM OO OY PH PJ PK PP P2 P4 RA RP SE SP ST SU SX S2 S5 S9 TC TG TI TJ TN TR TS TT TU TZ T7 UP UR VH VP-B VP-C VT V5 XY V8 XA YI YK YL YR YU YV ZA ZJ ZK ZP ZS Z3 2 3A 3B 3C 4K 4L 4O 4X 5A 5B 5H 5N 5R 5U 5X 5Y 6V 7T 8P 9A 9G 9H 9K 9J 9M 9Q 9V


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
