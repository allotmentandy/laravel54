@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                @include('partials.londinium')
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                
                <div class="panel-body">

                    <?php
                     $subcat=0;
                     $inArray = [];
                    ?>

                    @foreach ($sites as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4><a target='_blank' href='subcategory/". $site->subcategory_id  . "'>" . $site->subcategory_id . " " . $subcategories [$site->subcategory_id] . "</a></h4>";
                            $subcat = $site->subcategory_id;
                            $inArray[]= $site->subcategory_id;
                        }
                        ?>                    
                    @endforeach
                    
                    <hr>
                    <h4>All subcat id's for the output page</h4>
                    <?php
                    foreach ($inArray as $key => $value) {
                        echo $value . ", ";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

