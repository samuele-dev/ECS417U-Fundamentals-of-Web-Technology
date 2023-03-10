<?php
// Initialize the session
session_start();
// User is already logged in? Redirect them to index page.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
// Make connection with database.
require "dbConnection.php";

// Variables that store field data.
$email = $password = "";
$emailError = $passwordError = false;
$errorMessage = "";
// If data is sent then do this...
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if fields are empty.
    if (empty($_POST['email'])) {
        $emailError = true;
    } 
    else {
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $passwordError = true;
    } 
    else {
        $password = $_POST['password'];
    }

    // If no errors (false), then verify if user is a in database.email, password, firstName, lastName
    if($emailError == false && $passwordError == false){
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if($row['email'] == $email && $row['password'] == $password){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['ID'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            //echo "Yes it works";
            // Redirect user to welcome page 
            header("location: blog/addPost.php");
        } // Username or password is wrong.
        else{
            header("location: login.html");
            $errorMessage = "Email or password may be incorrect.";
        }
    } // Unlikely to happen due to html validation, but good practise.
    else{
        exit("Failed: fields left empty.");
    }
    // Close connection with database.
    mysqli_close($conn);
}
else{
    header("location: login.php");
}
/* If they are already logged in then take the user back to this page.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}*/
?>
