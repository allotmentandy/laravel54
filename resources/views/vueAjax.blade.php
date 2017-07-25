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
                    <p>Examples of Vue Ajax</p>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/vue-resource.js') }}"></script>


<script type="text/javascript">




</script>

@endsection

