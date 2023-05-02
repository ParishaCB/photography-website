<?php
session_start();
?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

$pdo_statement = $pdo->prepare("SELECT * FROM registered_users WHERE user_id=" . $_GET["user_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

if(isset($_REQUEST['edituserprofile'])) {
	$user_id = $_REQUEST['user_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
    $username = $_POST['username'];
	$password = $_POST['password'];

	$pdo_statement = $pdo->prepare("UPDATE registered_users SET first_name='$first_name', 
    last_name='$last_name', 
    email='$email',
	username='$username',
	password='$password'
    WHERE user_id='$user_id' ");
	$results = $pdo_statement->execute();

    if($results) {

		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}

		function_alert("Profile Updated Successfully.");
        		
	}else{
		function_alert("Database Unavailable. Try Again Later.");
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Update Profile</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>

		<div class="artistprofile">

		<div><a class="bookclassbutton" href="userprofile.php">Go Back</a></button></div>

			<form action="" class="usercardprofile" method="POST" enctype="multipart/form-data">
				<h2>Edit Your Information:</h2><br><br>

				<input type="hidden" name="user_id" value="<?php echo $result[0]['user_id'];?>">

				<label class="main-label">First Name:<br></label>
				<input type="text" class="main-label" name="first_name" value="<?php echo $result[0]['first_name']; ?>" placeholder="First Name"><br><br>

				<label class="main-label">Last Name:<br></label>
				<input type="text" class="main-label" name="last_name" value="<?php echo $result[0]['last_name']; ?>" placeholder="Last Name"><br><br>

				<label class="main-label">Email:<br></label>
				<input type="text" class="main-label" name="email" value="<?php echo $result[0]['email']; ?>" placeholder="Your Email"><br><br>

                <label class="main-label">Username:<br></label>
				<input type="text" class="main-label" name="username" value="<?php echo $result[0]['username']; ?>" placeholder="Username"><br><br>

                <label class="main-label">Password:<br></label>
				<input type="password" class="main-label" name="password" id=myPassword value="<?php echo $result[0]['password']; ?>" placeholder="Password"><br><br>
                
                <input type="checkbox" onclick="myFunction()"> Show Password

				<br><br><button class="editartist" type="submit" value="Submit" name="edituserprofile">Update Profile!</button>

			</form>

		</div>

    </header>

    <script>

        function myFunction() {
        var x = document.getElementById("myPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }

    </script>

</body>
</html>
