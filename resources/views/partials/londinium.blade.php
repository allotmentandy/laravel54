                <div class="panel-heading">Londinium</div>
                    <div class="panel-body">
                        <a href="{{ route('londinium') }}">home</a><br>
						<a href="{{ route('sites') }}">All sites</a><br>
						<a href="{{ route('saved') }}">Saved sites</a><br>
						<a href="{{ route('subcategories') }}">Subcategories</a><br>
						

						<form action="/londinium/search" method="POST">
						 {{ csrf_field() }}
						Search
						<input type="text" size="10" name="q">
						</form>
						<hr>
						Output HTML<br>
						(to be saved and uploaded)
                    </div>
                </div>
