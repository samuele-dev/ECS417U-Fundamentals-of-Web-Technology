<?php
/* Initialize the session */
session_start();
?>
<!DOCTYPE html>
<html>
	<head><!-- Information about the web page -->
		<title>Samuele Joshi - Portfolio</title><!-- Source https://gallery.kissclipart.com/20180901/tbw/kissclipart-nyc-s-train-clipart-train-new-york-city-subway-bc9cbd979a925890.jpg -->
		<link rel="stylesheet" type="text/css" href="webcontent.css">
		<!-- Uncomment if you want to reset <link rel="stylesheet" type="text/css" href="reset.css">-->
		<link rel="icon" href="WebFavicon.png" type="image/png" sizes="32x32">
		<script src="index-javascript.js"></script>
		<meta charset="UTF-8">
		<meta name="description" content="Samuele Joshi - Developer">
		<meta name="keywords" content="Java,Programming,Developer">
		<meta name="author" content="Samuele Joshi">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<!-- Here is where the structure of the web document starts-->
	<body>
		<!--Website Header-->
		<header id="main-header-panel">
			<!--Store info here-->
			<div id = "main-menu-container">
				
				<!--Header-->
				<h1 id="main-header-title">Samuel</h1>
				
				<!--Navigation-->
				<nav id="main-navbar-panel">	
					<ul id="main-navbar-list">
						<li class="main-navbar-item"><a href="index.php">ABOUT</a></li>
						<li class="main-navbar-item"><a href="portfolio.php">PORTFOLIO</a></li>
						<li class="main-navbar-item"><a href="resume.php">RESUME</a></li>
						<li class="main-navbar-item"><a href="blog/viewBlog.php">VIEW BLOG</a></li>
						<li class="main-navbar-item"><a href="blog/addPost.php">WRITE BLOG</a></li>
						<li class="main-navbar-item"><a href="contact.php">CONTACT</a></li>
					</ul>
				</nav>
				<!-- Dynamic nav based on if the user is logged in or not -->
				<nav id="account-navbar-panel">
					<ul id="main-navbar-list">
						<?php //<!-- If logged in display a welcome message -->
							if(isset($_SESSION['email'])){
								echo '<a>Welcome ' . htmlspecialchars($_SESSION["firstName"]) . '</a>';
								echo '<a id="signUp" href="logout.php">Log out</a>';
							} // Display log in if the user is not logged in.
							else{
								echo '<a id="signUp" href="login.html">Log in</a>';
							}
						?>
					</ul>
				</nav>

				<!--Hamburger Icon - This allows us to make our website useable for any screen size-->
				<span class="open-slide">
					<a href="#" onclick="openSlideMenu()">
						<svg id="hamburger-icon">
							<path d="M0,8 30,8" stroke="#000" stroke-width="3.3"/>
							<path d="M0,17 30,17" stroke="#000" stroke-width="3.3"/>
							<path d="M0,26 30,26" stroke="#000" stroke-width="3.3"/>
						</svg>
					</a>
				</span>
			</div>
		</header>
		
		<!--Website Content-->
		<main>
			<!--Side Nav will apper if the screen is at a certain size-->
			<aside id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="index.php">ABOUT</a>
				<a href="portfolio.php">PORTFOLIO</a>
				<a href="resume.php">RESUME</a>
				<a href="blog/viewBlog.php">VIEW BLOG</a>
				<a href="blog/addPost.php">WRITE BLOG</a>
				<a href="contact.php">CONTACT</a>
				<br>
				<?php // Display log out if user is logged in.
					if(isset($_SESSION['email'])){
						echo '<a>Welcome ' . htmlspecialchars($_SESSION["firstName"]) . '</a>';
						echo '<a id="signUp" href="http://login.local/logout.php">Log out</a>';
					} // Display log in if the user is not logged in.
					else{
						echo '<a id="signUp" href="http://login.local/login.html">Log in</a>';
					}
				?>
			</aside>
			<!--Resume Content-->
			<!-- Here is where the content of my web page is stored -->
			<article class="main-article">
				<br><br>
				<section class="flexbox-item flexbox-item-1"> <!-- All content is stored in this box. We use flex to make it adjustable the content -->
					<h2 class="main-article-section-subheader">University Work</h2>
					<!-- Title & Content -->
					<ul class="section-content-points">
						<li>
							I created an adventure game which players can choose from two characters of there choice.
							Players can pick up objects that can be found or rewarded once player has beaten the enemy. 
							There are 3 stages to the game. First stage is to defeat a low level enemy which will provide the player with xp.
							Once the Player has defeated the enemy, they can progress to the next stage. If the player accumulates a certain amount of xp, 
							they will be rewarded by extra damage attack. In the second stage, they can pick up items. These items will then be used to
							imporove the chances of winning the battle. If player gets to the last stage, they have to defeat the boss. The boss has a very high attack
							and health compared to the rest of the enemies.
							<a href="AdventureGameSubmit.zip" download>Download Game File</a>
						</li> <!-- User can download project -->
						<br>
						<li>
							In my foundation year, we had to create a car robot from the very begining. First off, we had to make the circuit itself.
							This took roughly 12 hours in total which included soldering, putting components together and making sure there where no errors.
							Once this was completed, we then had to program the car. We needed to make sure it could drive and if in close contact with any objects,
							it would know how to deal with the situation. For example, if a chair was infront, how would it respond? Would it go forward or go back.
							I made sure that when close to an object it would turn back and continue driving. My next achievement would be how to make the car follow you.
							If light was present, the car would follow you. For example, if you had a torch light and you moved it in a certain location, the car would go to that location.
						</li>
					</ul>
					<br> <!-- User can view image project -->
					<img id="uniCarImage" src="https://www.carcomputer.co.uk/image/cache/catalog/Products/car/$_57%20(3)-500x500.png">  
					<figurecaption>By Car Computer</figurecaption>
				</section>
			</article>
		</main>
		<!--Website footer-->
		<footer>
			<p id="footer-content"> 
				Contact details:
				<br>
				Phone Number: +44 000 0000 007
				<br>
				Email: emailExample@address.co.uk
			</p>
			<p id="footer-copyright">Copyright &copy; Samuele Joshi 2020</p>
		</footer>
	</body>
</html>