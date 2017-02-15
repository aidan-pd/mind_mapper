<?php
session_start();
$logged_in_username = $_SESSION["username"];

$servername = "dbhost.cs.man.ac.uk";
$db_username = "mbax4ad8";
$password = "zxcvbnm64";
$dbname = "mbax4ad8";

$username = $_POST["username"];



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
    var url = 'php/login.php';
	var form = $('<form action="' + url + '" method="post">' +
	  '			<input type="text" name="username" placeholder="'+$username+'"><br>
	  			<input type="password" name="password" placeholder="'+$_POST['password']+'"><br>' +
	  '</form>');
	$('body').append(form);
	form.submit();
} else {
    echo "Error inserting account into table: " . mysqli_error($conn);
}

mysqli_close($conn);




?>