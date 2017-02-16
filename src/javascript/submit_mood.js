$(document).ready(function(){

	$("#save_mood_button").click(function(){

		if (selected_mood == "none"){
			//if no mood selected
			alert("Please select a mood and activity.");
		}
		else{
			selected_activity = $("#activity_selected_text_container p").text();
			var request = $.ajax({
	            method: "POST",
	            url: "php/submit_mood.php",
	            data: {mood_type:selected_mood, mood_intensity:selected_mood_intensity, activity:selected_activity, free_text:$("#notesBox").val()}
	        })

	        request.done(function(){
	           location.href='welcome_page.php';
	        });			
		}



	});

});