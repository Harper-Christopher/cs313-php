<?php

// Start the session
session_start();

require_once 'connection.php';
$db = db_connect();

if (!isset($_GET['userfirstname'])){
    die("User name undefined.");
}

$userfirstname = htmlspecialchars($_GET['userfirstname']);
$userlastname = htmlspecialchars($_GET['userlastname']);
$userid = htmlspecialchars($_GET['userid']);

$sql = 'SELECT guitar.guitarname, guitar.price FROM guitar INNER JOIN orders ON guitar.guitarid=orders.guitarid WHERE orders.userid = :userid';
$stmt = $db->prepare($sql);
$stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
$stmt->execute();
$userOrders = $stmt->fetch(PDO::FETCH_ASSOC);

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
  <h1>Order History for <?php echo $userfirstname . $userlastname . $userid ?>:</h1>
  <hr>
  <h2>Item:</h2>
  <?php
   echo ['userOrders']['guitar.guitarname']
  ?> 
    <h2>Price:</h2>
    <span>$</span> <?php echo ['userOrders']['guitar.price'] ?>
    
  </div>
  </main>

</body>

</html>