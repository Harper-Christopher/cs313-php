<?php
        session_start();
        require_once 'model.php';
        require_once 'connection.php';
        $db = db_connect();

        $useremail = htmlspecialchars($_POST['useremail']);
        $useremail = checkEmail($useremail);
        $userpassword = htmlspecialchars($_POST['userpassword']);
        $passwordCheck = checkPassword($userpassword);

        // Run basic checks, return if errors
        if (empty($useremail) || empty($passwordCheck)) {
            $message = '<p class="formErrorMessage">Please provide a valid email address and password.</p>';
            include 'login.php';
            exit;
        }

        // A valid password exists, proceed with the login process, Query the user data based on the email address
        $userData = getUser($useremail);
        // Compare the password just submitted against the hashed password for the matching user
        $hashCheck = password_verify($userpassword, $userData['userpassword']);
        // If the hashes don't match create an error and return to the login view
        if (!$hashCheck) {
            $message = '<p class="formErrorMessage">Please check your password and try again.</p>';
            include 'login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array the array_pop function removes the last element from an array
        array_pop($userData);
        // Store the array into the session
        $_SESSION['userData'] = $userData;
        // Place users first name in variable userfirstname when logging in
        $userfirstname = $_SESSION['userData']['userfirstname'];
        $userlastname = $_SESSION['userData']['userlastname'];
        $useremail = $_SESSION['userData']['useremail'];
        $userid = $_SESSION['userData']['userid'];

        include 'browse.php';
        exit;

?>