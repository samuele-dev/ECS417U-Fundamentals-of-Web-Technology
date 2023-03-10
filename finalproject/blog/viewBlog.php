<?php
    // Make database connection.
    //require "dbConnection.php";
    // Make sql query - Select the data from database.
    //$sql = "SELECT * FROM blog";
    // Store this data in the result variable.
    //$result = $conn->query($sql);
    /* Here is where all content of the blog will be placed.
    $bData = "";
    $newPost = array();
    if ($result->num_rows > 0) {
        // While loop which will finish based on the number of rows in db.
        while($row = $result->fetch_assoc()) {
            $newPost[] = $row;
        }
        // Sort the post to the latest.
        rsort($newPost);
        // Now present this data to the user.
        foreach($newPost as $bData){
            echo "<artical id='blog-Artical'>";
            echo "<section class='blog-Section'><div id='blog-ID'>ID: " . $bData['id'] . "</div></section>";
            echo "<section class='blog-Section'><div id='blog-Title'>Title: " . $bData['title'] . "</div><div id='blog-Date'>Date: " . $bData['date'] . "</div></section>";
            echo "<section class='blog-Section'><div id='blog-Content'>Content: " . $bData['content'] . "</div></section>";
            echo "<section class='blog-Section'><div id='blog-Author'>Author: " . $bData['author'] . "</div></section></artical><br>";
        }
    }
    // If no blogs have been made. Make friendly message.
    else {
        echo "No blogs have been published yet.";
    } */
    
    
    

?>
<?php
/* Initialize the session */
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Samuele Joshi - View Blog</title><!-- Source https://gallery.kissclipart.com/20180901/tbw/kissclipart-nyc-s-train-clipart-train-new-york-city-subway-bc9cbd979a925890.jpg -->
		<link rel="stylesheet" type="text/css" href="viewBlog.css">
		<!-- Uncomment if you want to reset <link rel="stylesheet" type="text/css" href="reset.css">-->
		<link rel="icon" href="WebFavicon.png" type="image/png" sizes="32x32">
		<script src="blog.js"></script>
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
			</aside> <!-- Drop down list - User selects option, then submits. Once submitted the php code will start and present the result -->
            <form id="monthForm" name="monthForm" action="viewBlog.php" method="post">
                <label for="month">Month Post:</label>
                <select id="month" name="month">
                    <option value="null">All</option>
                    <option value="01">January</option>
                    <option value="02">Febuary</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select> <!-- Submit data to php code -->
                <input type="submit" name="monthSubmit" value="Submit">
            </form>
            <?php
                // Make database connection.
                require "dbConnection.php";
                // Sql query
                $sql = "SELECT * FROM blog";
                // Once posted/submitted then do this...
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $month = $_POST['month']; //Based on the item selected pass that data to a variable.
                    if($month == "null"){ //Use if statements to check if they meet the condition.
                        $sql = "SELECT * FROM blog"; //If all selected then sql query doesnt change.
                    }
                    else{ // Otherwise, show the post based on the month user selected.
                        $sql = "SELECT * FROM blog WHERE MONTH(date)=$month";
                    }
                }
                $result = $conn->query($sql);
                // Here is where all content of the blog will be placed.
                $bData = "";
                $newPost = array();
                if ($result->num_rows > 0) {
                    // While loop which will finish based on the number of rows in db.
                    while($row = $result->fetch_assoc()) {
                        $newPost[] = $row;
                    }
                    // Sort the post to the latest.
                    rsort($newPost);
                    // Now present this data to the user.
                    foreach($newPost as $bData){
                        echo "<artical id='blog-Artical'>";
                        echo "<section class='blog-Section'><div id='blog-ID'>ID: " . $bData['id'] . "</div></section>";
                        echo "<section class='blog-Section'><div id='blog-Title'>Title: " . $bData['title'] . "</div><div id='blog-Date'>Date: " . $bData['date'] . "</div></section>";
                        echo "<section class='blog-Section'><div id='blog-Content'>Content: " . $bData['content'] . "</div></section></artical><br>";
                    }//echo "<section class='blog-Section'><div id='blog-Author'>Author: " . $bData['author'] . "</div></section>
                }
                // If no blogs have been made. Make friendly message.
                else {
                    echo "<div id='noBlog'>No blogs have been published yet.</div>";
                }
                
                // Now close the connection with the database.
                $conn->close(); 
            ?>
        </main>
        <footer> <!-- Website footer -->
            <div id="footer-container">
                <p id="footer-content"> 
                    Contact details:
                    <br>
                    Phone Number: +44 000 0000 007
                    <br>
                    Email: emailExample@address.co.uk
                </p>
                <p id="footer-copyright">Copyright &copy; Samuele Joshi 2020</p>
            </div>
        </footer>
    </body>
</html>