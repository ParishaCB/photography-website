<?php
session_start();
?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

$pdo_statement = $pdo->prepare("SELECT * FROM artist_profile WHERE artist_id=" . $_GET["artist_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

if(isset($_REQUEST['editprofile'])) {
	$artist_id = $_REQUEST['artist_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$qualifications = $_POST['qualifications'];
	$experience = $_POST['experience'];
	$email = $_POST['email'];

	$artist_picture = $_FILES['artist_picture']['name'];
	$tempname = $_FILES['artist_picture']['tmp_name'];
	$folder = 'profile/'.$artist_picture;
	move_uploaded_file($tempname,$folder);

	$art_pictures = $_FILES['art_pictures']['name'];
	$tempnames = $_FILES['art_pictures']['tmp_name'];
	$folders = 'picture/'.$art_pictures;
	move_uploaded_file($tempnames,$folders);

	$pdo_statement = $pdo->prepare("UPDATE artist_profile SET first_name='$first_name', 
    last_name='$last_name', 
    qualifications='$qualifications', 
    experience='$experience',
    email='$email',
	artist_picture='$folder',
	art_pictures='$folders'
    WHERE artist_id='$artist_id' ");
	$results = $pdo_statement->execute();

    if($results) {

		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}

		function_alert("Profile Updated Successfully.");
		
	}else{
		function_alert("Database Unavailable. Try Again Later.");
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Artist Dashboard</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
.gobackprofile {
	position: absolute;
	top: 10%;
	right: 85%;
	transform: translate(-50%,-50%);
	font-size: 23px;
	background-color: #0a2f33;
	border-style: none;
	border: 2px solid #0a2f33;
	padding: 5px;
}
.gobackprofile a {
	text-decoration: none;
	color: white;
	font-family: 'Ink Free';
	font-weight: bold;
}
</style>
</head>

<body>
	<header>

		<div class="artistprofile">
		<button class="gobackprofile"><a href="manageprofile.php">Go Back</a></button>
			<form action="" class="editprofile" method="POST" enctype="multipart/form-data">
				<br><br><h2>Edit Your Information:</h2><br>

				<input type="hidden" name="artist_id" value="<?php echo $result[0]['artist_id'];?>">

				<img src="<?php echo $result[0]['artist_picture']?>" height="60" width="60" name="artist_picture" alt="profilepicture"><br>
				<label class="main-labels">Upload New Picture:</label><br>
				<input type="file" name="artist_picture"><br><br>

				<label class="main-labels">First Name:<br></label>
				<input type="text" name="first_name" value="<?php echo $result[0]['first_name']; ?>" placeholder="First Name"><br><br>

				<label class="main-labels">Last Name:<br></label>
				<input type="text" name="last_name" value="<?php echo $result[0]['last_name']; ?>" placeholder="Last Name"><br><br>

				<label class="main-labels">Qualifications:<br></label>
				<input type="text"  name="qualifications" value="<?php echo $result[0]['qualifications']; ?>" placeholder="Enter your qualifications"><br><br>

				<label class="main-labels">Experience:<br></label>
				<input type="text" name="experience" value="<?php echo $result[0]['experience']; ?>" placeholder="Enter your experience"><br><br>

				<label class="main-labels">Email:<br></label>
				<input type="text" name="email" value="<?php echo $result[0]['email']; ?>" placeholder="Enter your email"><br><br>

				<img src="<?php echo $result[0]['art_pictures']?>" height="70" width="100" alt="artpictures"><br>
				<label class="main-labels">Upload New Example Of Your Art:</label><br>
				<input type="file" name="art_pictures">

				<br><br><button class="editartist" type="submit" value="Submit" name="editprofile">Update Profile!</button>

			</form>

		</div>

    </header>

</body>
</html>
