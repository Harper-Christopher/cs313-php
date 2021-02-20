<?php

session_start();

$userid = htmlspecialchars($_GET['userid']);
$userfirstname = htmlspecialchars($_GET['userfirstname']);
$userlastname = htmlspecialchars($_GET['userlastname']);

require_once 'model.php';
require_once 'connection.php';
$db = db_connect();
  
// Send the data to the model
$deleteOutcome = deleteUser($userid);
// Check and report the result
if($deleteOutcome === 1){
    $_SESSION['message'] = "Congratulations, user $userfirstname $userlastname has been deleted."; 
    session_unset();
    session_destroy();
    header('Location: browse.php');
    exit;
 } else {
    $_SESSION['message'] = "Sorry $userfirstname $userlastname, failed to delete. Please try again.";
    include 'userupdate.php';
    exit;
 }

 ?>