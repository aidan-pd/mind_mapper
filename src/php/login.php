<?php

session_start();

$_SESSION["logged_in"] = 0;

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mind_mapper";

	$submitted_username = $_POST["username"];
	$submitted_password = $_POST["password"];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}


			$sql = "SELECT username, password FROM users WHERE username='$submitted_username'";

			//runs query
			if ($results = mysqli_query($conn, $sql)) {

				//if there is a matching result for username
				if(mysqli_num_rows($results) > 0){

					//get result from query
					$result = mysqli_fetch_assoc($results);

					//checks if password is correct
					if($result['password'] == $submitted_password){
						header( "Location: ../mood_entry_page.php" );	
						$_SESSION["logged_in"] = 1;
						$_SESSION["username"] = $submitted_username;
					}
					else{
						echo "Invalid Password";
					}

					

				}
				//user is not logged in or not a recognised user
				else{
					echo "<p>User Not Recognised. Please contact Aidan.</p>";
				}



			} else {
			    echo "Error selecting user: " . mysqli_error($conn);
			}

		

?>