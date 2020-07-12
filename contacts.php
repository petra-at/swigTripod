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
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="./images/favicons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
    </head>
    
	<body style="background-color: white "!important;>

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

			<!-- Form -->
            <section>
                    
                    <form method="post" action="./includes/contacts.php">
                        <h3 class="black">Contact Form</h3>
                        <div class="row uniform 50%">
                            <div class="6u 12u$(small) black">
                                <input type="text" name="name" id="name" value="" placeholder="Name" required/>
                            </div>
                            <div class="6u$ 12u$(small) black">
                                <input type="email" name="email" id="email" value="" placeholder="Email" required/>
                            </div>
                            
                            <div class="6u$ 12u$(small) black">
                                    <input type="tel" name="phone" id="phone" value="" placeholder="Mobile No. (optional)"
                                     />
                                </div>
                            <div class="6u$ 12u$(small) black" >
                                <div class="select-wrapper grey">
                                    <select style = "margin-bottom: 10px" class  ="black" name="category" id="category" required>
                                        <option value="">- Category -</option>
                                        <option value="graduation">Graduation</option>
                                        <option value="events">Event</option>
                                        <option value="wedding">Wedding</option>
                                        <option value="birthday">Birthday</option>
										<option value="anniversary">Anniversary</option>
										<option value="familyPortrait">Family Portrait </option>
                                        <option value="personalPortrait">Personal Portrait</option>
                                    </select>
                                </div>
                            </div>

                            <div class="6u$ 12u$(medium) 12u$(small) black">
                                <textarea name="message" id="message" placeholder="Enter your message" rows="6" required></textarea>
							</div>

							<div class="u$"></div>

							<div id ="themap" class="6u$(medium) 12u$(small) black">
							<iframe width="323" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=zimbabwe%2C%20harare&t=&z=5&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
							</div>

							<div class ="2u$ 6u$(small) black" style="color: black">
									<h5 style="color: black">Contact Info</h5>
									<span class="navbarIcons icon fa-phone "></span><br>
									<span class="navbarIcons icon fa-envelope"></span><br>
									<span class="navbarIcons icon fa-instagram"></span>
							</div>
							
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" name="contacts-submit" value="Send Message" class="special" /></li>
                                    <li><input type="reset" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>
					</form>		
                </section>
		
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

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div style="position: relative; top: 40px;border-bottom: white;"class="modal-header">
					<h2 class="modal-title black" id="exampleModalLabel">Email Sent</h2>
					<hr>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="black bold modal-body">
					
					We'll get back to you shortly! 
				</div>
				<div class="modal-footer">
					<button style="margin:0 auto;" type="button" class="btn btn-secondary center" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
			</div>

		<!-- Scripts -->
		

			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script> 
				jQuery.noConflict(); 
				if (window.location.href.indexOf("?mail=success") > -1) {
					$('#exampleModal').modal('show');
				}
			</script>
	</body>
</html>
