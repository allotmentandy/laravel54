@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                    @foreach ($sites as $site)

                        <a href="{{$site->url}}" target="_blank">{{$site->url}}</a>
                        <form method="post" action="/londinium/siteEditUrl/{{$site->id}}">
                        <input type="text" name="url" size="50" value="{{ $site->url }}">
                        <input type="submit">
                        {!! csrf_field() !!}
                        </form>
                        
                        <hr>
                    
                    <?php
                    if ($site->saved == 'saved') {
                        echo("SAVED ");
                    } else {
                        echo "<a href=\"/londinium/sites/save/$site->id\" class=\"button\">Save</a> ";
                    }
                    ?>
                            
                    <?php
                    if ($site->saved == 'saved') {
                        echo "<a href=\"/londinium/sites/unsave/$site->id\" class=\"button\">UNSAVE</a> ";
                    }
                    ?>
                        <br>
                        @endforeach
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                
                <div class="panel-body">
                <img src="/screenshots/{{$id}}.jpg">
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

