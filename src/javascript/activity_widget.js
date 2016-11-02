$(document).ready(function(){



    load_activities_grid();


    var icon_selected = "icon_1";

    var selected_activity = "none";
    var selected_activity_icon = "icon_1";

    $("#activity_selected").hide();
    $("#choose_activity").hide();
    $("#add_activity").hide();

    $("#no_activity_selected").click(function(){
		
        $("#no_activity_selected").hide();
		$("#choose_activity").show();

    })
	
    $("#existing_activities").click(function(){
		
		$("#choose_activity").hide();
        $("#activity_selected").show();

    })	
	
    $("#activity_selected").click(function(){
		
        $("#activity_selected").hide();
		$("#choose_activity").show();

		
    })	

    $("#add_activity_button").click(function(){
		

        $("#choose_activity").hide();
		$("#add_activity").show();

    })
	
    $("#ico1").click(function(){
        icon_selected = "icon_1";
        $(".icon").removeClass("icon_selected");
        $("#ico1").addClass("icon_selected");
    })

    $("#ico2").click(function(){
        $(".icon").removeClass("icon_selected");
        $("#ico2").addClass("icon_selected");
        icon_selected = "icon_2";
    })

    $("#ico3").click(function(){
        $(".icon").removeClass("icon_selected");
        $("#ico3").addClass("icon_selected");
        icon_selected = "icon_3";
    })

    $("#ico4").click(function(){
        $(".icon").removeClass("icon_selected");
        $("#ico4").addClass("icon_selected");
        icon_selected = "icon_4";
    })            

    $(".submit_button").click(function(){
		
        var activity_name = $("#text_box").val();

        $.ajax({
            method: "POST",
            url: "php/submit_activity.php",
            data: {username:"system", activity:activity_name, icon:icon_selected}
        }).done(function(){
            load_activities_grid();
            $("#add_activity").hide();
            $("#activity_selected").show();

            selected_activity = activity_name;

            selected_activity_icon_URL = "images/".concat(icon_selected);
            selected_activity_icon_URL = selected_activity_icon_URL.concat(".png");

            $("#activity_selected p").text(selected_activity);
            $("#circle").attr('src', selected_activity_icon_URL);
        });



    })	
	
    $(document).on('click', '.activity', function() { 
        select_activity(this);
    });


});

function load_activities_grid(){
    $("#existing_activities").empty();

    $("#existing_activities").load("php/populate_activities_grid.php");
}

function select_activity(activity){
        selected_activity = $(activity).attr('id');
        selected_activity_icon = $(activity).find('img').attr('src');
        $("#activity_selected p").text(selected_activity);
        $("#circle").attr('src', selected_activity_icon);

}

