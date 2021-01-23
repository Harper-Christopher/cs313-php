<?php
// Start the session
session_start();

if(isset($_POST['item'])) {
$_SESSION['guitar'] = $_POST['item'];
}

if (isset($_POST['price'])) {
  $_SESSION['price'] = $_POST['price'];
}

?><!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSE 341 | Christopher Harper | BYU-Idaho </title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/small.css">
  <link rel="stylesheet" href="css/middle.css">
</head>

<body>

  <main>

  <div class="cartLink">
  <a href="cart.php">View Shopping Cart</a>
  </div>

  <div class="flex">
    <form action="browse.php" method="post">
    <div class="guitarOne">
      <img src="photos/guitarOne.jpg" alt="Guitar One">
      <div class="priceButton">
      <h2 class="h2Shadow">Acoustic Guitar</h2>
      <p class="price">Price: $700</p>
      <input type="hidden" name="item" value="Acoustic Guitar">
      <input type="hidden" name="price" value="700">
      <input type="submit" value="Add To Cart" class="button">
    </form>
    </div>
    </div>

    <form action="browse.php" method="post">
    <div class="guitarTwo">
      <img src="photos/guitarTwo.jpg" alt="Guitar Two">
      <div class="priceButton">
      <h2 class="h2Shadow">Electric Guitar</h2>
      <p class="price">Price: $1,200</p>
      <input type="hidden" name="item" value="Electric Guitar">
      <input type="hidden" name="price" value="1200">
      <input type="submit" value="Add To Cart" class="button">
    </form>
    </div>
    </div>

    <form action="browse.php" method="post">
    <div class="guitarThree">
      <img src="photos/guitarThree.jpg" alt="Guitar Three">
      <div class="priceButton">
      <h2 class="h2Shadow">Fender Guitar</h2>
      <p class="price">Price: $350</p>
      <input type="hidden" name="item" value="Fender Guitar">
      <input type="hidden" name="price" value="350">
      <input type="submit" value="Add To Cart" class="button">
    </form>
    </div>
    </div>
  </div>

  <div class="flex">
  <form action="browse.php" method="post">
    <div class="guitarFour">
      <img src="photos/guitarFour.jpg" alt="Guitar Four">
      <div class="priceButton">
      <h2 class="h2Shadow">Acoustic-Electric Guitar</h2>
      <p class="price">Price: $400</p>
      <input type="hidden" name="item" value="Acoustic-Electric Guitar">
      <input type="hidden" name="price" value="400">
      <input type="submit" value="Add To Cart" class="button">
    </form>
    </div>
    </div>

    <form action="browse.php" method="post">
    <div class="guitarFive">
      <img src="photos/guitarFive.jpg" alt="Guitar Five">
      <div class="priceButton">
      <h2 class="h2Shadow">Classical Guitar</h2>
      <p class="price">Price: $250</p>
      <input type="hidden" name="item" value="Classical Guitar">
      <input type="hidden" name="price" value="250">
      <input type="submit" value="Add To Cart" class="button">
    </form>
    </div>
    </div>

    <form action="browse.php" method="post">
    <div class="guitarSix">
      <img src="photos/guitarSix.jpg" alt="Guitar Six">
      <div class="priceButton">
      <h2 class="h2Shadow">Gibson Guitar</h2>
      <p class="price">Price: $900</p>
      <input type="hidden" name="item" value="Gibson Guitar">
      <input type="hidden" name="price" value="900">
      <input type="submit" value="Add To Cart" class="button">
    </form>
    </div>
    </div>
  </div>
  </main>

</body>

</html>


​
