var amountOfHoursToDisplay = 7;
var daysOffset = -1;

function pointAction(event){
	//var firstParse = name.split("=");
	//var secondParse = firstParse[1].split(")");
	$("#popup").show();

	$("#popup p").html("");

	var name = event.target.name;

	$("#popup p").html(name);
	

	//alert(event.target.name);
}

function closePopup(){
	$("#popup").hide();
}

var graph_data;

var data = "";

function getData(){
	//graph_data = $.load("../src/php/retrieve_graph_data.php");

	graph_data = $("").load("../src/php/retrieve_graph_data.php")

    /*$.ajax({url: "../src/php/retrieve_graph_data.php", success: function(result){
         graph_data = result;
    }});*/

	if($("#graphCanvas").width() < 375){
		amountOfHoursToDisplay = 5;
	}

	$.get('../src/php/retrieve_graph_data.php', function (response) {
	   data = response;
	   data = JSON.parse(data);
	});
}

function startSetup(){

	$("#popup").hide();


	if(data == ""){
		getData();
	}

	$.get();

	$(document).ajaxStop(function () {


		//fill graph to screen size
		$("#graphCanvas").attr("width", $(window).width());
		$("#graphCanvas").attr("height", $(window).height()-30);


		//set up axes
		var xAxis = [];
		var yAxis = [];

		yAxis.push(new axisPoint("Loving", "love"));
		yAxis.push(new axisPoint("Happy", "joy"));
		yAxis.push(new axisPoint("Surprised", "surprise"));
		yAxis.push(new axisPoint("Anxious", "fear"));
		yAxis.push(new axisPoint("Sad", "sadness"));
		yAxis.push(new axisPoint("Angry", "anger"));
		yAxis.push(new axisPoint("...", "apathy"));





		for (var i = amountOfHoursToDisplay-1; i >= 0; i--) {
			//alert(getDate(moment().subtract(i+daysOffset, 'days')));
			xAxis.push(new axisPoint(getTimeLabel(moment().subtract(i+daysOffset, 'hours')), getTime(moment().subtract(i+daysOffset, 'hours'))));
		};

		/*xAxis.push(new axisPoint("1", "1"));
		xAxis.push(new axisPoint("2", "2"));
		xAxis.push(new axisPoint("3", "3"));
		xAxis.push(new axisPoint("4", "4"));
		xAxis.push(new axisPoint("5", "5"));
		xAxis.push(new axisPoint(getDate(moment()), getDate(moment())));
		xAxis.push(new axisPoint(getDate(moment()), getDate(moment())));*/

		//alert("current moment:"+getDate(moment()));



		//set up viewport
		vp = new viewport(0,amountOfHoursToDisplay-1,0,6);

		var graphX = new graph();

		graphX.setup(xAxis, yAxis);

		for (var i = 0; i < data.length; i++) {
			var unixTime = moment(data[i][4]);
			var date = getTime(unixTime);
			var pointName = ""+data[i][2]+"</br>"+data[i][3]+"</br> Intensity: "+data[i][1]+"";

			pointToAddToGraph = new point(date,data[i][0],"images/"+data[i][5]+".png", getImageScale(data[i][1]), pointName);
			//alert("point moment:"+date);

			graphX.addPoint(pointToAddToGraph);
		};


	 	graphX.setBottomBuffer(35);
		
		graphX.drawGraph("graphCanvas", vp);

		$( window ).resize(function() {
			$("#graphCanvas").attr("width", $(window).width());
			$("#graphCanvas").attr("height", $(window).height()-30);
			graphX.drawGraph("graphCanvas", vp);

		});



	});



	//parsed_graph_data = JSON.parse(html(graph_data));

	//alert(parsed_graph_data);


	//alert(graph_data.toString());








		//scales for retina display
		/*if (window.devicePixelRatio) {
		    // grab the width and height from canvas
		    var height = container.getAttribute('height');
		    var width = container.getAttribute('width');
		    // reset the canvas width and height with window.devicePixelRatio applied
		    container.setAttribute('width', Math.round(width * window.devicePixelRatio));
		    container.setAttribute('height', Math.round( height * window.devicePixelRatio));
		    // force the canvas back to the original size using css
		    container.style.width = width+"px";
		    container.style.height = height+"px";
		    // set CreateJS to render scaled
		    stage.scaleX = stage.scaleY = window.devicePixelRatio;
		}*/



}


createjs.Ticker.addEventListener("tick", handleTick);
createjs.Ticker.framerate = 15;
function handleTick(){

		if(createjs.Ticker.paused != true){
			if(areImagesLoaded()){
				$("#loading").hide();
				startSetup();
				createjs.Ticker.paused = true;
			}

		}

}//handleTick

function getTime(aTime){
		return ""+aTime.date()+"-"+(aTime.month()+1)+"-"+aTime.year()+" "+aTime.hour()+":00";

}

function getTimeLabel(aTime){
		return ""+aTime.hour()+":00\n"+aTime.date()+"-"+(aTime.month()+1)+"";
}


function getDate(aDate){
	return ""+aDate.date()+"-"+(aDate.month()+1)+"-"+aDate.year()+"";
}

var days = ["Sun","Mon","Tue","Wed","Thur","Fri","Sat"];
var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
function getDateLabel(aDate){
	return ""+days[aDate.day()]+"\n"+aDate.date()+" "+months[aDate.month()]+"";
}


function getImageScale(intensity){

	var intensity = parseInt(intensity);

	if (intensity == 1) {
		return "0.0313";
	}
	else if (intensity == 2) {
		return "0.0547";
	}
	else if (intensity == 3) {
		return "0.0781";
	}
	else if (intensity == 4) {
		return "0.1015";
	}
	else if (intensity == 5) {
		return "0.124";
	}
	else {
		return "0.0781";
	}

	//var intensityMap = {i1:"0.0313",i2:"0.0547",i3:"0.0781",i4:"0.1015",i5:"0.124"};
	//alert(intensityMap.i+intensity);
	//return "0.0313";

}

function moveForwardInTimeBy(numberOfDays){
	createjs.Ticker.paused = false;
	$("#loading").show();
	daysOffset = daysOffset - numberOfDays;
	startSetup();
}

function moveBackwardsInTimeBy(numberOfDays){
	createjs.Ticker.paused = false;
	$("#loading").show();
	daysOffset = daysOffset + numberOfDays;
	startSetup();
}

function goToCalendarView(){
	window.location = "mood_view_page.php";
}