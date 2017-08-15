@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                @include('partials.londinium')
            </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                
                <div class="panel-body">

					
					    @foreach ($subcategories as $subcat)
					
					    <b>{{ $subcat->name }}</b>
    				    <a href='/londinium/subcategory/{{ $subcat->id }}'>View</a> 
					    <br>
					    @endforeach
					

					{{ $subcategories->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

