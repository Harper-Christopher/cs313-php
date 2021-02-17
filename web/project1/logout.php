<?php

session_unset();
session_destroy();
header ('Location: browse.php');
exit;

?>

    