<?php

require_once 'model.php';
require_once 'connection.php';
$db = db_connect();

$userfirstname = htmlspecialchars($_POST['userfirstname']);
$userlastname = htmlspecialchars($_POST['userlastname']);
$useremail = htmlspecialchars($_POST['useremail']);
$userpassword = htmlspecialchars($_POST['userpassword']);



        $useremail = checkEmail($useremail);
        $checkassword = checkPassword($userpassword);

        $existingEmail = checkExistingEmail($useremail);

        // Check for existing email address in the table
        if ($existingEmail) {
            $message = '<p class="formErrorMessage">Email address entered already exists. Please use your email to login.</p>';
            include 'login.php';
            die();
        }

        // Check for missing data
        if (empty($userfirstname) || empty($userlastname) || empty($useremail) || empty($userpassword)) {
            $message = '<p class="formErrorMessage">Please provide information for all empty form fields.</p>';
            include 'register.php';
            die();
        }


        // Hash the checked password
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regUser($userfirstname, $userlastname, $useremail, $hashedPassword);

        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $userfirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "Thanks for registering $userfirstname. Please use your email and password to login.";
            header('Location: login.php');
            die();
        } else {
            $message = "<p class='formErrorMessage'>Sorry $userfirstname, but the registration failed. Please try again.</p>";
            include 'register.php';
            die();
        }
?>