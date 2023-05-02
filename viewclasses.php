<?php
	require_once( 'connect/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotographyArt | View Classes </title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<header>
		<nav class="navbar">
		<a href="index.php" class="site-logo">
			<img src="images/logo.png" width="200" alt="sitelogo">
		</a>

        <ul class="main-nav">
			<li><a href="index.php" class="nav-links">Home</a></li>
			<li><a href="viewartists.php" class="nav-links">Artists' Profiles</a></li>
			<li><a href="viewclasses.php" class="nav-links">Classes</a></li>
			<li><a href="artistreg.php" class="nav-links">Become an artist</a></li>
			<li><a href="register.php" class="nav-links">Register</a></li>
			<li><a href="login.php" class="nav-links">Login</a></li>
		</ul>	
		</nav>

		<div class="main-content-container">
			<div class="main-content-box">
				<h1>PhotographyArt</h1><br><br><br>
				<br><h2>Check Out Our Classes Below!</h2><br>
				<p class="class-extra-info">(If You Want To Book A Class <a href="login.php" class="class-extra-info">Login</a> Or <a href="register.php" class="class-extra-info">Create An Account</a>)</p>
			</div>
		</div>
</header>

    <section class="profileitems">
        <h1 class="exibtitle">Our Classes</h1>

        <?php
		$pdo = connect();
		$results = $pdo->query("SELECT * FROM classes", PDO::FETCH_ASSOC);

		foreach( $results as $row) {
		?>

        <div class="classcard">
            <div class="container">
                <h2 class="class-card-text"> Class Name:<br> <?php echo $row["class_name"]; ?></h2><br>
                <p class="class-card-info">
                    <b>Class Description:</b> <?php echo $row["class_description"]; ?>
                    <br><b>Prerequisite Skills: </b> <?php echo $row["prerequisite_skills"]; ?>
                    <br><b>Artist Name: </b> <?php echo $row["artist_name"]; ?>
                    <br><b>Date: </b> <?php echo $row["date"]; ?>
                    <br><b>Time: </b> <?php echo $row["time"]; ?>
                    <br><b>Location: </b> <?php echo $row["location"]; ?>
                </p><br>
                </div>
            </div>
        </div>
		
        <?php
		}
		?>
		
	</section>

</body>
</html>
