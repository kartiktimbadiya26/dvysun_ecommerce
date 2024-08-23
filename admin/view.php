<?php

include_once "../database/db.php";
// print_r($_GET);
if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $query = "SELECT * FROM blog WHERE id=$id";
      $result = mysqli_query($conn, $query);
      $data = $result->fetch_assoc();
      print_r($data["description"]);
      // unlink("../assets/images/blog/pushNato-ambiancev3-2-3-large - Copy.avif"); delete image
} else {
      header("location:index.php");
}

?>