<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Manager Dashboard</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <h1 class="reviewheading">Received Payments</h1>

		<?php	
		$username = 'parisha';
		$password = 'ParishaDataBase1234!';
		$mysqlhost = 'localhost';
		$dbname = 'photographyart';
	  
		$pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);
		$pdo_statement = $pdo->query("SELECT * FROM bookings_payment",  PDO::FETCH_ASSOC);
		$pdo_statement->execute();
		$result = $pdo_statement->fetchAll();
		?>

		<table class="paymenttable">
		<thead>
			<tr>
			<th class="paymenttable-header">Payment ID</th>
			<th class="paymenttable-header">Full Name</th>
			<th class="paymenttable-header">User Email</th>
			<th class="paymenttable-header">Card Number</th>
			<th class="paymenttable-header">Card CVC</th>
			<th class="paymenttable-header">Card_Exp_Month</th>
			<th class="paymenttable-header">Card_Exp_Year</th>
			<th class="paymenttable-header">Amount</th>
			</tr>
		</thead> 
 
		<tbody id="table-body">
		<?php
		if(!empty($result)) { 
			foreach($result as $row) {
		?>
		<tr class="paymenttable-row">
			<td><?php echo $row["payment_id"]; ?></td>
			<td><?php echo $row["full_name"]; ?></td>
			<td><?php echo $row["user_email"]; ?></td>
			<td><?php echo $row["card_number"]; ?></td>
			<td><?php echo $row["card_cvc"]; ?></td>
			<td><?php echo $row["card_exp_month"]; ?></td>
			<td><?php echo $row["card_exp_year"]; ?></td>
			<td><?php echo $row["amount"]; ?></td>
		</tr>
		<?php
			}
		}
		?>
		</tbody>
		</table>


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
