<?php

// Start the session
session_start();

require_once 'connection.php';
$db;

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
  <a href="browse.php">Continue Shopping</a>
  <a href="checkout.php">Checkout Now</a>
  </div>

  <div class="center">
  <?php
  if(isset($_SESSION['guitar1'])) {
  echo "<div class='center'>";
  echo "<div class='cartView'>";

 
    echo "<h1>Currently in your cart</h1>";
    echo "<hr>";
    echo "<h2>Item:</h2>";
    
    echo $_SESSION["guitar1"]; 
    
    echo "<h2>Price:</h2>";
    
     echo "<span>$</span>", $_SESSION["price1"];
    

    echo "<form action='cart.php' method='get'>";
    echo "<br><br><button type='submit' name='unset1' value='true'>Delete Item</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }
  ?>

<?php
  if(isset($_SESSION['guitar2'])) {
  echo "<div class='center'>";
  echo "<div class='cartView'>";

 
    echo "<h1>Currently in your cart</h1>";
    echo "<hr>";
    echo "<h2>Item:</h2>";
    
    echo $_SESSION["guitar2"]; 
    
    echo "<h2>Price:</h2>";
    
     echo "<span>$</span>", $_SESSION["price2"];
    

    echo "<form action='cart.php' method='get'>";
    echo "<br><br><button type='submit' name='unset2' value='true'>Delete Item</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }
  ?>

<?php
  if(isset($_SESSION['guitar3'])) {
  echo "<div class='center'>";
  echo "<div class='cartView'>";

 
    echo "<h1>Currently in your cart</h1>";
    echo "<hr>";
    echo "<h2>Item:</h2>";
    
    echo $_SESSION["guitar3"]; 
    
    echo "<h2>Price:</h2>";
    
     echo "<span>$</span>", $_SESSION["price3"];
    

    echo "<form action='cart.php' method='get'>";
    echo "<br><br><button type='submit' name='unset3' value='true'>Delete Item</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }
  ?>

<?php
  if(isset($_SESSION['guitar4'])) {
  echo "<div class='center'>";
  echo "<div class='cartView'>";

 
    echo "<h1>Currently in your cart</h1>";
    echo "<hr>";
    echo "<h2>Item:</h2>";
    
    echo $_SESSION["guitar4"]; 
    
    echo "<h2>Price:</h2>";
    
     echo "<span>$</span>", $_SESSION["price4"];
    

    echo "<form action='cart.php' method='get'>";
    echo "<br><br><button type='submit' name='unset4' value='true'>Delete Item</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }
  ?>

<?php
  if(isset($_SESSION['guitar5'])) {
  echo "<div class='center'>";
  echo "<div class='cartView'>";

 
    echo "<h1>Currently in your cart</h1>";
    echo "<hr>";
    echo "<h2>Item:</h2>";
    
    echo $_SESSION["guitar5"]; 
    
    echo "<h2>Price:</h2>";
    
     echo "<span>$</span>", $_SESSION["price5"];
    

    echo "<form action='cart.php' method='get'>";
    echo "<br><br><button type='submit' name='unset5' value='true'>Delete Item</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }

  ?>

<?php
  if(isset($_SESSION['guitar6'])) {
  echo "<div class='center'>";
  echo "<div class='cartView'>";

 
    echo "<h1>Currently in your cart</h1>";
    echo "<hr>";
    echo "<h2>Item:</h2>";
    
    echo $_SESSION["guitar6"]; 
    
    echo "<h2>Price:</h2>";
    
     echo "<span>$</span>", $_SESSION["price6"];
    

    echo "<form action='cart.php' method='get'>";
    echo "<br><br><button type='submit' name='unset6' value='true'>Delete Item</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }
  ?>
  </div>

  <?php if (isset($_GET['unset1'])) {
      unset($_SESSION['guitar1']);
      unset($_SESSION['price1']);
      header('location: cart.php');
  }
  ?>

<?php if (isset($_GET['unset2'])) {
      unset($_SESSION['guitar2']);
      unset($_SESSION['price2']);
      header('location: cart.php');
  }
  ?>

<?php if (isset($_GET['unset3'])) {
      unset($_SESSION['guitar3']);
      unset($_SESSION['price3']);
      header('location: cart.php');
  }
  ?>

<?php if (isset($_GET['unset4'])) {
      unset($_SESSION['guitar4']);
      unset($_SESSION['price4']);
      header('location: cart.php');
  }
  ?>

<?php if (isset($_GET['unset5'])) {
      unset($_SESSION['guitar5']);
      unset($_SESSION['price5']);
      header('location: cart.php');
  }
  ?>

<?php if (isset($_GET['unset6'])) {
      unset($_SESSION['guitar6']);
      unset($_SESSION['price6']);
      header('location: cart.php');
  }
  ?>

  <!-- <?php echo "Session";
var_dump($_SESSION); 
?> -->

  </main>

</body>

</html>