<?php

// Start the session
session_start();

if (isset($_POST['address'])) {
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $_SESSION['address'] = $address;
  }

  if (isset($_POST['city'])) {
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $_SESSION['city'] = $city;
  }

  if (isset($_POST['state'])) {
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $_SESSION['state'] = $state;
  }

  if (isset($_POST['zip'])) {
    $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);
    $_SESSION['zip'] = $zip;
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
  <a href="browse.php">Home</a>
  </div>

  <div class="flex">
  <div class="cartView">
  <h1>Purchased!</h1>
  <hr>
    <h2>Item:</h2>
    <?php
    if(isset($_SESSION['guitar'])) {
    echo $_SESSION["guitar"]; 
    }
    else {
    echo "<p>None</p>";
    }
    ?>
    <h2>Price:</h2>
    <?php 
    if(isset($_SESSION['price'])) {
     echo "<span>$</span>", $_SESSION["price"];
    }
    else {
        echo "<p>N/A</p>";
    } ?>
  </div>

  
  <div class="cartView">
    <h1>Shipping to:</h1>
    <hr>
    <h2>Address:</h2>
    <?php 
    if(isset($_SESSION['address'])) {
     echo $_SESSION["address"];
    }
    else {
        echo "<p>N/A</p>";
    } ?>
    <h2>City:</h2>
    <?php 
    if(isset($_SESSION['city'])) {
     echo $_SESSION["city"];
    }
    else {
        echo "<p>N/A</p>";
    } ?>

    <h2>State:</h2>
    <?php 
    if(isset($_SESSION['state'])) {
     echo $_SESSION["state"];
    }
    else {
        echo "<p>N/A</p>";
    } ?>

    <h2>Zip Code:</h2>
    <?php 
    if(isset($_SESSION['zip'])) {
     echo $_SESSION["zip"];
    }
    else {
        echo "<p>N/A</p>";
    } ?>
    </div>
  </div>
  </main>

</body>

</html>