<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Applications</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header>
		<nav class="navbar">    
		<a href="managerdashboard.php"><img src="../images/logo.png" alt="sitelogo" width="200"></a>

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

        <h1 class="reviewheading">Applications</h1>
        <p class="importmessage">If An Applicant Is Accepted, Ensure To Email Them And Add The Artist To The System.</p><br>

        <?php	
		$username = 'parisha';
		$password = 'ParishaDataBase1234!';
		$mysqlhost = 'localhost';
		$dbname = 'photographyart';
	  
		$pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);
		$pdo_statement = $pdo->query("SELECT * FROM artist_applications",  PDO::FETCH_ASSOC);
		$pdo_statement->execute();
		$result = $pdo_statement->fetchAll();
		?>

		<table class="maintable">
		<thead>
			<tr>
			<th class="maintable-header">Artist ID</th>
			<th class="maintable-header">Artist Name</th>
			<th class="maintable-header">Artist Surname</th>
			<th class="maintable-header">Email</th>
			<th class="maintable-header">Speciality</th>
			<th class="maintable-header">Reason</th>
			<th class="maintable-header">View CV</th>
			<th class="maintable-header">Actions</th>
			<th class="maintable-header">Decision</th>
			<th class="maintable-header">Delete</th>
			</tr>
		</thead> 
 
		<tbody id="table-body">
		<?php
		if(!empty($result)) { 
			foreach($result as $row) {
		?>
		<tr class="maintable-row">
			<td><?php echo $row["artist_id"]; ?></td>
			<td><?php echo $row["artist_name"]; ?></td>
			<td><?php echo $row["artist_surname"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["speciality"]; ?></td>
			<td><?php echo $row["reason"]; ?></td>
			<td><a class="edit2" href='viewcv.php?artist_id=<?php echo $row['artist_id']; ?>'>View Applicant's CV</a></td>
			<td><a class="edit2" href='decision.php?artist_id=<?php echo $row['artist_id']; ?>'>Make A Decision</a></td>
			<td><?php echo $row["decision"]; ?></td>
			<td><a class="delete" onclick="return confirm('Are You Sure You Want To Delete?')" href='deleteapp.php?artist_id=<?php echo $row['artist_id']; ?>'>Delete</a></td><br><br>
		</tr>
		<?php
			} 
		}
		?>
		</tbody>
		</table>

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