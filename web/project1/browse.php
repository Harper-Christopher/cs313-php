<?php
// Start the session
session_start();

if(isset($_POST['guitar1'])) {
$_SESSION['guitar1'] = $_POST['guitar1'];
}

if(isset($_POST['guitar2'])) {
  $_SESSION['guitar2'] = $_POST['guitar2'];
  }

  if(isset($_POST['guitar3'])) {
    $_SESSION['guitar3'] = $_POST['guitar3'];
    }

    if(isset($_POST['guitar4'])) {
      $_SESSION['guitar4'] = $_POST['guitar4'];
      }

      if(isset($_POST['guitar5'])) {
        $_SESSION['guitar5'] = $_POST['guitar5'];
        }

        if(isset($_POST['guitar6'])) {
          $_SESSION['guitar6'] = $_POST['guitar6'];
          }

if (isset($_POST['price1'])) {
  $_SESSION['price1'] = $_POST['price1'];
}
if (isset($_POST['price2'])) {
  $_SESSION['price2'] = $_POST['price2'];
}
if (isset($_POST['price3'])) {
  $_SESSION['price3'] = $_POST['price3'];
}
if (isset($_POST['price4'])) {
  $_SESSION['price4'] = $_POST['price4'];
}
if (isset($_POST['price5'])) {
  $_SESSION['price5'] = $_POST['price5'];
}
if (isset($_POST['price6'])) {
  $_SESSION['price6'] = $_POST['price6'];
}


// try {
//   // default Heroku Postgres configuration URL
//   // this is a built in function in php to get the value from an enviornment variable
//   $dbUrl = getenv('DATABASE_URL');

//   //if we are on heroku this will be set otherwise we can check for a local connection
//   //heroku takes care of all of this for us
//   if (!isset($dbUrl) || empty($dbUrl)) {
//       // example localhost configuration URL with 
//       // user: "my_username"
//       // password: "my_password"
//       // database: "my_database"

//       // hardcoded for debugging only not for production site
//       $dbUrl = "postgres://my_username:my_password@localhost:5432/my_database";
//   }

//   // Get the various parts of the DB Connection from the URL
//   $dbopts = parse_url($dbUrl);

//   $dbHost = $dbopts["host"];
//   $dbPort = $dbopts["port"];
//   $dbUser = $dbopts["user"];
//   $dbPassword = $dbopts["pass"];
//   $dbName = ltrim($dbopts["path"],'/');

//   // Create the PDO connection
//   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

//   // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
//   $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//   //Now we can use $db->
//   $statement = $db->prepare('SELECT guitarid, guitarname, price FROM guitar');
//   $statement->execute();

//   // Go through each result
//   while ($row = $statement->fetch(PDO::FETCH_ASSOC))
//   {
//       echo $row['id'];
//   }
// }
// catch (PDOException $ex) {
//   // for debugging only not for production site
//   echo "Error connecting to DB. Details: $ex";
//   die();
// }

// return $db;


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

  <!-- <h1><?php echo $db['guitarname'];?></h1> -->

  <div class="flex">
    <form action="browse.php" method="post">
    <div class="guitarOne">
      <img src="photos/guitarOne.jpg" alt="Guitar One">
      <div class="priceButton">
      <h2 class="h2Shadow">Acoustic Guitar</h2>
      <p class="price">Price: $700</p>
      <input type="hidden" name="guitar1" value="Acoustic Guitar">
      <input type="hidden" name="price1" value="700">
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
      <input type="hidden" name="guitar2" value="Electric Guitar">
      <input type="hidden" name="price2" value="1200">
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
      <input type="hidden" name="guitar3" value="Fender Guitar">
      <input type="hidden" name="price3" value="350">
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
      <input type="hidden" name="guitar4" value="Acoustic-Electric Guitar">
      <input type="hidden" name="price4" value="400">
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
      <input type="hidden" name="guitar5" value="Classical Guitar">
      <input type="hidden" name="price5" value="250">
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
      <input type="hidden" name="guitar6" value="Gibson Guitar">
      <input type="hidden" name="price6" value="900">
      <input type="submit" value="Add To Cart" class="button">
    </form>
    </div>
    </div>
  </div>
  </main>

</body>

</html>


​
