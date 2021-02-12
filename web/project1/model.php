<?php

/*
 * Accounts Model
 */

// Register a new client
function regUser($userfirstname, $userlastname, $useremail, $userpassword)
{
    // Create a connection object using the phpmotors connection function
    $db = db_connect();
    // The SQL statement
    $sql = 'INSERT INTO users (userfirstname, userlastname,useremail, userpassword)
        VALUES (:userfirstname, :userlastname, :useremail, :userpassword)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':userfirstname', $userfirstname, PDO::PARAM_STR);
    $stmt->bindValue(':userlastname', $userlastname, PDO::PARAM_STR);
    $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
    $stmt->bindValue(':userpassword', $userpassword, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}


//Check for an existing email address.
function checkExistingEmail($useremail)
{
    // Create a connection object using the phpmotors connection function
    $db =  db_connect();
    // SQL to get the clientEmail database, look in the clients database in the email column. 
    $sql = 'SELECT useremail FROM users WHERE useremail = :email';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // Replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is.
    $stmt->bindValue(':email', $useremail, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // fetching a single row using fetch, using FETCH_NUM to get a simple numeric array. 
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    // Close the database interaction
    $stmt->closeCursor();
    //If $matchEmail is empty return 0, if the array is not empty return 1.
    if (empty($matchEmail)) {
        return 0;
    } else {
        return 1;
    }
}


// Get client data based on an email address
function getClient($useremail)
{
    $db = db_connect();
    $sql = 'SELECT userid, userfirstname, userlastname, useremail, userpassword FROM users WHERE useremail = :useremail';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':useremail', $useremail, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}


   function checkExistingClient($userfirstname) {
    $db =  db_connect();
    $sql = 'SELECT userfirstname FROM users WHERE userfirstname = :userfirstname';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':userfirstname', $userfirstname, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
     return 0;
    } else {
     return 1;
    }
   }


   //Function to check the value of the $useremail variable, after having been sanitized, to see if it "looks" like a valid email address.
function checkEmail($useremail)
{
   $valEmail = filter_var($useremail, FILTER_VALIDATE_EMAIL);
   return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($userpassword)
{
   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
   return preg_match($pattern, $userpassword);
}
