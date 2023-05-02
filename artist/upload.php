<?php
session_start();
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

if(isset($_POST['submitupload'])){
	$class_name = $_POST['class_name'];

    $filename = $_FILES['teaching_material']['name'];
    $tempname = $_FILES['teaching_material']['tmp_name'];
    $folder = 'materials/'.$filename;
    move_uploaded_file($tempname,$folder);

	$sql = "INSERT INTO class_material (class_name, teaching_material)
		VALUES('$class_name', '$folder')"; 
		// use exec() because no results are returned 
		$con->exec($sql);

		if($con) {
			function function_alert($message) {
				echo "<script>alert('$message');</script>";
			}
	
			function_alert("Materials Uploaded Successfully.");
			
		}else{
			function_alert("Database unavailable. Try again later.");
		}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Upload Materials</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        input[type=file] {
            top: 55%;
            left: 65%;
            transform: translate(-50%,-50%);
            font-size: 20px;
        }
       
        .button {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%,-50%);
            font-size: 25px;
            color: white;
            background-color: #100D23;
            border-color: #100D23;
            font-family: 'Ink Free';
            cursor: pointer;
            border-width: 4px;
            border-style: solid;
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

        <h1 class="artistclass">Upload Teaching Material For A Class</h1>

        <form action="" name="uploadform" class="uploadform" method="POST"  enctype="multipart/form-data">
		<br><h2 class="artistaddlabel">Choose Class:</h2><br>

        <?php
			$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
			$sql = "SELECT class_name FROM classes";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) { ?>
			<select name="class_name">
				<?php foreach ($results as $row) { ?>
				<option value="<?php echo $row['class_name']; ?>"><?php echo $row['class_name']; ?></option>
				<?php } ?>
			</select>
			<?php } ?>

        <br><br><h2 class="artistaddlabel">Upload File:</h2><br>
            <input type="file" name="teaching_material">
            
        <button class="button" type="submit" value="Submit" name="submitupload">Upload Material</button>
                
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
 