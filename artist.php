<?php
session_start();
include "./connection/connection.php";

// Fetch artists
$sql = "SELECT `id`, `username`, `email`, `password`, `picture`, `role`, `categories`, `created_at` FROM `tbl_user` WHERE `role` = 'artist'";
$result = $conn->query($sql);

// Fetch categories
$sql_categories = "SELECT `id`, `category` FROM `tbl_category`";
$result_categories = $conn->query($sql_categories);

$categories = [];
if ($result_categories->num_rows > 0) {
  while ($row = $result_categories->fetch_assoc()) {
    $categories[$row['id']] = $row['category'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Artists</title>
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
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <style>
    .card-img-top {
      flex-grow: 1;
      width: 100%;
      height: auto;
      object-fit: cover;
      aspect-ratio: 3/2;
      border-radius: 20%;
    }
  </style>
</head>

<body>
  <div class="app dk" id="app">
    <div id="content" class="app-content" role="main">
      <div class="app-header navbar-md black box-shadow-z1">
        <div class="navbar" data-pjax>
          <a data-toggle="collapse" data-target="#navbar" class="navbar-item pull-right hidden-md-up m-r-0 m-l">
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
          <h1 class="display-4 text-primary">Artists</h1>
          <div class="row">
            <?php if ($result->num_rows > 0) : ?>
              <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-md-4">
                  <div class="card text-center">
                    <img class="card-img-top" src="./artist/images/<?php echo $row['picture']; ?>" alt="Card image cap">
                    <div class="card-body">
                      <h3 class="card-title"><?php echo $row['username']; ?></h3>
                      <p class="card-text" style="font-size: 15px; font-weight:bolder;">
                        <?php
                        $artist_categories = json_decode($row['categories']);
                        foreach ($artist_categories as $category_id) {
                          echo " | " . $categories[$category_id] . " | ";
                        }
                        ?>
                      </p>
                      <a href="artist_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">More Details</a>
                      <a href="book.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Book
                        Artist</a>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php else : ?>
              <p>No artists found</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php include("./partials/footer.php") ?>
    </div>
  </div>
</body>

</html>