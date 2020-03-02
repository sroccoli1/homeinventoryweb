<?php
/*
Project: Home Inventory Helper
Project version : 0.1

PURPOSE
Database connection
*/

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "myDBPDO";
// $conn = ""; 

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception	
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
  echo $sql . "<br>connection failed" . $e->getMessage() . "<br> code: " . $e->getCode();
}// exception handling ends here

?>