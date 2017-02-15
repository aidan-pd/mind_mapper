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
	$sql = "SELECT icon FROM activities WHERE username = '$logged_in_username' AND activity=''";

	if ($results = mysqli_query($conn, $sql)) {

		$mood_entries = array();

		while($result = mysqli_fetch_assoc($results)){

			//$mood_entry = array($result["mood_type"],$result["mood_intensity"],$result["activity"],$result["free_text"],$result["time_stamp"]);
			array_push($mood_entries, array($result["mood_type"],$result["mood_intensity"],$result["activity"],$result["free_text"],$result["time_stamp"]));
		}

	    echo json_encode($mood_entries); 
	} else {
	    echo "Error selecting activity: " . mysqli_error($conn);
	}



//}

?>