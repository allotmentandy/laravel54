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
                    <table border="1">
                    @foreach ($sites as $site)
                        <?php
                        echo "<tr><td>";
                        if ($site->saved == 'saved') {
                            echo("SAVED ");
                        } else {
                            echo "<a href=\"/londinium/sites/save/$site->id\" class=\"button\">Save</a> ";
                        }
                        ?>
                        </td><td>
                        @if ($site->name)
                            {{$site->name}}
                        @else 
                            {{$site->url}}
                        @endif       
                        </td><td>
                        <a href="/londinium/site/{{$site->id}}" target="_blank">details </a>
                        </td></tr>
                        
                    @endforeach
                    </table>    

                    {{ $sites->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

