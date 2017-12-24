                <div class="panel-heading"><a href="{{ route('londinium') }}">Londinium</a></div>
                    <div class="panel-body">
                        <a href="{{ route('sites') }}">All sites</a><br>
						<a href="{{ route('saved') }}">Saved sites</a><br>
						<a href="{{ route('subcategories') }}">Subcategories</a><br>


						<form action="/londinium/search" method="POST">
						 {{ csrf_field() }}
						Search (and add)<br>
						<input type="text" size="20" name="q" value="">
						</form>

						<hr>
						<a href="{{ route('sitesBySubcategory') }}">sitesBySubcategory</a><br>
						<a href="{{ route('savedSubcategory') }}">savedSubcategory</a><br>
						<a href="{{ route('socialMedia') }}">Alll Social Media Links</a><br>
						<a href="{{ route('londiniumErrors') }}">Errors</a><br>

						<hr>
						<a href="{{ route('outputHtml')}}">Output HTML</a><br>
						(to be saved and uploaded)
						<br>json
						<br>pdf
						<br>txt text file
                    </div>
                </div>
