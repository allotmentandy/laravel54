@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                @include('partials.jquery')
            </div>

        <div class="col-md-3">
            <div class="panel panel-default">     
                <div class="panel-body">
                    <button type="button" class="btn showAdv">Show Hidden Panel</button>
                    <button type="button" class="btn hideAdv hidden">Hide This Panel</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 hidden" id="panel3" >
            <div class="well ">
            Hidden panel
            </div>
        </div>



        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type='text/javascript'>
    $(document).ready(function() {
    $(".showAdv").click(function(){
      $("#panel3").removeClass('hidden');
      $(".hideAdv").removeClass('hidden');
      $(".showAdv").addClass('hidden');
    });
    $(".hideAdv").click(function(){
      $("#panel3").addClass('hidden');
      $(".hideAdv").addClass('hidden');
      $(".showAdv").removeClass('hidden');
    });
});
</script>

@endsection
