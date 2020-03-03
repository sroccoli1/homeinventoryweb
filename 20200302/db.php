<?php
/*
Project: Home Inventory Helper
Project version : 0.1

PURPOSE
Database connection
*/

$servername = "localhost";
$username = "homeinventorydev";
$password = "855265600PLk";
$dbname = "homeinventorydevdb";
// $conn = ""; 

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception	
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
  
  //display a user friendly message
  
  //if code:2002, message = the connection to the database could not be done. Check the connection parameters, check if the database has been created.
  if($e->getCode() == 2002){
  	echo $sql ."<br> Code: " . $e->getCode() . "<br>The connection to the database could not be done. Check the connection parameters, check if the database has been created." . $e->getMessage();
  }

}// exception handling ends here

?>