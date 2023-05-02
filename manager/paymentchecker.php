<?php
session_start();
?>

<?php
$errorMsg='Payment Unsuccesful. Try Again Later.';

$con = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');

if(isset($_POST['makepayment'])) {
	$artist_name = $_POST['artist_name'];
	$hours_worked = $_POST['hours_worked'];
	$totalpayment = $_POST['totalpayment'];
	$payment_date = $_POST['payment_date'];
	$artist_username = $_POST['artist_username'];

	$insert = $con->prepare("INSERT INTO artist_payment(artist_name,hours_worked,totalpayment,payment_date,artist_username)
				values(:artist_name, :hours_worked, :totalpayment, :payment_date, :artist_username)
				");
	$insert->bindParam (':artist_name',$artist_name);
	$insert->bindParam (':hours_worked',$hours_worked);
	$insert->bindParam (':totalpayment',$totalpayment);
	$insert->bindParam (':payment_date',$payment_date);
	$insert->bindParam (':artist_username',$artist_username);
	$insert->execute();

	if($insert) {
		header('Location: paymentsuccess.php');
	}else {
		echo $errorMsg;	
	}
}	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Artist Payment</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        h1 {
            color: white;
            font-size: 22px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            left: 36%;
            position: absolute;
            line-height: 80px;
            text-align: center;
        }
    </style>
</head>

<body>
	<header>
		<nav class="navbar">    
		<a href="userdashboard.php"><img src="../images/logo.png" alt="sitelogo" width="200"></a>

        <ul class="main-nav">
            
		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">Classes
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="class.php">Manage Classes</a>
				<a href="viewclass.php">Class Bookings</a>
				<a href="viewreviews.php">Class Reviews</a>
			</div>
		</div> 

		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">Reports
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="viewreport.php">Class Reports</a>
				<a href="viewartists.php">Artists</a>
				<a href="viewuser.php">Users</a>
			</div>
		</div> 

        <div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">Payments
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content" id="myDropdown">
				<a href="payments.php">View Payments</a>
				<a href="artistpayment.php">Make Payments</a>
			</div>
		</div> 
			
			<li><a href="viewapplication.php">Applications</a></li>
			<li><a href="logout.php">Logout</a></li> 
		</ul>	
		</nav>

		<h2 class="heading">Make Payment To Artist</h2>
		<p class="paymentmessage">(Select An Artist Below To Make The Payment That Has Been Calculated)</p><br>


		<?php

		if(isset($_POST['calcpay'])) {
			$hoursworked = $_POST["hours_worked"];
			$hourlywage = $_POST["wage_rate"];

			$totalpayment = ($hoursworked * $hourlywage);
		
			echo "<h1>You Entered The Hours Worked As: $hoursworked<br></h1>";
			echo "<br><br><h1>You Entered The Hourly Wage As: $hourlywage</h1><br>";
			echo "<br><br><h1>Total Amount To Pay: $totalpayment</h1><br>";
		}

		?>

        <form name="paymentcalculator" action="" method="POST" class="paymentcalcform">

		<br><h2 class="payment-info">Choose Artist:</h2>
		<?php
			$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
			$sql = "SELECT CONCAT( first_name, '', last_name) as FullName from registered_artists";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) { ?>
			<select name="artist_name" class="">
				<?php foreach ($results as $row) { ?>
				<option value="<?php echo $row['FullName']; ?>"><?php echo $row['FullName']; ?></option>
				<?php } ?>
			</select>
			<?php } ?>
        <br>

		<br><h2 class="payment-info">Artist Username:</h2>
		<?php
			$pdo = new PDO('mysql:host=localhost;dbname=photographyart', 'parisha', 'ParishaDataBase1234!');
			$sql = "SELECT username from registered_artists";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();

			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if ($stmt->rowCount() > 0) { ?>
			<select name="artist_username" class="">
				<?php foreach ($results as $row) { ?>
				<option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
				<?php } ?>
			</select>
			<?php } ?>
        <br>
		
		<div>
			<br><label class="payment-info">Hours Worked:</label>
			<input type="text" name="hours_worked" class="paymentcalcinput" readonly value="<?php echo $hoursworked?>">
        </div>

		<div>
			<br><label class="payment-info">Amount To Pay:</label>
			<input type="text" name="totalpayment" class="paymentcalcinput" readonly value="<?php echo $totalpayment?>">
        </div>

		<div>
			<br><label class="payment-info">Date Of Payment:</label>
			<input type="date" name="payment_date" class="paymentcalcinput" required="required">
        </div>

		<div>
			<br><input name="makepayment" type="submit" value="Confirm Payment" class="submitclass"><br>
			<br><p class="paymentimportant">(Ensure The Correct Artist Has Been Selected Before Submitting)</p>
		</div>

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