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
                <div class="panel-body">
                <p>Examples of Vue</p>
                
                <div id="application">
                    <input type="text" v-model="message">
                    <p>The value of the input is: @{{ message }}</p>
                </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/vue.js') }}"></script>


<script type="text/javascript">

console.log("Vue Version " +Vue.version );
console.log("Jquery Version " + $().jquery );


  let data = {
    message: 'Hello World'
  }

  new Vue({
    el: '#application',
    data: data
  })

</script>

@endsection

