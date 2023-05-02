<?php
function connect() {
  $username = 'root';
  $password = '';
  $mysqlhost = 'localhost';
  $dbname = 'photographyart';

  $pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);
  if ( $pdo) {
    // make errors throw exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } else {
    die("Could not create PDO connection.");
  }
}

?>
