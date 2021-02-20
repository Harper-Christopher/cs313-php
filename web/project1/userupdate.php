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
  <?php $_SESSION['message'] ?>
  <h1>Update user password for <?php echo $userfirstname . $userlastname ?>:</h1>
  <hr>
  <h2>Update Password:</h2>
  <form method="POST" action="accountsupdate.php">
   <label for="password">Update Password: *</label>
                <span class="passwordNote">(Password must have at least 8 characters, 1 uppercase character, 1 number, and 1 special character.)</span><br>
                <input type="password" id="password" name="userpassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                <input class="form_button" type="submit" name="submit" value="Update Password"><br>
                <input type="hidden" name="userid" <?php if(isset($userid)){ echo "value='$userid'"; }?>>
   </form>
    
  </div>
  </main>

</body>

</html>