<?php
// Initialize the session
session_start();
 
// Session variables become unset.
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to index page
header("location: index.php");
exit;
?>