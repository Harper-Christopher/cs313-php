<?php

require_once 'connection.php';
$db = db_connect();

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
  <a href="browse.php">Home</a>
  </div>



  <div class='center'>
  <div class='cartView'>
  <h1>Login</h1>
  <p class="formErrorMessage"><?php $message; $_SESSION['message'] ?></p><br>
  <form method="post" action="accountslogin.php">
                <label for="email">Email: *</label><br>
                <input type="email" id="email" name="useremail" <?php if (isset($useremail)) {
                                                                        echo "value='$useremail'";
                                                                    }  ?> required><br><br>

                <label for="password">Password: *</label>
                <span class="passwordNote">(Password must have at least 8 characters, 1 uppercase character, 1 number, and 1 special character.)</span><br>
                <input type="password" id="password" name="userpassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>

                <input class="form_button" type="submit" value="Sign In"><br>
                <input type="hidden" name="action" value="Login">
                <input type="button" onclick="location.href='/project1/register.php'" value="Create a New Account"><br>
            </form><br>
  </div>
  </div> 
  </main>

</body>

</html>