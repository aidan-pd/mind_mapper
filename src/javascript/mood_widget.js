$(window).bind("load", function() {
   	var selected_mood = "none";
	var selected_mood_intensity = 0;

	set_grid_size();
	set_grid_background();

	$( window ).resize(function() {
	  	set_grid_size();
	  	set_grid_background();

	});

    $(document).on('click', '.grid_square', function() { 
        select_mood(this);
    });

    $(document).on('click', '#apathy_1', function() { 
        select_mood(this);
    });

});

$(document).ready(function(){




 });

function set_grid_size(){
	var grid_width = $("#grid_table").css("width");
	$("#grid_table").css("height", grid_width);	
}

function set_grid_background(){
	var width = $(".grid_square").css("width");
	width = parseFloat(width)*5;

	var height = $(".grid_square").css("height");
	height = parseFloat(height)*6;

	var y_offset = $("#love_1").position();
	y_offset = parseFloat(y_offset.left);

	var x_offset = $("#love_1").position();
	x_offset = parseFloat(y_offset.top);

	$("#background_colours").css({	"width"		: width,
									"height" 	: height,
									"left"		: y_offset,
									"top"		: x_offset
								});

}

function select_mood(mood){

	//splits the ID of the selected moof to get the individual intensity and mood type
    selected_mood_string = $(mood).attr('id');
    selected_mood_string_split = selected_mood_string.split("_");

    selected_mood_intensity = selected_mood_string_split.pop();
    selected_mood = selected_mood_string_split.pop();

    $(".grid_square").css({"background-image":"url(images/grid_button.png)"});
    $("#"+selected_mood_string).css({"background-image":"url(images/grid_button_full.png)"});
}