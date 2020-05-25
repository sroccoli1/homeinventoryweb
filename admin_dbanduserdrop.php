<?php

echo "Scripts for database, user, and tables deletion.<br>";

try {
 require 'deletedb.php'; 
 require 'deleteuser.php'; 
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
?>