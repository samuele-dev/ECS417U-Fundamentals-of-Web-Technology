<?php
/* Initialize the session */
session_start();
?>
<!DOCTYPE html>
<html>
	<head> <!-- Information about the web page -->
		<title>Samuele Joshi - Contact</title><!-- Source https://gallery.kissclipart.com/20180901/tbw/kissclipart-nyc-s-train-clipart-train-new-york-city-subway-bc9cbd979a925890.jpg -->
		<link rel="stylesheet" type="text/css" href="webcontent.css">
		<!-- Uncomment if you want to reset <link rel="stylesheet" type="text/css" href="index.css">-->
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
			<!--Resume Content-->
			<!-- Here is where the content of my web page is stored -->
			<article class="main-article">
				<br><br><br>
				<section class="flexbox-item flexbox-item-1"> <!-- Title & content are put in this box. Where they are adjusted using flex -->
					<h2 class="main-article-section-subheader">Contact Details</h2>
					<!-- Normal way of getting in contact with me -->
					<ul class="section-content-points">
						<li>Email: emailExample@address.co.uk</li>
						<li>Phone Number: +44 000 0000 007</li>
					</ul>   
				</section>
				
				<section class="flexbox-item flexbox-item-1">
					<h2 class="main-article-section-subheader">Social Media</h2>
					<!-- Social media way of getting in contact with me -->
					<ul class="section-content-points">
						<li>Facebook: <a href="https://www.facebook.com/people/Samuel-Joshi/100011133346412">Samuele Joshi</a></li>
					</ul>
				</section>
				<!-- Information to let people know. -->
				<section class="flexbox-item flexbox-item-1">
					<h2 class="main-article-section-subheader">Book a meeting?</h2>

					<ul class="section-content-points">
						<li>
							Contact me anytime and I will be happy to hear from you.<br>
							If you have an questions or would like a reference, please let me know and I will answer them.

						</li>
					</ul>
				</section>
			</article>
		</main>
		<!-- Footer of web page -->
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