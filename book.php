<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include "./connection/connection.php";

require __DIR__ . '/user/partials/user_info_func.php';


if (!isset($_COOKIE['login_bool']) || empty($_COOKIE["user_type"])) {
    $previous_url = $_SESSION["previous_url"];
    $_SESSION["error"] = "Please Login First";
    header("Location: $previous_url");
    exit();
} elseif (isset($_COOKIE['login_bool']) && (!empty($_COOKIE["user_type"]) && $_COOKIE["user_type"] == "artist")) {
    $previous_url = $_SESSION["previous_url"];
    $_SESSION["error"] = "Please Login From User Account";
    header("Location: $previous_url");
    exit();
}

$user_info = get_user_info($_COOKIE["email"], $conn);

if (!isset($_GET['id'])) {
    header("Location: artist.php");
    exit;
}

$booking_fees = 300;

$artist_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_id = $user_info['id'];
    $booking_schedule = $_POST['booking_schedule'];
    $address = $_POST['address'];
    $phone_number = (string) "+91" . $_POST['phone_number'];
    $status = "Pending"; // Default status
    $price = $booking_fees;

    $sql = "INSERT INTO `tbl_booking` (`artist_id`, `username`, `email`, `user_id`, `booking_schedule`, `address`, `phone_number`, `status`, `price`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississssi", $artist_id, $username, $email, $user_id, $booking_schedule, $address, $phone_number, $status, $price);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Booking Pending. Please Pay $booking_fees Rupees.";
        header("Location: ./user/index.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong";
        header("Location: book.php");
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Book Artist</title>
    <meta name="description" content="Music, Musician, Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="images/logo.png">
    <link rel="shortcut icon" sizes="196x196" href="images/logo.png">
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/app.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/style.css" type="text/css" />
    <link rel="stylesheet" href="css/styles/font.css" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
    .card-center {
        margin: 0 auto;
        float: none;
        margin-bottom: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-control {
        border-radius: 0;
        box-shadow: none;
        border-color: #d2d6de;
    }

    .btn-success {
        background-color: #5cb85c;
        border-color: #4cae4c;
        border-radius: 0;
    }

    .btn-success:hover {
        background-color: #4cae4c;
        border-color: #4cae4c;
    }

    input::placeholder {
        color: black;
        opacity: 80% !important;
    }
    </style>
</head>

<body>
    <div class="app dk" id="app">
        <div id="content" class="app-content" role="main">
            <div class="app-header navbar-md black box-shadow-z1">
                <div class="navbar" data-pjax>
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
                        <h1 class="display-4 text-primary text-center">Book Artist</h1>
                        <div class="card card-center" style="width: 50%;">
                            <div class="card-body">
                                <form method="POST" action="book.php?id=<?php echo $artist_id; ?>">
                                    <div class="form-group">
                                        <label for="username">Your Name</label>
                                        <input type="text" value="<?php echo $user_info['username']; ?>"
                                            class="form-control" id="username" name="username" required
                                            placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email</label>
                                        <input type="email" class="form-control"
                                            value="<?php echo $user_info['email']; ?>" id="email" name="email" required
                                            placeholder="Your Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="booking_schedule">Booking Schedule</label>
                                        <input type="datetime-local" class="form-control" id="booking_schedule"
                                            name="booking_schedule" placeholder="Booking Schedule" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number <span class="text-danger">(* Without
                                                Country Code)</span></label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            required placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Advance Booking Fees:</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            value="<?php echo $booking_fees; ?>" required readonly>
                                    </div>
                                    <button type="submit" class="btn btn-success">Book Now</button>
                                </form>
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