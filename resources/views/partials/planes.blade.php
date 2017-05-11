<div class="panel-heading"><a href="{{ route('planes') }}">Planes</a></div>
    <div class="panel-body">
        <a href="{{ route('planesList') }}">View all (seen)</a><br>
        <a href="{{ route('txtView') }}">Download HTML</a><br>
        <a href="{{ route('planeTypes') }}">Types List</a><br>
        <a href="{{ route('planeCountries') }}">Countries List</a><br>

		<form action="/planes/search" method="POST">
		 {{ csrf_field() }}
		Reg Search
		<input type="text" size="10" name="q">
		</form>
        <hr>
        <h4>to do</h4>
        <ul>
            <li>Error Checking:</li>
            <li>missing countries</li>
            <li>blank reg entries</li>
            <li>clean up type typos</li>
            <li>more details for each</li> 
            <li>improve import new</li>
            <li>backup seen / scrapes</li>
        </ul>
    </div>
</div>
