
    rowSize = -50;
    columnSize = 25;
    secDivSize = 25;
    secDivOffset = -200;
    zoom2DivOffset = -50;
    secDivOpacity = 1;
    secDivPE = "auto";
    clickNotDrag = true;
    clicked = true;
    
    updatingNode = {};
    forBack = 0;
    x1GenLine = 0;
    y1GenLine = 0;
    currentNewNode = "Idea";
    possibleShapes = ["Inspiration", "Final", "Draft", "Sketch"];
    fD = .135;
    sD = .17;
    fD2 = .375;
    sD2 = .17;
    fD3 = .375;
    sD3 = .17;
    fD4 = .375;
    sD4 = .17;
    
window.onresize = function(event) {
	resizePanels();
}

function resizePanels() {

    var a = document.getElementById("header").clientHeight;
    var b = document.getElementById("project-header").clientHeight;
    var c = document.getElementById("footer").clientHeight;
    
    var width = document.documentElement.clientWidth;
    var height = document.documentElement.clientHeight;
    
    svgHeight = height - a - b - c;

    d3.selectAll("#background").style("width", width + "px").style("height", svgHeight + "px")
    d3.selectAll("#map").style("width", width + "px").style("height", svgHeight + "px")
}

function drawBloomcase() {
    newNodes = {};
    testLayout = new d3_layout_bloomcase();
    d3.json("../../../json/new8.json", function(data) {
    newNodes = data;
    testLayout.nodes(newNodes.nodes);
    bloomZoom = d3.behavior.zoom()
    .on("zoom", panBC);

    d3.select("#map").on("click", hideModal).call(bloomZoom)
    .on("dblclick.zoom", null)
    .on("mousewheel.zoom", null)
    .on("DOMMouseScroll.zoom",null);
    
    d3.select("#map").append("g").attr("id", "mgBloomG");    
    d3.select("#map").append("g").attr("id", "bloomG");    
    d3.select("#background").append("g").attr("id", "bgBloomG");    

    drawBC(testLayout.nodes(),testLayout.links());
     resizePanels()
    });
    
}

    var curvyLine = function(startPoint,endPoint) {

	var xStep = (endPoint[0] - startPoint[0]);
	var yStep = (endPoint[1] - startPoint[1]);
	var downLine = (endPoint[1] - startPoint[1]) + (rowSize / 2);
	var upLine = (endPoint[1] - startPoint[1]) - (rowSize / 2);
	var curveWidth = xStep / 2;
	var curveHeight = rowSize / 4;
	var xyDiff = Math.abs(yStep) + rowSize;
	var firstDiff = xyDiff * fD;
	var secDiff = xyDiff * sD;
	var firstDiff2 = xyDiff * fD2;
	var secDiff2 = xyDiff * sD2;
	var firstDiff3 = xyDiff * fD3;
	var secDiff3 = xyDiff * sD3;
	var firstDiff4 = xyDiff * fD4;
	var secDiff4 = xyDiff * sD4;

	if (startPoint[1] < endPoint[1] && startPoint[0] < endPoint[0]) {
// Above forward
//	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff) + ",0 " + (-secDiff) + ","+ (yStep) + " " + xStep + "," + yStep;
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (0) + ",0 " + (curveWidth) + ","+ (0) + " " + curveWidth + "," + (-curveHeight) + " l 0," + downLine + " c" + (0) + ",0 " + (0) + ","+ (-curveHeight) + " " + curveWidth + "," + (-curveHeight);
	}
	else if (startPoint[1] < endPoint[1] && startPoint[0] > endPoint[0]) {
//	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff2) + ",0 " + (-secDiff2) + ","+ (yStep) + " " + xStep + "," + yStep;
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (0) + ",0 " + (curveWidth) + ","+ (0) + " " + curveWidth + "," + (-curveHeight) + " l 0," + downLine + " c" + (0) + ",0 " + (0) + ","+ (-curveHeight) + " " + curveWidth + "," + (-curveHeight);
	}
// Above forward
	else if (startPoint[1] > endPoint[1] && startPoint[0] < endPoint[0]) {
//	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff3) + ",0 " + (-secDiff3) + ","+ (yStep) + " " + xStep + "," + yStep;
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (0) + ",0 " + (curveWidth) + ","+ (0) + " " + curveWidth + "," + (curveHeight) + " l 0," + upLine + " c" + (0) + ",0 " + (0) + ","+ (curveHeight) + " " + curveWidth + "," + (curveHeight);
	}
	else if (startPoint[1] > endPoint[1] && startPoint[0] > endPoint[0]) {
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff4) + ",0 " + (-secDiff4) + ","+ (yStep) + " " + xStep + "," + yStep;
	}
	else {
	return "M" + startPoint[0] + "," + startPoint[1] + "c0,0 "+xStep+"," + (yStep) + " " + xStep + "," + yStep;
	}
    }
    
function drawBC(nodeData,linkData) {
    d3.select("#new-node").style("display", "none");
    d3.selectAll("path.connections").remove();
    d3.selectAll("g.sec").remove();
    d3.selectAll("#inserted").remove();
    d3.selectAll(".uiPath").remove();
    
    vGridData = [];
    hGridData = [];
    var x = 0;
    while (x < 100) {
	vGridData.push((x - 50));
	hGridData.push((x - 50));
	x++;
    }
    
    d3.select("#bgBloomG").selectAll("line.hGrid").data(vGridData).enter().append("line")
    .attr("x1", -10000)
    .attr("x2", 10000)
    .attr("class", "hGrid")
    .attr("y1", function(d) {return d * columnSize})
    .attr("y2", function(d) {return d * columnSize})
    .style("stroke", "lightgray")
    .style("stroke-width", "1px")

    d3.select("#bgBloomG").selectAll("line.vGrid").data(vGridData).enter().append("line")
    .attr("y1", -10000)
    .attr("y2", 10000)
    .attr("class", "vGrid")
    .attr("x1", function(d) {return (d * rowSize)})
    .attr("x2", function(d) {return (d * rowSize)})
    .style("stroke", "lightgray")
    .style("stroke-width", "1px")

    d3.select("#bgBloomG").selectAll("path.connections").data(linkData).enter().append("path")
    .style("stroke", "black")
    .attr("class", "connections")
    .style("stroke-width", 2)
    .style("fill", "none")
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, (d.source.row * rowSize)],[d.target.column * columnSize, (d.target.row * rowSize)]) })
    .style("opacity", 0)
    ;
    
    d3.selectAll("path.connections")
    .transition()
    .duration(1000)
    .style("opacity", 1);

    var uiPathG = d3.select("#mgBloomG").selectAll("g.uiPath").data(linkData).enter().append("g")
    .attr("class", "uiPath")
    .on("mouseover", pathOver)
    .on("mouseout", pathOut);
    
    uiPathG
    .append("path")
    .style("stroke", "orange")
    .style("stroke-linecap", "round")
    .attr("class", "uiPath")
    .style("stroke-width", 8)
    .style("fill", "none")
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, (d.source.row * rowSize)],[d.target.column * columnSize, (d.target.row * rowSize)]) })
    .style("opacity", 0)
    ;
    
    uiPathG
    .append("circle")
    .attr("class", "uiPath")
    .attr("r", 8)
    .attr("cx", function(d) {return ((d.target.column * columnSize) + (d.source.column * columnSize)) / 2})
    .attr("cy", function(d) {return ((d.target.row * rowSize) + (d.source.row * rowSize)) / 2})
    .style("fill", "white")
    .style("stroke", "black")
    .style("stroke-width", "1px")
    .style("cursor", "pointer")
    .on("mouseover", function() {d3.select(this).style("fill", "cyan")})
    .on("mouseout", function() {d3.select(this).style("fill", "white")})
    .on("click", deleteLink)

    uiPathG
    .append("text")
    .attr("class", "uiPath")
    .attr("x", function(d) {return (((d.target.column * columnSize) + (d.source.column * columnSize)) / 2) - 4})
    .attr("y", function(d) {return (((d.target.row * rowSize) + (d.source.row * rowSize)) / 2) + 4})
    .text("x")
    .style("pointer-events", "none");

    
    var secG = d3.select("#bloomG").selectAll("g.sec").data(nodeData).enter().append("g")
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "sec")
    .attr("transform", function(d,i) {return "translate("+ (d.column * columnSize) +","+ ((d.row * rowSize)) +")"})
    .on("mousedown", startMove)
    .on("mouseup", endMove);

    var zoom2Div = d3.select("#betweenLayer").selectAll("div.zoom2").data(nodeData).enter().append("div")
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "zoom2")
    .style("position", "absolute")
    .style("left", "30px")
    .style("top", "200px")
    .style("opacity", 0)
    .style("pointer-events", "none")
    ;
    
    zoom2Div.each(function(d,i) {
    if(d.imgUrl) {
    if (d.imgUrl.length > 2) {
    d3.select(this)
    .append("img").attr("src", "../../../img/example/zoom2/" + d.imgUrl)
    .style("opacity", 1);
    d3.select(this).append("div")
    .attr("class", "text below")
    .html(d.title);
    }    
    }
        else {
    d3.select(this).append("div")
    .attr("class", "text")
    .html(d.title);
    }

    });
    
    var secDiv = d3.select("#aboveLayer").selectAll("div.sec").data(nodeData).enter().append("div")
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "sec modal node-info")
    .style("position", "absolute")
    .style("left", "30px")
    .style("top", "200px")
    .style("opacity", 0)
    .style("pointer-events", "none");
    
    secDiv.append("div")
    .attr("class", "node-info-image")
    .each(function(d,i) {
	if(d.imgUrl) {
    if (d.imgUrl.length > 2) {
    d3.select(this)
    .append("img").attr("src", "../../../img/example/zoom3/" + d.imgUrl)
    }
    }
    });
    
    secDiv.append("div").attr("class", "node-info-title").html(function(d) {return "<img class='node-info-type' src='../../../img/icon-"+d.kind.toLowerCase() +"-sm.png' />" + d.title})
    secDiv.append("div").attr("class", "node-info-desc ellipsis").html(function(d) {return d.summary})
    var secButtonDiv = secDiv.append("div").attr("class", "node-info-buttons")
    
    secButtonDiv.append("a")
    .attr("class", "node-info-edit button blue")
    .attr("href", "#")
    .html("edit")

    secButtonDiv.append("a")
    .attr("class", "node-info-more button purple")
    .attr("href", "#")
    .on("click", function(d) {	panToCenter(1000, d.column, d.row);populateMorePanel(d);d3.select("#morePanel").classed("hidden", false)})
    .html("more")
    
    secG.append("path")
    .attr("class", function(d){ return "nodeSymbol " + d.kind; })
    .attr("d", function(d,i) {return shapeMeasures[d.kind]["pathd"]})
    .attr("transform", function(d) { 
	return "translate(" + (-1*(shapeMeasures[d.kind]["myWidth"]/2)) + "," + (-1*(shapeMeasures[d.kind]["myHeight"]/2)) + ")"; 
    })
    .style("opacity", 0)
    .transition()
    .duration(1000)
    .style("opacity", 1);
    
    
    secG.append("text")
                .attr("dx", -1)
                .attr("dy", ".35em")
                .attr("alignment-baseline", "center")
                .attr("text-anchor", "middle")
                .style("fill", "white")
                .text(function(d) { return "" + (d.laneTotal)})
		.style("pointer-events", "none");


    panToCenter(0)
}

function panToCenter(transitionDuration, centerColumn,centerRow) {
    var svgCenter = (parseInt(d3.select("#map").style("width")) / 2);
    var svgMiddle = (parseInt(d3.select("#map").style("height")) / 2);
    var newCenter = centerColumn || d3.max(testLayout.nodes(), function(d) {return d.column}) / 2;
    var newMiddle = centerRow + 0 || -1;
//    var newMiddle = 0;
    var newZoomX = svgCenter - (columnSize * newCenter);
    var newZoomY = (parseInt(d3.select("#map").style("height")) / 2) - (rowSize * newMiddle);
//    var newZoomY = bloomZoom.translate()[1];

    d3.select("#node-popup").style("left", (svgCenter - 95) + "px").style("bottom", (svgMiddle + 95) + "px")

    bloomZoom.translate([newZoomX,newZoomY])

    d3.select("#bloomG").transition().duration(transitionDuration).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#bgBloomG").transition().duration(transitionDuration).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#mgBloomG").transition().duration(transitionDuration).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")

    d3.selectAll("div.zoom2").transition().duration(transitionDuration)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 40) + "px")})
    .style("top", function(d) {return "" + ((-35 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})
    
    d3.selectAll("div.sec").transition().duration(transitionDuration)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 105) + "px")})
    .style("top", function(d) {return "" + ((-115 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})

}

function panBC() {
    d3.select("#bloomG").attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#bgBloomG").attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#mgBloomG").attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    
    d3.selectAll("div.zoom2")
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 40) + "px")})
    .style("top", function(d) {return "" + ((-35 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})
    
    d3.selectAll("div.sec")
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 105) + "px")})
    .style("top", function(d) {return "" + ((-115 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})
}

function redrawBC(transitionSpeed) {
    d3.select("#bloomG").transition().duration(transitionSpeed).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#bgBloomG").transition().duration(transitionSpeed).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#mgBloomG").transition().duration(transitionSpeed).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")

    d3.selectAll("g.sec").transition().duration(transitionSpeed).attr("transform", function(d,i) {return "translate("+ (d.column * columnSize) +","+ ((d.row * rowSize)) +")"})

    d3.selectAll("path.connections").transition().duration(transitionSpeed).attr("d", function(d) {return curvyLine([d.source.column * columnSize, (d.source.row * rowSize)],[d.target.column * columnSize, (d.target.row * rowSize)]) });
    
    d3.selectAll("line.hGrid")
    .transition().duration(transitionSpeed)
    .attr("y1", function(d) {return d * columnSize})
    .attr("y2", function(d) {return d * columnSize})

    d3.selectAll("line.vGrid")
    .transition().duration(transitionSpeed)
    .attr("x1", function(d) {return (d * rowSize)})
    .attr("x2", function(d) {return (d * rowSize)})

    d3.selectAll("div.zoom2")
    .transition().duration(transitionSpeed)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 40) + "px")})
    .style("top", function(d) {return "" + ((-35 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})

    d3.selectAll("div.sec")
    .transition().duration(transitionSpeed)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 105) + "px")})
    .style("top", function(d) {return "" + ((-115 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})

    d3.selectAll("path.uiPath")
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, (d.source.row * rowSize)],[d.target.column * columnSize, (d.target.row * rowSize)]) });
    
    d3.selectAll("circle.uiPath")
    .attr("cx", function(d) {return ((d.target.column * columnSize) + (d.source.column * columnSize)) / 2})
    .attr("cy", function(d) {return ((d.target.row * rowSize) + (d.source.row * rowSize)) / 2});

    d3.selectAll("text.uiPath")
    .attr("x", function(d) {return (((d.target.column * columnSize) + (d.source.column * columnSize)) / 2) - 4})
    .attr("y", function(d) {return (((d.target.row * rowSize) + (d.source.row * rowSize)) / 2) + 4});

}

function setZoomLevel(zl) {
	    d3.selectAll(".zoom-control").classed("active", false);
	    d3.select("#zoom-"+zl).classed("active", true);
            d3.selectAll("div.sec")
	    .style("pointer-events", "none")
	    .style("opacity", 0)
            d3.selectAll("div.zoom2")
	    .style("pointer-events", "none")
	    .style("opacity", 0)
	    
	    d3.selectAll("path.nodeSymbol")
	    .style("opacity", 1)
	    var currentCenterColumn = ((parseInt(d3.select("#map").style("width")) / 2) - bloomZoom.translate()[0]) / columnSize;
	    var currentCenterRow = ((parseInt(d3.select("#map").style("height")) / 2) - bloomZoom.translate()[1]) / rowSize;

    switch(zl) {
	case 1:
	    rowSize = -50;
	    
	    var rescaleG = columnSize / 25;
	    
	    columnSize = 25;
	    
	    d3.selectAll("path.nodeSymbol")
	    .attr("transform", function(d) { 
	return "translate(" + ((-1*(shapeMeasures[d.kind]["myWidth"]/2))) + "," + ((-1*(shapeMeasures[d.kind]["myHeight"]/2))) + ")"; 
    });

	    break;
	case 2:
	    rowSize = -100;
	    var rescaleG = columnSize / 100;
	    columnSize = 60;
            d3.selectAll("div.zoom2")
	    .style("pointer-events", "auto")
	    .style("opacity", 1)
	    .style("pointer-events", "auto")
	    d3.selectAll(".secText").style("display", "none")
	    
	    d3.selectAll("path.nodeSymbol")
	    .attr("transform", function(d) { 
	return "translate(" + (35 + (-1*(shapeMeasures[d.kind]["myWidth"]/2))) + "," + ((-1*(shapeMeasures[d.kind]["myHeight"]/2)) - 34) + ")"; 
    });

	    break;
	case 3:
	    rowSize = -300;
	    var rescaleG = columnSize / 200;
	    columnSize = 200;
            d3.selectAll("div.sec")
	    .style("pointer-events", "auto")
	    .style("opacity", 1)
	    .style("pointer-events", "auto")

	    d3.selectAll(".secText").style("display", "block")

	    d3.selectAll("path.nodeSymbol")
	    .style("opacity", 0)


	break;
    }
    var newZoomX = (parseInt(d3.select("#map").style("width")) / 2) - (columnSize * currentCenterColumn);
    var newZoomY = (parseInt(d3.select("#map").style("height")) / 2) - (rowSize * currentCenterRow)
//    var newZoomY = bloomZoom.translate()[1] / rescaleG;
    bloomZoom.translate([newZoomX,newZoomY])
    redrawBC(500);
}

function draggingClicking() {
    clickNotDrag = false;
}


function startMove(d,i) {
    d3.event.stopPropagation();
    clickNotDrag = true;
    clickDragTimer = setTimeout('draggingClicking()', 250);
    
    if (!d3.select("#genNode").empty()) {return;}

    x1GenLine = d.column * columnSize;
    y1GenLine = (d.row * rowSize);
    updatingNode = d;
    var curMouse = d3.mouse(this.parentNode);
    d3.select("#map").on("mousemove", moveGenNode)
    d3.select("#bloomG").on("mouseup", endMove)
    d3.select("#bloomG").insert("path", ".sec")
    .attr("id", "genLine")
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[curMouse[0], curMouse[1]]) })
    .style("stroke", "black")
    .style("fill", "none")
    .style("stroke-width", 2)
    d3.select("#bloomG").append("g")
    .attr("id","genNode")
    .on("click", function() {d3.select("#modalOptions").style("display","block");})
    .attr("transform","translate("+curMouse[0]+","+curMouse[1]+")")
    .append("path")
    .attr("id","newNode")
    .attr("d","M 10,10 m -10,0 a 10,10 0 1,0 20,0 a 10,10 0 1,0 -20,0")
    .attr("transform", "translate(-10,-10)")
    .style("fill", "black")
    .style("opacity", 0)
    .transition().duration(500).style("opacity",1)
  
}

function populatePopup(incNode) {
    d3.select("#node-popup > .node-info-image > img").style("display", incNode.imgUrl.length > 2 ? "block" : "none").attr("src", "../../../img/example/zoom3/" + incNode.imgUrl)
    d3.select("#node-popup > .node-info-title").html(function(d) {return "<img class='node-info-type' src='../../../img/icon-"+incNode.kind.toLowerCase() +"-sm.png' />" + incNode.title})
    d3.select("#node-popup > .node-info-desc").html(function(d) {return incNode.summary})
}

function populateMorePanel(incNode) {
    d3.select("#morePanel > .node-info-image > img").style("display", incNode.imgUrl.length > 2 ? "block" : "none").attr("src", "../../../img/example/zoom3/" + incNode.imgUrl)
    d3.select("#morePanel > .node-info-title").html(function(d) {return "<img class='node-info-type' src='../../../img/icon-"+incNode.kind.toLowerCase() +"-sm.png' />" + incNode.title})
    d3.select("#morePanel > .node-info-desc").html(function(d) {return incNode.summary})    
}

function endMove(d,i) {
    
    if(clickNotDrag == true) {
	panToCenter(1000, updatingNode.column, updatingNode.row);
	hideModal();
	
	if(!d3.select("#zoom-3").classed("active")) {
	    d3.select("#node-popup .node-info-more").on("click", function() {d3.select("#morePanel").classed("hidden", false)})
	    d3.select("#node-popup").classed("hidden", false);
	    populatePopup(updatingNode);
	    populateMorePanel(updatingNode)
	}
	
	return;
    }
    if (!d3.select(".options").empty()) {return;}
    var curMouse = d3.mouse(this);
    var blNodes = testLayout.nodes();
    for (no in blNodes) {
	var checkX = Math.abs(blNodes[no].column * columnSize - curMouse[0]);
	var checkY = Math.abs((blNodes[no].row * rowSize) - curMouse[1]);
	if (checkX < 20 && checkY < 20) {
	    if (blNodes[no].column != updatingNode.column && !(blNodes[no].evolvedFrom.indexOf(updatingNode.nid) > -1 || updatingNode.evolvedFrom.indexOf(blNodes[no].nid) > -1)) {
	    
	        if (forBack > 0) {
		    blNodes[no].evolvedFrom.length == 0 ? blNodes[no].evolvedFrom = updatingNode.nid : blNodes[no].evolvedFrom += ("," + updatingNode.nid)
		}
		else {
		    updatingNode.evolvedFrom.length == 0 ? updatingNode.evolvedFrom = blNodes[no].nid : updatingNode.evolvedFrom += ("," + blNodes[no].nid)
		}
	    }
	    d3.select("#genNode").remove();
	    d3.select("#genLine").remove();
	    d3.select("#map").on("mousemove", null)
    var newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
    testLayout = new d3_layout_bloomcase();
    testLayout.nodes(newNodeArray);
    drawBC(testLayout.nodes(),testLayout.links())
	    return;
	}
    }

    d3.select("#map").on("mousemove", null)
    
    d3.select("#genNode")
    .insert("circle", "#newNode")
    .attr("class", "options")
    .style("fill", "white")
    .style("stroke", "black")
    .style("stroke-width", "2px")
    .attr("r", 50)
    
    function pointsOnCircle(shapeType,inc) {
	var circx = 0;
	var circy = -50;
	switch(inc) {
	    case 1:
		var circx = 50;
		var circy = 0;
		break;
	    case 2:
		var circx = 0;
		var circy = 50;
		break;
	    case 3:
		var circx = -50;
		var circy = 0;
		break;
		
	}
	return circx+","+circy;
    }
    
    var nodeOpts = d3.select("#genNode").selectAll("path.options").data(possibleShapes)
    .enter()
    .append("g")
    .attr("transform", function (p,q) {return "translate("+ pointsOnCircle(p,q) + ")scale(1)"});

    var circBCTitleRect = nodeOpts.append("rect")
    .attr("class", "options optionsBC optionsInfo")
    .attr("id", function(p) {return "optNameRect" + p})
    .attr("x", function(p,q) {return q > 1 ? -100 : -10})
    .attr("y", -10)
    .attr("width", 115)
    .attr("height", 20)
    .attr("rx", 5)
//    .attr("ry", 15)
    .style("fill", "white")
    .style("stroke", "black")
    .style("stroke-width", "2px")
    .style("display", "none");

    var circBCTitleText = nodeOpts.append("text")
    .attr("class", "options optionsBC optionsInfo")
    .attr("id", function(p) {return "optNameText" + p})
    .attr("x", function(p,q) {return q > 1 ? -95 : 20})
    .attr("y", 4)
    .style("font-size", "14px")
    .text(function(p,q) {return p})
    .style("display", "none");

    var circBCOpts = nodeOpts.append("circle")
    .attr("class", "options optionsBC")
    .attr("r", 15)
    .attr("cx", 0)
    .attr("cy", 0)
    .style("fill", "white")
    .style("stroke", "black")
    .style("stroke-width", "2px");
    
    var shapeOpts = nodeOpts.append("path")
    .attr("class", function(p){ return "options " + p; })
    .attr("id", function(p) {return "opt" + p})
    .on("click", function(p) {selectNewNode(p)})
    .on("mouseover", function(p) {d3.selectAll(".optionsInfo").style("display","none");d3.select("#optNameRect" + p).style("display","block");d3.select("#optNameText" + p).style("display","block");})
    .on("mouseout", function() {d3.selectAll(".optionsInfo").style("display","none")})
    .attr("d", function(p) {
	return shapeMeasures[p]["smalld"]
    })
    .attr("transform", function(p) { 
	return "translate(" + (-1*(shapeMeasures[p]["myWidth"]/2)) + "," + (-1*(shapeMeasures[p]["myHeight"]/2)) + ")scale(1)"; 
    })
    .style("cursor", "pointer")

    d3.select("#newNode")
    .style("fill", shapeMeasures[currentNewNode]["color"])
    .attr("d", shapeMeasures[currentNewNode]["smalld"])
    .on("click", function() {createNewNode(currentNewNode,0)})
    .style("cursor", "pointer")

    d3.select("#genNode")
    .append("text")
    .attr("id", "newNodeTitle")
    .attr("text-anchor", "middle")
    .attr("y", 30)
    .text(currentNewNode)
    .style("pointer-events","none");

}

function selectNewNode(d,i) {
    d3.event.stopPropagation();
    for (i in possibleShapes) {
	if (possibleShapes[i] == d) {
	    possibleShapes[i] = currentNewNode;
	}
    }

    d3.select("#opt"+d)[0][0]["__data__"] = currentNewNode;
    
    d3.select("#opt"+d)
    .attr("id", "opt" + currentNewNode)
    .attr("d", shapeMeasures[currentNewNode]["smalld"])
    .style("fill", shapeMeasures[currentNewNode]["color"]);

    d3.select("#optNameRect" + d).attr("id", "optNameRect" + currentNewNode);
    
    d3.select("#optNameText" + d).attr("id", "optNameText" + currentNewNode).text(currentNewNode);
    
    currentNewNode = d;
    d3.select("#newNode")
    .on("click", function() {createNewNode(d,0)})
    .attr("d", shapeMeasures[d]["smalld"])
    .style("fill", shapeMeasures[d]["color"]);

    d3.select("#newNodeTitle").text(d);
    
}

function createNewNode(d,i) {
    var evolvedVal = "";
    var newNodeID = "100" + testLayout.nodes().length;
    var newSource = {};
    var newTarget = {};
    var newNode = {nid: newNodeID,
    kind: d, datetime: testLayout.nodes()[0].datetime,
    timestamp: testLayout.nodes()[0].timestamp,
    row: -0.5,
    column: 0,
    isMeta: false,
    evolvedFrom: ""}
    
    if (forBack > 0) {
	newSource = updatingNode;
	newTarget = newNode;
	newNode.evolvedFrom = updatingNode.nid;
	newNode.column = updatingNode.column + 2;
    }
    else {
	newSource = newNode;
	newTarget = updatingNode;
	updatingNode.evolvedFrom.length == 0 ? updatingNode.evolvedFrom = newNodeID : updatingNode.evolvedFrom += ("," + newNodeID)
	newNode.column = updatingNode.column - 2;
    }

    if (testLayout.columnContents()[newNode.column]) {
        newNode.row = testLayout.columnContents()[newNode.column][testLayout.columnContents()[newNode.column].length - 1].row + 1;
        testLayout.columnContents()[newNode.column].push(newNode)
    }
    else {
        testLayout.columnContents()[newNode.column] = [newNode]	
    }
    

    d3.selectAll(".options").remove();
    
    d3.select("#newNode").attr("id", "inserted")
//    .attr("transform", "translate(-13,-15)")
    var createdNode = d3.select("#genNode")
    .data([newNode])
    .attr("id", "insertedNode")
    .attr("class", "sec")
    .on("mousedown", startMove)
    .on("mouseup", endMove)
    
    d3.select("#genLine")
    .data([{source: newSource, target: newTarget}])
    .attr("id", "inserted")
    .attr("class", "connections")
    .transition()
    .duration(500)
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(newNode.column * columnSize), ((newNode.row * rowSize))])});
    
    testLayout.nodes().push(newNode)
    newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
    
//    freshLayout = new d3_layout_bloomcase();
//    freshLayout.nodes(newNodeArray);
    
//    drawBC(freshLayout.nodes(),freshLayout.links())
//    testLayout.nodes(newNodeArray);
    redrawBC(500);
    var runLater = setTimeout(function() {nodeDetailsDialog(createdNode)}, 1000)
}

function nodeDetailsDialog(targetNode) {
    var translateAtt = targetNode.attr("transform");
    var nodeXY = translateAtt.split("(")[1].split(")")[0].split(",");
    d3.select("#new-node").style("display", "block").style("left", ((parseInt(nodeXY[0]) - 75) + bloomZoom.translate()[0]) + "px").style("top", ((parseInt(nodeXY[1]) - 40) + bloomZoom.translate()[1]) + "px")

}

function pathOver(d,i) {
    this.parentNode.appendChild(this);
    d3.select(this).select("circle.uiPath").style("display", "block")
    d3.select(this).select("text.uiPath").style("display", "block")
    d3.select(this).select("path.uiPath").style("opacity", .5)
}

function pathOut(d,i) {
    d3.selectAll("circle.uiPath").style("display", "none")
    d3.selectAll("text.uiPath").style("display", "none")
    d3.select(this).select("path.uiPath").style("opacity", 0)
}

function deleteLink(d,i) {

    var linkSet = testLayout.links();
    var sourceNodeSourceLinks = 0;
    var sourceNodeTargetLinks = 0;
    var targetNodeSourceLinks = 0;
    var targetNodeTargetLinks = 0;
    var nodeSet = testLayout.nodes();
    var sourceNode = d.source;
    var targetNode = d.target;
    var sourceNodeID = d.source.nid.replace("meta","");
    var targetNodeID = d.target.nid.replace("meta","");
    var sourceNodeEvolvedSize = 0;
    var targetNodeEvolvedSize = 0;
    
    console.log(d.source.laneTotal)
    console.log(d.target.laneTotal)
    for (x in nodeSet) {
	if (nodeSet[x].nid == sourceNodeID) {
	    sourceNode = nodeSet[x];
	}
	if (nodeSet[x].nid == targetNodeID) {
	    targetNode = nodeSet[x];
	}
    }
        
        for (x in linkSet) {
	    if(linkSet[x].source.nid == sourceNodeID) {
		sourceNodeSourceLinks++;
	    }
	    if(linkSet[x].target.nid == sourceNodeID) {
		sourceNodeTargetLinks++;
	    }
	    if(linkSet[x].source.nid == targetNodeID) {
		targetNodeSourceLinks++;
	    }
	    if(linkSet[x].target.nid == targetNodeID) {
		targetNodeTargetLinks++;
	    }
    }
    console.log(d)
    console.log("Source")
    console.log(sourceNodeID)
    console.log(sourceNodeSourceLinks)
    console.log(sourceNodeTargetLinks)
    console.log("Target")
    console.log(targetNodeID)
    console.log(targetNodeSourceLinks)
    console.log(targetNodeTargetLinks)

    if (d.source.laneTotal == d.target.laneTotal) {
	updatedEvolvedFromSimple(sourceNodeID, targetNode);
    }
    else if (d.source.laneTotal < d.target.laneTotal) {
	console.log("source on substream");
	updatedEvolvedForward(sourceNodeID, targetNode, targetNodeID);
    }
    else if (d.source.laneTotal > d.target.laneTotal) {
	console.log("target on substream");
	updatedEvolvedBackward(sourceNodeID, targetNode, targetNodeID);
    }

    var newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
    testLayout = new d3_layout_bloomcase();
    testLayout.nodes(newNodeArray);
    drawBC(testLayout.nodes(),testLayout.links())
}

function updatedEvolvedForward(incSourceID, incTarget, incTargetID) {
    var nodeSet = testLayout.nodes();
    for (x in nodeSet) {
	if (nodeSet[x].evolvedFrom) {
	var oldEF = nodeSet[x].evolvedFrom.split(",");
	console.log(incTargetID)
	if (oldEF.indexOf(incTargetID) > -1) {
	    nodeSet[x].evolvedFrom = nodeSet[x].evolvedFrom + ","+incSourceID;
	}
	}
    }
    updatedEvolvedFromSimple(incSourceID, incTarget);
}

function updatedEvolvedBackward(incSourceID, incTarget, incTargetID) {
    var newEF = []
    var nodeSet = testLayout.nodes();
    for (x in nodeSet) {
	if (nodeSet[x].nid == incSourceID) {
	    console.log(nodeSet[x])
	    if (!nodeSet[x].evolvedFrom) {
		console.log("error")
		return;
	    }
	    else {
		incTarget.evolvedFrom = nodeSet[x].evolvedFrom;
	    }
	}
    }
//    updatedEvolvedFromSimple(incSourceID, incTarget);
}

function updatedEvolvedFromSimple(nodeID, incNode) {
    var oldEF = incNode.evolvedFrom.split(",");
    var newEF = [];
    for (x in oldEF) {
	if(oldEF[x] != nodeID) {
	    newEF.push(oldEF[x]);
	}
    }
    incNode.evolvedFrom = newEF.join();
}

function hideModal() {
    d3.select("#morePanel").classed("hidden", true)
    d3.select("#node-popup").classed("hidden", true);
    d3.select("#new-node").style("display", "none");
    d3.selectAll(".options").remove();
    d3.select("#genNode").remove();
    d3.select("#genLine").remove();
    d3.select("#map").on("mousemove", null)
}

function moveGenNode(d,i) {
    var curMouse = d3.mouse(this);
    forBack = (curMouse[0] - bloomZoom.translate()[0] - x1GenLine);
    d3.select("#genNode")
    .attr("transform","translate("+(curMouse[0] - bloomZoom.translate()[0])+","+(curMouse[1] - bloomZoom.translate()[1])+")")

    d3.select("#genLine")
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(curMouse[0] - bloomZoom.translate()[0]), (curMouse[1] - bloomZoom.translate()[1])])});
        
}
