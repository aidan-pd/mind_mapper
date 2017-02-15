<?php
session_start();
$logged_in_username = $_SESSION["username"];

$servername = "dbhost.cs.man.ac.uk";
$db_username = "mbax4ad8";
$password = "zxcvbnm64";
$dbname = "mbax4ad8";

$phone_number = $_GET["phone_number"];



// Create connection
$conn = mysqli_connect($servername, $db_username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert mood entry into table
$sql = "UPDATE users SET phone_number = $phone_number WHERE username='$logged_in_username'";
		
if (mysqli_query($conn, $sql)) {
    echo "Inserted phone number into table succesfully";
} else {
    echo "Error inserting phone number into table: " . mysqli_error($conn);
}

mysqli_close($conn);


?>