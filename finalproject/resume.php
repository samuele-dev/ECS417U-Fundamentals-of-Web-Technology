<?php
/* Initialize the session */
session_start();
?>
<!DOCTYPE html>
<html>
	<head> <!-- Information about the web page -->
		<title>Samuele Joshi - Resume</title><!-- Source https://gallery.kissclipart.com/20180901/tbw/kissclipart-nyc-s-train-clipart-train-new-york-city-subway-bc9cbd979a925890.jpg -->
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
				<section class="flexbox-item flexbox-item-1"> <!-- Title and content -->
					<h2 class="main-article-section-subheader">Education & Qualifications</h2>
					<!-- Infomration is stored in points or paragraphs. -->
					<ul class="section-content-points">
						<li>September 2019 – Present: Queen Mary, University of London BSc (Hons) Computer Science</li>
						<li>September 2018 – June 2019: Queen Mary, University of London Science and Engineering Foundation Programme (Computer Science) – Grade: Passed 64.7%</li>
						<li>2017 – Present: Cardinal Vaughan – A Level Italian Course</li>
						<li>2016-2017: Cardinal Vaughan, Italian course for IGCSE Grade: A</li> 
					</ul> 
					<p class="main-article-section-content">
						2011 – 2016: The Cardinal Wiseman Roman Catholic High School | Grades:
					</p>
					<ul class="section-content-points">
						<li>ICT : A</li>
						<li>Maths : C</li>
						<li>English : C</li>
						<li>Science : C</li>
						<li>Graphics : C</li>
						<li>R.E. : C</li>
						<li>Art : C</li>
					</ul>   
				</section>
				<!-- Information about skills and achievemnets -->
				<section class="flexbox-item flexbox-item-1">
					<h2 class="main-article-section-subheader">Skills & Achievements</h2>

					<ul class="section-content-points">
						<li>The Duke of Edinburgh Bronze Award (2015 – 2016)</li>
						<li>Class representative at Uxbridge college (2016 – 2018)</li>
						<li>Representative for my team which raised money for CAFOD (2015 – 2016)</li>
						<br>
						<li>Good team leader</li>
						<li>Excellent team worker</li>
						<li>Effective independent learner</li>
						<li>Experience of customer service</li>
						<li>Effective self time management</li>
						<li>Languages: English and Italian</li>
						<li>Programming Languages: PHP, JavaScript, Python, Java & C++</li>
						<li>Multimedia Graphics: Photoshop, Illustrator and 3D Sketch Up</li>
						<li>Excellent in Microsoft Office applications (Word, Excel, Publisher, PowerPoint and Access)</li>
					</ul>
				</section>

                <section class="flexbox-item flexbox-item-1">
					<h2 class="main-article-section-subheader">Experience</h2>

					<p class="main-article-section-content">
                        During my term on the Duke Of Edinburgh I was involved in voluntary work by raising money for the charity CAFOD.  I was tasked to do the following:
					</p>
						<ul class="section-content-points">
							<li>Planned various activates to achieve the financial target.</li>
							<li>Assigned team mates various tasks.</li>
							<li>Conducted daily preparation meetings with team members to achieve above the financial targets.</li>
							<li>Held end of day catch up meetings. </li>
						</ul>
						<br>
					<p class="main-article-section-content">
						During my college term, I was involved in games testing. This involved the following:
					</p>
						<ul class="section-content-points">
							<li>Review of Requirements</li>
							<li>Test Design</li>
							<li>Test Execution</li>
							<li>Issue Capturing</li>
							<li>Test Reporting</li>
						</ul>
				</section>
			</article>
		</main>
		<!--Web page footer-->
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