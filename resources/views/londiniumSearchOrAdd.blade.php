@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-info">
                @include('partials.londinium')
            </div>

        <div class="col-md-10">
            <div class="panel panel-default">
                
                <div class="panel-body">

                    {{ $query }}
                    <hr>    
                    
                    @forelse ($searchResults as $site)
                            
                        <b>{{ $site->url }}</b>
                        {{$site->name}}

                    <?php
                    if ($site->saved == 'saved') {
                        echo "<a href=\"/londinium/sites/unsave/$site->id\" class=\"button\">UNSAVE</a> ";
                    }
                    ?>

                    @empty
                        <p>No entry for {{$query}}</p>
                        click here to add it
                    @endforelse

                        <br>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

