<?php
	//get the phone numbers from the database where the study_week matches the one given
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

	$study_week = $_GET["study_week"];

	//select phone numbers
	$sql = "SELECT phone
			FROM phone_numbers 
			WHERE study_week='$study_week'";

	$phone_numbers = array();

	if ($results = mysqli_query($conn, $sql)) {

		while($result = mysqli_fetch_assoc($results)){

			//$mood_entry = array($result["mood_type"],$result["mood_intensity"],$result["activity"],$result["free_text"],$result["time_stamp"]);
			$current_number = $result['phone_number'];
			if($current_number != NULL){
				array_push($phone_numbers, $current_number);
			}

		}

	} else {
	    echo "Error selecting phone numbers: " . mysqli_error($conn);
	}


mysqli_close($conn);



	//dispatch the notifications 
	require_once('../../zensend_php_api-master/init.php');

	$client = new ZenSend\Client("Yoxg_bwVBPDyKRemsTjMbw");

	$request = new ZenSend\SmsRequest();
	$request->body = "Log your mood with QS Mood Logger now!";
	$request->originator = "QS Mood Log";
	//$request->numbers = ["447958015883", "447581277407"];
	$request->numbers = $phone_numbers;

	try {
	  $result = $client->send_sms($request);
	  var_dump($result);
	} catch (\ZenSend\NetworkException $e) {
	  echo $e->curl_message . "\n";
	} catch (\ZenSend\ZenSendException $e) {
	  echo $e->failcode . "(" . $e->parameter . ")\n";
	}

?>