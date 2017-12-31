<div class="panel-heading">
	<a href="{{ route('planes') }}">
		<i class="fa fa-plane fa-lg"> </i>Private Jets Bizjets</a>
	</div>
    <div class="panel-body">
		<form action="/planes/search" method="get">
		 {{ csrf_field() }}
		Search
		<input type="text" size="10" name="q">
		<input type="submit" value="GO">
		</form>
		<hr>
        <a href="{{ route('planesList') }}">View all (seen/scrape)</a><br>
        <a href="{{ route('planeTypes') }}">Aircraft Types</a><br>
        <a href="{{ route('planeCountries') }}">Countries</a><br>
        <hr>
        <h4>Downloads</h4>
        <a href="{{ route('txtView') }}"> HTML</a> <a href="{{ route('planesHelp') }}">PDF</a> JSON TXT

		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif


    </div>
	<div class="panel-footer">
        <a href="{{ route('planesTodo') }}">TO DO</a><br>
	</div>
