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

	<style>
		h1 {
			position: absolute;
			top: 55%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-size: 70px;
			color: white;
			font-family: 'Ink Free';
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

		<?php
		if(isset($_SESSION['username']))
		{
			echo '<h1>Welcome: '.$_SESSION['username']. '</h1>';
		}
		?>

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
 