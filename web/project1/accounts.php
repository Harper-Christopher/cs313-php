<?php

$userfirstname = htmlspecialchars($_POST['userfirstname']);
$userlastname = htmlspecialchars($_POST['userlastname']);
$useremail = htmlspecialchars($_POST['useremail']);
$userpassword = htmlspecialchars($_POST['userpassword']);

echo "$userfirstname\n";
echo "$userlastname\n";
echo "$useremail\n";
echo "$userpassword\n";

?>