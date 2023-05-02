<?php
require_once('connect/dbconnect.php');
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'root', '');
	if(isset($_POST['submit'])){
		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$email = $_POST['email'];
		$username = $_POST['regusername'];
		$password = $_POST['regpassword'];

		$insert = $con->prepare("INSERT INTO registered_users(first_name,last_name,email,username,password)
				values(:firstname, :lastname, :email, :regusername, :regpassword)
				");
		$insert->bindParam (':firstname',$first_name);
		$insert->bindParam (':lastname',$last_name);
		$insert->bindParam (':email',$email);
		$insert->bindParam (':regusername',$username);
		$insert->bindParam (':regpassword',$password);
		$insert->execute();
        if($insert) {
			function function_alert($message) {
				echo "<script>alert('$message');</script>";
			}
	
			function_alert("Registration Successful. Login with your details.");
			
		}else{
			function_alert("Database unavailable. Try again later.");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotographyArt | Register </title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

                <h2 class="artistheading">Complete The Form To Register With Us!</h2><br>

                <label class="inputs">First Name: </label>
                <input type="text" class="text" name="firstname" placeholder="Your First Name" required="required">

                <br><label class="inputs">Last Name: </label>
                <input type="text" class="text" name="lastname" placeholder="Your Last Name" required="required">

                <br><label class="inputs">Your Email: </label>
                <input type="email" class="text" name="email" placeholder="Email" required="required">

                <br><label class="inputs">Username: </label>
                <input type="text" class="text" name="regusername" required="required" placeholder="Enter Username">

                <br><label class="inputs">Password: </label>
                <input type="password" class="text" name="regpassword" required="required" placeholder="Enter Password"><br><br>

				<button type="submit" class="submit" value="Submit" name="submit">Submit</button>

                <br><br><p><a href="login.php">I already have an account</a></p><br>

            </form>
        </div>
</header>

</body>
</html>