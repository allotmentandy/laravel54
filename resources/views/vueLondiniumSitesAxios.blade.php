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

                            <site-search :data="{{ $data }}"></site-search>
                            {{--Filter: <input type="text">--}}
                            {{--<ol>--}}
                            {{--<li v-for="sites in sitesArray">@{{ sites.url }}</li>--}}
                            {{--</ol>--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/vue-londinium-sites-axios.js') }}"></script>

    {{--<script src="{{ asset('js/vue.js') }}"></script>--}}
    {{--<script src="{{ asset('js/axios.js') }}"></script>--}}


    {{--<script type="text/javascript">--}}
    {{--self = this;--}}

    {{--import { BasicSelect } from 'vue-search-select'--}}

    {{--new Vue ({--}}
    {{--el: '#app',--}}
    {{--components : {--}}
    {{--BasicSelect--}}
    {{--},--}}

    {{--data: {--}}
    {{--sitesArray: [],--}}
    {{--},--}}


    {{--created() {--}}
    {{--axios.get(`http://localhost/londinium/outputJson`)--}}
    {{--.then(response => {--}}
    {{--// JSON responses are automatically parsed.--}}
    {{--this.sitesArray = response.data.sites--}}
    {{--})--}}
    {{--.catch(e => {--}}
    {{--this.errors.push(e)--}}
    {{--})--}}


    {{--}--}}

    {{--})--}}


    {{--</script>--}}

@endsection

