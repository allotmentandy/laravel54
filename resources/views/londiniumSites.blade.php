@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-info">
                @include('partials.londinium')
                saved sites: {{$countSaved}}
                <br>
                highest id saved: {{$highestSavedId}}
            </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                
                <div class="panel-body">

                    @foreach ($sites as $site)
                    
                    <?php
                    if ($site->saved == 'saved') {
                        echo("SAVED</td><td>");
                    } else {
                        echo "<a href=\"/londinium/sites/save/$site->id\" class=\"button\">Save</a> </td><td>";
                    }
                    ?>
                            
                        <b>{{ $site->url }}</b>

                        <br>
                        @endforeach
                    

                    {{ $sites->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

