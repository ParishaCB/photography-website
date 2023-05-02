<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotographyArt | Home </title>
    <link rel="stylesheet" href="css/styles.css">
	<style>
.team-box {display:none;}
</style>
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
				<br><h2>Where creative individuals thrive...
				<br>and where creative dreams come true</h2>
			</div>
		</div>
</header>

    <section class="exibitems">
        <h1 class="exibtitle">Upcoming Exhibitions</h1>

        <div class="team-containers">
			<div class="team-box">
				<img src="images/test.jpeg" alt="exibimage" width="110px" height="150px">
				<div class="artname">Charlotte Jones<br>Photography Exhibition</div>
				<div class="details">Location:<br>65 North Road, London, SW67 2YC</div>
				<div class="about-details">Date: 20/06/21<br><br>Price: Free</div>
			</div>

			<div class="team-box">
				<img src="images/test2.jpg" alt="exibimage" width="120px" height="150px">
				<div class="artname">John Doe<br>Photography Exhibition</div>
				<div class="details">Location:<br>65 North Road, London, SW67 2YC</div>
				<div class="about-details">Date: 20/07/21<br><br>Price: Free</div>
			</div>

			<div class="team-box">
				<img src="images/test3.jpg" alt="exibimage" width="130px" height="150px">
				<div class="artname">Melissa Warner<br>Photography Exhibition</div>
				<div class="details">Location:<br>65 North Road, London, SW67 2YC</div>
				<div class="about-details">Date: 20/08/21<br><br>Price: Free</div>
			</div>
			
		</div>

    </section>

    <section>
    <footer class="footer-items">
			<div class="footer-content">
				<p>&copy;PhotographyArt 2021</p><br>
				<p>This site is only for demonstrational purposes and has been developed for an educational exercise.
				The site contains text and media from external sources which have been referenced in the documentation 
				created for this site.</p>
			</div>
	</footer>
        
    </section>

	<script>
		var slideIndex = 0;
		carousel();

		function carousel() {
		var change;
		var slideshow = document.getElementsByClassName("team-box");
		for (change = 0; change < slideshow.length; change++) {
			slideshow[change].style.display = "none";  
		}
		slideIndex++;
		if (slideIndex > slideshow.length) {slideIndex = 1}    
		slideshow[slideIndex-1].style.display = "block";  
		setTimeout(carousel, 3000);
		}
	</script>
    
</body>
</html>

