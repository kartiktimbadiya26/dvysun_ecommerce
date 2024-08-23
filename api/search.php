<?php
include_once "database/db.php";
if (isset($_GET["search"])) {
      $se = mysqli_real_escape_string($conn, $_GET["search"]);
      $query = "SELECT * FROM product WHERE name LIKE '%" . $se . "%'";
      $result = mysqli_query($conn, $query);
      if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            print_r($row);
            $id = $row["id"];
            header("location:product-details.php?id=$id");
      } else {
            header("location:index.php");
      }
} else {
      header("location:index.php");
}

?>