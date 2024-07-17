<?php
session_start();

include "./connection/connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Artist Booking Online</title>
    <meta name="description" content="Music, Musician, Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="images/logo.png">

    <!-- style -->
    <link rel="stylesheet" href="css/animate.css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="css/glyphicons/glyphicons.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/material-design-icons/material-design-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

    <!-- build:css css/styles/app.min.css -->
    <link rel="stylesheet" href="css/styles/app.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/style.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/font.css" type="text/css" />

    <link rel="stylesheet" href="libs/owl.carousel/dist/assets/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="libs/owl.carousel/dist/assets/owl.theme.css" type="text/css" />
    <link rel="stylesheet" href="libs/mediaelement/build/mediaelementplayer.min.css" type="text/css" />
    <link rel="stylesheet" href="libs/mediaelement/build/mep.css" type="text/css" />

    <!-- endbuild -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </body>
</head>

<body>
    <div class="app dk" id="app">

        <!-- ############ LAYOUT START-->

        <!-- content -->
        <div id="content" class="app-content" role="main">
            <div class="app-header navbar-md black box-shadow-z1">
                <div class="navbar" data-pjax>
                    <a data-toggle="collapse" data-target="#navbar"
                        class="navbar-item pull-right hidden-md-up m-r-0 m-l">
                        <i class="material-icons">menu</i>
                    </a>
                    <!-- brand -->
                    <a href="index.html" class="navbar-brand md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">
                            <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)" />
                            <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color" />
                            <circle cx="24" cy="24" r="10" fill="#ffffff" />
                            <circle cx="13" cy="13" r="2" fill="#ffffff" class="brand-animate" />
                            <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />
                            <circle cx="24" cy="24" r="3" fill="#000000" />
                        </svg>

                        <img src="images/logo.png" alt="." class="hide">
                        <span class="hidden-folded inline">pulse</span>
                    </a>
                    <!-- / brand -->

                    <!-- nabar right -->
                    <?php include './partials/navbar.php' ?>
                    <!-- / navbar right -->

                    <!-- navbar collapse -->

                    <!-- / navbar collapse -->
                </div>
            </div>
            <div class="app-body">

                <!-- ############ PAGE START-->


                <div class="owl-carousel black owl-theme owl-dots-bottom-center" data-ui-jp="owlCarousel"
                    data-ui-options="{
             items: 1
            ,loop: true
            ,autoplay: true
            ,nav: true
          }">
                    <div class="row-col">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">A simple, fast and responsive music template</h2>
                                <h6 class="text-muted m-b-lg">HTML5 Music Template</h6>
                                <a href="home.html" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get it
                                    now</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">Bootstrap 4 CSS framework</h2>
                                <h6 class="text-muted m-b-lg">Responsive layout</h6>
                                <a href="player.html" class="btn circle btn-outline b-primary m-b-lg p-x-md">View
                                    App</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">Ajax powered page switch with great experience</h2>
                                <h6 class="text-muted m-b-lg">No refresh page when switching pages</h6>
                                <a href="rtl.html" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get RTL</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
                <div class="row-col">
                    <div class="col-sm-6">
                        <div class="black cover cover-gd" style="background-image: url('images/b1.jpg');">
                            <div class="p-a-lg text-center">
                                <h3 class="display-3 m-y-lg">Music</h3>
                                <p class="text-muted text-md m-b-lg">Get ready for high sound quality.</p>
                                <a href="player.html" class="btn circle white m-b-lg p-x-md">Try Free</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 black lt">
                        <div class="black cover cover-gd" style="background-image: url('images/b7.jpg');">
                            <div class="p-a-lg text-center">
                                <h3 class="display-3 m-y-lg">Artists</h3>
                                <p class="text-muted text-md m-b-lg">Listen to your favorite Artists.</p>
                                <a href="home.html" class="btn circle white m-b-lg p-x-md">View Artists</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-col dark-white">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="p-a-lg text-center">
                            <h3 class="display-4 m-y-lg">Light, Grey, Dark, Black themes</h3>
                            <p class="text-muted text-md m-b-lg">Config any blocks with any colors</p>
                            <a href="home.html" class="btn circle btn-outline b-black m-b-lg p-x-md">Try Settings</a>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="black cover" data-stellar-background-ratio="0.5"
                    style="background-image: url('images/b10.jpg');">
                    <div class="row-col">
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg">One Css framework, Unlimited options &amp; variables</h4>
                                <p class="text-muted text-md m-b-lg">Colors, layouts, components and widgets. we
                                    pre-build them for you.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg">Two layouts, Horizontal and side navigation</h4>
                                <p class="text-muted text-md m-b-lg">With the flexiable layout options, you can build
                                    responsive layouts.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg">Three templates, Landing, App, Site templates</h4>
                                <p class="text-muted text-md m-b-lg">Choose the suitable one for your needs.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ############ PAGE END-->

            </div>
            <?php include("./partials/footer.php") ?>
        </div>
        <!-- / -->

        <!-- ############ LAYOUT END-->
    </div>

    <!-- build:js scripts/app.min.js -->
    <!-- jQuery -->
    <script src="libs/jquery/dist/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="libs/tether/dist/js/tether.min.js"></script>
    <script src="libs/bootstrap/dist/js/bootstrap.js"></script>
    <!-- core -->
    <script src="libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="libs/jquery.stellar/jquery.stellar.min.js"></script>
    <script src="libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="libs/jscroll/jquery.jscroll.min.js"></script>
    <script src="libs/PACE/pace.min.js"></script>
    <script src="libs/jquery-pjax/jquery.pjax.js"></script>

    <script src="libs/mediaelement/build/mediaelement-and-player.min.js"></script>
    <script src="libs/mediaelement/build/mep.js"></script>
    <script src="scripts/player.js"></script>

    <script src="scripts/config.lazyload.js"></script>
    <script src="scripts/ui-load.js"></script>
    <script src="scripts/ui-jp.js"></script>
    <script src="scripts/ui-include.js"></script>
    <script src="scripts/ui-device.js"></script>
    <script src="scripts/ui-form.js"></script>
    <script src="scripts/ui-nav.js"></script>
    <script src="scripts/ui-screenfull.js"></script>
    <script src="scripts/ui-scroll-to.js"></script>
    <script src="scripts/ui-toggle-class.js"></script>
    <script src="scripts/ui-taburl.js"></script>
    <script src="scripts/app.js"></script>
    <script src="scripts/site.js"></script>
    <script src="scripts/ajax.js"></script>
    <!-- endbuild -->

    <?php
	if (isset($_SESSION['success'])) {
		echo '<script>toastr.success("' . $_SESSION['success'] . '");</script>';
	}
	if(isset($_SESSION['error'])) {
		echo '<script>toastr.error("' . $_SESSION['error'] . '");</script>';
	}
	session_unset();
	?>
</body>

</html>