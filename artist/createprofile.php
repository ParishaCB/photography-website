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

		if(isset($_POST['profilesubmit'])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$qualifications = $_POST['qualifications'];
		$experience = $_POST['experience'];
		$email = $_POST['email'];
		$username = $_POST['username'];

		$filename = $_FILES['artist_picture']['name'];
		$tempname = $_FILES['artist_picture']['tmp_name'];
		$folder = 'profile/'.$filename;
		move_uploaded_file($tempname,$folder);

		$filenames = $_FILES['art_pictures']['name'];
		$tempnames = $_FILES['art_pictures']['tmp_name'];
		$folders = 'picture/'.$filenames;
		move_uploaded_file($tempnames,$folders);
		
		$sql = "INSERT INTO artist_profile (first_name, last_name, qualifications, experience, email, username, artist_picture, art_pictures)
		VALUES('$first_name', '$last_name', '$qualifications', '$experience', '$email', '$username', '$folder', '$folders')"; 
		// use exec() because no results are returned 
		$conn->exec($sql);

		if($conn) {
			function function_alert($message) {
				echo "<script>alert('$message');</script>";
			}
	
			function_alert("Profile Created Successfully.");
			
		}else{
			function_alert("Database unavailable. Try again later.");
		}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Create Profile</title>
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

        <div class="artistprofile">
			<form action="" class="createprofile" method="POST" enctype="multipart/form-data">
				<br><h2>Create Your Profile:</h2><br>

				<label class="name">First Name:<br></label>
				<input type="text" name="first_name" required="required" placeholder="First Name"><br><br>

				<label class="surname">Last Name:<br></label>
				<input type="text" name="last_name" required="required" placeholder="Last Name"><br><br>

				<label class="qualif">Qualifications:<br></label>
				<input type="text"  name="qualifications" required="required" placeholder="Enter your qualifications"><br><br>

				<label class="exper">Experience:<br></label>
				<input type="text" name="experience" required="required" placeholder="Enter your experience"><br><br>

				<label class="exper">Email:<br></label>
				<input type="email" name="email" required="required" placeholder="Enter your email"><br><br>

				<!-- <br><br><label>Your Username:</label> -->
				<?php	
				$username = 'parisha';
				$password = 'ParishaDataBase1234!';
				$mysqlhost = 'localhost';
				$dbname = 'photographyart';
			
				$pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);

				$artist_id = $_SESSION['username']; 

				$pdo_statement = $pdo->query("SELECT username FROM registered_artists WHERE username='$artist_id' ");
				$pdo_statement->execute();
				$result = $pdo_statement->fetch();
				?>
				<input type="hidden" name="username" style="width:10%;" readonly class="nameinput" value="<?php echo $result['username']?>" required="required"><break>


				<label class="picture">Upload Your Picture:</label><br>
  				<input type="file" name="artist_picture"><br><br>

				<label class="picture">Upload An Example Of Your Art:</label><br>
  				<input type="file" name="art_pictures">

				<br><br><button class="artist" type="submit" value="Submit" name="profilesubmit">Create Profile!</button>

			</form>

		</div>

    </header>

</body>
</html>
