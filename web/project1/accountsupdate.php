<?php

session_start();

$userid = htmlspecialchars($_POST['userid']);
$userpassword = htmlspecialchars($_POST['userpassword']);

require_once 'model.php';
require_once 'connection.php';
$db = db_connect();

$checkPassword = checkPassword($userpassword);

// Hash the checked password
$hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);
  
// Send the data to the model
$passwordOutcome = passwordUpdate($hashedPassword, $userid);
// Check and report the result
if($passwordOutcome === 1){
    $_SESSION['message'] = "Congratulations, the password for user $userfirstname $userlastname was successfully updated.";
    include 'login.php';
    exit;
 } else {
    $_SESSION['message'] = "Sorry $userfirstname $userlastname, but the password update failed. Please try again.";
    include 'userupdate.php';
    exit;
 }

 ?>