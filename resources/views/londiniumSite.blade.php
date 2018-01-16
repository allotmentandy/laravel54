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

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif

                    @foreach ($sites as $site)
                        <a href="{{$site->url}}" target="_blank">{{$site->url}}</a>
                        <br>
                        <form method="post" action="/londinium/siteEditUrl/{{$site->id}}">
                        <input type="text" name="url" size="50" value="{{ $site->url }}">
                        <input type="submit">
                        {!! csrf_field() !!}
                        </form>
                        <br>
                        @foreach ($spider as $row)
                            {{$row->title}}
                        @endforeach
                        
                        <hr>
                        Edit Name
                        <form method="post" action="/londinium/siteEditName/{{$site->id}}">
                        <input type="text" name="name" size="50" value="{{ $site->name }}">
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
                        <hr>
                        Move Category<br>
                        {{$site->subcategory_id}}
                        <br>
                        <form method="POST" action="/londinium/moveSubcategory">
                        <select name="subcategory">
                            <option value="1">new cat</option>
                            <option value="2">cat 2</option>
                        </select>
                        <input type="hidden" name="id" value="{{$site->id}}">
                        <br>
                        <input type="submit">
                        {!! csrf_field() !!}
                        </form>


                    @endforeach
            </div>
        </div>

    </div>
</div>
@endsection

