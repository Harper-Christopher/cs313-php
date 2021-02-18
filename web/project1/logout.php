<?php

session_start();
require_once 'connection.php';
$db = db_connect();

session_unset();
session_destroy();
unset($cookieFirstname);
header('Location: browse.php');
exit;

?>

    