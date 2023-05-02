<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Book Artist</title>
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

        <?php
	        require_once( '../connect/connection.php');
        ?>

        <h1 class="bookingheading">Select An Artist To Book</h1><br><br><br><br><br><br>

        <?php
		$pdo = connect();
		$results = $pdo->query("SELECT * FROM artist_profile", PDO::FETCH_ASSOC);

		foreach( $results as $row) {
		?>

        <div class="classcard">
            <div class="container">
                <p class="class-card-info">
                    <b>Artist:</b><br><img src="<?php echo $row['artist_picture']?>" height="110" width="110" class="card-image">
                    <br><b>Artist ID: </b><?php echo $row['artist_id']; ?><br>
                    <br><b>Artist Name: </b><?php echo $row['first_name']; ?><br><br>
                    <b>Qualifications: </b><br><?php echo $row['qualifications']; ?><br><br>
                    <b>Experience: </b> <?php echo $row['experience']; ?>
                </p><br><br>
                <a class="edit1" href="artistbooking.php?artist_id=<?php echo $row['artist_id']; ?>">Book This Artist</a>
                </div>
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

