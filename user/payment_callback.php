<?php
session_start();
// payment_callback.php

// Enable detailed error reporting (optional for debugging purposes)
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("../connection/connection.php");

// Initialize logging (optional for debugging purposes)
$logFile = 'payment_callback.log';
function logMessage($message)
{
    global $logFile;
    file_put_contents($logFile, $message . "\n", FILE_APPEND);
}

// Log the start of the callback handling
logMessage("Handling payment callback...");

// Read POST data (if any processing is needed based on the data)
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Log the raw input for debugging purposes
logMessage("Raw input: $input");
logMessage("Decoded data: " . print_r($data, true));

// Construct the redirect URL
$redirectUrl = "./booking.php";

// Log the redirect URL
logMessage("Redirecting to: $redirectUrl");

// Redirect to the start_quiz.php page

$b_id = (int) $_SESSION["booking_id"];

$update_query = "UPDATE `tbl_booking` SET `status` = 'confirmed' WHERE `id` = '$b_id'";

$run = mysqli_query($conn, $update_query);

if ($run) {
    $_SESSION["success"] = "Booking Confirmed";
    unset($_SESSION["booking_id"]);
} else {
    $_SESSION["error"] = "Something went wrong";
    unset($_SESSION["booking_id"]);
}

header("Location: $redirectUrl");
exit();