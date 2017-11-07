<?php
  session_start();
  ob_start();

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
