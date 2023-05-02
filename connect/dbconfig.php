<?php 
  require_once( 'dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Database Connection Test</title>
</head>
<body>

<style>
    body {
        background-color: #28a146;
        color: white;
        font-family: 'Lucida Bright';
    }
</style>

<?php

$pdo = connect();

if ( $pdo) {
  print "<h1>Successfully connected!</h1>\n";
} else {
  print "<h1>Could not connect. Try again.</h1>\n";
}

?>

</body>
</html>
