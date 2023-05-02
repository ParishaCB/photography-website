<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Contact Artist</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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

        <h1 class="bookingheading">Select The Artist You Want To Contact!</h1>
        <p class="contactmessage">(Our Artists Will Try To Respond As Soon As Possible. However, If You Have An Urgent Inquiry, Contact: kaichevron@email.com)</p><br>

        <form name="contactform" class="contactform" method="POST" action= "messagesender.php">
		<br><h1>Artist Emails:</h1>

		<?php
			$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
			$sql = "SELECT email FROM registered_artists";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) { ?>
			<select name="email">
				<?php foreach ($results as $row) { ?>
				<option name="email" value="<?php echo $row['email']; ?>"><?php echo $row['email']; ?></option>
				<?php } ?>
			</select>
			<?php } ?>

            <br><br><h1><label class="message">Your Full Name:</label></h1>
			<input type="text" class="class-card-info" name="fullname" required="required" placeholder="Your Name"></input>
            
			<br><br><h1><label class="message">Message:</label></h1>
			<textarea rows="6" cols="30" type="text" name="message" required="required" placeholder="Message"></textarea><br><br>

			<button class="contact" type="submit" value="Submit" name="contactsubmit">Submit Message</button>

		</form>
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
 