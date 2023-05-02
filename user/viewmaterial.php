<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Teaching Material</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>

    <div><a href="bookedclass.php" class="bookclassbutton">Back to Classes</a></div>

    <h1 style="color:white;font-family:'Ink Free';position:absolute;top:10%;left:50%;transform:translate(-50%, -50%);">Teaching Material</h1>

    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

		$results = $pdo->query("SELECT * FROM class_material");

		foreach( $results as $row) {
		?>

			<br><br><br><br><br><br><br><br><div class="classcard">
                <p class="class-card-info">
                    <b>Class ID:<br></b><?php echo $row['class_id']; ?><br><br>
                    <b>Class Name:<br></b><?php echo $row['class_name']; ?><br><br>	
                    <button class="material"><a href="viewteaching.php?class_id=<?php echo $row['class_id']; ?>">View Material</a></button>
                </p><br>
			</div>
		<?php
		}
		?>

    </header>

</body>
</html>     
