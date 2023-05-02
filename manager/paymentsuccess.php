<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Success</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
		.pay {
			position: absolute;
			top: 45%;
			left: 50%;
			transform: translate(-50%, -50%);
			font-size: 40px;
			color: white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		}
        .paybut {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #344652;
            border-collapse: none;
            border: 2px solid black;
            padding: 5px;
        }
        .paybut a {
            text-decoration: none;
            font-size: 25px;
            color: white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
	</style>
</head>

<body>
	<header>
		<nav class="navbar">    
		<a href="managerdashboard.php"><img src="../images/logo.png" alt="sitelogo" width="200"></a>

        <ul class="main-nav">
            
		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">Classes
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="class.php">Manage Classes</a>
				<a href="viewclass.php">Class Bookings</a>
				<a href="viewreviews.php">Class Reviews</a>
			</div>
		</div> 

		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">Reports
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="viewreport.php">Class Reports</a>
				<a href="viewartists.php">Artists</a>
				<a href="viewuser.php">Users</a>
			</div>
		</div> 

        <div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">Payments
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="payments.php">View Payments</a>
				<a href="artistpayment.php">Make Payments</a>
			</div>
		</div> 
			
			<li><a href="viewapplication.php">Applications</a></li>
			<li><a href="logout.php">Logout</a></li> 
		</ul>	
		</nav>

        <h1 class="pay">Payment Has Been Added Successfully</h1>

        <button class="paybut"><a href="artistpayment.php">Go Back To Payment</a></button>

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
 