<?php

session_start();

if ($_SESSION["logged_in"] == "TRUE"){
	$logged_in_username = $_SESSION["username"];
}
else{
	header( 'Location: /mbax4ad8/src/src/login_page.php' ) ;

}

?>
<!DOCTYPE>
<html>
<head>
<!--<meta name="viewport" content="width=device-width">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />-->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="javascript/activity_widget.js"></script>
<script src="javascript/mood_widget.js"></script>
<script src="javascript/submit_mood.js"></script>


<?php
//require "php/populate_activities_grid.php";
?>

<link rel="stylesheet" type="text/css" href="css/activity_widget.css">
<link rel="stylesheet" type="text/css" href="css/mood_widget.css">

	<script>
		var week;

		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-92514395-1', 'auto');


		$.get('php/check_study_week.php', function(data){
			week = data;
					//OVERALL DATA
			ga('set', 'userId', week); // Set the user ID using signed-in user_id.

			ga('set', 'dimension1', week);
		  	ga('send', 'pageview');
		});


	</script>

</head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<body>

<h1>Mood</h1>
<div class="widget_box_x" id="mood_widget_box">

	<div id="background_colours"></div>

	<table id="grid_table" onclick="">
		<tr id="love_row">
			<td class="row_title">
				<p>Loving</p>
			</td>
			<td class="grid_square" id="love_1">
			</td>
			<td class="grid_square" id="love_2">
			</td>
			<td class="grid_square" id="love_3">
			</td>
			<td class="grid_square" id="love_4">
			</td>
			<td class="grid_square" id="love_5">
			</td>												
		</tr>
		<tr id="joy_row">
			<td class="row_title">
				<p>Happy</p>
			</td>
			<td class="grid_square" id="joy_1">
			</td>
			<td class="grid_square" id="joy_2">
			</td>
			<td class="grid_square" id="joy_3">
			</td>
			<td class="grid_square" id="joy_4">
			</td>
			<td class="grid_square" id="joy_5">
			</td>												
		</tr>
		<tr id="surprise_row">
			<td class="row_title">
				<p>Surprised</p>
			</td>
			<td class="grid_square" id="surprise_1">
			</td>
			<td class="grid_square" id="surprise_2">
			</td>
			<td class="grid_square" id="surprise_3">
			</td>
			<td class="grid_square" id="surprise_4">
			</td>
			<td class="grid_square" id="surprise_5">
			</td>												
		</tr>
		<tr id="fear_row">
			<td class="row_title">
				<p>Anxious</p>
			</td>
			<td class="grid_square" id="fear_1">
			</td>
			<td class="grid_square" id="fear_2">
			</td>
			<td class="grid_square" id="fear_3">
			</td>
			<td class="grid_square" id="fear_4">
			</td>
			<td class="grid_square" id="fear_5">
			</td>												
		</tr>
		<tr id="sadness_row">
			<td class="row_title">
				<p>Sad</p>
			</td>
			<td class="grid_square" id="sadness_1">
			</td>
			<td class="grid_square" id="sadness_2">
			</td>
			<td class="grid_square" id="sadness_3">
			</td>
			<td class="grid_square" id="sadness_4">
			</td>
			<td class="grid_square" id="sadness_5">
			</td>												
		</tr>	
		<tr id="anger_row">
			<td class="row_title">
				<p>Angry</p>
			</td>
			<td class="grid_square" id="anger_1">
			</td>
			<td class="grid_square" id="anger_2">
			</td>
			<td class="grid_square" id="anger_3">
			</td>
			<td class="grid_square" id="anger_4">
			</td>
			<td class="grid_square" id="anger_5">
			</td>												
		</tr>		
		<tr id="intensity_row">
			<td class="row_title">
			</td>
			<td class="grid_square_btm">
				<p>1</p>
			</td>
			<td class="grid_square_btm">
				<p>2</p>
			</td>
			<td class="grid_square_btm">
				<p>3</p>
			</td>
			<td class="grid_square_btm">
				<p>4</p>
			</td>
			<td class="grid_square_btm">
				<p>5</p>
			</td>												
		</tr>	
		<tr id="x_axis_label_row">
			<td class="grid_square_btm">
			</td>
			<td class="grid_square_btm" colspan="6">
				<p>Intensity of Emotion</p>
			</td>								
		</tr>						
	</table>
	<p id="orLabel">Or</p>
	<p id="apathy_1" onclick="">I'm not feeling anything in particular</p>
</div>


<h1>Activity</h1>
<div class="widget_box_blue" id="activity_widget_box">

	<div id="no_activity_selected">
		<p class="widget_text_blue">Select Activity...</p>	
	</div>
	
	
	<div id="activity_selected">

		<img id="circle">
		<div id="activity_selected_text_container">
			<p class="widget_text">Activity</p>
		</div>

	</div>

	<div id="choose_activity">
		<div id="existing_activities">

			

			
		</div>
		<div id="add_activity_button">
			<img src="images/new_icon.png" id="circle">
			<div id="add_activity_button_text_container">
				<p class="widget_text_blue">New Activity...</p>
			</div>
		</div>
	</div>

	<div id="add_activity">
	
		<div id="name_activity">
			<p class="widget_text">Activity Name:</p>
			<form action="action_page.php">
				<input type="text" name="firstname" placeholder="e.g. Shopping" id="text_box">
			</form>
		</div>
		
		<div id="choose_icon">
			<p class="widget_text">Choose Icon</p>
			<div class="icon" id="ico1">
				<img src="images/icon_1.png" height="40px" width="40px">
			</div>	

			<div class="icon" id="ico2">
				<img src="images/icon_2.png" height="40px" width="40px">
			</div>
			
			<div class="icon" id="ico3">
				<img src="images/icon_3.png" height="40px" width="40px">
			</div>			

			<div class="icon" id="ico4">
				<img src="images/icon_4.png" height="40px" width="40px">
			</div>				
		</div>
		<p class="submit_button">Add Activity</p>
		<div id="new_activity_button"></div>
	
	</div>
</div>

<h1>Notes</h1>
<p class="optional_text">(Optional)</p>

<form>
	<textarea id="notesBox" name="notes_box" rows="10" placeholder="This is where you can add anything else you have to say about your current mood, such as a diary entry or an annotation."></textarea>
</form>

<p id="save_mood_button" onclick="">Save Mood</p>
</br>
</body>
</html>