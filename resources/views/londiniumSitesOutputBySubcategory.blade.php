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
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "(". $site->subcategory_id . ")</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>

                        <b>{{ $site->url }}</b>
                        ({{$site->id}})
                        <br>
                    
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

