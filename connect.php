<?php
session_start();

// Global variables
$message = '';

// Connection variables
$server_name = "localhost";
$username = "root";
$password = "root";
$database_name = "ebus";

// Establishing connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (! $conn) {
  die("Connection Error.");
}

?>
