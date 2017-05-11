@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info">
                @include('partials.jquery')
            </div>

        <div class="col-md-8" id="panel3" >
            <div class="well ">
            
    <h4>Edit Report Recipients  > </h4>
    
    <h4>Recipients:</h4>

    <form action="/" method="POST" class="form-horizontal">

    <a href="#" id="add" class="button">ADD ANOTHER EMAIL</a>
    <br>
    <br>
<table>
<tbody>

<?php 

$results = array();

$results[] = "email1@test.com";
$results[] = "email2@test.com";

 ?>

    @foreach ($results as $row )
      <tr><td><input size="70" type="text" value="{{ $row }}" name="emails[]" ><a href="#" class="button remove">DELETE</a></td></tr>
    @endforeach
</tbody>
</table>
    <br>
    <div class="col-sm-2" >
    <input type='button' onclick='history.go(-1)' value='CANCEL' class='button' name='cancel'>
    </div>
    <div class="col-sm-8">
    <input type="submit" value="UPDATE" class="button">
</div>    
    <input type="hidden" name="reportId" value="1">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

            </div>
        </div>



        </div>
    </div>
</div>

@endsection

@section('scripts')


<script type="text/javascript">

$("#add").click(function (e) {
    var html = '<tr><td><input size="70" type="text" value="" name="emails[]"></td></tr>';
  $("table > tbody").append(html);
});

$(function(){
    $(".remove").click(function (e) {
        $(this).closest('tr').remove();
    });
});


</script>

@endsection
