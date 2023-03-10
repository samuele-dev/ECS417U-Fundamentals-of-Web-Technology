<?php
/* Initialize the session */
session_start();
?>
<!DOCTYPE html>
<html>
	<head> <!-- Information about the web page -->
		<title>Samuele Joshi - Welcome</title> <!-- Source https://gallery.kissclipart.com/20180901/tbw/kissclipart-nyc-s-train-clipart-train-new-york-city-subway-bc9cbd979a925890.jpg -->
		<link rel="stylesheet" type="text/css" href="index.css">
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
								echo '<li class="main-navbar-item username"><a>Welcome ' . htmlspecialchars($_SESSION["firstName"]) . '</a></li>';
								echo '<li class="main-navbar-item"><a id="signUp" href="logout.php">Log out</a></li>';
							} // If not logged in just show the log in button.
							else{
								echo '<li class="main-navbar-item"><a id="signUp" href="login.html">Log in</a></li>';
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
						echo '<a id="signUp" href="logout.php">Log out</a>';
					} // Display log in if the user is not logged in.
					else{
						echo '<a id="signUp" href="login.html">Log in</a>';
					}
				?>
			</aside>
			<!-- IMPORTANT NOTICE:
					I have learnt how to make slideshows from this website tutorial:
					https://www.w3schools.com/howto/howto_js_slideshow.asp
					Seeing that I am a student and I am going to university to learn, 
					I have set myself the goal to go that extra mile in learning extra stuff in all modules.
					I understand how the slideshow works in the javascript and html.-->

			<!--slideshow-->
			<!-- A slideshow has to be contained which allows us to make easier adjustments with css-->
			<div class="slideshow-container">
					<!-- I do NOT own these photos. All rights go to the original holder -->
					<!--Source: https://wallpapersden.com/new-york-city-buildings-at-day-sunlight-wallpaper/7680x4320/ -->
				<figure class="webSlide">
					<img src="NewYorkCity4K.jpg">
					<figcaption class="caption">Working in beautiful cities. | Photo by Wallpapersden</figcaption>
				</figure>
					<!--Photo by Igor Miske on Unsplash sorce: https://br-webdesign.de/--> 
				<figure class="webSlide">
					<img src="Workspace4K.jpg">
					<figcaption class="caption">Hi, I'm a Developer! | Photo by Igor Miske on Unsplash</figcaption>
				</figure>
					<!--Source: https://i.imgur.com/UjK4eUF.jpg-->
				<figure class="webSlide">
					<img src="https://i.imgur.com/UjK4eUF.jpg">
					<figcaption class="caption">Life is beautiful! | Photo by imgur</figcaption>
				</figure>
					<!-- User can change image by going left or right -->
				<a class="left" onclick="changeImg(-1)">&#10094;</a>
				<a class="right" onclick="changeImg(1)">&#10095;</a>
				<script>
					displaySlides(slidePosition);
				</script>
			</div> <!-- Here is where the content of my web page is stored -->
			<article class="main-article">
				<section class="flexbox-item flexbox-item-1">
					<hgroup> <!-- More than one header should be put in a hgroup sematic element -->
						<h2 class="main-article-section-subheader" href="#aboutMe">About Me</h2>
						<h4 class="main-article-section-subheader-detail">Student</h4>
					</hgroup>
					<p class="main-article-section-content">I am an enthusiastic, punctual, reliable and friendly individual who works hard to achieve my potential. 
						Adaptable, committed and organised with a lot of interpersonal skills to be able to work in a team or individually. 
						I have excellent communication skills with the addition to be able to speak in Italian which makes me highly valuable to any organisation. 
						I am always seeking to learn new skills when the opportunity arises otherwise I use my own initiative to assist in any way I can.
					</p>
					<!--Photo of me-->
					<figure id="myselfPhotoBorder">
						<img id="myselfPhoto" src="Samuele_1_FB.jpg">
						<figcaption>Photo of Samuele Joshi</figcaption>
					</figure>
				</section>
				<section class="flexbox-item flexbox-item-2">
					<?php // Here is the aside element. If user is logged in, it will show account details and if not logged then it
							// will display a friendly message to say that they have to be logged in to view acccount details.
						echo '<aside id="accountDetails">';
						echo '<p id="accountTitle">Account Details</p>';
						if(isset($_SESSION['id'])){
							echo '<p class="accountContent">Welcome ' . htmlspecialchars($_SESSION["firstName"]) . '</p>';
							echo '<p class="accountContent">Email: ' . htmlspecialchars($_SESSION["email"]) . '</p>';
							echo '<p class="accountContent">First Name: ' . htmlspecialchars($_SESSION["firstName"]) . '</p>';
							echo '<p class="accountContent">Last Name: ' . htmlspecialchars($_SESSION["lastName"]) . '</p>';
						}
						else{
							echo '<p class="accountContent">Log in to view account details.</p>';
						}
						echo '</aside>';
					?>
				</section>
			</article>
		</main>
		<!--Website Footer: Contains contact details for quick easy access and copyright infomation.-->
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