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

<h1>Login</h1>

  <div class='center'>
  <div class='cartView'>
  <form method="post" action="/accounts/index.php">
                <label for="email">Email: *</label><br>
                <input type="email" id="email" name="clientEmail" <?php if (isset($clientEmail)) {
                                                                        echo "value='$clientEmail'";
                                                                    }  ?> required><br>

                <label for="password">Password: *</label>
                <span class="passwordNote">(Password must have at least 8 characters, 1 uppercase character, 1 number, and 1 special character.)</span><br>
                <input type="password" id="password" name="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br><br>

                <input class="form_button" type="submit" value="Sign In"><br>
                <input type="hidden" name="action" value="Login">
                <input type="button" onclick="location.href='/accounts?action=registration'" value="Create a New Account"><br>
            </form><br>
  </div>
  </div>  
  </main>

</body>

</html>