<?php
session_start();
include("../connection/connection.php");

if (isset($_POST['submit'])) {
    $category = htmlspecialchars(trim($_POST['category']));
    $sql = "INSERT INTO `tbl_category` (`category`) VALUES ('$category')";
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION['success'] = "Category Added";
        header("Location: add-category.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong";
        header("Location: add-category.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Category</title>

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
                    <li><a href="./index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active"><i class="fa fa-bars"></i> Category</li>
                    <li class="active"><i class="fa fa-stack-exchange"></i> Add Category</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="chart-box">
                            <h4>Add Category</h4>

                            <div class="row">

                                <div class="col-md-4">
                                    <form method="post">
                                        <fieldset class="form-group">
                                            <label class="form-label" for="category">Category</label>
                                            <input class="form-control" id="category" placeholder="Enter Category Name" type="text" name="category">
                                        </fieldset>
                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                    </form>
                                    <div class="form-group" style="margin-top: 2% !important;">
                                        <a href="category.php"><input type="button" class="btn btn-warning" value="Back"></a>
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


        <!-- wrapper -->

        <!-- jQuery -->
        <!-- <script src="dist/js/jquery.min.js"></script> -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="dist/js/ovio.js"></script>

        <!-- charts -->
        <script src="plugins/charts/code/modules/exporting.js"></script>
        <script src="plugins/charts/chart-functions.js"></script>

        <?php
        if (isset($_SESSION['success'])) {
            echo '<script>
                toastr.success("Category Added Successfully");
                </script>';

            // session_unset();
        }
        if (isset($_SESSION['error'])) {
            echo '<script>
                toastr.error("Something went wrong");
                </script>';
        }
        session_unset();

        ?>


</body>

</html>