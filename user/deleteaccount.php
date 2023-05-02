<?php
session_start();
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
$msg = '';

$pdo_statement=$con->prepare("DELETE FROM registered_users where user_id=" . $_GET['user_id']);
$pdo_statement->execute();    

if($pdo_statement) {

    header("Location: deletemessage1.php");
}else {
    echo $msg ("Database Not Available");
}
?>