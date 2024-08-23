<?php
session_start();
include 'database/db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user_id = $_SESSION['userId'];
      $product_id = intval($_POST['id']);
      $quantity = intval($_POST['quantity']);

      $query = "UPDATE cart SET quantity=? WHERE user_id=? AND id=?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param('iii', $quantity, $user_id, $product_id);
      if ($stmt->execute()) {
            echo "Quantity updated successfully!";
      } else {
            echo "Error updating quantity.";
      }
}
