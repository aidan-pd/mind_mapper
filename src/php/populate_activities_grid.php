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

//function populateActivitiesGrid() {

$servername = "dbhost.cs.man.ac.uk";
$username = "mbax4ad8";
$password = "zxcvbnm64";
$dbname = "mbax4ad8";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	//select activities
	$sql = "SELECT activity, icon FROM activities WHERE username = 'system' OR username = '$logged_in_username'";
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

mysqli_close($conn);


//}

?>