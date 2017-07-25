@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                @include('partials.planes')
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Notes</div>
                    <div class="panel-body">

                        to make a pdf<br>

                        <code>
                        wkhtmltopdf http://localhost/planes/txt planes2.pdf
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
