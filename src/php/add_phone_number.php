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

$sql = "SELECT study_week FROM users WHERE username = '$logged_in_username'";

if (mysqli_query($conn, $sql)) {
    echo "Got study week successfully";


	if ($results = mysqli_query($conn, $sql)) {
		$result = mysqli_fetch_assoc($results)
		$study_week = $result['study_week'];

	    $sql = "INSERT INTO phone_numbers (phone, study_week) VALUES ('$phone_number', '$study_week')";
		if (mysqli_query($conn, $sql)) {
		    echo "Added phone number";

		} else {
		    echo "Error adding phone number: " . mysqli_error($conn);
		}


	}//if



} else {
    echo "Error getting study week: " . mysqli_error($conn);
}


mysqli_close($conn);


?>