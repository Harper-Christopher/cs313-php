<?php

// Start the session
session_start();

require_once 'model.php';
require_once 'connection.php';
$db = db_connect();

if (!isset($_GET['userfirstname'])){
    die("User name undefined.");
}

$userfirstname = htmlspecialchars($_GET['userfirstname']);
$userlastname = htmlspecialchars($_GET['userlastname']);
$userid = htmlspecialchars($_GET['userid']);

$userOrders = orderHistory($userid);

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

  <div class="cartView">
  <h1>Order History for <?php echo $userfirstname . $userlastname ?>:</h1>
  <hr>
  <h2>Item:</h2>
  
    <h2>Price:</h2>
    <span>$</span> 
    
  </div>
  </main>

</body>

</html>