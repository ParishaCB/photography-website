<?php

$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');


$pdo_statement = $pdo->prepare("SELECT * FROM class_material where class_id=" . $_GET["class_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Teaching Material</title>
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

        <div><a href="bookedclass.php" class="bookclassbutton">Back To Classes</a></div>

        <h2 class="heading"><?php echo $result[0]['class_name']?> Materials</h2>

        <div>
            <iframe src="<?php echo $result[0]['teaching_material']?>"></iframe>
        </div>

    </header>
</body> 
</html>