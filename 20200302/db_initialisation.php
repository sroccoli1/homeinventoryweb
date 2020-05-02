<?php

echo "Scripts for database, user, and tables creation.<br>";

try {
 require 'createdb.php'; 
 require 'createuser.php'; 
 require 'createtables.php';
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
?>