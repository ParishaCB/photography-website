<?php

function connect() {
$mysqlhost = 'localhost';  
$dbname = 'photographyart'; 
$username = 'parisha';
$password = 'ParishaDataBase1234!';

$db = new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

?>

  
 
