<?php
$servername = "dbhost.cs.man.ac.uk";
$username = "mbax4ad8";
$password = "zxcvbnm64";
$dbname = "mbax4ad8";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE mind_mapper CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create users table
$sql = "CREATE TABLE users(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(30) NOT NULL,
	password VARCHAR(255) NOT NULL,
    study_week INT(1),
	reg_date TIMESTAMP
	)";
if (mysqli_query($conn, $sql)) {
    echo "Users table created successfully";
} else {
    echo "Error creating users table: " . mysqli_error($conn);
}

//add system user
$sql = "INSERT INTO users (username, password) VALUES ('system','system')";
if (mysqli_query($conn, $sql)) {
    echo "System user inserted to user table succesfully";
} else {
    echo "Error inserting System to user table: " . mysqli_error($conn);
}

// Create mood entry table
$sql = "CREATE TABLE mood_entry(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(30) NOT NULL REFERENCES users(username),
	mood_type VARCHAR(30) NOT NULL,
	mood_intensity VARCHAR(30) NOT NULL,
	activity VARCHAR(30) REFERENCES activities(activity),
	free_text VARCHAR(500),
	time_stamp TIMESTAMP
	)";
if (mysqli_query($conn, $sql)) {
    echo "Mood entry table created successfully";
} else {
    echo "Error creating mood entry table: " . mysqli_error($conn);
}

// Create activities table
$sql = "CREATE TABLE activities(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) REFERENCES users(username), 
	activity VARCHAR(30) NOT NULL,
	icon VARCHAR(30) NOT NULL
	)";
if (mysqli_query($conn, $sql)) {
    echo "activities table created successfully";
} else {
    echo "Error creating activities table: " . mysqli_error($conn);
}

//add activites

//resting
$sql = "INSERT INTO activities (username, activity, icon) VALUES ('system','resting', 'resting_icon')";
if (mysqli_query($conn, $sql)) {
    echo "Resting inserted to activities table succesfully";
} else {
    echo "Error inserting resting to activities table: " . mysqli_error($conn);
}

//at work
$sql = "INSERT INTO activities (username, activity, icon) VALUES ('system','at work', 'work_icon')";
if (mysqli_query($conn, $sql)) {
    echo "At work inserted to activities table succesfully";
} else {
    echo "Error inserting at work to activities table: " . mysqli_error($conn);
}

//travelling
$sql = "INSERT INTO activities (username, activity, icon) VALUES ('system','travelling', 'travelling_icon')";
if (mysqli_query($conn, $sql)) {
    echo "Travelling inserted to activities table succesfully";
} else {
    echo "Error inserting travelling to activities table: " . mysqli_error($conn);
}

//before exercise
$sql = "INSERT INTO activities (username, activity, icon) VALUES ('system','before exercise', 'bexercise_icon')";
if (mysqli_query($conn, $sql)) {
    echo "Before exercise inserted to activities table succesfully";
} else {
    echo "Error inserting before exercise to activities table: " . mysqli_error($conn);
}

//after exercise
$sql = "INSERT INTO activities (username, activity, icon) VALUES ('system','after exercise', 'aexercise_icon')";
if (mysqli_query($conn, $sql)) {
    echo "After exercise inserted to activities table succesfully";
} else {
    echo "Error inserting after exercise to activities table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
