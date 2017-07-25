<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Londinium.com - London links and information</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css'>
    <style>
    body {
        font-family: Tahoma, Geneva, sans-serif
    }
    
    .container-fluid {
        width: 99%;
    }
    
    .nav-tabs {
        background-color: #C8D3DB;
    }
    
    .nav-tabs > li > a {
        border-radius: 5px;
    }
    
    .nav-tabs > li > a:hover {
        background-color: white !important;
        border-radius: 5px;
        color: black;
        border: 1px solid black;
    }
    
    .nav-tabs > li.active > a,
    .nav-tabs > li.active > a:focus,
    .nav-tabs > li.active > a:hover {
        background-color: blue !important;
        color: black;
        border: 2px solid #3F515F;
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                    <p>Welcome to the new londinium.com website. We have recently relaunched this website. The aim is to provide you with the most useful website links and information.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="card">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-block">
                                <a href="#" class="btn btn-primary">Visit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="card">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-block">
                                <a href="#" class="btn btn-primary">Visit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="card">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-block">
                                <a href="#" class="btn btn-primary">Visit</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="card">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Card title</h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="card-block">
                                <a href="#" class="btn btn-primary">Visit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    updated {{$date}}
                </footer>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="travel">
            <div class="container-fluid">
                
                <h1>Travel</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Travel as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach


                </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tourism">
            <div class="container-fluid">
                <h1>Tourism</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Tourism as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach
</div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="food">
            <div class="container-fluid">
                <h1>Food</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Food as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach


                </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="five">
            <div class="container-fluid">

</div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="shopping">
            <div class="container-fluid">
                <h1>Shopping</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Shopping as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach

            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="finance">
            <div class="container-fluid">
                <h1>Finance</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Finance as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach

            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="sport">
            <div class="container-fluid">
                <h1>Sport</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Sport as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach

                </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="property">
            <div class="container-fluid">
                 <h1>Property</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Property as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach

            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="media">
            <div class="container-fluid">
               
                <h1>London Media and News</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Media as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach

</div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="info">
            <div class="container-fluid">
                
                <h1>Information</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Info as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach
</div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="events">
            <div class="container-fluid">
                
                <h1>London Event Venues</h1>

                    <?php
                     $subcat=0;
                    ?>

                    @foreach ($Events as $site)
                        <?php
                        if ($site->subcategory_id != $subcat) {
                            echo "<h4>" . $subcategories [$site->subcategory_id] . "</h4>";
                            $subcat = $site->subcategory_id;
                        }
                        ?>


                        <b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></b>

                        <br>
                    
                    @endforeach
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
