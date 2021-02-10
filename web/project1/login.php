<?php
// require_once 'accounts.php';
require_once 'connection.php';
$db = db_connect();

$useremail = filter_input(INPUT_POST, 'useremail', FILTER_SANITIZE_EMAIL);
$useremail = checkEmail($useremail);
$userpassword = filter_input(INPUT_POST, 'userpassword', FILTER_SANITIZE_STRING);
$passwordCheck = checkPassword($userpassword);

// Run basic checks, return if errors
// if (empty($useremail) || empty($passwordCheck)) {
//     $message = '<p class="notice">Please provide a valid email address and password.</p>';
//     include 'login.php';
//     exit;
// }

// // A valid password exists, proceed with the login process
// // Query the client data based on the email address
// $clientData = getClient($useremail);
// // Compare the password just submitted against
// // the hashed password for the matching client
// $hashCheck = password_verify($userpassword, $clientData['userpassword']);
// // If the hashes don't match create an error
// // and return to the login view
// if (!$hashCheck) {
//     $message = '<p class="notice">Please check your password and try again.</p>';
//     include 'login.php';
//     exit;
// }
// // A valid user exists, log them in
// $_SESSION['loggedin'] = TRUE;
// // Remove the password from the array
// // the array_pop function removes the last
// // element from an array
// array_pop($clientData);
// // Store the array into the session
// $_SESSION['clientData'] = $clientData;

// // Place clients first name in variable clientFirstname when logging in
// $userfirstname = $_SESSION['clientData']['userfirstname'];

// // Get client data based on an email address
// function getClient($useremail)
// {
//     $db = db_connect();
//     $sql = 'SELECT userid, userfirstname, userlastname, useremail, userpassword FROM users WHERE useremail = :useremail';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
//     $stmt->execute();
//     $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
//     $stmt->closeCursor();
//     return $clientData;
// }

   //Function to check the value of the $useremail variable, after having been sanitized, to see if it "looks" like a valid email address.
   function checkEmail($useremail)
   {
      $valEmail = filter_var($useremail, FILTER_VALIDATE_EMAIL);
      return $valEmail;
   }
   
   // Check the password for a minimum of 8 characters,
   // at least one 1 capital letter, at least 1 number and
   // at least 1 special character
   function checkPassword($userpassword)
   {
      $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
      return preg_match($pattern, $userpassword);
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
  <a href="browse.php">Home</a>
  </div>



  <div class='center'>
  <div class='cartView'>
  <h1>Login</h1>
  <p><?php $message; ?></p>
  <form method="post" action="/project1/accounts/index.php">
                <label for="email">Email: *</label><br>
                <input type="email" id="email" name="clientEmail" <?php if (isset($clientEmail)) {
                                                                        echo "value='$clientEmail'";
                                                                    }  ?> required><br><br>

                <label for="password">Password: *</label>
                <span class="passwordNote">(Password must have at least 8 characters, 1 uppercase character, 1 number, and 1 special character.)</span><br>
                <input type="password" id="password" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>

                <input class="form_button" type="submit" value="Sign In"><br>
                <input type="hidden" name="action" value="Login">
                <input type="button" onclick="location.href='/project1/register.php'" value="Create a New Account"><br>
            </form><br>
  </div>
  </div>  
  </main>

</body>

</html>