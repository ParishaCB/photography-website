<?php
session_start();
?>

<?php
		$mysqlhost = 'localhost';  
		$dbname = 'photographyart'; 
		$username = 'parisha';
		$password = 'ParishaDataBase1234!';

		$conn = new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

		if(isset($_POST['reportsubmit'])){
		$class_name = $_POST['class_name'];
		$artist_assigned = $_POST['artist_assigned'];
		$general_comments = $_POST['general_comments'];
		$attendance = $_POST['attendance'];
		
		$insert = $conn->prepare("INSERT INTO classes_report(class_name,artist_assigned,general_comments,attendance)
				values(:class_name, :artist_assigned, :general_comments, :attendance)
				");
	$insert->bindParam (':class_name',$class_name);
	$insert->bindParam (':artist_assigned',$artist_assigned);
	$insert->bindParam (':general_comments',$general_comments);
	$insert->bindParam (':attendance',$attendance);
	$insert->execute();

	if($insert) {

		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}

		function_alert("Report Submitted Successfully.");
		
	}else{
		function_alert("Database unavailable. Try again later.");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Reports</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>
		<nav class="navbar">    
		<a href="artistdashboard.php"><img src="../images/logo.png" alt="sitelogo" width="200"></a>

        <ul class="main-nav">
		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">My Profile
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="createprofile.php">Create Profile</a>
				<a href="manageprofile.php">Update Profile</a>
			</div>
		</div> 

		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">My Classes
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="viewclass.php">Classes</a>
				<a href="upload.php">Upload Teaching Material</a>
				<a href="reports.php">Write A Report</a>
			</div>
		</div> 
			
			<li><a href="bookings.php">My Bookings</a></li>
			<li><a href="viewpayments.php">My Payments</a></li>
			<li><a href="logout.php">Logout</a></li> 
		</ul>	
		</nav>

        <h1 class="artistclass">Write A Class Report Below</h1>

        <div class="artistprofile">
			<form action="reports.php" class="reportform" method="POST" enctype="multipart/form-data">

				<br><label class="artistaddlabel">Class Name:<br></label>
				<input type="text" class="class-card-info" style="width:40%;" name="class_name" required="required" placeholder="Class Name"><br><br>

				<label class="artistaddlabel">Artist Assigned:<br></label>
				<input type="text" class="class-card-info" name="artist_assigned" required="required" placeholder="Enter Your Full Name"><br><br>

				<label class="artistaddlabel">General Comments:<br></label>
				<textarea type="text" cols="30" rows="4" name="general_comments" required="required" placeholder="Enter Any Comments Or Concerns"></textarea><br><br>

				<label class="artistaddlabel">Attendance:<br></label>
				<input type="text" name="attendance" class="class-card-info" style="width:50%;" required="required" placeholder="Student Attendance (e.g: 9/10)"><br><br>

				<br><br><button class="submit" type="submit" value="Submit" name="reportsubmit">Submit Report!</button><br>

			</form>

		</div>
		

    </header>

	<footer class="footer-items">
			<div class="footer-content">
				<p>&copy;PhotographyArt 2021</p><br>
				<p>This site is only for demonstrational purposes and has been developed for an educational exercise.
				The site contains text and media from external sources which have been referenced in the documentation 
				created for this site.</p>
			</div>
	</footer>

	<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(e) {
		if (!e.target.matches('.dropbtn')) {
		var myDropdown = document.getElementById("myDropdown");
			if (myDropdown.classList.contains('show')) {
			myDropdown.classList.remove('show');
			}
		}
		}
	</script>

</body>
</html>
 