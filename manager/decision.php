<?php
session_start();
?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

if(isset($_POST["submitdecision"])) {

	$pdo_statement = $pdo->prepare("UPDATE artist_applications SET artist_name='" . $_POST[ 'artist_name' ] . "', 
	artist_surname='" . $_POST[ 'artist_surname' ]. "', 
	email='" . $_POST[ 'email' ]. "', 
	speciality='" . $_POST[ 'speciality' ]. "', 
	reason='" . $_POST[ 'reason' ]. "', 
	decision='" . $_POST[ 'decision' ]. "'
	WHERE artist_id=" . $_GET["artist_id"]);
	
	$results = $pdo_statement->execute();
	
	if($results) {
	
		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}
	
		function_alert("Application Reviewed Successfully.");
				
	}else{
		function_alert("Database unavailable. Try again later.");
	}
}
$pdo_statement = $pdo->prepare("SELECT * FROM artist_applications WHERE artist_id=" . $_GET["artist_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Decision</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
	<header>

		<div><a href="viewapplication.php" class="addbutton">Back To Applications</a></div>

		<div>
        <h2 class="heading">Make A Decision For:</h2>

        <form name="decisionForm" action="" method="POST" class="addclass">

		<div>
			<label>First Name:</label><br>
			<input type="text" name="artist_name" class="nameinput" readonly value="<?php echo $result[0]['artist_name']; ?>" required="required">
        </div>

		<div>
			<br><label>Last Name:</label><br>
			<input type="text" name="artist_surname" class="nameinput" readonly value="<?php echo $result[0]['artist_surname']; ?>" required="required">
        </div>

		<div>
			<br><label>Email:</label><br>
			<input type="text" name="email" class="nameinput" readonly value="<?php echo $result[0]['email']; ?>" required="required">
        </div>

		<div>
			<br><label>Speciality:</label><br>
			<input type="text" name="speciality" class="nameinput" readonly value="<?php echo $result[0]['speciality']; ?>" required="required">
        </div>

		<div>
			<br><label>Reason:</label><br>
			<input type="text" name="reason" class="nameinput" readonly value="<?php echo $result[0]['reason']; ?>" required="required">
        </div>

		<div>
			<br><label>Decision:</label><br>
			<select name="decision" class="nameinput" required="required">
                <option value="" disabled selected>Choose Decision</option>
                <option value="Accepted" name="Accepted">Accept</option>
                <option value="Rejected" name="Rejected">Reject</option>
            </select>        
		</div>

		<div>
			<br><br><input name="submitdecision" type="submit" value="Confirm Decision" class="submitclass">
        </div>

		</form>

    </header>

</body>
</html>
