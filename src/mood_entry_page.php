<!DOCTYPE>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="javascript/activity_widget.js"></script>
<?php
//require "php/populate_activities_grid.php";
?>

<link rel="stylesheet" type="text/css" href="css/activity_widget.css">
</head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<body>
<h1>Activity</h1>
<p class="optional_text">(Optional)</p>
<div class="widget_box" id="activity_widget_box">

	<div id="no_activity_selected">
		<p class="widget_text">Select Activity...</p>	
	</div>
	
	
	<div id="activity_selected">

		<img src="circle.png" id="circle">
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
				<p class="widget_text">New Activity...</p>
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

</body>
</html>