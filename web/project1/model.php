<?php

/*
 * Accounts Model
 */

// Register a new user
function regUser($userfirstname, $userlastname, $useremail, $userpassword)
{
    // Create a connection object using the connection function
    $db = db_connect();
    $sql = 'INSERT INTO users (userfirstname, userlastname, useremail, userpassword)
        VALUES (:userfirstname, :userlastname, :useremail, :userpassword)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userfirstname', $userfirstname, PDO::PARAM_STR);
    $stmt->bindValue(':userlastname', $userlastname, PDO::PARAM_STR);
    $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
    $stmt->bindValue(':userpassword', $userpassword, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}


//Check for an existing email address.
function checkExistingEmail($useremail)
{
    // Create a connection object using the connection function
    $db =  db_connect();
    $sql = 'SELECT useremail FROM users WHERE useremail = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $useremail, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if (empty($matchEmail)) {
        return 0;
    } else {
        return 1;
    }
}


// Get user data based on an email address
function getUser($useremail)
{
    $db = db_connect();
    $sql = 'SELECT userid, userfirstname, userlastname, useremail, userpassword FROM users WHERE useremail = :useremail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userData;
}


//Function to check the value of the $useremail variable, after having been sanitized, to see if it "looks" like a valid email address.
function checkEmail($useremail)
{
   $valEmail = filter_var($useremail, FILTER_VALIDATE_EMAIL);
   return $valEmail;
}

// Check the password for a minimum of 8 characters, at least one 1 capital letter, at least 1 number and at least 1 special character
function checkPassword($userpassword)
{
   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
   return preg_match($pattern, $userpassword);
}


function orderHistory($userid) {

    $db = db_connect();
    $sql = 'SELECT guitar.guitarname, guitar.price FROM guitar INNER JOIN orders ON guitar.guitarid=orders.guitarid WHERE orders.userid = :userid';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userid', $userid, PDO::PARAM_INT);
    $stmt->execute();
    $userOrders = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $userOrders;
}