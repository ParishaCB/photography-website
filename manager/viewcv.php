<?php
session_start();
?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');


$pdo_statement = $pdo->prepare("SELECT * FROM artist_applications where artist_id=" . $_GET["artist_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | CV</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        iframe {
            width: 90%;
            height: 600px;
            position: absolute;
            top: 16%;
            left: 6%;
            background-color: #fff;
            border: 2px solid black;
            border-collapse: none;
        }
    </style>
</head>

<body>
	<header>

        <div><a href="viewapplication.php" class="addbutton">Back to Applications</a></div>

        <h2 class="heading"><?php echo $result[0]['artist_name']?>'s CV</h2>

        <div>
            <iframe src="<?php echo $result[0]['cv']?>"></iframe>
        </div>

    </header>
</body> 
</html>