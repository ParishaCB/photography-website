<?php
	require_once( 'connect/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotographyArt | View Artists </title>
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
				<br><h2>Check Out Our Artists Below!</h2>
			</div>
		</div>
</header>

    <section class="profileitems">
        <h1 class="exibtitle">Our Artists</h1>

        <?php
		$pdo = connect();
		$results = $pdo->query("SELECT * FROM artist_profile", PDO::FETCH_ASSOC);

		foreach( $results as $row) {
		?>

        <div class="card">
            <div class="container">
                <img src="<?php echo $row['artist_picture']?>" height="110" width="110" class="card-image">
                <h2 class="card-text"> <?php echo $row['first_name']; ?> </h2>
                <h2 class="card-text"> <?php echo $row['last_name']; ?> </h2><br>
                <p class="card-info">
                    <b>Qualifications:</b> <?php echo $row['qualifications']; ?>
                    <br><b>Experience:</b> <?php echo $row['experience']; ?>
                    <br><b>Email:</b> <?php echo $row['email']; ?>
                </p><br>
                <p class="card-info">
                <b>Example Art From The Artist:</b>
                    <br><br><img src="<?php echo $row['art_pictures']?>" height="110">
                </p>
                </div>
            </div>
        </div>
		
        <?php
		}
		?>

    </section>
        
</body>
</html>
