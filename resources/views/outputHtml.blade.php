<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Londinium.com - London links and information</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <style>
    body {
        font-family: "Segoe UI", Arial, Tahoma, Geneva, sans-serif
    }

    a:visited {
        color: purple;
    }

    .container-fluid {
        width: 99%;
    }

    .nav-tabs {
        background-color: #C8D3DB;
    }

    .nav-tabs>li>a {
        border-radius: 5px;
    }

    .nav-tabs>li>a:hover {
        background-color: white !important;
        border-radius: 5px;
        color: black;
        border: 1px solid black;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        background-color: blue !important;
        color: black;
        border: 2px solid #3F515F;
    }

    .voffset {
        margin-top: 15px;
        margin-bottom: 30px;
    }

    .footer {
        background: #C8D3DB;
        padding-left: 20px;
    }

    .indent {
        padding-left: 5px;
        margin: 2px;
    }

    a:hover {
        background-color: yellow;
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
                <a class="nav-link" href="#travel" role="tab" data-toggle="tab">Travel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tourism" role="tab" data-toggle="tab">Tourism</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#food" role="tab" data-toggle="tab">Food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#shopping" role="tab" data-toggle="tab">Shopping</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#finance" role="tab" data-toggle="tab">Finance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#sport" role="tab" data-toggle="tab">Sport</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#property" role="tab" data-toggle="tab">Property</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#media" role="tab" data-toggle="tab">Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#info" role="tab" data-toggle="tab">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#events" role="tab" data-toggle="tab">Events</a>
            </li>
        </ul>
    </nav>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">
            <div class="jumbotron">
                <div class="container">
                    <h2>Merry Christmas from Londinium.com</h2>
                    <p>The most useful website links for your visit to London</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 col-xs-offset-1 ">
                        <div class="card">
                            <div class="card-header">
                                About us
                            </div>
                            <div class="card-block">
                                <p class="card-text">
                                    Londinium.com is a new website directory. We are trying to make the most useful link directory for Londoners and people visiting London.
                                </p>
                                <p>
                                    Current count of websites : {{$countSaved}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 col-xs-offset-1 ">
                        <div class="card">
                            <div class="card-header">
                                Contact londinium.com
                            </div>
                            <div class="card-block">
                                <p class="card-text">We would like to hear from you about any website that we link to, and would also like to receive your recommendations for other sites that we should add please contact us via
                                    <i class="fa fa-twitter"></i>
                                    <a href="https://twitter.com/londiniumcom" target="_blank">Twitter</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                1998 AD - 2018 AD - Londinium.com - The original site for London
                <br> Built: {{ date('F d, Y', strtotime($date)) }} AD
            </footer>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="travel">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Travel</h1>
<?php
$subcat = 0;
?>
                            @foreach ($Travel as $site)
                            <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                                <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>

                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif

                            <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tourism">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Tourism</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Tourism as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="food">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Food</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Food as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="shopping">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Shopping</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Shopping as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="finance">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Finance</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Finance as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="sport">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Sport</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Sport as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="property">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Property</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Property as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="media">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>London Media and News</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Media as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="info">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>Information</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Info as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="events">
            <div class="container-fluid">
                <div class="row voffset">
                    <div class="col-xs-6 col-xs-offset-1 col1">
                        <h1>London Event Venues</h1>
                        <?php
$subcat = 0;
?>
                        @foreach ($Events as $site)
                        <?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
                        <a href="{{ $site->url }}" target="_blank" class="indent">{{ $site->name }}</a>
                            @if (isset($twitter[$site->id]))
                                <a href="{{$twitter[$site->id] }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            @endif
                        <br> @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js'></script>
    <script type="text/javascript">
    $(function() {
        // Javascript to enable link to tab
        var hash = document.location.hash;
        if (hash) {
            //console.log(hash);
            $('.nav-tabs a[href=' + hash + ']').tab('show');
        }

        // Change hash for page-reload
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            window.location.hash = e.target.hash;
        });
    });
    </script>
</body>
</html>
