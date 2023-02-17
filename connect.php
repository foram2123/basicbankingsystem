<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$db_connect = mysqli_connect($servername, $username, $password, "bankingsystem");

// Check connection
if (!$db_connect) {
  die("Connection failed: " . mysqli_connect_error());
}

?>