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
                    <p>Examples of Vue Planes Types</p>
                    <ol>
                        <li v-for="type in typesArray">@{{ type.type }}</li>
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
            typesArray: [],
    },


created() {
    axios.get(`http://localhost/planesApi/getTypes`)
    .then(response => {
      // JSON responses are automatically parsed.
      this.typesArray = response.data.types
    })
    .catch(e => {
      this.errors.push(e)
    })


    }

})


</script>

@endsection

