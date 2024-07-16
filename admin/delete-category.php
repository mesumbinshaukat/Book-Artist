<?php
session_start();
include("../connection/connection.php");

$id = (int) $_GET['id'] ?? 0;
$query = "DELETE FROM `tbl_category` WHERE id = '$id'";
$result = $conn->query($query);
if ($result) {
    $_SESSION['success'] = "Category Deleted";
    header("Location: category.php");
    exit();
} else {
    $_SESSION['error'] = "Something went wrong";
    header("Location: category.php");
    exit();
}
