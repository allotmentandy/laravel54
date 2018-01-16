@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.londinium')
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">

                    <hr>    
                    @forelse ($searchResults as $site)        
                        {{ $site->id }}
                        {{ $site->url }}
                        {{ $site->name }}
                        {{ $site->subcategory_id}}
                    <?php
                    if ($site->saved == 'saved') {
                        echo "<a href=\"/londinium/site/$site->id\" class=\"button\">EDIT</a> ";
                    }
                    ?>
                    <br>
                    
                    @empty
                        <p>No entry for {{$query}}</p>
                        <form action="/londinium/addAsSaved" method="POST">
                        {{ csrf_field() }}
                        Add Url<br>
                        <input type="text" size="100" name="url" value="{{$query}}">

                        <select name="subcategory">
                            <option>Select subcategory</option>
                            @foreach ($subcategories as $subcat)
                            <option value="{{ $subcat->id}}">{{ $subcat->name}}</option>               
                            @endforeach
                        </select>

                        <input type="submit">

                        </form>

                    @endforelse

                        <br>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

