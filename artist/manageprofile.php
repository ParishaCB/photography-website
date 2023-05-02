<?php
session_start();
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
.artistprofilecard {
    border: black 3px solid;
    width: 22%;
	height: 62%;
    float: left;
    top: 60%;
    left: 100%;
    transform: translate(175%,20%);
    background-color: darkslategrey;
    margin-right: 8px;
}

.artist-profile-info {
    font-size: 16px;
    color: white;
    text-align: center;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.card-profile-image {
    align-items: center;
}

.edit-profile {
	padding: 5px;
	font-size: 18px;
	background-color: #100D23;
	border: 2px solid #100D23;
}
.edit-profile a {
	text-decoration: none;
	color: white;
	font-family: 'Ink Free';
}

.create-profile {
	position: absolute;
	top: 20%;
	left: 90%;
	transform: translate(-50%,-50%);
	font-size: 22px;
	background-color: #0a2f33;
	border-style: none;
	border: 2px solid #0a2f33;
	padding: 9px;
}
.create-profile a {
	text-decoration: none;
	color: white;
	font-family: 'Ink Free';
	font-weight: bold;
}
</style>
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

	<div>
		<h1 style="color:white;font-family:'Ink Free';position:absolute;top:20%;left:50%;transform:translate(-50%, -50%);">Your Profile</h1>
	</div>

	<?php
        $pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

		$username = $_SESSION['username']; 
		$results = $pdo->query("SELECT * FROM artist_profile WHERE username='$username'");

		foreach( $results as $row) {
		?>

			<div class="artistprofilecard">
                <p class="artist-profile-info">
					<b>Artist ID: </b><?php echo $row['artist_id']; ?><br>
					<img src="<?php echo $row['artist_picture']?>" height="105" width="105" name="artist_picture" class="card-profile-image"><br>
                    <b>First Name: </b><?php echo $row['first_name']; ?><br>
                    <b>Last Name: </b><?php echo $row['last_name']; ?><br><br>
                    <b>Qualifications: </b> <?php echo $row['qualifications']; ?><br>
                    <b>Experience: </b> <?php echo $row['experience']; ?><br>
                    <b>Email: </b> <?php echo $row['email']; ?><br><br>
					<b>Your Uploaded Art:</b><br><br><img src="<?php echo $row['art_pictures']?>" height="70"><br><br>
					<button class="edit-profile"><a href="editprofile.php?artist_id=<?php echo $row['artist_id']; ?>">Edit Profile</a></button><br><br>
                </p><br>
			</div>
		<?php
		}
		?>

    </header>

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
