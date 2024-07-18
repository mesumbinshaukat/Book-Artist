<?php
session_start();
include "./connection/connection.php";

if (!isset($_GET['id'])) {
    header("Location: artist.php");
    exit;
}

$artist_id = $_GET['id'];
$sql = "SELECT `id`, `username`, `email`, `picture`, `categories`, `created_at` FROM `tbl_user` WHERE `id` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $artist_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: artist.php");
    exit;
}

$artist = $result->fetch_assoc();

// Fetch categories
$sql_categories = "SELECT `id`, `category` FROM `tbl_category`";
$result_categories = $conn->query($sql_categories);

$categories = [];
if ($result_categories->num_rows > 0) {
    while ($row = $result_categories->fetch_assoc()) {
        $categories[$row['id']] = $row['category'];
    }
}

$_SESSION["previous_url"] = $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Artist Details</title>
    <meta name="description" content="Music, Musician, Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="images/logo.png">
    <link rel="shortcut icon" sizes="196x196" href="images/logo.png">
    <link rel="stylesheet" href="css/animate.css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="css/glyphicons/glyphicons.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/material-design-icons/material-design-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/app.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/style.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/font.css" type="text/css" />
    <link rel="stylesheet" href="libs/owl.carousel/dist/assets/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="libs/owl.carousel/dist/assets/owl.theme.css" type="text/css" />
    <link rel="stylesheet" href="libs/mediaelement/build/mediaelementplayer.min.css" type="text/css" />
    <link rel="stylesheet" href="libs/mediaelement/build/mep.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
    .card {
        margin: 0 auto;
        width: 50%;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .card-img-top {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
    }

    .card-body {
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="app dk" id="app">
        <div id="content" class="app-content" role="main">
            <div class="app-header navbar-md black box-shadow-z1">
                <div class="navbar" data-pjax>
                    <a data-toggle="collapse" data-target="#navbar"
                        class="navbar-item pull-right hidden-md-up m-r-0 m-l">
                        <i class="material-icons">menu</i>
                    </a>
                    <a href="index.php" class="navbar-brand md">
                        <img src="images/logo.png" alt="." class="hide">
                        <span class="hidden-folded inline">pulse</span>
                    </a>
                    <?php include './partials/navbar.php' ?>
                </div>
            </div>
            <div class="app-body">
                <div class="padding">
                    <div class="container">
                        <h1 class="display-4 text-primary text-center">Artist Details</h1>
                        <div class="card">
                            <img class="card-img-top" src="./artist/images/<?php echo $artist['picture']; ?>"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $artist['username']; ?></h5>
                                <p class="card-text">
                                    Categories:
                                    <?php
                                    $artist_categories = json_decode($artist['categories']);
                                    foreach ($artist_categories as $category_id) {
                                        echo $categories[$category_id] . " ";
                                    }
                                    ?>
                                </p>
                                <p class="card-text">Email: <?php echo $artist['email']; ?></p>
                                <p class="card-text">Member since:
                                    <?php echo date("F j, Y", strtotime($artist['created_at'])); ?></p>
                                <a href="book.php?id=<?php echo $artist['id']; ?>" class="btn btn-success">Book
                                    Artist</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("./partials/footer.php") ?>
        </div>
    </div>

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