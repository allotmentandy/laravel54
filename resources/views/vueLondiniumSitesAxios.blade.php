@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                @include('partials.vue')
            </div>

        <div class="col-md-9">
            <div class="panel panel-default">     
                <div class="panel-body" id="app">
                    <p>Londinium Sites</p>
                    Filter: <input type="text">
                    <ol>
                        <li v-for="sites in sitesArray">@{{ sites.url }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>


<script type="text/javascript">
    self = this;

new Vue ({
    el: '#app',

    data: {
            sitesArray: [],
    },


created() {
    axios.get(`http://localhost/londinium/outputJson`)
    .then(response => {
      // JSON responses are automatically parsed.
      this.sitesArray = response.data.sites
    })
    .catch(e => {
      this.errors.push(e)
    })


    }

})


</script>

@endsection

