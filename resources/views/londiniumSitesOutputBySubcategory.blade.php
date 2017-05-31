@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                @include('partials.londinium')
            </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                
                <div class="panel-body">

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($sites as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4><a target='_blank' href='subcategory/". $site->subcategory_id  . "'>" . $subcategories [$site->subcategory_id] . "(". $site->subcategory_id . ")</a></h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>

                        {{ $spiderStatus[$site->id] or '???' }}
                        

                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>
                        ({{$site->id}})

                        <?php
                        echo "<a href=\"/londinium/sites/unsave/$site->id\" class=\"button\">UNSAVE</a> ";

                        echo "<a href=\"/londinium/site/$site->id\" class=\"button\">Details</a> ";

                        ?>
                        <br>
                    
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

