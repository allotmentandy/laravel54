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
wkhtmltopdf  --page-size A4  --lowquality --encoding UTF-8 --javascript-delay 3000 --orientation Portrait --dpi 65 --margin-top 0.2in --margin-right 0in --margin-bottom 0.3in --margin-left 0in --footer-center "[page]" --disable-smart-shrinking  --print-media-type  --no-outline --image-quality 100 cover "http://localhost/cover.html" "http://localhost/planes/txt" "planes2.pdf"
                        </code>

<p style='font-family:Verdana, Geneva, sans-serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:Arial, Helvetica, sans-serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:Tahoma, Geneva, sans-serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:"Trebuchet MS", Area, Helvetica, sans-serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:font-family: Georgia, "Times New Roman", Times, serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:font-family: "Palatino Linotype", "Book Antigua", Palatino, serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:font-family: "MS Serif", New York, serif;'>G-STEM Gulfstream 550 234</p>
<p style='font-family:font-family: "Courier New", Courier, monospace;'>G-STEM Gulfstream 550 234</p>
<p style='font-family: "Lucida Console", Monaco, monospace;  '>G-STEM Gulfstream 550 234</p>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
