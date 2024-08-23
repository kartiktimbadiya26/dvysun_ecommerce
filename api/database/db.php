<?php

// Start a session if not already started
if (session_status() == PHP_SESSION_NONE) {
      session_start();
}

$servername = "sql110.infinityfree.com";
$username = "if0_37143630";
$password = "Aot2mNp4NWVBlLD";
$dbname = "if0_37143630_dvysun";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

$user = false;
$user_id = false;
if (isset($_SESSION["user"])) {
      $user = $_SESSION["user"];
}
if (isset($_SESSION["userId"])) {
      $user_id = $_SESSION["userId"];
}

?>