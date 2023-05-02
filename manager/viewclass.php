<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Bookings</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>
		<nav class="navbar">    
		<a href="userdashboard.php"><img src="../images/logo.png" alt="sitelogo" width="200"></a>

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

        <h1 style="color:white;font-family:'Ink Free';position:absolute;top:20%;left:50%;transform:translate(-50%, -50%);">
        Booked Classes</h1><br><br><br><br><br><br>

        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

		$results = $pdo->query("SELECT * FROM bookings");

		foreach( $results as $row) {
		?>

        <div class="classcard">
            <div class="container">
                <p class="class-card-info">
                    <b>Booking ID: </b><?php echo $row['booking_uniqueid']; ?><br><br>
                    <b>Class Name: </b><?php echo $row['class_name']; ?><br><br>
                    <b>Artist Name: </b> <?php echo $row['artist_name']; ?><br><br>
                    <b>Date: </b> <?php echo $row['date']; ?><br><br>
                    <b>Time: </b> <?php echo $row['time']; ?><br><br>
                    <b>Location: </b> <?php echo $row['location']; ?><br><br>
                    <b>First Name: </b> <?php echo $row['first_name']; ?><br><br>
                    <b>Last Name: </b> <?php echo $row['last_name']; ?><br>
                </p><br>
            </div>
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