<?php
include("../connection/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ovio - Bootstrap Based Responsive Dashboard &amp; Admin Template</title>

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
</head>

<body class="sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <?php include("./partials/header.php") ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar dark-bg">
            <?php include("./partials/sidebar.php"); ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Basic Tables</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active"><i class="fa fa-envelope-o"></i> Tables</li>
                    <li class="active"><i class="fa fa-bars"></i> Basic Tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="chart-box">
                            <h4>Responsive Tables</h4>
                            <p>Create responsive tables by wrapping any <code>.table</code> in
                                <code>.table-responsive</code> to make them scroll horizontally on small devices (under
                                768px). When viewing on anything larger than 768px wide, you will not see any difference
                                in these tables.
                            </p>
                            <div class="bs-example" data-example-id="simple-responsive-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Table heading</th>
                                                <th>Table heading</th>
                                                <th>Table heading</th>
                                                <th>Table heading</th>
                                                <th>Table heading</th>
                                                <th>Table heading</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
</body>

</html>