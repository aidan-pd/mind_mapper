$(document).ready(function(){

	$("#save_mood_button").click(function(){

		if (selected_mood == "none"){
			//if no mood selected
		}
		else{
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