<?php
session_start();

include "../connection/connection.php";
require __DIR__ . '/partials/user_info_func.php';
if (!isset($_COOKIE['login_bool']) || empty($_COOKIE["user_type"]) || $_COOKIE["user_type"] != "artist") {
    $_SESSION["error"] = "Please Login First";
    header("Location: ../signin.php");
    exit();
}
$details_arr = get_user_info($_COOKIE["email"], $conn);
$username = $details_arr["username"];
$email = $details_arr["email"];
$picture = $details_arr["picture"];
$id = $details_arr["id"];

$tbl_booking_query = "SELECT * FROM `tbl_booking` WHERE `artist_id` = '{$id}' AND `status` = 'confirmed'";

$tbl_booking_result = mysqli_query($conn, $tbl_booking_query);

$tbl_booking_count = mysqli_num_rows($tbl_booking_result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Artist Dashboard</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Template style -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="dist/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="dist/weather/weather-icons.min.css">
    <link type="text/css" rel="stylesheet" href="dist/weather/weather-icons-wind.min.css">
    <script src="plugins/charts/code/highcharts.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header dark-bg">

            <!-- Logo -->
            <a href="index.html" class="logo dark-bg">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="dist/img/logo.png" alt="Ovio"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="dist/img/logo-lg.png" alt="Ovio"></span>
            </a>

            <!-- Header Navbar -->
            <?php include("./partials/navbar.php"); ?>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include("./partials/sidebar.php"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Booking Details</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class="active"><i class="fa fa-dashboard"></i> Booking</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Artist ID</th>
                            <th>Artist Name</th>
                            <th>Your Username</th>
                            <th>Your Email</th>
                            <th>Your Address</th>
                            <th>Your Contact Number</th>
                            <th>Scheduled (Date + Time)</th>

                            <th>Status</th>
                            <th>Booking Timestamp</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if ($tbl_booking_count > 0) {

                            for ($i = 0; $i < $tbl_booking_count; $i++) {
                                $row = mysqli_fetch_assoc($tbl_booking_result);
                                $booking_id = $row["id"];
                                $artist_id = $row["artist_id"];
                                $select_user_query = "SELECT * FROM `tbl_user` WHERE `id` = '$artist_id' AND `role`='artist'";
                                $select_user_result = mysqli_query($conn, $select_user_query);
                                $row_artist = mysqli_fetch_assoc($select_user_result);
                                $artist_name = $row_artist["username"];
                                $username = $row["username"];
                                $email = $row["email"];
                                $address = $row["address"];
                                $contact = $row["phone_number"];
                                $date = $row["booking_schedule"];
                                $fees = $row["price"];
                                $status = $row["status"];
                                $booking_timestamp = $row["current_timestamp"];
                        ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $artist_id ?></td>
                            <td><?= $artist_name ?></td>
                            <td><?= $username ?></td>
                            <td><?= $email ?></td>
                            <td><?= $address ?></td>
                            <td><?= $contact ?></td>
                            <td class="text-warning"><?= $date ?></td>

                            <td>
                                <?php
                                        switch ($status) {
                                            case "pending":
                                                echo "<span class='label label-warning'>Pending</span>";
                                                break;
                                            case "confirmed":
                                                echo "<span class='label label-success'>Confirmed</span>";
                                                break;

                                            default:
                                                echo "<span class='label label-primary'>Pending</span>";
                                                break;
                                        }
                                        ?>
                            </td>
                            <td><?= $booking_timestamp ?></td>


                        </tr>

                        <?php

                            }
                        } else {
                            echo "No booking found";
                        }
                        ?>

                    </tbody>
                </table>
            </section>
            <!-- content -->
        </div>
        <!-- content-wrapper -->

        <!-- Main Footer -->

    </div>
    <!-- wrapper -->

    <!-- jQuery -->
    <script src="dist/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/ovio.js"></script>

    <!-- charts -->
    <script src="plugins/charts/code/modules/exporting.js"></script>
    <script src="plugins/charts/chart-functions.js"></script>

    <?php if (isset($_SESSION["error"])) {
        echo '<script>toastr.error("' . $_SESSION["error"] . '");</script>';
        // session_unset();
        unset($_SESSION["error"]);
    }

    if (isset($_SESSION["success"])) {
        echo '<script>toastr.success("' . $_SESSION["success"] . '");</script>';
        // session_unset();
        unset($_SESSION["success"]);
    }
    ?>
</body>

</html>