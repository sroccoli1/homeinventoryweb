<?php
$servername = "localhost:3308";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql = "CREATE USER 'homeinventorydev'@'localhost' IDENTIFIED WITH mysql_native_password BY 'xFog2f8NIrP6MGpl';GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON *.* TO 'homeinventorydev'@'localhost';ALTER USER 'homeinventorydev'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";



	$conn->exec($sql);
    echo "<br>User <strong>homeinventorydev</strong> created successfully!<br>";

}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>