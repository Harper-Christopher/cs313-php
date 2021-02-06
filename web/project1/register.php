<!DOCTYPE html>
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
            
            <form action="accounts/index.php" method="post">
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

                <input id="form_button" type="submit" name="submit" value="Register"><br>
                <input type="hidden" name="action" value="register">
            </form><br>
  </div>
  </div>
  </main>

</body>

</html>