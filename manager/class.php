<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhotographyArt | Manage Classes</title>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
.search {
	position: absolute;
	top: 26%;
	left: 10%;
	transform: translate(-50%,-50%);
	font-size: 27px;
	color: white;
	font-family: 'Ink Free';
	font-weight: bold;
}
#keyword {
	background: url('search.png') no-repeat center right 5px;
	border: black 2px solid;
	background-color: #324243; 
	border-radius: 6px; 
	padding: 7px;
	width: 22%;
	position: absolute;
	top: 26%;
	left: 25%;
	transform: translate(-50%,-50%);
	font-size: 20px;
	color: white;
	text-align: center;
	font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.keyword {
	position: absolute;
	top: 26%;
	left: 42%;
	transform: translate(-50%,-50%);
	background-color: #7878; 
	border: black 2px solid;
	padding: 6px;
	cursor: pointer;
	border-radius: 6px; 
	font-size: 17px;
	color: white;
	text-align: center;
	font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
::placeholder {
	color: white;
	font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
	font-size: 18px;
}
.pagestyle {
	text-align:center;
	position: absolute;
	top: 72%;
	left: 50%;
	transform: translate(-50%,-50%);
}
.btn-page.current {
	font-size: 20px;
	padding: 5px 10px;
	cursor: pointer;
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
	background-color: #4343;
	border-style: none;
	border-radius: 10px;
	border: 2px black solid;
}
.btn-page:hover {
	background: darkslategray;
	color: #FFF;
}
.btn-page.current {
	background: darkslategray;
	color: white;
}
.btn-page {
	border-style: none;
	margin-right: 8px;
	border-radius: 10px;
	border: 2px black solid;
	background-color: #4343;
	font-size: 20px;
	padding: 5px 10px;
	cursor: pointer;
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

}
</style>

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

		<?php	
		define("ROW_PER_PAGE",3);

		$username = 'parisha';
		$password = 'ParishaDataBase1234!';
		$mysqlhost = 'localhost';
		$dbname = 'photographyart';
	  
		$pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);

		$search_keyword = '';
		if(!empty($_POST['search']['keyword'])) {
			$search_keyword = $_POST['search']['keyword'];
		}
		$sql = 'SELECT * FROM classes WHERE class_name LIKE :keyword OR artist_name LIKE :keyword ORDER BY class_id ASC ';
		?>

		<?php
		/* Pagination Code starts */
			$per_page_html = '';
			$page = 1;
			$start=0;
			if(!empty($_POST["page"])) {
				$page = $_POST["page"];
				$start=($page-1) * ROW_PER_PAGE;
			}
			$limit=" limit " . $start . "," . ROW_PER_PAGE;
			$pagination_statement = $pdo->prepare($sql);
			$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
			$pagination_statement->execute();

			$row_count = $pagination_statement->rowCount();
			if(!empty($row_count)){
				$per_page_html .= "<div class='pagestyle';'>";
				$page_count=ceil($row_count/ROW_PER_PAGE);
				if($page_count>1) {
					for($i=1;$i<=$page_count;$i++){
						if($i==$page){
							$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
						} else {
							$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
						}
					}
				}
				$per_page_html .= "</div>";
			}

			$query = $sql.$limit;
			$pdo_statement = $pdo->prepare($query);
			$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
			$pdo_statement->execute();
			$result = $pdo_statement->fetchAll();
		?>


		<div><a href="addclass.php" class="classbutton" title="Add Class">Create Class</a></div>

		<form name='searchForm' action='' method='POST'> 
		<label class='search'>Search:</label>
		<div><input type='text' placeholder='Search For Class OR An Artist' name='search[keyword]' value="<?php echo $search_keyword; ?>" id='keyword' maxlength='40'></div>
		<input type='reset' class="keyword" value="Reset Search" onclick="window.location='class.php'"></div>

		<table class="maintable">
		<thead>
			<tr>
			<th class="maintable-header">Class ID</th>
			<th class="maintable-header">Class Name</th>
			<th class="maintable-header">Class Description</th>
			<th class="maintable-header">Prerequisite Skills</th>
			<th class="maintable-header">Artist Name</th>
			<th class="maintable-header">Date</th>
			<th class="maintable-header">Time</th>
			<th class="maintable-header">Location</th>
			<th class="maintable-header">Actions</th>
			</tr>
		</thead> 
 
		<tbody id="table-body">
		<?php
		if(!empty($result)) { 
			foreach($result as $row) {
		?>
		<tr class="maintable-row">
			<td ><?php echo $row["class_id"]; ?></td>
			<td class="adjust"><?php echo $row["class_name"]; ?></td>
			<td class="adjust"><?php echo $row["class_description"]; ?></td>
			<td class="adjust"><?php echo $row["prerequisite_skills"]; ?></td>
			<td><?php echo $row["artist_name"]; ?></td>
			<td><?php echo $row["date"]; ?></td>
			<td><?php echo $row["time"]; ?></td>
			<td class="adjust"><?php echo $row["location"]; ?></td>
			<td><a class="edit2" href='editclass.php?class_id=<?php echo $row['class_id']; ?>'>Edit</a> 
			<a class="delete" onclick="return confirm('Are You Sure You Want To Delete?')" href='deleteclass.php?class_id=<?php echo $row['class_id']; ?>'>Delete</a></td>
		</tr>
		<?php
			}
		}
		?>
		</tbody>
		</table>
		<?php echo $per_page_html; ?>
		</form>
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
