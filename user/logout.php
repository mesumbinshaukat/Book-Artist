<?php
session_start();

if (!isset($_COOKIE['login_bool']) || empty($_COOKIE["user_type"])) {
    header("Location: ../signin.php");
    exit();
}

if (isset($_COOKIE["login_bool"]) && !empty($_COOKIE["user_type"]) && !empty($_COOKIE["email"])) {
    $_SESSION["success"] = "Logout Successfull";
    setcookie("login_bool", "", time() - 3600, "/");
    setcookie("user_type", "", time() - 3600, "/");
    setcookie("email", "", time() - 3600, "/");
    header("Location: ../index.php");
    exit();
}
