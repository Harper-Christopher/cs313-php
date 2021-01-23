<?php

// Start the session
session_start();

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
  <a href="browse.php">Continue Shopping</a>
  <a href="checkout.php">Checkout Now</a>
  </div>

  <div class="center">
  <div class="cartView">
    <h1>Currently in your cart</h1>
    <hr>
    <h2>Item:</h2>
    <?php
    if(isset($_SESSION['guitar'])) {
    echo $_SESSION["guitar"]; 
    }
    else {
    echo "<p>Cart Empty</p>";
    }
    ?>
    <h2>Price:</h2>
    <?php
    if(isset($_SESSION['price'])) {
     echo "<span>$</span>", $_SESSION["price"];
    }
    else {
        echo "<p>N/A</p>";
    }
    ?>

    <form action="cart.php" method="get">
    <br><br><button type="submit" name="unset" value="true">Clear Cart</button>
    </form>
</div>
  </div>

  <?php if (isset($_GET['unset'])) {
      session_unset();
  }
  ?>

  <?php echo "Session";
var_dump($_SESSION); 
?>

  </main>

</body>

</html>