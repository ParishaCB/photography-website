<?php
session_start();
?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

if(isset($_POST['cancelbooking'])) {    
    $pdo_statement=$pdo->prepare("DELETE FROM bookings where booking_uniqueid=" . $_GET['booking_uniqueid']);
    $pdo_statement->execute();  
    
    if(!$pdo_statement) {
        function function_alert($message) {
            echo"<script>alert('$message');</script>";
        }
        function_alert("Database Not Available. Try Again Later.");
    }else {
        header ("Location: cancelmessage.php");
    }

}

$pdo_statement = $pdo->prepare("SELECT * FROM bookings where booking_uniqueid=" . $_GET["booking_uniqueid"]);
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

        <div><a href="bookedclass.php" class="bookclassbutton">Go Back</a></div>


        <div>
        <h2 class="bookheading">Are You Sure You Want To Cancel This Booking?</h2>
        <form name="cancelbooking" action="" method="POST" class="addclass">

            <div>
                <label>Booking ID:</label><br>
                <input type="text" name="booking_id" class="nameinput" readonly value="<?php echo $result[0]['booking_uniqueid']; ?>">
            </div>

            <div>
                <br><label>Class Name:</label><br>
                <input type="text" name="class_name" class="nameinput" readonly value="<?php echo $result[0]['class_name']; ?>">
            </div>

            <div>
                <br><label>Class Description:</label><br>
                <textarea type="text" name="class_description" class="nameinput" readonly><?php echo $result[0]['class_description']; ?></textarea>
            </div>

            <div>
                <br><label>Date:</label><br>
                <input type="date" name="date" class="nameinput" readonly value="<?php echo $result[0]['date']; ?>"><br>
            </div>

            <div>
                <br><label>Time:</label><br>
                <input type="time" name="time" class="nameinput" readonly value="<?php echo $result[0]['time']; ?>"><br>
            </div>

            <div>
                <br><label>Location:</label><br>
                <textarea type="text" name="location" class="nameinput" readonly><?php echo $result[0]['location']; ?></textarea><br><br> 
            </div>


            <div>
                <br><input name="cancelbooking" type="submit" value="Yes I'm Sure. Cancel Booking" class="submitclass">
            </div>

        </form>
        
        </div> 

    </header>

</body>
</html> 