<?php
session_start();
?>

<?php
require_once('../connect/connect.php');
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

if(isset($_POST['reviewsubmit'])){
	$class_name = $_POST['classes'];
	$class_rating = $_POST['ratings'];
	$comments = $_POST['comments'];

	$insert = $con->prepare("INSERT INTO reviews(class_name,class_rating,comments)
				values(:classes, :ratings, :comments)
				");
	$insert->bindParam (':classes',$class_name);
	$insert->bindParam (':ratings',$class_rating);
	$insert->bindParam (':comments',$comments);
	$insert->execute();

	if($insert) {

		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}

		function_alert("Review submitted successfully.");
		
	}else{
		function_alert("Database unavailable. Try again later.");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Review</title>
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
				<a href="bookartists.php">Artist Bookings</a>
			</div>
		</div> 
			
			<li><a href="review.php">Review Classes</a></li>
			<li><a href="contact.php">Contact an artist</a></li>
			<li><a href="userprofile.php">My Profile</a></li>
			<li><a href="logout.php">Logout</a></li> 
		</ul>	
		</nav>

		<h1 class="bookingheading">Review A Class Below</h1><br><br>
        <p class="contactmessage">(Your Reviews Will Help Us Improve Our Services. Thank You For Taking The Time To Do This).</p><br>


    	<form name="reviewform" class="contactform" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		<br><h1 class="rating">Class Name:</h1>

		<?php
			$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
			$sql = "SELECT class_name FROM classes";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) { ?>
			<select name="classes">
				<?php foreach ($results as $row) { ?>
				<option value="<?php echo $row['class_name']; ?>"><?php echo $row['class_name']; ?></option>
				<?php } ?>
			</select>
			<?php } ?>

		<br><br><h1><label class="rating" name="ratings">Rate this class:</label></h1>

		<select name="ratings" class="ratings" required="required">
			<option value="" disabled selected>Choose Rating</option>
			<option value="1 (verybad)" name="1 (verybad)">1 (very bad)</option>
			<option value="2 (bad)" name="2 (bad)">2 (bad)</option>
			<option value="3 (satisfactory)" name="3 (satisfactory)">3 (satisfactory)</option>
			<option value="4 (good)" name="4 (good)">4 (good)</option>
			<option value="5 (verygood)" name="5 (verygood)">5 (very good)</option>
		</select>

		<br><br><h1><label class="comments">Comments:</label></h1>
        <textarea rows="5" cols="50" type="text" name="comments" class="textareas" placeholder="Any Comments (Optional)"></textarea><br>

		<br><button class="review" type="submit" value="Submit" name="reviewsubmit">Submit Review</button>

		</form>

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
 
