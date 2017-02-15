<?php
session_start();
$logged_in_username = $_SESSION["username"];

$servername = "localhost";
$db_username = "root";
$password = "";
$dbname = "mind_mapper";

$username = $_POST["username"];

print "$username";
print "$password";

// Create connection
$conn = mysqli_connect($servername, $db_username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//encode password
$encodedPassword = password_hash(
    base64_encode(
        hash('sha256', $_POST['password'], true)
    ),
    PASSWORD_DEFAULT
);

$study_week = rand(0, 1);

// Insert user into table
$sql = "INSERT INTO users (username, password, study_week)
		VALUES ('$username', '$encodedPassword', '$study_week')";
if (mysqli_query($conn, $sql)) {
    echo "Inserted account into table succesfully";
} else {
    echo "Error inserting account into table: " . mysqli_error($conn);
}

mysqli_close($conn);

?>