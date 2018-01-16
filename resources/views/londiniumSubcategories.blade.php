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
		    <table class="table">
		    @foreach ($subcategories as $subcat)
			    <tr>
                    <td>{{ $subcat->name }}</td>
			        <td><a href='/londinium/subcategory/{{ $subcat->id }}'>View</a></td> 
			    </tr>
		    @endforeach
		    </table>
		{{ $subcategories->links() }} 
        </div>
    </div>
</div>
@endsection
