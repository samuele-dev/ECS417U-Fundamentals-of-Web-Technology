<?php
// Make database connection
$db_servername = getenv("MYSQL_SERVICE_HOST");
$db_username = getenv("DATABASE_USER");
$db_password = getenv("DATABASE_PASSWORD");
$db_name = getenv("DATABASE_NAME");
// Make the connection by adding the database values.
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

// Check if connection has been made.
if (!$conn) {
    die("Connection failed: " . mysqli_error());
}
?>