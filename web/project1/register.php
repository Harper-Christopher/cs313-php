<?php

require_once 'connection.php';
$db = db_connect();

        $userfirstname = filter_input(INPUT_POST, 'userfirstname', FILTER_SANITIZE_STRING);
        $userlastname = filter_input(INPUT_POST, 'userlastname', FILTER_SANITIZE_STRING);
        $useremail = filter_input(INPUT_POST, 'useremail', FILTER_SANITIZE_EMAIL);
        $userpassword = filter_input(INPUT_POST, 'userpassword', FILTER_SANITIZE_STRING);

        $useremail = checkEmail($useremail);
        $checkassword = checkPassword($userpassword);

        $existingEmail = checkExistingEmail($useremail);

        // Hash the checked password
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

        // $regOutcome = regUser($userfirstname, $userlastname, $useremail, $hashedPassword);
        

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

function checkExistingEmail($useremail)
{
    // Create a connection object using the connection function
    $db =  db_connect();
    // SQL to get the userEmail database, look in the users database in the email column. 
    $sql = 'SELECT useremail FROM users WHERE useremail = :email';
    // Create the prepared statement using the connection
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

function regUser($userfirstname, $userlastname, $useremail, $userpassword)
{
    // Create a connection object using the connection function
    $db = db_connect();
    // The SQL statement
    $sql = 'INSERT INTO users (userfirstname, userlastname,useremail, userpassword)
        VALUES (:userfirstname, :userlastname, :useremail, :userpassword)';
    // Create the prepared statement using the connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL statement with the actual values in the variables and tells the database the type of data it is
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

?><!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSE 341 | Christopher Harper | BYU-Idaho </title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/small.css">
  <link rel="stylesheet" href="css/middle.css">
</head>

<body>

  <main>

  <div class="cartLink">
  <a href="browse.php">Home</a>
  </div>

  <div class='center'>
  <div class='cartView'>
  <h1>Register</h1>
            
            <form action="login.php" method="post">
                <label for="fname">First Name: *</label><br>
                <input type="text" id="fname" name="userfirstname" <?php if (isset($userfirstname)) {
                                                                            echo "value='$userfirstname'";
                                                                        }  ?> required><br><br>

                <label for="lname">Last Name: *</label><br>
                <input type="text" id="lname" name="userlastname" <?php if (isset($userlastname)) {
                                                                        echo "value='$userlastname'";
                                                                    }  ?> required><br><br>

                <label for="email">Email: *</label><br>
                <input type="email" id="email" name="useremail" <?php if (isset($useremail)) {
                                                                        echo "value='$useremail'";
                                                                    }  ?> required><br><br>

                <label for="password">Password: *</label>
                <span class="passwordNote">(Password must have at least 8 characters, 1 uppercase character, 1 number, and 1 special character.)</span><br>
                <input type="password" id="password" name="userpassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>

                <input class="form_button" type="submit" name="submit" value="Register"><br>
                <input type="hidden" name="action" value="register">
            </form><br>
  </div>
  </div>
  </main>

</body>

</html>