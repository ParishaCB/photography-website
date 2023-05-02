<?php
session_start();
?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

if(isset($_POST['cancelartistbooking'])) {    
    $pdo_statement=$pdo->prepare("DELETE FROM artist_bookings where artistbooking_id=" . $_GET['artistbooking_id']);
    $pdo_statement->execute();  
    
    if(!$pdo_statement) {
        function function_alert($message) {
            echo"<script>alert('$message');</script>";
        }
        function_alert("Database Not Available. Try Again Later.");
    }else {
        header ("Location: cancelbookingmessage.php");
    }

}

$pdo_statement = $pdo->prepare("SELECT * FROM artist_bookings where artistbooking_id=" . $_GET["artistbooking_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Cancel Booking</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>

        <div><a href="bookedartists.php" class="bookclassbutton">Go Back</a></div>


        <div>
        <h2 class="bookheading">Are You Sure You Want To Cancel This Booking?</h2>
        <form name="cancelbooking" action="" method="POST" class="addclass">

            <div>
                <label>Artist Booking ID:</label><br>
                <input type="text" name="artistbooking_id" class="nameinput" readonly value="<?php echo $result[0]['artistbooking_id']; ?>">
            </div>

            <div>
                <br><label>Artist Name:</label><br>
                <input type="text" name="artist_name" class="nameinput" readonly value="<?php echo $result[0]['artist_name']; ?>">
            </div>

            <div>
                <br><label>Artist Surname:</label><br>
                <input type="text" name="artist_surname" class="nameinput" readonly value="<?php echo $result[0]['artist_surname']; ?>">
            </div>

            <div>
                <br><label>Booking Date:</label><br>
                <input type="date" name="booking_date" class="nameinput" readonly value="<?php echo $result[0]['booking_date']; ?>"><br>
            </div>

            <div>
                <br><label>Booking Time:</label><br>
                <input type="time" name="booking_time" class="nameinput" readonly value="<?php echo $result[0]['booking_time']; ?>"><br>
            </div>  

            <div>
                <br><input name="cancelartistbooking" type="submit" value="Yes I'm Sure. Cancel Booking" class="submitclass">
            </div>

        </form>
        
        </div> 

    </header>

</body>
</html> 