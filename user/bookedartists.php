<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Booked Artists</title>
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
			<button class="dropbtn" onclick="myFunction()">Book
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="bookclass.php">Book Classes</a>
				<a href="bookartists.php">Book An Artist</a>
			</div>
		</div> 

		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">My Bookings
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="bookedclass.php">Class Bookings</a>
				<a href="bookedartists.php">Artist Bookings</a>
			</div>
		</div> 
			
			<li><a href="review.php">Review Classes</a></li>
			<li><a href="contact.php">Contact an artist</a></li>
			<li><a href="userprofile.php">My Profile</a></li>
			<li><a href="logout.php">Logout</a></li> 
		</ul>	
		</nav>

        <div>
			<h1 style="color:white;font-family:'Ink Free';position:absolute;top:20%;left:50%;transform:translate(-50%, -50%);">
            Your Booked Artists</h1><br><br><br><br><br><br>
		</div>

        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

        $artistbooking_id = $_SESSION['username']; 
		$results = $pdo->query("SELECT * FROM artist_bookings WHERE user_name='$artistbooking_id' ");

		foreach( $results as $row) {
		?>

        <div class="classcard">
            <div class="container">
                <p class="class-card-info">
                    <b>Artist Booking ID: </b><?php echo $row['artistbooking_id']; ?><br><br>
                    <b>Artist Name: </b><?php echo $row['artist_name']; ?><br><br>
                    <b>Artist Surname: </b> <?php echo $row['artist_surname']; ?><br><br>
                    <b>Booking Date: </b> <?php echo $row['booking_date']; ?><br><br>
                    <b>Booking Time: </b> <?php echo $row['booking_time']; ?><br><br>
                    <b>Booking Reason: </b> <?php echo $row['booking_reason']; ?>
                </p><br>
                <button class="cancelbooking"><a href="cancelartistbooking.php?artistbooking_id=<?php echo $row['artistbooking_id']; ?>">Cancel Booking</a></button>
            </div>
        </div>
		
        <?php
		}
		?>

		</header>

</body>
</html>

