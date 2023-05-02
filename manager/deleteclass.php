<?php
session_start();
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
$msg = '';

$pdo_statement=$con->prepare("DELETE FROM classes where class_id=" . $_GET['class_id']);
$pdo_statement->execute();    

if($pdo_statement) {

    header("Location: deletemessage.php");
}else {
    echo $msg ("Database Not Available");
}
?>