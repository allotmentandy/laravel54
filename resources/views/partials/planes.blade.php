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

                        <b>Error Checking:</b><br>
                        missing from countries<br>
                        blank entries<br>

                    </div>
                </div>
