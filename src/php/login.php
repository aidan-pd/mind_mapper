<?php

session_start();

$_SESSION["logged_in"] = "FALSE";

$servername = "dbhost.cs.man.ac.uk";
$username = "mbax4ad8";
$password = "zxcvbnm64";
$dbname = "mbax4ad8";
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



					//secure password decoding
					if (password_verify(
					    base64_encode(hash('sha256', $_POST['password'], true)
					    ),$result['password'])) {
						mysqli_close($conn);

					    header( "Location: ../welcome_page.php" );	
						$_SESSION["logged_in"] = "TRUE";
						$_SESSION["username"] = $submitted_username;

					} else {
					    echo "Invalid Password";
					}

					//checks if password is correct
					/*if($result['password'] == $submitted_password){
						header( "Location: ../welcome_page.php" );	
						$_SESSION["logged_in"] = "TRUE";
						$_SESSION["username"] = $submitted_username;
					}
					else{
						echo "Invalid Password";
					}*/

					

				}
				//user is not logged in or not a recognised user
				else{
					echo '<link rel="stylesheet" type="text/css" href="../css/welcome_page.css">';
					echo "<p id='titleText'>User Not Recognised. Please go back and click 'I don't have an account' if you have not already made one.</p>";
				}



			} else {
			    echo "Error selecting user: " . mysqli_error($conn);
			}

		mysqli_close($conn);


?>