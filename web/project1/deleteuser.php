<?php

session_start();

$userid = htmlspecialchars($_POST['userid']);
$userfirstname = htmlspecialchars($_POST['userfirstname']);
$userlastname = htmlspecialchars($_POST['userlastname']);

require_once 'model.php';
require_once 'connection.php';
$db = db_connect();
  
// Send the data to the model
$deleteOutcome = deleteUser($userid);
// Check and report the result
if($deleteOutcome === 1){
    $_SESSION['message'] = "Congratulations, user $userfirstname $userlastname has been deleted.";
    include 'browse.php';
    exit;
 } else {
    $_SESSION['message'] = "Sorry $userfirstname $userlastname, failed to delete. Please try again.";
    include 'userupdate.php';
    exit;
 }

 ?>