@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Welcome to the planes API </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">Functions</div>


                <div class="panel-body">

<pre>
setRegSeen($id)

setRegScrape($id)
</pre>

<pre>
getRandomPlane()

getPlaneByRegistration()

getTypes()

getCountries()

getCountryListByCode($code)

getTypeListByType($type)

getPlaneList()
</pre>

todo: paging for lists

                </div>
            </div>
        </div>
        


        </div>
    </div>
</div>
@endsection
