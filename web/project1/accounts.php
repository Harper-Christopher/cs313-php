<?php

require_once 'model.php';
require_once 'connection.php';
$db = db_connect();

$userfirstname = htmlspecialchars($_POST['userfirstname']);
$userlastname = htmlspecialchars($_POST['userlastname']);
$useremail = htmlspecialchars($_POST['useremail']);
$userpassword = htmlspecialchars($_POST['userpassword']);

$stmt = $db->prepare('INSERT INTO users (userfirstname, userlastname, useremail, userpassword)
VALUES (:userfirstname, :userlastname, :useremail, :userpassword);');
$stmt->bindValue(':userfirstname', $userfirstname, PDO::PARAM_STR);
$stmt->bindValue(':userlastname', $userlastname, PDO::PARAM_STR);
$stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
$stmt->bindValue(':userpassword', $userpassword, PDO::PARAM_STR);
$stmt->execute();

$page = 'login.php';

header("Location: $page");
die();

?>