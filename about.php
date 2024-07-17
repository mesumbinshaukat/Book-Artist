<?php
session_start();
include "./connection/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>About Us - Artist Booking Online</title>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        .text-md {
            font-size: 1.25rem;
        }

        .cover-gd {
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 768px) {


            .display-4 {
                font-size: 2.5rem;
                /* Increased font size */
            }

            .text-md {
                font-size: 1.25rem;
                /* Increased font size */
            }

            .p-a-lg {
                padding: 2rem !important;
                /* Adjusted padding */
            }


        }

        .app-content {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="app dk" id="app">

        <!-- ############ LAYOUT START-->

        <!-- content -->
        <div id="content" class="app-content" role="main">
            <div class="app-header navbar-md black box-shadow-z1">
                <div class="navbar" data-pjax>
                    <a data-toggle="collapse" data-target="#navbar" class="navbar-item pull-right hidden-md-up m-r-0 m-l">
                        <i class="material-icons">menu</i>
                    </a>
                    <!-- brand -->
                    <a href="index.php" class="navbar-brand md">
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
                    <?php include "./partials/navbar.php" ?>
                    <!-- / navbar collapse -->
                </div>
            </div>
            <div class="app-body">

                <!-- ############ PAGE START-->

                <div class="row-col">
                    <div class="col-lg-12">
                        <div class="p-a-lg text-center">
                            <h2 class="display-4 m-y-lg">About Us</h2>
                            <p class="m-b-lg">Discover the story behind our platform, our mission, and our
                                commitment to connecting artists with their audience.</p>
                        </div>
                    </div>
                </div>
                <div class="row-col black ">
                    <div class="col-md-4 text-center">
                        <div class="p-a-lg">
                            <h3 class="" style="color: white !important;">Our Mission</h3>
                            <p class="m-b-md">To empower artists and provide them with a platform to showcase
                                their talent and connect with a global audience.</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="p-a-lg">
                            <h3 style="color: white !important;">Our Vision</h3>
                            <p class="  m-b-md">To create a vibrant community where artists and audiences can
                                engage, collaborate, and inspire each other.</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="p-a-lg">
                            <h3 style="color: white !important;">Our Values</h3>
                            <p class="m-b-md">Innovation, Inclusivity, and Integrity.</p>
                        </div>
                    </div>
                </div>

                <div class="row-col">
                    <div class="col-md-8 offset-md-2 p-y-lg">
                        <div class="p-a-lg">
                            <h3 class="text-md text-center">Our Story</h3>
                            <p class="">Founded in 2024, our platform has been dedicated to providing artists
                                with the tools they need to reach new audiences. We believe in the power of music to
                                bring people together and are committed to supporting artists at every stage of their
                                careers.</p>
                        </div>
                    </div>
                </div>

                <!-- ############ PAGE END-->

            </div>
            <?php include "./partials/footer.php" ?>
        </div>
        <!-- / -->

    </div>

    <script src="js/jquery/dist/jquery.js"></script>
    <script src="js/tether/dist/js/tether.min.js"></script>
    <script src="js/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/underscore/underscore-min.js"></script>
    <script src="js/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="js/pace-progress/pace.min.js"></script>
    <script src="js/scripts/app.js"></script>
    <script src="js/scripts/player.js"></script>
    <script src="js/scripts/appear.js"></script>
    <script src="js/scripts/owl.carousel.min.js"></script>
    <script src="js/scripts/jquery.media.js"></script>
    <script src="js/scripts/jquery.media.js"></script>
    <script src="js/scripts/demo.js"></script>

</body>

</html>
<script src="js/scripts/jquery.media.js"></script>
<script src="js/scripts/demo.js"></script>

</body>

</html>