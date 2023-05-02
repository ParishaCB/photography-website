<?php
session_start();
?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

if(isset($_POST['bookartist'])) {
    $artist_name = $_POST['artist_name'];
    $artist_surname = $_POST['artist_surname'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $booking_reason = $_POST['booking_reason'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];

    $insert = $pdo->prepare("INSERT INTO artist_bookings (artist_name,artist_surname,booking_date,booking_time,booking_reason,first_name,last_name,email,user_name)
				values(:artist_name, :artist_surname, :booking_date, :booking_time, :booking_reason, :first_name, :last_name, :email, :user_name)
				");
	$insert->bindParam (':artist_name',$artist_name);
	$insert->bindParam (':artist_surname',$artist_surname);
	$insert->bindParam (':booking_date',$booking_date);
	$insert->bindParam (':booking_time',$booking_time);
	$insert->bindParam (':booking_reason',$booking_reason);
	$insert->bindParam (':first_name',$first_name);
	$insert->bindParam (':last_name',$last_name);
	$insert->bindParam (':email',$email);
	$insert->bindParam (':user_name',$user_name);
	$insert->execute();

	if($insert) {
        function function_alert($message) {
            echo"<script>alert('$message');</script>";
        }
        function_alert("Artist Booked Successfully. The Artist Will Contact You.");
        header('Location: bookedartists.php');
    }else {
        function_alert("Database Not Available. Try Again Later.");
    }
}

$pdo_statement = $pdo->prepare("SELECT * FROM artist_profile where artist_id=" . $_GET["artist_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
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

        <div><a href="bookartists.php" class="bookclassbutton">Back to Artists</a></div>

        <div>
        <h2 class="bookheading">Book This Artist</h2>
        <form name="classForm" action="" method="POST" class="addclass">

            <div>
                <label>Artist Name:</label>
                <input type="text" name="artist_name" class="nameinput" readonly value="<?php echo $result[0]['first_name']; ?>" required="required">
            </div>

            <div>
                <br><label>Artist Surname:</label>
                <input type="text" name="artist_surname" class="nameinput" readonly required="required" value="<?php echo $result[0]['last_name']; ?>">
            </div>

            <div>
                <br><label>Select Booking Date:</label>
                <input type="date" name="booking_date" class="nameinput" required="required">
            </div>

            <div>
                <br><label>Select Booking Time:</label>
                <input type="time" name="booking_time" class="nameinput" required="required"><br>
            </div>
            
            <div>
                <br><label>Reason For Booking:</label>
                <input type="text" name="booking_reason" class="nameinput" required="required" placeholder="e.g. For An Event"><br><br> 

            </div><hr>

            <div>
            <br><label style="font-size: 30px; font-family:'Ink Free'; font-weight:bold;">Your Details:</label><br>

            <br><label>Your Name:</label>
            <?php	
            $username = 'parisha';
            $password = 'ParishaDataBase1234!';
            $mysqlhost = 'localhost';
            $dbname = 'photographyart';
        
            $pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);

            $user_id = $_SESSION['username']; 

            $pdo_statement = $pdo->query("SELECT first_name FROM registered_users WHERE username='$user_id' ");
            $pdo_statement->execute();
            $result = $pdo_statement->fetch();
            ?>
            <input type="text" name="first_name" readonly class="nameinput" value="<?php echo $result['first_name']?>" required="required"><br>

            <br><label>Your Surname:</label>
            <?php	
            $username = 'parisha';
            $password = 'ParishaDataBase1234!';
            $mysqlhost = 'localhost';
            $dbname = 'photographyart';
        
            $pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);

            $user_id = $_SESSION['username']; 

            $pdo_statement = $pdo->query("SELECT last_name FROM registered_users WHERE username='$user_id' ");
            $pdo_statement->execute();
            $result = $pdo_statement->fetch();
            ?>
            <input type="text" name="last_name" readonly class="nameinput" value="<?php echo $result['last_name']?>" required="required"><br>

            <br><label>Your Email:</label>
            <?php	
            $username = 'parisha';
            $password = 'ParishaDataBase1234!';
            $mysqlhost = 'localhost';
            $dbname = 'photographyart';
        
            $pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);

            $user_id = $_SESSION['username']; 

            $pdo_statement = $pdo->query("SELECT email FROM registered_users WHERE username='$user_id' ");
            $pdo_statement->execute();
            $result = $pdo_statement->fetch();
            ?>
            <input type="text" name="email" readonly class="nameinput" value="<?php echo $result['email']?>" required="required"><br>

            <!-- <br><label>Your Username:</label> -->
            <?php	
            $username = 'parisha';
            $password = 'ParishaDataBase1234!';
            $mysqlhost = 'localhost';
            $dbname = 'photographyart';
        
            $pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);

            $user_id = $_SESSION['username']; 

            $pdo_statement = $pdo->query("SELECT username FROM registered_users WHERE username='$user_id' ");
            $pdo_statement->execute();
            $result = $pdo_statement->fetch();
            ?>
            <input type="hidden" name="user_name" readonly class="nameinput" value="<?php echo $result['username']?>" required="required"><br>
            </div>

            <div>
                <br><input name="bookartist" type="submit" value="Book Artist" class="submitclass">
            </div>

        </form>
        
        </div> 

    </header>
    

</body>
</html>
