<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSE 341 | Christopher Harper | BYU-Idaho </title>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/middle.css">
  <link rel="stylesheet" href="css/team.css">
</head>

<body>

  <main>
    <form action="welcome.php" method="post">
    Name: <input type="text" name="name"><br><br>
    E-Mail: <input type="text" name="email"><br><br>
    Major: <br><input type="radio" value="Computer Science" name="major">Computer Science</br>
           <input type="radio" value="Web Design and Development" name="major">Web Design and Development<br>
           <input type="radio" value="Computer Information Technology" name="major">Computer Information Technology<br>
           <input type="radio" value="Computer Engineering" name="major">Computer Engineering<br><br>
    Comments: <br><textarea name="comment" placeholder="Enter text here..."></textarea><br><br>
    Continents Visited: <br>
        <input type="checkbox" id="NA" name="location[]" value="North America"/>
        <label for="NA">North America</label><br />
        <input type="checkbox" id="SA" name="location[]" value="South America"/>
        <label for="SA">South America</label><br />
        <input type="checkbox" id="EU" name="location[]" value="Europe"/>
        <label for="EU">Europe</label><br />
        <input type="checkbox" id="AS" name="location[]" value="Asia"/>
        <label for="AS">Asia</label><br />
        <input type="checkbox" id="AU" name="location[]" value="Australia"/>
        <label for="AU">Australia</label><br />
        <input type="checkbox" id="AFR" name="location[]" value="Africa"/>
        <label for="AFR">Africa</label><br />
        <input type="checkbox" id="ANT" name="location[]" value="Antarctica"/>
        <label for="ANT">Antarctica</label><br><br>

    <input type="submit">
    </form>
  </main>

</body>

</html>

<!-- <!DOCTYPE html>
<html>
	<head>
		<title>PHP Form Submission Activity</title>
	</head>

	<body>
		<form method="POST" action="results.php">
			<p>Please answer the following questions:</p>

			<label for="name">Name</label>
			<input type="text" placeholder="Name" id="name" name="name">
			<br />

			<label for="email">Email</label>
			<input type="text" placeholder="Email Address" id="email" name="email">
			<br />

			Major:<br />
		   Notice that each radio button has the same name, but
			different a different id -->
			<!-- <input type="radio" name="major" value="Computer Science" id="major-cs"><label for="major-cs">Computer Science</label><br />
			<input type="radio" name="major" value="Web Design and Development" id="major-wdd"><label for="major-wdd">Web Design and Development</label><br />
			<input type="radio" name="major" value="Computer Information Technology" id="major-cit"><label for="major-cit">Computer Information Technology</label><br />
			<input type="radio" name="major" value="Computer Engineering" id="major-ce"><label for="major-ce">Computer Engineering</label><br />
			<br /> -->

			<!-- Notice that each checkbox has the same name and that there are square brackets, []'s, in the name. This tells PHP that they should treated as an array of values -->
			<!-- What continents have you visited?<br />
			<input type="checkbox" name="places[]" id="place-na" value="North America"><label for="place-na">North America</label><br />
			<input type="checkbox" name="places[]" id="place-sa" value="South America"><label for="place-sa">South America</label><br />
			<input type="checkbox" name="places[]" id="place-asia" value="Asia"><label for="place-asia">Asia America</label><br />
			<input type="checkbox" name="places[]" id="place-eu" value="Europe"><label for="place-eu">Europe</label><br />
			<input type="checkbox" name="places[]" id="place-af" value="Africa"><label for="place-af">Africa</label><br />
			<input type="checkbox" name="places[]" id="place-aus" value="Australia"><label for="place-aus">Australia</label><br />
			<input type="checkbox" name="places[]" id="place-ant" value="Antarctica"><label for="place-ant">Antarctica</label><br />
			<br />

			<label for="comments">Comments:</label><br />
			<textarea id="comments" name="comments" rows="4" cols="50"></textarea>
			<br />
			<input type="submit" value="Submit Answers">


		</form>

	</body>

</html> --> 