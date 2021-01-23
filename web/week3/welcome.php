<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSE 341 | Christopher Harper | BYU-Idaho </title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/team.css">
</head>

<body>

  <main>
    Welcome <span class="white"><?php echo $_POST["name"]; ?>!</span><br><br>
    Email Address: <span class="white"><?php echo $_POST["email"]; ?></span><br><br>
    Major: <span class="white"><?php echo $_POST["major"]; ?></span><br><br>
    Comments: <span class="white"><?php echo $_POST["comment"]; ?></span><br><br>
    Continents Visited:<br> <span class="white"><?php
$checkboxes = isset($_POST['location']) ? $_POST['location'] : array();
foreach($checkboxes as $value) {
    echo $value; 
    echo "<br>";
}
?></span> 
    
  </main>

</body>

</html>

<!-- <?php 
// First let's process all the input

// using constants for the names of the elements in the form would be better...

// It would also be better to use an ID of some sort for the
// value that is submitted such as "cs" as opposed to "Computer Science",
// then in PHP we could process that value and determine the exact
// presentation text to render.
// $name = htmlspecialchars($_POST["name"]);
// $email = htmlspecialchars($_POST["email"]);
// $major = htmlspecialchars($_POST["major"]);
// $places = $_POST["places"];
// $comments = htmlspecialchars($_POST["comments"]);

// ?>
// <!DOCTYPE html>
// <html>
// <head>
// 	<title>Submission Results</title>
// </head>

// <body>
// 	<h1>Submission Results</h1>

// 	<p>Your name is: <?=$name ?></p>
// 	<p>Your email is: <a href="mailto:<?=$email ?>"><?=$email ?></a></p>
// 	<p>Your major is: <?=$major ?></p>
// 	<p>You have been to the following places:</p>
// 	<ul>

// <?
// foreach ($places as $place)
// {
// 	$place_clean = htmlspecialchars($place);
// 	echo "<li><p>$place_clean</p></li>";
// }
// ?>		

// 	</ul>

// 	<p>Comments: <?=$comments?></p>

// </body>


// </html>