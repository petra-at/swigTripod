<?php
	session_start()
?>

<html>
	<head>
		<title>Swig's Tripod</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="./images/favicons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="./images/favicons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="./images/favicons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="./images/favicons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="./images/favicons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="./images/favicons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="./images/favicons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="./images/favicons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="./images/favicons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="./images/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="./images/favicons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="./images/favicons/favicon-16x16.png">
		<link rel="manifest" href="./images/favicons/manifest.json">
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="./images/favicons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
	</head>

	<body style="background-color: black;" >

		<!-- Header -->
			<header id="header">
				<nav>
					<div class="logo"><a href="index.php"><img src=./images/logo.png></a></div>
					<?php
						if(isset($_SESSION['userId']))
						{
							echo '<a id="signout" href="./includes/logout.php">Sign out</a>' ;
						}
					?>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
		<nav id="menu">
				<ul class="links">
					<li><a href="index.php"><span class="navbarIcons icon fa-home"></span>Home</a></li>
					<li><a href="about.php"><span class="navbarIcons icon fa-user-md"></span>About</a></li>
					<li><a href="gallery.php"><span class="navbarIcons icon fa-image"></span>Gallery</a></li>
					<?php
					if(isset($_SESSION['userId']))
						{
							echo'<li><a href="upload.php"><span class="navbarIcons icon fa-upload"></span>Upload Photos</a></li>';
						}
					?>
					<li><a href="contacts.php"><span class="navbarIcons icon fa-pencil"></span>Contact</a></li>
			</nav>

        <!--Video Banner-->    
            <section id="banner">
					<video autoplay muted playsinline src="./vids/vid_cropShot.mp4" ></video>
					<!--Hide when menu pressed-->
					<a style="text-decoration: none;position:relative; top:20%;scroll-behavior:smooth; "href="#intro"><h1 style=" color:rgb(66, 168, 216);z-index: 30000;" class="animated infinite slideOutDown slower navbarIcons icon fa-chevron-down fa-3x"></h1></a>
            </section>
			<div id="intro"></div>
		<!--Text-->
            <div id="bio"class="container">
                <div class="row">
					<!--Profile Image-->
					<div data-aos="fade-up"
					data-aos-offset="300"
					data-aos-easing="ease-in-sine" id="profileContainer" style = "height:fit-content" class="col">
                       <img id ="profile2" src="./images/swigProfile02.png"/>
					</div>

					<!--Bio Text-->
                    <div style="margin-top:30px;" data-aos="fade-left"
					data-aos-offset="50"
					data-aos-easing="ease-in-sine" class="col">
					
                    
                         <h4 style="display:inline;">Hesi!</h4> <hr><p class="small">I'm Panashe Mugspie. But most people call me Swig. A pseudonym that hasn't escaped me from highschool! 
                            Based in Harare, Zimbabwe, I've had the pleasure of working as a portraight photographer with a number of clients. 
                           Ranging from corporate, to graduation ceremonies. </p>
                            <p class="small">
                            My main goal as a photographer is to look beyond the face, and capture something deeper. 
                            Everytime the shutter is released during a shoot I consider the visual possibilities of what happens.
                            I'm obsessed with light and strive for the perfect confluence of backdrop and pose during the shoot.  
                            A goto setup of mine is the use of the Godox AD600BM strobe as my main light and a silver reflector for fill. </p>

                        <p class="small"> Alongside working as a photographer, I'm a final year med student working towards becoming a physician.
							If you like the photos and would like to hire me as your photographer, please do get in touch. </p>
							
						<p class="small">For any enquiries don't hesitate to contact. <br>
							<em>I'm always keen to take on new opportunities!</em> 
						</p>
						

						<div style="margin: 20px auto;display:flex;justify-content: flex-start;">
							<a style="margin-right:50px;" class ="small" href="contacts.php">Contact</a>
							
						</div>
						
                    </div>
            	</div>
                    
            </div>
		
		<!-- Footer -->
			<footer id="footer">
					<ul class="icons">
							<li><a href="mailto:pmugwise@gmail.com" class="icon fa-envelope" title="Email"><span class="label">E-mail</span></a></li>
							<li><a href="https://www.instagram.com/swigstripod/" class="icon fa-instagram" title="Instagram"><span class="label">Instagram</span></a></li>
							<li><a href="login.php" class="icon fa-sign-in" title="Login"><span class="label">Login</span></a></li>
						</ul>
				<div class="copyright">
					&copy; Copyright 2020 PAT Productions. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
			<script> AOS.init();</script>
	</body>
</html>
