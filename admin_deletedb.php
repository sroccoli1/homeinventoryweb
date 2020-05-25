<?php

/* PURPOSE: 
Utilities for creating Table table.

Should store Item, which is a composite object (arrays of Identiers, Names...) be a replacement of arrays; hopefully
*/

$servername = "localhost:3308";// This had to be set to:3308 on this Win 10 WAMP install
$username = "root";
$password = "";
// $conn = ""; 

echo "DB deletion script!<br>";

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create JSON table
    $sql = "DROP DATABASE IF EXISTS homeinventorydevdb";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<br>Databse dropped successfully!";
}
catch(PDOException $e){
  //display a user friendly message
  
  //if code:2002, message = the connection to the database could not be done. Check the connection parameters, check if the database has been created.
  if($e->getCode() == 2002){
	echo $sql ."<br> Code: " . $e->getCode() . "<br>The connection to the database could not be done. Check the connection parameters with your database admin." . $e->getMessage();
  }
  else{
	echo $sql ."<br> Error Message: " . $e->getMessage();
  }
}

$conn = null;
?>
