<?php
    /* Initialize the session*/
    session_start();
    // User not logged in? Redirect them to login page.
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../login.html");
        exit;
    }
    // Make database connection.
    require "dbConnection.php";
        
    // Variable that stores data from the blog.
    $bTitle = $bContent = "";
    // Error handling
    $titleError = $contentError = false;
    // If blog has been submitted...
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if fields are empty - Already done in JS.
        if (empty($_POST['title'])) {
            $titleError = true;
        } 
        else {
            $bTitle = $_POST['title'];
        }
        if (empty($_POST['message'])) {
            $contentError = true;
        } 
        else {
            $bContent = $_POST['message'];
        }
        // If no errors (false), then insert data to database.
        if($titleError == false && $contentError == false){
            // Insert the data to the database.
            //$bDate = date('Y-m-d H:i:s');
			$sql = "INSERT INTO blog (title, content, date) VALUES ('$bTitle','$bContent', now())";
            if ($conn->query($sql) === TRUE) {
                //echo "A new blog has been created."; Testing purposes only
                header("Location: viewBlog.php");
            } 
            else {
                echo "SQL error " . $sql . "<br>" . $conn->error;
            }
        }
        else{
            echo "Fill in blog title and blog content.";
        }
        // Close database connection.
        $conn->close();
    }
    else{
        //header("location: login.php");
    }
?>
<?php
/* Initialize the session */
//session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Samuele Joshi - Post Blog</title><!-- Source https://gallery.kissclipart.com/20180901/tbw/kissclipart-nyc-s-train-clipart-train-new-york-city-subway-bc9cbd979a925890.jpg -->
		<link rel="stylesheet" type="text/css" href="blog.css">
		<!-- Uncomment if you want to reset <link rel="stylesheet" type="text/css" href="reset.css">-->
		<link rel="icon" href="WebFavicon.png" type="image/png" sizes="32x32">
        <script src="blog.js"></script>
        <script src="index-javascript.js"></script>
		<meta charset="UTF-8">
		<meta name="description" content="Samuele Joshi - Developer">
		<meta name="keywords" content="Java,Programming,Developer">
		<meta name="author" content="Samuele Joshi">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<!--Focus first on header, then main and then footer-->
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
						<li class="main-navbar-item"><a href="../index.php">ABOUT</a></li>
						<li class="main-navbar-item"><a href="../portfolio.php">PORTFOLIO</a></li>
						<li class="main-navbar-item"><a href="../resume.php">RESUME</a></li>
						<li class="main-navbar-item"><a href="viewBlog.php">VIEW BLOG</a></li>
						<li class="main-navbar-item"><a href="addPost.php">WRITE BLOG</a></li>
						<li class="main-navbar-item"><a href="../contact.php">CONTACT</a></li>
					</ul>
				</nav>

				<nav id="account-navbar-panel">
					<ul id="main-navbar-list">
						<!--<li class="main-navbar-item"><a href="http://login.local/login.html">Log In</a></li>-->
						<?php
							if(isset($_SESSION['email'])){
								echo '<li class="main-navbar-item username"><a>Welcome ' . htmlspecialchars($_SESSION["firstName"]) . '</a></li>';
								echo '<li class="main-navbar-item"><a id="signUp" href="../logout.php">Log out</a></li>';
							}
							else{
								echo '<li class="main-navbar-item"><a id="signUp" href="../login.html">Log in</a></li>';
							}
						?>
						<!--<li class="main-navbar-item" href="/html/"><a id="signUp">Sign Up</a></li>-->
					</ul>
				</nav>

				<!--Hamburger Icon - Remember to adjust burger and take out css internal style-->
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
        <!--Side Nav change html sematic element to aside later | id is for JS, class is for CSS-->
			<aside id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				<a href="../index.php">ABOUT</a>
				<a href="../portfolio.php">PORTFOLIO</a>
				<a href="../resume.php">RESUME</a>
				<a href="viewBlog.php">VIEW BLOG</a>
				<a href="addPost.php">WRITE BLOG</a>
				<a href="../contact.php">CONTACT</a>
				<br>
				<?php
					if(isset($_SESSION['email'])){
						echo '<a>Welcome ' . htmlspecialchars($_SESSION["firstName"]) . '</a>';
						echo '<a id="signUp" href="../logout.php">Log out</a>';
					}
					else{
						echo '<a id="signUp" href="../login.html">Log in</a>';
					}
				?>
				<!--<a>Log In</a>
				<a id="signUp">Sign Up</a>-->
            </aside>
            <br><br><br><br><br><br>
            <form name="form" action="addPost.php" method="post">
                <fieldset> <!-- Form where the user enters the title and content of the blog -->
                    <legend>Post A Blog</legend> <!-- Title of the form name -->

                    <label for="title" class="subHeader">Title:</label><br>
                    <input type="text" id="title" name="title" minlength="5" maxlength="50" placeholder="Enter a title..." required><br>

                    <label for="message" class="subHeader">Message:</label><br>
                    <textarea type="text" id="message" name="message" rows="20" cols="80" placeholder="Enter a message..." required></textarea><br><br>
					<!-- User can submit or clear data from field -->
                    <button type="submit" onclick="validateForm()" id="submit-Btn" value="Submit">Submit</button>
                    <button type="reset" onclick="clearForm()" id="clear-Btn" value="Clear">Clear</button>
                </fieldset>
            </form>
            <br><br><br>
        </main>
					<!-- Website footer -->
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