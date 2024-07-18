<?php
session_start();
include "../connection/connection.php";

require __DIR__ . '/partials/user_info_func.php';

if (!isset($_COOKIE['login_bool']) || empty($_COOKIE["user_type"]) || $_COOKIE["user_type"] != "artist") {
    header("Location: ../signin.php");
    exit();
}

$details_arr = get_user_info($_COOKIE["email"], $conn);

$username = $details_arr["username"];
$picture = $details_arr["picture"];
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <?php include("./partials/navbar.php") ?>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include("./partials/sidebar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Dashboard</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="media-box">
                            <div class="media-icon pull-left"><i class="icon-bargraph"></i> </div>
                            <div class="media-info">
                                <h5>Total Leads</h5>
                                <h3>1530</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="media-box bg-sea">
                            <div class="media-icon pull-left"><i class="icon-wallet"></i> </div>
                            <div class="media-info">
                                <h5>Total Payment</h5>
                                <h3>$8,530</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="media-box bg-blue">
                            <div class="media-icon pull-left"><i class="icon-basket"></i> </div>
                            <div class="media-info">
                                <h5>Total Sales</h5>
                                <h3>935</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="media-box bg-green">
                            <div class="media-icon pull-left"><i class="icon-layers"></i> </div>
                            <div class="media-info">
                                <h5>New Orders</h5>
                                <h3>5324</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="chart-box">
                            <h4>Product Sales</h4>
                            <div class="chart">
                                <div id="container"></div>
                                <!--for values check "Product Sales" chart on char-function.js-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="chart-box">
                            <h4>Sales Overview</h4>
                            <div class="chart">
                                <div id="container1"></div>
                                <!--for values check "Sales Overview" chart on char-function.js-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="chart-box">
                            <h4>Recent Messages</h4>
                            <div class="message-widget"> <a href="#">
                                    <div class="user-img pull-left"> <img src="dist/img/img1.jpg"
                                            class="img-circle img-responsive" alt="User Image"> <span
                                            class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Florence Douglas</h5>
                                        <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and
                                            type setting industry. Lorem Ipsum has been.</span> <span class="time">9:30
                                            AM</span>
                                    </div>
                                </a> <a href="#">
                                    <div class="user-img pull-left"> <img src="dist/img/img3.jpg"
                                            class="img-circle img-responsive" alt="User Image"> <span
                                            class="profile-status invisable pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Florence Douglas</h5>
                                        <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and
                                            type setting industry. Lorem Ipsum has been.</span> <span class="time">10:30
                                            AM</span>
                                    </div>
                                </a> <a href="#">
                                    <div class="user-img pull-left"> <img src="dist/img/img4.jpg"
                                            class="img-circle img-responsive" alt="User Image"> <span
                                            class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Florence Douglas</h5>
                                        <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and
                                            type setting industry. Lorem Ipsum has been.</span> <span class="time">12:30
                                            AM</span>
                                    </div>
                                </a> </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="chart-box">
                            <h4>Recent Orders</h4>
                            <div class="table-block">
                                <div class="info-block">
                                    <p>Total paid invoices 5340, unpaid 130. <span class="pull-right"><a
                                                href="app/invoice.html">Invoice Summary <i
                                                    class="fa fa-long-arrow-right"></i></a></span> </p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Invoice#</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-truncate">OV-101777</td>
                                                <td class="text-truncate"><a href="#">VIO-0035421</a></td>
                                                <td class="text-truncate">Florence Douglas</td>
                                                <td class="text-truncate"><span
                                                        class="lable-tag tag-success">Paid</span></td>
                                                <td class="text-truncate">$ 653.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">OV-101775</td>
                                                <td class="text-truncate"><a href="#">VIO-0028954</a></td>
                                                <td class="text-truncate">Dr. Douglas</td>
                                                <td class="text-truncate"><span
                                                        class="lable-tag tag-unpaid">Overdue</span></td>
                                                <td class="text-truncate">$ 421.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">OV-101687</td>
                                                <td class="text-truncate"><a href="#">VIO-0025864</a></td>
                                                <td class="text-truncate">Andrew Florence</td>
                                                <td class="text-truncate"><span
                                                        class="lable-tag tag-success">Paid</span></td>
                                                <td class="text-truncate">$ 632.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">OV-101657</td>
                                                <td class="text-truncate"><a href="#">VIO-0085815</a></td>
                                                <td class="text-truncate">Florence Sr.</td>
                                                <td class="text-truncate"><span
                                                        class="lable-tag tag-success">Paid</span></td>
                                                <td class="text-truncate">$ 285.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">OV-101625</td>
                                                <td class="text-truncate"><a href="#">VIO-0053812</a></td>
                                                <td class="text-truncate">Florence Douglas</td>
                                                <td class="text-truncate"><span
                                                        class="lable-tag tag-warning">Overdue</span></td>
                                                <td class="text-truncate">$ 538.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="chart-box">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                        data-toggle="tab">Activity</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                        data-toggle="tab">Profile</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                                        data-toggle="tab">Settings</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="message-widget">
                                        <div>
                                            <div class="user-img pull-left"> <img src="dist/img/img3.jpg"
                                                    class="img-circle img-responsive" alt="User Image"> </div>
                                            <div class="mail-contnet">
                                                <h5>Florence Douglas</h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry. Lorem Ipsum has been the printing and type setting simply
                                                    dummy text industry.</p>
                                                <span class="time m-bot-2">10:30 AM</span>
                                                <div class="row">
                                                    <div class="col-lg-4 col-xs-4 m-bot-2"><img src="dist/img/img5.jpg"
                                                            alt="user" class="img-responsive img-rounded"></div>
                                                    <div class="col-lg-4 col-xs-4 m-bot-2"><img src="dist/img/img6.jpg"
                                                            alt="user" class="img-responsive img-rounded"></div>
                                                    <div class="col-lg-4 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg"
                                                            alt="user" class="img-responsive img-rounded"></div>
                                                    <div class="m-top-2"><a href="#" class="pull-left">2 comment</a> <a
                                                            href="#" class="pull-left"><i
                                                                class="fa fa-heart text-success"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="user-img pull-left"> <img src="dist/img/img2.jpg"
                                                    class="img-circle img-responsive" alt="User Image"> </div>
                                            <div class="mail-contnet">
                                                <h5>Florence Douglas</h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry. Lorem Ipsum has been the printing and type setting simply
                                                    dummy text industry.</p>
                                                <span class="time m-bot-2">10:30 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                    <div class="message-widget">
                                        <div>
                                            <div class="user-img pull-left"> <img src="dist/img/img2.jpg"
                                                    class="img-circle img-responsive" alt="User Image"> </div>
                                            <div class="mail-contnet">
                                                <h5>Florence Douglas</h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry. Lorem Ipsum has been the printing and type setting simply
                                                    dummy text industry.</p>
                                                <span class="time m-bot-2">10:30 AM</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="user-img pull-left"> <img src="dist/img/img3.jpg"
                                                    class="img-circle img-responsive" alt="User Image"> </div>
                                            <div class="mail-contnet">
                                                <h5>Florence Douglas</h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry. Lorem Ipsum has been the printing and type setting simply
                                                    dummy text industry.</p>
                                                <span class="time m-bot-2">10:30 AM</span>
                                                <div class="row">
                                                    <div class="col-lg-4 col-xs-4 m-bot-2"><img src="dist/img/img5.jpg"
                                                            alt="user" class="img-responsive img-rounded"></div>
                                                    <div class="col-lg-4 col-xs-4 m-bot-2"><img src="dist/img/img6.jpg"
                                                            alt="user" class="img-responsive img-rounded"></div>
                                                    <div class="col-lg-4 col-xs-4 m-bot-2"><img src="dist/img/img7.jpg"
                                                            alt="user" class="img-responsive img-rounded"></div>
                                                    <div class="m-top-2"><a href="#" class="pull-left">2 comment</a> <a
                                                            href="#" class="pull-left"><i
                                                                class="fa fa-heart text-success"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">
                                    <div class="message-widget">
                                        <div>
                                            <div class="user-img pull-left"> <img src="dist/img/img2.jpg"
                                                    class="img-circle img-responsive" alt="User Image"> </div>
                                            <div class="mail-contnet">
                                                <h5>Florence Douglas</h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry. Lorem Ipsum has been the printing and type setting simply
                                                    dummy text industry.</p>
                                                <span class="time m-bot-2">10:30 AM</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="user-img pull-left"> <img src="dist/img/img2.jpg"
                                                    class="img-circle img-responsive" alt="User Image"> </div>
                                            <div class="mail-contnet">
                                                <h5>Florence Douglas</h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry. Lorem Ipsum has been the printing and type setting simply
                                                    dummy text industry.</p>
                                                <span class="time m-bot-2">10:30 AM</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="user-img pull-left"> <img src="dist/img/img2.jpg"
                                                    class="img-circle img-responsive" alt="User Image"> </div>
                                            <div class="mail-contnet">
                                                <h5>Florence Douglas</h5>
                                                <p>Lorem Ipsum is simply dummy text of the printing and type setting
                                                    industry. Lorem Ipsum has been the printing and type setting simply
                                                    dummy text industry.</p>
                                                <span class="time m-bot-2">10:30 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6 col-xs-6">
                                <div class="twitter-box m-bot-3">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner text-center" role="listbox">
                                            <div class="item active">
                                                <div> <i class="fa fa-twitter"></i> </div>
                                                <p>Puns, humor, and quotes are great content on <span
                                                        class="text-danger">#Twitter</span>. Find some related to your
                                                    business.
                                                <p class="text-italic pt-1">- John Doe</p>
                                                </p>
                                            </div>
                                            <div class="item">
                                                <div> <i class="fa fa-twitter"></i> </div>
                                                <p>Puns, humor, and quotes are great content on <span
                                                        class="text-danger">#Twitter</span>. Find some related to your
                                                    business.
                                                <p class="text-italic pt-1">- John Doe</p>
                                                </p>
                                            </div>
                                            <div class="item">
                                                <div> <i class="fa fa-twitter"></i> </div>
                                                <p>Puns, humor, and quotes are great content on <span
                                                        class="text-danger">#Twitter</span>. Find some related to your
                                                    business.
                                                <p class="text-italic pt-1">- John Doe</p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-6">
                                <div class="facebook-box m-bot-3">
                                    <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner text-center" role="listbox">
                                            <div class="item active">
                                                <div> <i class="fa fa-facebook"></i> </div>
                                                <p>Puns, humor, and quotes are great content on
                                                    Find some related to your business.
                                                <p class="text-italic pt-1">- John Doe</p>
                                                </p>
                                            </div>
                                            <div class="item">
                                                <div> <i class="fa fa-facebook"></i> </div>
                                                <p>Puns, humor, and quotes are great content on
                                                    Find some related to your business.
                                                <p class="text-italic pt-1">- John Doe</p>
                                                </p>
                                            </div>
                                            <div class="item">
                                                <div> <i class="fa fa-facebook"></i> </div>
                                                <p>Puns, humor, and quotes are great content on
                                                    Find some related to your business.
                                                <p class="text-italic pt-1">- John Doe</p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div> <img src="dist/img/img8.jpg" class="img-responsive" alt="User Image">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p class="text-bold text-uppercase">Today</p>
                                                <div class="row-fluid">
                                                    <div class="col-md-3">
                                                        <div class="wi wi-day-snow font-25 text-warning"></div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="weather-cent text-warning text-bold font-30">
                                                            <span>25</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-2 col-xs-4">
                                                        <p class="text-uppercase ">Mon</p>
                                                        <div class="wi wi-day-snow font-18 text-indigo"></div>
                                                        <div class="wi-small weather-cent"><span>17</span></div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <p class="text-uppercase">Tue</p>
                                                        <div class="wi wi-day-cloudy-windy font-18 text-lime"></div>
                                                        <div class="wi-small weather-cent"><span>22</span></div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <p class="text-uppercase">Wed</p>
                                                        <div class="wi wi-day-lightning font-18 text-amber"></div>
                                                        <div class="wi-small weather-cent"><span>17</span></div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <p class="text-uppercase">Thur</p>
                                                        <div class="wi wi-night-rain-mix font-18 text-blue"></div>
                                                        <div class="wi-small weather-cent"><span>24</span></div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <p class="text-uppercase">Fri</p>
                                                        <div class="wi wi-night-rain font-18 text-slate"></div>
                                                        <div class="wi-small weather-cent"><span>20</span></div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <p class="text-uppercase">Sat</p>
                                                        <div class="wi wi-sunrise font-18 text-success"></div>
                                                        <div class="wi-small weather-cent"><span>16</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        </div>
        <!-- content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer dark-bg">
            <div class="pull-right hidden-xs"> Version 1.0</div>
            Copyright &copy; 2017 Yourdomian. All rights reserved.
        </footer>
    </div>
    <!-- wrapper -->

    <!-- jQuery -->
    <script src="dist/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/ovio.js"></script>

    <!-- charts -->
    <script src="plugins/charts/code/modules/exporting.js"></script>
    <script src="plugins/charts/chart-functions.js"></script>

    <?php
    if (isset($_SESSION['success'])) {
        echo '<script>toastr.success("' . $_SESSION['success'] . '");</script>';
    }
    if (isset($_SESSION['error'])) {
        echo '<script>toastr.error("' . $_SESSION['error'] . '");</script>';
    }
    session_unset();
    ?>
</body>

</html>