<?php
session_start();
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
$msg = '';

$pdo_statement=$con->prepare("DELETE FROM artist_applications where artist_id=" . $_GET['artist_id']);
$pdo_statement->execute();    

if($pdo_statement) {

    header("Location: viewapplication.php");
}else {
    echo $msg ("Database Not Available");
}
?>