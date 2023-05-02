<?php
session_start();
?>

<?php
$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

if(isset($_POST['submitartist'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$insert = $con->prepare("INSERT INTO registered_artists(first_name,last_name,email,username,password)
				values(:first_name, :last_name, :email, :username, :password)
				");
	$insert->bindParam (':first_name',$first_name);
	$insert->bindParam (':last_name',$last_name);
	$insert->bindParam (':email',$email);
	$insert->bindParam (':username',$username);
	$insert->bindParam (':password',$password);
	$insert->execute();

	if($insert) {

		function function_alert($message) {
			echo "<script>alert('$message');</script>";
		}

		function_alert("Artist Added Successfully.");
		
	}else{
		function_alert("Database unavailable. Try again later.");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Artists</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>

        <div><a href="viewartists.php" class="addbutton">Back To Artists</a></div>
        
        <div>
        
        <form name="classForm" action="" method="POST" class="artistaddingform">
        <h2 class="heading">Add New Artist</h2>
            <div>
                <label class="artistaddlabel">First Name:</label><br>
                <input type="text" name="first_name" class="artistadd" required="required"><br><br>
            </div>

            <div>
                <label class="artistaddlabel">Last Name:</label><br>
                <input type="text" name="last_name" class="artistadd" required="required"><br><br>
            </div>

            <div>
                <label class="artistaddlabel">Email:</label><br>
                <input type="text" name="email" class="artistadd" required="required"><br><br>
            </div>

            <div>
                <label class="artistaddlabel">Username:</label><br>
                <input type="text" name="username" class="artistadd" required="required"><br><br>
            </div>

            <div>
                <label class="artistaddlabel">Password:</label><br>
                <input type="text" name="password" class="artistadd" required="required"><br><br>
            </div>

            <div>
                <br><input name="submitartist" type="submit" value="Add Artist" class="submitclass">
            </div>

        </form>
        </div> 

    </header>

</body>
</html>
