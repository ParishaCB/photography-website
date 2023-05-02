<?php

$mysqlhost = 'localhost';  
$dbname = 'photographyart'; 
$username = 'root';
$password = '';

$conn = new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['submitform'])){
	$artist_name = $_POST['artist_name'];
	$artist_surname = $_POST['artist_surname'];
	$email = $_POST['email'];
	$speciality = $_POST['speciality'];
	$reason = $_POST['reason'];
	$filename = $_FILES['cv']['name'];
	$tempname = $_FILES['cv']['tmp_name'];
	$folder = 'cv/'.$filename;
	move_uploaded_file($tempname,$folder);

	$sql = "INSERT INTO artist_applications (artist_name, artist_surname, email, speciality, reason, cv)
		VALUES('$artist_name', '$artist_surname', '$email', '$speciality', '$reason', '$folder')"; 
		// use exec() because no results are returned 
	$conn->exec($sql);

	if($conn)  {
		header('Location: thankyou.php');
	}else {
		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}
		function_alert("Database unavailable. Try again later.");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotographyArt | Application </title>
    <link rel="stylesheet" href="css/styles.css">

	<style>
	input[type="file"] {
		font-family: 'Ink Free';
		position: relative;
		color: white;
		font-size: 14px;
		left: 9%;
	}
	</style>
</head>

<body>
    <header>
        <div><a href="index.php" class="goback">Back to Homepage</a></div>

        <h2 class="artistheading">Complete The Application Form Below & <br> Get One Step Closer To Becoming 
        An Artist At PhotographyArt!</h2><br>

        <div class="artistform">
            <form action="" method="POST" enctype="multipart/form-data">
                <label class="inputs">First Name </label><br>
                <input type="text" class="text" name="artist_name" placeholder="Your First Name" required="required">

                <br><label class="inputs">Last Name </label><br>
                <input type="text" class="text" name="artist_surname" placeholder="Your Last Name" required="required">

                <br><label class="inputs">Your Email </label><br>
                <input type="text" class="text" name="email" placeholder="Email" required="required">

                <br><label class="inputs">Your Specialist Area </label><br>
				<input type="text" class="text" name="speciality" required="required" placeholder="E.g. Photography"><br>

                <br><label class="inputs">Summarise Why You Want To Work Here<br></label>
				<textarea type="text" class="textarea" cols="40" rows="6" name="reason" required="required" placeholder="Why You Want To Work With Us?"></textarea><br>
            
				<br><label class="inputs">Upload your CV here!</label><br>
				<br><input type="file" class="cv" name="cv">

				<br><br><button type="submit" class="submit" value="Submit" name="submitform">Submit Application</button>

            </form>
        </div>
</header>


</body>
</html>
