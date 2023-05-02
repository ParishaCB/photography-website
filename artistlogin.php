<?php
require_once('connect/dbconnect.php');
?>
<?php
session_start();
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'root', '');
	if(isset($_POST['loginsubmit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$select = $con->prepare("SELECT * FROM registered_artists where username='$username' and password='$password' ");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		$data=$select->fetch();

		if($data == false)
		{
			function function_alert($message) {
				echo"<script>alert('$message');</script>";
			}
			function_alert("Invalid login. Try again.");
		}
		elseif($data['username']==$username and $data['password']==$password)
		{
			$_SESSION['username'] = $data['username'];
			header("location:artist/artistdashboard.php");
		} 
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Artist Login</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/login.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
</head>

<body>
	<header>
		<nav class="navbar">
		<a href="index.php" class="site-logo">
			<img src="images/logo.png" width="200" alt="sitelogo">
		</a>

        <ul class="main-nav">
			<li><a href="index.php" class="nav-links">Home</a></li>
			<li><a href="viewartists.php" class="nav-links">Artists' Profiles</a></li>
			<li><a href="viewclasses.php" class="nav-links">Classes</a></li>
			<li><a href="artistreg.php" class="nav-links">Become an artist</a></li>
			<li><a href="register.php" class="nav-links">Register</a></li>
			<li><a href="login.php" class="nav-links">Login</a></li>
		</ul>	
		</nav>

        <div class="registerform">
            <form action="" method="POST" enctype="multipart/form-data">

                <h2 class="artistheading">Artist Login Area</h2><br>

                <br><label class="inputs">Username </label><br>
                <input type="text" class="text" name="username" required="required" placeholder="Enter Your Username"><br>

                <br><label class="inputs">Password </label><br>
                <input type="password" class="text" name="password" required="required" placeholder="Enter Your Password"><br><br>

                <button class="submit" type="submit" value="Submit" name="loginsubmit">Submit</button><br><br>

                <br><a class= "altlogin1" href="login.php">Not An Artist? Click Here.</a><br><br>

            </form>
        </div>
</header>

</body>
</html>