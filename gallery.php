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
	<body style="background-color: black;height:100% ">

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
					<li><a href="contacts.php"><span class="navbarIcons icon fa-pencil"></span>Contact</a></li>				</ul>
			</nav>

		<!--SlideShow Button Area-->
			<header id="header2">
					<div class="inner">			
						<div class="content">
							<h1>Gallery</h1>
							<h2>A stunning array of portrait photography.</h2>
							<a href="#" class="button big alt"><span>Let's Go</span></a>
						</div>
					</div>
			</header>

		<!--SlideShow Carousel -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<?php
							include_once './includes/dbh.php';
							$sql = "SELECT * FROM gallery ORDER BY ORDERPICS ASC";
							$stmt = mysqli_stmt_init($conn);
							if(!mysqli_stmt_prepare($stmt,$sql))
							{
								echo "Database error!";
							}
							else {
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);
								$count =0; 
								while($row = mysqli_fetch_assoc($result)){
									$count +=1; 
									$formatImagePath = '.'.ltrim($row["PATHFILE"],$row["PATHFILE"][0]);
									if($count==1){
										echo '<div class="carousel-item active">
										<img class="d-block" src='.$formatImagePath.' alt='.$row["ORDERPICS"].'>
										</div>';
									}
									else {
										echo '<div class="carousel-item">
										<img class="d-block" src='.$formatImagePath.' alt='.$row["ORDERPICS"].'>
										</div>';
									}
								}
							}
						?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>
			</div>

		<!--Main -->
				<div id="main">
					<div class="inner">	
						<div id="slideshow"class="icon fa-play fa-1x"></div>
							
							<div class="columns">
								<!-- Column 1 (horizontal, vertical, horizontal, vertical) -->
								<?php
									include_once './includes/dbh.php';
									$sql = "SELECT * FROM gallery ORDER BY ORDERPICS ASC";
									$stmt = mysqli_stmt_init($conn);
									if(!mysqli_stmt_prepare($stmt,$sql))
									{
										echo "Database error!";
									}
									else {
										mysqli_stmt_execute($stmt);
										$result = mysqli_stmt_get_result($stmt); 
										while($row = mysqli_fetch_assoc($result)){
											$formatImagePath = '.'.ltrim($row["PATHFILE"],$row["PATHFILE"][0]);
								echo'<div class="image fit">
										<a href="'.$formatImagePath.'"><img src="'.$formatImagePath.'" title="'.$row['CAPTION'].'"/></a>
									</div>';
										}
									}
								?>		
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
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>