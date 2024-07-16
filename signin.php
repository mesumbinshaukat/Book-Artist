<?php
session_start();
include "./connection/connection.php";

if (isset($_COOKIE['login_bool']) || !empty($_COOKIE["user_type"])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $select_user_query = "SELECT * FROM `tbl_user` WHERE `email` = '$email'";

    $result = $conn->query($select_user_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $user_type = $row['role'];
            $_SESSION['success'] = "Login Successfull";
            setcookie("user_type", $user_type, time() + 3600, "/");
            setcookie("login_bool", true, time() + 3600, "/");
            setcookie("email", $email, time() + 3600, "/");
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Password is incorrect";
            header("Location: signin.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Email is incorrect";
        header("Location: signin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>pulse - Music, Audio and Radio web application</title>
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


    <style>
        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            color: #000;
        }

        .form-control::placeholder {
            color: #000 !important;
        }

        .category-checkboxes {
            display: none;
        }
    </style>

    <!-- endbuild -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="app dk" id="app">

        <!-- ############ LAYOUT START-->

        <div class="padding">
            <div class="navbar">
                <div class="pull-center">
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
                </div>
            </div>
        </div>
        <div class="b-t">
            <div class="center-block w-xxl w-auto-xs p-y-md text-center">
                <div class="p-a-md">

                    <form method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-lg black p-x-lg" name="login">Sign in</button>
                    </form>
                    <div class="m-y">
                        <a href="forgot-password.html" class="_600">Forgot password?</a>
                    </div>
                    <div>
                        Do not have an account?
                        <a href="signup.php" class="text-primary _600">Sign up</a>
                    </div>
                </div>
            </div>
        </div>

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
        echo '<script>
              toastr.success("' . $_SESSION['success'] . '");
              </script>';
    }

    if (isset($_SESSION['error'])) {
        echo '<script>
              toastr.error("' . $_SESSION['error'] . '");
              </script>';
    }
    session_unset();

    ?>
</body>

</html>