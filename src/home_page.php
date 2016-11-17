<?php

session_start();

if ($_SESSION["logged_in"] = 0){
	header( 'Location: http://localhost/mind_mapper/src/home_page.php' ) ;
}
else{
	$logged_in_username = $_SESSION["username"];
}

?>


<?php
/*
session_start();

$_SESSION["username"] = "system";

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mind_mapper";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
*/
?>
<!DOCTYPE html>
<html>
	<body>
		<?php
			$logged_in_username = $_SESSION["username"];
			$sql = "SELECT username FROM users WHERE username='$logged_in_username'";

			if ($results = mysqli_query($conn, $sql)) {

				if(mysqli_num_rows($results) > 0){

					//user is logged in
					while($result = mysqli_fetch_assoc($results)){
						echo "<p>Welcome back ".$logged_in_username.".</p>";
					}

				}
				//user is not logged in or not a recognised user
				else{
					echo "<p>User Not Recognised. Please contact Aidan.</p>";
				}



			} else {
			    echo "Error selecting activity: " . mysqli_error($conn);
			}

		?>
	</body>
</html>