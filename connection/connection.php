<?php
require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looking for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__ . '/..'));
$dotenv->load();

// Retrive env variable
$hostname = $_ENV['hostname'];
$username = $_ENV['username'];
$password = $_ENV['password'];
$dbname = $_ENV['database_name'];
$port = $_ENV['port'];

// $conn = mysqli_connect("localhost", "root", "", "db_artist", 3306) or die("Connection failed: " . mysqli_connect_error());

$conn = mysqli_connect($hostname, $username, $password, $dbname, $port) or die("Connection failed: " . mysqli_connect_error());
