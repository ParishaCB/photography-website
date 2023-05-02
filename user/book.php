<?php
session_start();
?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

$pdo_statement = $pdo->prepare("SELECT * FROM classes where class_id=" . $_GET["class_id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!'); 

if(isset($_POST['bookclass'])) {
    $class_name = $_POST['class_name'];
    $class_description = $_POST['class_description'];
    $artist_name = $_POST['artist_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];

    $insert = $pdo->prepare("INSERT INTO bookings (class_name,class_description,artist_name,date,time,location,first_name,last_name,username)
				values(:class_name, :class_description, :artist_name, :date, :time, :location, :first_name, :last_name, :username)
				");
	$insert->bindParam (':class_name',$class_name);
	$insert->bindParam (':class_description',$class_description);
	$insert->bindParam (':artist_name',$artist_name);
	$insert->bindParam (':date',$date);
	$insert->bindParam (':time',$time);
	$insert->bindParam (':location',$location);
	$insert->bindParam (':first_name',$first_name);
	$insert->bindParam (':last_name',$last_name);
	$insert->bindParam (':username',$username);
	$insert->execute();

	if($insert) {
        header("Location: payment.php");
    }else {
        echo "Database Not Available";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Book Class</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>

        <div><a href="bookclass.php" class="bookclassbutton">Back to Classes</a></div>

        <div>
        <h2 class="bookheading">Book This Class</h2>
        <form name="classForm" action="" method="POST" class="addclass">

            <div>
                <label>Class Name:</label>
                <input type="text" name="class_name" class="nameinput" readonly value="<?php echo $result[0]['class_name']; ?>" required="required">
            </div>

            <div>
                <br><label>Class Description:</label><br>
                <textarea name="class_description" rows="2" cols="40" readonly required="required"><?php echo $result[0]['class_description']; ?></textarea>
            </div>

            <div>
                <br><label>Prerequisite Skills:</label><br>
                <textarea name="prerequisite_skills" class="nameinput" rows="2" cols="40" readonly required="required"><?php echo $result[0]['prerequisite_skills']; ?></textarea>
            </div>

            <div>
            <br><label>Artist Name:</label>
            <input type="text" name="artist_name" class="nameinput" value="<?php echo $result[0]['artist_name']; ?>" required="required" readonly>

            <div>
                <br><label>Date:</label>
                <input type="date" name="date" style="width:15%;" class="datetime" value="<?php echo $result[0]['date']; ?>" required="required" readonly>
            </div>

            <div>
                <br><label>Time:</label>
                <input type="time" name="time" style="width:15%;" class="datetime" value="<?php echo $result[0]['time']; ?>" required="required" readonly>
            </div>
            
            <div>
                <br><label>Location:</label>
                <input type="text" style="width:28%;" name="location" class="nameinput" value="<?php echo $result[0]['location']; ?>" readonly>
            </div>

            <br><label>Your First Name:</label>
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
            <input type="text" name="first_name" style="width:10%;" readonly class="nameinput" value="<?php echo $result['first_name']?>" required="required"><br>
        
            <br><label>Your Last Name:</label>
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
            <input type="text" name="last_name" style="width:10%;" readonly class="nameinput" value="<?php echo $result['last_name']?>" required="required"><break>

            <!-- <br><br><label>Your Username:</label> -->
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
            <input type="hidden" name="username" style="width:10%;" readonly class="nameinput" value="<?php echo $result['username']?>" required="required"><break>

            <div>
                <br><br><input name="bookclass" type="submit" value="Make Payment" class="submitclass">
            </div>

        </form>
        
        </div> 


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

