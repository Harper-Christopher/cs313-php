<?php
/*
 * Proxy connection to the cs341 database
 */

    // try {
    //     // default Heroku Postgres configuration URL
    //     // this is a built in function in php to get the value from an enviornment variable
    //     $dbUrl = getenv('DATABASE_URL');

    //     //if we are on heroku this will be set otherwise we can check for a local connection
    //     //heroku takes care of all of this for us
    //     if (!isset($dbUrl) || empty($dbUrl)) {
    //         // example localhost configuration URL with 
    //         // user: "my_username"
    //         // password: "my_password"
    //         // database: "my_database"

    //         // hardcoded for debugging only not for production site
    //         $dbUrl = "postgres://my_username:my_password@localhost:5432/my_database";
    //     }

    //     // Get the various parts of the DB Connection from the URL
    //     $dbopts = parse_url($dbUrl);

    //     $dbHost = $dbopts["host"];
    //     $dbPort = $dbopts["port"];
    //     $dbUser = $dbopts["user"];
    //     $dbPassword = $dbopts["pass"];
    //     $dbName = ltrim($dbopts["path"],'/');

    //     // Create the PDO connection
    //     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    //     // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
    //     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    //     //Now we can use $db->
    //     $statement = $db->prepare('SELECT guitarid, guitarname, price FROM guitar');
    //     $statement->execute();

    //     // Go through each result
    //     while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    //     {
    //         echo $row['id'];
    //     }
    // }
    // catch (PDOException $ex) {
    //     // for debugging only not for production site
    //     echo "Error connecting to DB. Details: $ex";
    //     die();
    // }

    // return $db;






   //  function LocalMySQL() {
   //    try {
   //      // Set Database Credentials
   //      $dbHost = 'localhost';
   //      $dbName = 'XXXXXXXXXX';
   //      $dbUser = 'iClient';
   //      $dbPassword = 'XXXXXXXXXX';
   //      // Tell PDO to give us exception errors for debugging in needed
   //      $dbOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
   //      // Create the PDO connection for MySQL
   //      $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword, $dbOptions);
   //      return $db;
   //    } catch(PDOException $e) {
   //      echo 'Error connecting to DB.';
   //      echo 'Details: '.$e; #<-------- for debugging only not for production site (remove me)
   //      exit;
   //    }
   //  }
   //  ​
   //  function HerokuPostgres() {
   //    try {
   //      // Default Heroku Postgres configuration URL
   //      $dbUrl = getenv('DATABASE_URL');
   //      // Get the various parts of the DB Connection from the URL
   //      $dbopts = parse_url($dbUrl);
   //      $dbHost = $dbopts["host"];
   //      $dbPort = $dbopts["port"];
   //      $dbUser = $dbopts["user"];
   //      $dbPassword = $dbopts["pass"];
   //      $dbName = ltrim($dbopts["path"],'/');
   //      // Tell PDO to give us exception errors for debugging in needed
   //      $dbOptions = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
   //      // Create the PDO connection for PGSQL
   //      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword, $dbOptions);
   //      return $db;
   //    }
   //    catch (PDOException $e) {
   //      echo 'Error connecting to DB.';
   //      echo 'Details: '.$e; #<-------- for debugging only not for production site (remove me)
   //      exit;
   //    }
   //  }
   //  ​
   //  // Use this function to connect database
   //  function dbConnect() {
   //    // Check for xampp folder installations using regex
   //    if(preg_match("/C:\/xampp\/htdocs/", $_SERVER["DOCUMENT_ROOT"])) {
   //      return LocalMySQL();
   //    } else {
   //      return HerokuPostgres();
   //    }
   //  }
    

function db_connect() {
   $db = NULL;
   
try {
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

return $db;
}


