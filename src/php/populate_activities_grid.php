<?php

//function populateActivitiesGrid() {

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

	//select activities
	$sql = "SELECT activity, icon FROM activities WHERE username = 'system'";
	if ($results = mysqli_query($conn, $sql)) {

		while($result = mysqli_fetch_assoc($results)){

			$activity_name = ucwords($result["activity"]);
			$icon_path = "images/".$result["icon"].".png";

			echo"
				<div class=\"activity\" id=\"".$result["activity"]."\">
					<img src=\"".$icon_path."\" height=\"40px\" width=\"40px\">
					<p>".$activity_name."</p>
				</div>
			";
		}

	    
	} else {
	    echo "Error selecting activity: " . mysqli_error($conn);
	}



//}

?>