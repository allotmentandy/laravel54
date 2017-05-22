<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Bootstrap 4 nav-tabs</title>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
<style>
body{
font-family: Tahoma, Geneva, sans-serif
}
.container-fluid{ 
width: 99%;
}
.nav-tabs{
background-color:#C8D3DB;
}
.nav-tabs > li > a{ 
border-radius: 5px;
}

.nav-tabs > li > a:hover{
background-color: white !important; 
border-radius: 5px;
color:black; 
border:1px solid black;
}
 
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover{
background-color: blue !important;
color:black;
border:2px solid #3F515F;
}

</style>

</head>

<body>
<nav>
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#home" role="tab" data-toggle="tab"><b>Londinium.com</b></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#travel" role="tab" data-toggle="tab">travel</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#tourism" role="tab" data-toggle="tab">tourism</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#four" role="tab" data-toggle="tab">4</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#five" role="tab" data-toggle="tab">5</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#six" role="tab" data-toggle="tab">6</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#seven" role="tab" data-toggle="tab">7</a>
  </li>

</ul>
</nav>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="home"><div class="container-fluid">
<p>Welcome to the new londinium.com website. We have recently relaunched this website. The aim is to provide you with the most useful website links and information.</p>
<p>line 2</p>

text
<br>
text
<br>
text
<br>
text
<br>
text
<br>
text

<footer class="footer">
footer
</footer>

</div></div>
  <div role="tabpanel" class="tab-pane fade" id="travel"><div class="container-fluid">
travel</div></div>
  <div role="tabpanel" class="tab-pane fade" id="tourism"><div class="container-fluid">
tourism...</div></div>

  <div role="tabpanel" class="tab-pane fade" id="four"><div class="container-fluid">
4...</div></div>

  <div role="tabpanel" class="tab-pane fade" id="five"><div class="container-fluid">
5...</div></div>

  <div role="tabpanel" class="tab-pane fade" id="six"><div class="container-fluid">
6...</div></div>

  <div role="tabpanel" class="tab-pane fade" id="seven"><div class="container-fluid">
7...</div></div>

</div>




<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js'></script>

    <script type="text/javascript">
        $(function() {
          // Javascript to enable link to tab
          var hash = document.location.hash;
          if (hash) {
            //console.log(hash);
            $('.nav-tabs a[href='+hash+']').tab('show');
          }

          // Change hash for page-reload
          $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            window.location.hash = e.target.hash;
          });
        });
    </script>

</body>
</html>
