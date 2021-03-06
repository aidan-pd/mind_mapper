//REMEMBER - requires jQuery and EasleJS
function graph(){

	//properties
	bottomBuffer = 25;
	leftBuffer = 65;

	centreXLabels = true;
	centreYLabels = true;
	labelOffset = -5;

	var xAxis = [];
	var yAxis = [];
	var points = [];

	//array of axisPoints
	function setup(xArray, yArray){
		xAxis = xArray;
		yAxis = yArray;
	}

	function addPoint(point){
		points.push(point);
	}

	function drawGraph(container, viewport){

		var containerWidth = $("#"+container).width();
		var containerHeight = $("#"+container).height();


		//stores the axisPoints of the graph with the viewport parameters applies
		var visibleXAxis = [];
		var visibleYAxis = [];

		//applies the viewport to the axis'
		if(typeof viewport.xLowerBound == "number"){

			for (var i = viewport.xLowerBound; i <= viewport.xUpperBound; i++) {
				visibleXAxis.push(xAxis[i]);
			};
			for (var i = viewport.yLowerBound; i <= viewport.yUpperBound; i++) {
				visibleYAxis.push(yAxis[i]);
			};

		}

		var gridsPoints = [];

		gridsPoints = assembleGridsPoints(visibleXAxis, visibleYAxis, containerWidth, containerHeight, bottomBuffer, leftBuffer);
		//alert(gridsPoints.length);
		stage = new createjs.Stage("graphCanvas");

		//plots a label for each grid square in the gridsPoints array
		/*for (var i = 0; i < gridsPoints.length; i++) {
			var textMessage = ""+gridsPoints[i].xAxisLabel+" "+gridsPoints[i].yAxisLabel;
			text = new createjs.Text(textMessage,"10px Arial", "#000000");
			text.x = gridsPoints[i].xPos;
			text.y = gridsPoints[i].yPos;
			stage.addChild(text);
		};*/

		//draws Y-axis labels
		for (var i = 0; i < visibleYAxis.length; i++) {
			ySpacing = (((containerHeight-bottomBuffer)/visibleYAxis.length)*i)+labelOffset;

			if (centreYLabels == true){
				ySpacing = ySpacing+(((containerHeight-bottomBuffer)/visibleYAxis.length)/2);
			}

			var textMessage = visibleYAxis[i].axisPointLabel;
			text = new createjs.Text(textMessage,"12px Arial", "#000000");
			text.x = 5;
			text.y = ySpacing+labelOffset;
			stage.addChild(text);

			//adds faint grid line
			yAxisLine = new createjs.Shape();
			yAxisLine.graphics.setStrokeStyle(1).beginStroke("#E7E7E7");
			yAxisLine.graphics.moveTo(leftBuffer, ySpacing);
			yAxisLine.graphics.lineTo(containerWidth,ySpacing);
			stage.addChild(yAxisLine);

		};
		//draw y-axis dividing line
		yAxisLine = new createjs.Shape();
		yAxisLine.graphics.setStrokeStyle(1).beginStroke("black");
		yAxisLine.graphics.moveTo(leftBuffer, 0);
		yAxisLine.graphics.lineTo(leftBuffer,containerHeight-bottomBuffer);
		stage.addChild(yAxisLine);

		//draws X-axis labels
		for (var i = 0; i < visibleXAxis.length; i++) {
			xSpacing = (((containerWidth-leftBuffer)/visibleXAxis.length)*i)+leftBuffer;

			if(centreXLabels == true){
				xSpacing = xSpacing + (((containerWidth-leftBuffer)/visibleXAxis.length)/2);
			}

			var textMessage = visibleXAxis[i].axisPointLabel;
			text = new createjs.Text(textMessage,"12px Arial", "#000000");
			text.x = xSpacing-labelOffset-25;



			//check if odd. if so offset Y text
			if(i%2==0){
				text.y = containerHeight-30;

			}
			else{
				text.y = containerHeight-5;

			}

			stage.addChild(text);
		};
		//draw x-axis dividing line
		line = new createjs.Shape();
		line.graphics.setStrokeStyle(1).beginStroke("black");
		line.graphics.moveTo(leftBuffer, (containerHeight-bottomBuffer));
		line.graphics.lineTo(containerWidth,containerHeight-bottomBuffer);
		stage.addChild(line);

		//plots sticks
		for (var i = 0; i < points.length; i++) {
			//IF to check if rendering speficied grid reference
			if(gridPoint = getGridPointFromAxisID(points[i].xLoc,points[i].yLoc, gridsPoints)){
				
				//draws a line to the corresponding X axis label
				dotXLine = new createjs.Shape();
				dotXLine.graphics.setStrokeStyle(2).beginStroke("black");
				dotXLine.graphics.moveTo(gridPoint.xCenter, (containerHeight-bottomBuffer));
				dotXLine.graphics.lineTo(gridPoint.xCenter,gridPoint.yCenter);
				stage.addChild(dotXLine);

		
			}//if statement
		};//for loop

		//plots points
		for (var i = 0; i < points.length; i++) {
			//IF to check if rendering speficied grid reference
			if(gridPoint = getGridPointFromAxisID(points[i].xLoc,points[i].yLoc, gridsPoints)){
				

				//draws dot image
				dotImage = new Image();
				dotImage.src = points[i].image;
				dot = new createjs.Bitmap(dotImage);
				dot.x = gridPoint.xCenter;
				dot.y = gridPoint.yCenter;
				dot.regX = dotImage.width/2;
				dot.regY = dotImage.height/2;
				dot.scaleX = dot.scaleY = points[i].pointSize;
				dot.addEventListener("click", function(event) { pointAction(event); })
				dot.name = points[i].pName;
				stage.addChild(dot);
				dotImage.onload = function(){
 					stage.update();
				}//onload function
		
			}//if statement
		};//for loop

 		stage.update();


 		createjs.Ticker.addEventListener("tick", handleTick);
 		createjs.Ticker.framerate = 0.5;
 		function handleTick(){
 			
 		}

		//stage.update();

		//alert(getGridPointFromAxisLabels("2", "Anxious", gridsPoints).xPos);

	}

	//returns an array of a data structure about each grid square for positioning purposes
	function assembleGridsPoints(xAxis, yAxis, width, height, bottomBuffer, leftBuffer){

		var gridsPoints = [];
		for (var xIndex = 0; xIndex < xAxis.length; xIndex++) {

			for (var yIndex = 0; yIndex < yAxis.length; yIndex++) {

				var xPos = (((width-leftBuffer)/xAxis.length)*xIndex)+leftBuffer;
				var yPos = ((height-bottomBuffer)/yAxis.length)*yIndex;

				var xCenter = xPos + ((width/xAxis.length)/2)
				var yCenter = yPos + ((height/yAxis.length)/2)


					gridPoint = {	
									xAxisLabel:xAxis[xIndex].axisPointLabel,
									yAxisLabel:yAxis[yIndex].axisPointLabel,
									xAxisID:xAxis[xIndex].axisPointID,
									yAxisID:yAxis[yIndex].axisPointID,
									xPos:xPos,
									yPos:yPos, 
									xCenter: xCenter,
									yCenter: yCenter
								};	
					gridsPoints.push(gridPoint);
				


			}
		}
		return gridsPoints;
	}

	function getGridPointFromAxisLabels(xAxis, yAxis, gridsPointsArray){
		for (var i = 0; i < gridsPointsArray.length; i++) {
			if(gridsPointsArray[i].xAxisLabel == xAxis 
				&& gridsPointsArray[i].yAxisLabel == yAxis){

				return gridsPointsArray[i];
			}
		};
	}

	function getGridPointFromAxisID(xAxis, yAxis, gridsPointsArray){
		for (var i = 0; i < gridsPointsArray.length; i++) {
			if(gridsPointsArray[i].xAxisID == xAxis && gridsPointsArray[i].yAxisID == yAxis){
				return gridsPointsArray[i];
			}
		};
	}


	function setBottomBuffer(newBottomBuffer){
		bottomBuffer = newBottomBuffer;
	}

	//makes the functions public
	return{
		setup:setup,
		addPoint:addPoint,
		drawGraph:drawGraph,
		setBottomBuffer:setBottomBuffer
	}

}

//string, string
function axisPoint(axisPointLabel, axisPointID){
	this.axisPointLabel = axisPointLabel;
	this.axisPointID = axisPointID;
}

//(int, float, time or axisPointID string), (int, float, time or axisPointID), string, string
function point(xLoc, yLoc, image, size, name){
	this.xLoc = xLoc;
	this.yLoc = yLoc;
	this.pointSize = size;
	this.pName = name;

	//allows for a built in point to be used, or a custom image
	switch(image){
		case "blackDot":
			this.image = "graph_layout/point1.png";
			break;
		default:
			this.image = image;
	}

}

//(int, float, time or axisPointID string) for all. Must all be same type.
function viewport(xLB, xUB, yLB, yUB){
	this.xLowerBound = xLB;
	this.xUpperBound = xUB;
	this.yLowerBound = yLB;
	this.yUpperBound = yUB;
}