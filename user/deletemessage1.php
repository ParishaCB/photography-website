<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotographyArt | Home </title>
    <link rel="stylesheet" href="../css/styles.css">
	<style>
.team-box {display:none;}

		h1 {
			position: absolute;
			top: 55%;
			left: 50%;
			transform: translate(-50%, -50%);
            text-align: center;
			font-size: 50px;
			color: white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		}

</style>
</head>

<body>

<header>
		<nav class="navbar">
		<a href="index.php" class="site-logo">
			<img src="../images/logo.png" width="200" alt="sitelogo">
		</a>

        <ul class="main-nav">
			<li><a href="../index.php" class="nav-links">Home</a></li>
			<li><a href="../viewartists.php" class="nav-links">Artists' Profiles</a></li>
			<li><a href="../viewclasses.php" class="nav-links">Classes</a></li>
			<li><a href="../artistreg.php" class="nav-links">Become an artist</a></li>
			<li><a href="../register.php" class="nav-links">Register</a></li>
			<li><a href="../login.php" class="nav-links">Login</a></li>
		</ul>	
		</nav>


        <h1>We're Sorry To See You Go :( <br><br>But, If You Ever Change Your Mind, You Can Always Create A New Account Again! 
        <br><br>We Hope To See You Again :) </h1>


</header>


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

