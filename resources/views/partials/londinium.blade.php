                <div class="panel-heading"><a href="{{ route('londinium') }}"><i class="fab fa-linode fa-2x"></i> Londinium</a></div>
                    <div class="panel-body">
						<form action="/londinium/search" method="POST">
						 {{ csrf_field() }}
						<label>Search / ADD URL</label>
						<input type="text" size="20" name="q" value="">
						</form>
						<br>

                        <a href="{{ route('sites') }}">All sites</a><br>
						<a href="{{ route('unsaved') }}">UN Saved sites</a><br>
						<a href="{{ route('subcategories') }}">Subcategories</a><br>
						<a href="{{ route('sitesBySubcategory') }}">sitesBySubcategory</a><br>
						<a href="{{ route('savedSubcategory') }}">savedSubcategory</a><br>
						<a href="{{ route('socialMedia') }}">Social Media Link lists</a><br>

						<a href="{{ route('spider') }}">Run Spider</a><br>

						<a href="{{ route('londiniumErrors') }}">Errors</a><br>

						<hr><h3>PUBLISH</h3>
						<a href="{{ route('outputHtml')}}"> HTML</a> - json - pdf - txt <br>(to be saved and uploaded)
						<br>
						<h4>A-Z list</h4>
						html - json - pdf - txt
                    </div>
