<?php
session_start();
$logged_in_username = $_SESSION["username"];

$servername = "localhost";
$db_username = "root";
$password = "";
$dbname = "mind_mapper";

$mood_type = $_POST["mood_type"];
$mood_intensity = $_POST["mood_intensity"];
$activity = $_POST["activity"];
$free_text = $_POST["free_text"];

print "$mood_type";
print "$mood_intensity";
print "$activity";
print "$free_text";

// Create connection
$conn = mysqli_connect($servername, $db_username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert mood entry into table
$sql = "INSERT INTO mood_entry (username, mood_type, mood_intensity, activity, free_text)
		VALUES ('$logged_in_username', '$mood_type', '$mood_intensity', '$activity', '$free_text')";
if (mysqli_query($conn, $sql)) {
    echo "Inserted mood into table succesfully";
} else {
    echo "Error creating inserting mood into table: " . mysqli_error($conn);
}

mysqli_close($conn);


?>