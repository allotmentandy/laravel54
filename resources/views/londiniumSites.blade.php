@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.londinium')
                saved sites: {{$countSaved}}
                <br>
                highest id saved: {{$highestSavedId}}
            </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                
                <div class="panel-body">

                    @foreach ($sites as $site)
                    
                    <?php
                    if ($site->saved == 'saved') {
                        echo("SAVED ");
                    } else {
                        echo "<a href=\"/londinium/sites/save/$site->id\" class=\"button\">Save</a> ";
                    }
                    ?>
                            
                        <b>{{ $site->url }}</b>
                        <span class="light">{{$site->id}} </span>

                    <?php
                    if ($site->saved == 'saved') {
                        echo "<a href=\"/londinium/sites/unsave/$site->id\" class=\"button\">UNSAVE</a> ";
                    }
                    ?>


                        <br>
                        @endforeach
                    

                    {{ $sites->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

