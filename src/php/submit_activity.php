<?php
session_start();
$logged_in_username = $_SESSION["username"];

$servername = "dbhost.cs.man.ac.uk";
$db_username = "mbax4ad8";
$password = "zxcvbnm64";
$dbname = "mbax4ad8";

$username = $_POST["username"];
$activity = $_POST["activity"];
$icon = $_POST["icon"];

print "$username";
print "$activity";
print "$icon";

// Create connection
$conn = mysqli_connect($servername, $db_username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert activity into table
$sql = "INSERT INTO activities (username, activity, icon)
		VALUES ('$logged_in_username', '$activity', '$icon')";
if (mysqli_query($conn, $sql)) {
    echo "Inserted activity into table succesfully";
} else {
    echo "Error inserting activity into table: " . mysqli_error($conn);
}

mysqli_close($conn);

?>