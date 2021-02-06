<?php

// Start the session
session_start();

require_once 'connection.php';
$db;

    if(isset($_POST['address'])) {
    $_SESSION['address'] = $_POST['address'];
    }
    
    if (isset($_POST['city'])) {
      $_SESSION['city'] = $_POST['city'];
    }

    if(isset($_POST['state'])) {
    $_SESSION['state'] = $_POST['state'];
    }
    
    if (isset($_POST['zip'])) {
      $_SESSION['zip'] = $_POST['zip'];
    }
    

?><!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSE 341 | Christopher Harper | BYU-Idaho </title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/small.css">
</head>

<body>

  <main>

  <div class="cartLink">
  <a href="cart.php">Return to Cart</a>
  </div>

  <div class="cartView">
  <form action="confirmation.php" method="post">
    <h1>Ship to address</h1>
    <hr>
    <h2>Address:</h2>
    <input type="text" name="address" placeholder="Street address" required>
    <h2>City:</h2>
    <input type="text" name="city" required>
    <h2>State:</h2>
    <input type="text" name="state" required>
    <h2>ZIP Code:</h2>
    <input type="text" name="zip" required><br><br>
    <input type="submit" value="Complete Purchase" class="button">
    </form>
  </div>
   
  </main>

</body>

</html>