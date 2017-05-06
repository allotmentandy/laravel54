                <div class="panel-heading"><a href="{{ route('planes') }}">Planes</a></div>
                    <div class="panel-body">
                        <a href="{{ route('planesList') }}">View all (seen)</a><br>
                        <a href="{{ route('txtview') }}">Download HTML</a><br>
                        Types List<br>
                        Country List<br>
						

						<form action="/planes/search" method="POST">
						 {{ csrf_field() }}
						Search
						<input type="text" size="10" name="q">
						</form>
                    </div>
                </div>
