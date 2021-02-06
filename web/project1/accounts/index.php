<?php
session_start();

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}


// Get the database connection file
// Get the accounts model
require_once '../model/accounts-model.php';


switch ($action) {
    case 'login-page':
        include '../login.php';
        break;

    case 'registration':
        include '../register.php';
        break;

    case 'register':
        // Filter and store the data
        $userfirstname = filter_input(INPUT_POST, 'userfirstname', FILTER_SANITIZE_STRING);
        $userlastname = filter_input(INPUT_POST, 'userlastname', FILTER_SANITIZE_STRING);
        $useremail = filter_input(INPUT_POST, 'useremail', FILTER_SANITIZE_EMAIL);
        $userpassword = filter_input(INPUT_POST, 'userpassword', FILTER_SANITIZE_STRING);

        $useremail = checkEmail($useremail);
        $checkassword = checkPassword($userpassword);

        $existingEmail = checkExistingEmail($useremail);

        // Check for existing email address in the table
        if ($existingEmail) {
            $message = '<p class="formErrorMessage">Email address entered already exists. Please use your email to login.</p>';
            include '../login.php';
            exit;
        }

        // Check for missing data
        if (empty($userfirstname) || empty($userlastname) || empty($useremail) || empty($userpassword)) {
            $message = '<p class="formErrorMessage">Please provide information for all empty form fields.</p>';
            include '../registration.php';
            exit;
        }


        // Hash the checked password
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regUser($userfirstname, $userlastname, $useremail, $hashedPassword);

        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $userfirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "Thanks for registering $userfirstname. Please use your email and password to login.";
            header('Location: /accounts/?action=Login');
            exit;
        } else {
            $message = "<p class='formErrorMessage'>Sorry $userfirstname, but the registration failed. Please try again.</p>";
            include '../registration.php';
            exit;
        }
        break;

    case 'Login':
        $useremail = filter_input(INPUT_POST, 'useremail', FILTER_SANITIZE_EMAIL);
        $useremail = checkEmail($useremail);
        $userpassword = filter_input(INPUT_POST, 'userpassword', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($userpassword);

        // Run basic checks, return if errors
        if (empty($useremail) || empty($passwordCheck)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            include '../login.php';
            exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($useremail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($userpassword, $clientData['userpassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;

        // Place clients first name in variable clientFirstname when logging in
        $userfirstname = $_SESSION['clientData']['userfirstname'];


        // Delete cookie by setting the expiration date to a previous time.
        if (isset($_COOKIE['firstname'])) {
            setcookie('firstname', '', strtotime('+1 year'), '/');
        }

        include '../browse.php';
        exit;
        break;
    case 'Logout':
        session_unset();
        session_destroy();
        unset($cookieFirstname);
        header('Location: /browse/');
        exit;
        break;
    default;
    $clientId = $_SESSION['clientData']['clientFirstname']; $_SESSION['clientData']['clientLastname'];
        include '../browse.php';
    break;
}