@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                @include('partials.jquery')
            </div>

        <div class="col-md-9">
            <div class="panel panel-default">     
                <div class="panel-body">
                    <form action="/campaignBounceBackEditProcess" method="POST" class="form-horizontal">

                    <div class="form-group">
                        <label for="message" class="control-label">message</label>
                        <textarea class="form-control" id="message" rows="5" name="message">Test message</textarea>
                        <span class="countdown"></span><br>
                        <span class="warning"></span> <br>
                        <span class="lengthWarning"></span>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="submit" id="submit" value="UPDATE Bounce Back">
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('scripts')


<?php
$allowed = 140;
?>

<script type="text/javascript">

function disableButton(){
    jQuery("#submit").prop('class', 'disabled');
    jQuery("#submit").prop('disabled', true);
}

function enableButton(){
    jQuery("#submit").prop('class', '');
    jQuery("#submit").prop('disabled', false);
}


function isValidMessageText(text) {
    var regexp = new RegExp("^[A-Za-z0-9 \\r\\n@£$¥èéùìòÇØøÅå\u0394_\u03A6\u0393\u039B\u03A9\u03A0\u03A8\u03A3\u0398\u039EÆæßÉ!\"#$%&'()*+,\\-./:;<=>?¡ÄÖÑÜ§¿äöñüà^{}\\\\\\[~\\]|\u20AC]*$");

    return regexp.test(text);
}

    function testChars() {   
        var allowed = <?php echo $allowed ; ?>;
        var remaining = allowed - jQuery('#message').val().length;
        jQuery('.countdown').text(remaining + ' characters remaining of ' + allowed);
        if (remaining > -1) {
            jQuery('.lengthWarning').text('');
            enableButton();
        }

        if (isValidMessageText( jQuery('#message').val() ) )  { 
            jQuery('.warning').text('All characters are valid');
            enableButton();
        } 
        else {
            disableButton();
            jQuery('.warning').text('Questionable Characters');
        }

        if (remaining < 0) {
            jQuery('.lengthWarning').text('TOO LONG');
            disableButton();
        }


    }

    jQuery(document).ready(function($) {
        $('#message').change(testChars);
        $('#message').keypress(testChars);        
        $('#message').keyup(testChars);         
        $('#message').keydown(testChars);
        $('#message').on('paste input propertychange'),(testChars);         
    });

    jQuery(document).ready(testChars); 
  
</script>

@endsection
