
    rowSize = -50;
    columnSize = 25;
    secDivSize = 25;
    secDivOffset = -200;
    zoom2DivOffset = -50;
    secDivOpacity = 1;
    secDivPE = "auto";
    clickNotDrag = true;
    clicked = true;
    toolboxOffset = 20;
    toolboxHidden = true;
    
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
    d3.select("#toolboxG").style("width", width + "px").attr("transform", "translate(0," + (svgHeight - toolboxOffset) + ")");
    d3.select("#toolboxBG").attr("width", width).attr("height", 200);
    
}

function drawBloomcase(fileName) {
    
    d3.select("#new-node").classed("hidden", true).attr("class", "modal is-long");
    d3.select("#edit-presentation-reorder").style("display", "none")
    d3.select("#edit-presentation-reorder-done").select("a").attr("onclick", "hideReorderingPanel()")
    
    d3.select("icon-presentation").on("click", presentationMode)
    newNodes = {};
    testLayout = new d3_layout_bloomcase();
    d3.json("../../../json/"+fileName+".json", function(data) {
    newNodes = data;

    if(newNodes.nodes.length <= 1) {
	tutorial(1);
    }
    testLayout.nodes(newNodes.nodes);
    bloomZoom = d3.behavior.zoom()
    .on("zoom", panBC);

    d3.select("#map").on("click", hideModal).call(bloomZoom)
    .on("dblclick.zoom", null)
    .on("mousewheel.zoom", null)
    .on("DOMMouseScroll.zoom",null);
    
    d3.select("#map").append("g").attr("id", "mgBloomG");    
    d3.select("#map").append("g").attr("id", "bloomG");    
    d3.select("#map").append("g").attr("id", "toolboxG");
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
    d3.select("#node-popup").select("a.node-info-more").attr("onclick", 'd3.select("#node-popup").classed("hidden", true)');
    d3.select("#new-node").classed("hidden", true).attr("class", "modal is-long");
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
    
    //Toolbox
    d3.select("#toolboxG").style("display", "none")
    .append("rect")
    .attr("id", "toolboxBG")
    .style("fill", "lightgray")
    .style("stroke", "gray")
    .style("stroke-width", "2px")
    .style("cursor", "pointer")
    .on("click", hideToolbox);
    
    //Background Grid
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

    d3.select("#bgBloomG")
    .selectAll("path.connections").data(linkData).enter().append("path")
    .style("stroke", "black")
    .attr("class", "connections")
    .style("stroke-width", 2)
    .style("pointer-events", "none")
    .style("fill", "none")
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, d.source.component * (d.source.row * rowSize)],[d.target.column * columnSize, d.source.component * (d.target.row * rowSize)]) })
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
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, d.source.component * (d.source.row * rowSize)],[d.target.column * columnSize, d.source.component * (d.target.row * rowSize)]) })
    .style("opacity", 0)
    ;
    
    d3.selectAll("g.uiPath").filter(function(d) {return d.source.isMeta == false ? this : null})
    .append("circle")
    .attr("class", "uiPath")
    .attr("r", 8)
    .attr("cx", function(d) {return ((d.target.column * columnSize) + (d.source.column * columnSize)) / 2})
    .attr("cy", function(d) {return d.source.component * ((d.target.row * rowSize) + (d.source.row * rowSize)) / 2})
    .style("fill", "white")
    .style("stroke", "black")
    .style("stroke-width", "1px")
    .style("cursor", "pointer")
    .on("mouseover", function() {d3.select(this).style("fill", "cyan")})
    .on("mouseout", function() {d3.select(this).style("fill", "white")})
    .on("click", deleteLink)
    .style("display", "none")


    d3.selectAll("g.uiPath").filter(function(d) {return d.source.isMeta == false ? this : null})
    .append("text")
    .attr("class", "uiPath")
    .attr("x", function(d) {return (((d.target.column * columnSize) + (d.source.column * columnSize)) / 2) - 4})
    .attr("y", function(d) {return d.source.component * (((d.target.row * rowSize) + (d.source.row * rowSize)) / 2) + 4})
    .text("x")
    .style("pointer-events", "none")
    .style("display", "none");

    
    var secG = d3.select("#bloomG")
    .selectAll("g.sec").data(nodeData).enter().append("g")
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
//    .style("display", function(d) {return d.isMeta ? "block" : "block"})
    .attr("id", function(d) {return "node" + d.nid})
    .attr("class", "sec")
    .attr("transform", function(d,i) {return "translate("+ (d.column * columnSize) +","+ (d.component * (d.row * rowSize)) +")"})
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
    .append("img").attr("src", d.imgUrl.substr(0,10) == "data:image" ? d.imgUrl : "../../../img/example/zoom2/" + d.imgUrl)
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

    var secDiv = d3.select("#aboveLayer").selectAll("div.zoom2Overlay").data(nodeData).enter().append("div")
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "zoom2 zoom2Overlay")
    .style("position", "absolute")
    .style("left", "30px")
    .style("top", "200px")
    .style("background-color", "rgba(255, 255, 255, 0)")
    .style("border", "0")
    .style("opacity", 0)
    .style("pointer-events", "none")
    .style("cursor", "pointer")
    .on("click", function(d) {	panToCenter(1000, d.column, d.row);populateMorePanel(d);showMorePanel(d)});
/*    .on("mousedown", startMove)
    .on("mouseup", endMove); */

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
    .append("img").attr("src", d.imgUrl.substr(0,10) == "data:image" ? d.imgUrl : "../../../img/example/zoom3/" + d.imgUrl)
    }
    }
    });
    
    secDiv.append("div").attr("class", "node-info-title").html(function(d) {return "<img class='node-info-type' src='../../../img/icon-"+d.kind.toLowerCase() +"-sm.png' />" + d.title})
    secDiv.append("div").attr("class", "node-info-desc ellipsis").html(function(d) {return "<div>" + d.summary + "</div>"})
    var secButtonDiv = secDiv.append("div").attr("class", "node-info-buttons")
    
    secButtonDiv.append("a")
    .attr("class", "node-info-edit button blue")
    .attr("href", "#")
    .on("click", function(d) {	editNode(d)})
    .html("edit")

    secButtonDiv.append("a")
    .attr("class", "node-info-more button purple")
    .attr("href", "#")
    .on("click", function(d) {	panToCenter(1000, d.column, d.row);populateMorePanel(d);showMorePanel(d)})
    .html("more")

    secG.append("circle")
    .style("fill", "#faf3df")
    .style("stroke", "black")
    .style("stroke-width", "2px")
    .style("display", "none")
    .attr("class", "presentation-graphics presentation-node-background")
    .attr("r", 22)
    .attr("cx", 0)

    secG.append("circle")
    .style("fill", "darkred")
    .style("display", "none")
    .attr("class", "presentation-graphics")
    .attr("r", 10)
    .attr("cx", 18)
    .attr("cy", -18)

    secG.append("text")
    .attr("r", 10)
    .attr("dx", 13)
    .attr("dy", -13)
    .attr("class", "presentation-graphics presentation-order-text")
    .style("display", "none")
    .text(function(d) {return d.featured})
    
    secG.append("path")
    .attr("class", function(d){ return "nodeSymbol " + d.kind; })
    .attr("d", function(d,i) {return shapeMeasures[d.kind]["pathd"]})
    .style("opacity", 0)
    .transition()
    .duration(1000)
    .style("opacity", 1);
    
    /*
    secG.append("text")
                .attr("dx", -1)
                .attr("dy", ".35em")
                .attr("alignment-baseline", "center")
                .attr("text-anchor", "middle")
                .style("fill", "white")
                .text(function(d) { return "" + (d.column)})
		.style("pointer-events", "none");
		*/

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

    d3.select("#node-popup").style("left", (svgCenter - 93) + "px").style("bottom", (svgMiddle + 25) + "px")
    d3.select("#new-node").style("left", (svgCenter - 106) + "px").style("bottom", (svgMiddle + 25) + "px").attr("class", "modal is-long hidden");
    var nnLeft = parseInt(d3.select("#new-node").style("left"));
    var nnBottom = parseInt(d3.select("#new-node").style("bottom"));
    d3.select("#new-node").style("left", (nnLeft + 125) + "px").style("bottom", (nnBottom - 260) + "px");

    
    bloomZoom.translate([newZoomX,newZoomY])

    d3.select("#bloomG").transition().duration(transitionDuration).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#bgBloomG").transition().duration(transitionDuration).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#mgBloomG").transition().duration(transitionDuration).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")

    d3.selectAll("div.zoom2").transition().duration(transitionDuration)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 40) + "px")})
    .style("top", function(d) {return "" + (d.component * (-35 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})
    
    d3.selectAll("div.sec").transition().duration(transitionDuration)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 105) + "px")})
    .style("top", function(d) {return "" + (d.component * (-115 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})

}

function panBC() {
    d3.select("#bloomG").attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#bgBloomG").attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#mgBloomG").attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    
    d3.selectAll("div.zoom2")
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 40) + "px")})
    .style("top", function(d) {return "" + (d.component * (-35 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})
    
    d3.selectAll("div.sec")
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 105) + "px")})
    .style("top", function(d) {return "" + (d.component * (-115 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})
}

function redrawBC(transitionSpeed) {
    d3.select("#bloomG").transition().duration(transitionSpeed).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#bgBloomG").transition().duration(transitionSpeed).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    d3.select("#mgBloomG").transition().duration(transitionSpeed).attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")

    d3.selectAll("#bloomG > g.sec").transition().duration(transitionSpeed).attr("transform", function(d,i) {return "translate("+ (d.column * columnSize) +","+ (d.component * (d.row * rowSize)) +")"})

    d3.selectAll("path.connections").transition().duration(transitionSpeed).attr("d", function(d) {return curvyLine([d.source.column * columnSize, d.source.component * (d.source.row * rowSize)],[d.target.column * columnSize, d.source.component * (d.target.row * rowSize)]) });
    
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
    .style("top", function(d) {return "" + (d.component * (-35 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})

    d3.selectAll("div.sec")
    .transition().duration(transitionSpeed)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - 105) + "px")})
    .style("top", function(d) {return "" + (d.component * (-115 + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})

    d3.selectAll("path.uiPath")
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, d.source.component * (d.source.row * rowSize)],[d.target.column * columnSize, d.source.component * (d.target.row * rowSize)]) });
    
    d3.selectAll("circle.uiPath")
    .attr("cx", function(d) {return ((d.target.column * columnSize) + (d.source.column * columnSize)) / 2})
    .attr("cy", function(d) {return d.source.component * ((d.target.row * rowSize) + (d.source.row * rowSize)) / 2});

    d3.selectAll("text.uiPath")
    .attr("x", function(d) {return (((d.target.column * columnSize) + (d.source.column * columnSize)) / 2) - 4})
    .attr("y", function(d) {return d.source.component * (((d.target.row * rowSize) + (d.source.row * rowSize)) / 2) + 4});

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
	return "translate(0,0)"; 
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
	return "translate(34,-34)"; 
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
    this.parentNode.appendChild(this);
    d3.event.stopPropagation();
    updatingNode = d;
    d3.select("#new-node-type").attr("onclick", 'initializeTypeSelector(d3.select("#node'+d.nid+'"), false)')
    clickNotDrag = true;
    clickDragTimer = setTimeout('draggingClicking()', 200);
    
    if (!d3.select("#genNode").empty()) {return;}

    x1GenLine = d.column * columnSize;
    y1GenLine = d.component * (d.row * rowSize);
    updatingNode = d;
    var curMouse = d3.mouse(this.parentNode);
    d3.select("#map").on("mousemove", moveGenNode)
    d3.selectAll("svg").on("mouseup", endMove)
    d3.select("#bgBloomG").insert("path", ".sec")
    .attr("id", "genLine")
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[curMouse[0], curMouse[1]]) })
    .style("stroke", "black")
    .style("fill", "none")
    .style("stroke-width", 2)
    .style("pointer-events", "none")
    
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
    d3.select("#node-popup > .node-info-image > img").style("display", incNode.imgUrl.length > 2 ? "block" : "none")
    .attr("src", incNode.imgUrl.substr(0,10) == "data:image" ? incNode.imgUrl : "../../../img/example/zoom3/" + incNode.imgUrl)
    d3.select("#node-popup > .node-info-title").html(function(d) {return "<img class='node-info-type' src='../../../img/icon-"+incNode.kind.toLowerCase() +"-sm.png' />" + incNode.title})
    d3.select("#node-popup > .node-info-desc").html("<div>" + incNode.summary + "</div>")
    
    d3.select("#node-popup")
    .select(".node-info-edit")
    .on("click", function(d) {	editNode(incNode)})

    
}

function populateMorePanel(incNode) {
    d3.select("#morePanel > #node-info-image > img").style("display", incNode.imgUrl.length > 2 ? "block" : "none")
    .attr("src", incNode.imgUrl.substr(0,10) == "data:image" ? incNode.imgUrl : "../../../img/example/panel/" + incNode.imgUrl.split(".")[0] + ".jpg")
    d3.select("#morePanel > .node-info-title").html("<img class='node-info-type' src='../../../img/icon-"+incNode.kind.toLowerCase() +"-sm.png' />" + incNode.title)
    d3.select("#morePanel > .node-info-desc").html("<div>" + incNode.summary + "</div>")    
}

function endMove(d,i) {
    d3.selectAll("svg").on("mouseup", function() {})
    if(clickNotDrag == true) {
	panToCenter(1000, updatingNode.column, updatingNode.row);
	hideModal();
	
	if(!d3.select("#zoom-3").classed("active")) {
	    d3.select("#node-popup .node-info-more").on("click", function() {showMorePanel(updatingNode);})
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
	var checkX = Math.abs((updatingNode.column * columnSize) - (blNodes[no].column * columnSize) + forBack);
	var checkY = Math.abs(updatingNode.component * (updatingNode.row * rowSize) - blNodes[no].component * (blNodes[no].row * rowSize) + upDown);
	if (checkX < 20 && checkY < 20) {
	    if (!(blNodes[no].evolvedFrom.indexOf(updatingNode.nid) > -1 || updatingNode.evolvedFrom.indexOf(blNodes[no].nid) > -1)) {
	    
		if (updatingNode.component != blNodes[no].component) {
		    blNodes[no].evolvedFrom.length == 0 ? blNodes[no].evolvedFrom = updatingNode.nid : blNodes[no].evolvedFrom += ("," + updatingNode.nid)
		}
	        else if (forBack >= 0) {
		    blNodes[no].evolvedFrom.length == 0 ? blNodes[no].evolvedFrom = updatingNode.nid : blNodes[no].evolvedFrom += ("," + updatingNode.nid)
		}
		else {
		    updatingNode.evolvedFrom.length == 0 ? updatingNode.evolvedFrom = blNodes[no].nid : updatingNode.evolvedFrom += ("," + blNodes[no].nid)
		}
    d3.select("#genLine")
    .data([{source: updatingNode, target: blNodes[no]}])
    .attr("id", "inserted")
    .attr("class", "connections")
    .style("pointer-events", "none")
    .transition()
    .duration(500)
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(newNode.column * columnSize), ((newNode.row * rowSize))])});

	d3.select("#genNode").remove();
	d3.select("#map").on("mousemove", null)
        var newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
        var freshLayout = new d3_layout_bloomcase();
        freshLayout.nodes(newNodeArray);
        updatedBloomCase(freshLayout.nodes(),freshLayout.links())
        return;
	    }
	}
    }
    
    initializeTypeSelector(d3.select("#genNode"), true);

}

function initializeTypeSelector(selectedNode, isNew) {
    d3.select("#map").on("mousemove", null)
    d3.select("#node-popup").classed("hidden", true);
    d3.select("#new-node").classed("hidden", true);

    selectedNode.select("path").attr("id", "newNode")
    
    if(isNew == false) {
	selectedNode.on("mousedown", function() {}).on("mouseup", function() {}).on("click", function() {})
	d3.selectAll("g.sec").on("mousedown", function() {}).on("mouseup", function() {})
	d3.select("#map").on("click", function() {})
	d3.selectAll("svg").on("mouseup", function() {})

    }
    
    selectedNode
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
    
    var nodeOpts = selectedNode.selectAll("path.options").data(possibleShapes)
    .enter()
    .append("g")
    .attr("transform", function (p,q) {return "translate("+ pointsOnCircle(p,q) + ")scale(1)"});

    var circBCTitleRect = nodeOpts.append("rect")
    .attr("class", "options optionsBC optionsInfo")
    .attr("id", function(p) {return "optNameRect" + p})
    .attr("x", function(p,q) {return q > 1 ? -105 : -10})
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
    .on("click", function(p,q) {selectNewNode(p,q,isNew, selectedNode)})
    .on("mouseover", function(p) {d3.selectAll(".optionsInfo").style("display","none");d3.select("#optNameRect" + p).style("display","block");d3.select("#optNameText" + p).style("display","block");})
    .on("mouseout", function() {d3.selectAll(".optionsInfo").style("display","none")})
    .attr("d", function(p) {
	return shapeMeasures[p]["smalld"]
    })
    .style("cursor", "pointer")

    d3.select("#newNode")
    .style("fill", shapeMeasures[currentNewNode]["color"])
    .attr("d", shapeMeasures[currentNewNode]["pathd"])
    .attr("transform", "translate(0,0)")
    .style("cursor", "pointer")
    
    if (isNew == true) {
    d3.select("#newNode")
    .on("click", function() {createNewNode(currentNewNode,0)})
    }
    else {
    d3.select("#newNode")
    .on("click", function() {changeNodeType(currentNewNode, selectedNode)})
    }

    selectedNode
    .append("text")
    .attr("id", "newNodeTitle")
    .attr("text-anchor", "middle")
    .attr("y", 30)
    .text(currentNewNode)
    .style("pointer-events","none");
}

function changeNodeType(newKind, selectedNode) {
    
    d3.select("#new-node-type > div").attr("class", "icon-" + newKind.toLowerCase()).html(newKind.toLowerCase())
    d3.event.stopPropagation();
    nodeDetailsDialog(selectedNode);
    updatingNode.kind = newKind;
    d3.selectAll("#newNodeTitle").remove();
    d3.selectAll("g.sec").on("mousedown", startMove).on("mouseup", endMove);
    d3.select("#map").on("click", hideModal)
    d3.selectAll(".options").remove();
    d3.select("#newNode").on("click", function() {}).attr("id", "node" + updatingNode.nid)

}

function selectNewNode(d,i,isNew, selectedNode) {
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
    .attr("d", shapeMeasures[d]["pathd"])
    .transition()
    .duration(300)
    .style("fill", shapeMeasures[d]["color"]);

    if (isNew == true) {
    d3.select("#newNode")
    .on("click", function() {createNewNode(currentNewNode,0)})
    }
    else {
    d3.select("#newNode")
    .on("click", function() {changeNodeType(currentNewNode, selectedNode)})
    }
    
    d3.select("#newNodeTitle").text(d);
    
}

function createNewNode(d,i) {
    d3.select("#newNodeTitle").remove();
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
    imgUrl: '',
    evolvedFrom: "",
    featured: 0}
    
    d3.select("#new-node-type").attr("onclick", 'initializeTypeSelector(d3.select("#node'+newNodeID+'"), false)')

    
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
    
    d3.select("#newNode").attr("id", "inserted").classed("nodeSymbol", true).on("click", function() {});
//    .attr("transform", "translate(-13,-15)")
    
    var createdNode = d3.select("#genNode")
    .data([newNode])
    .attr("id", "insertedNode")
    .attr("class", "sec")
    .on("mousedown", startMove)
    .on("mouseup", endMove)
    
    d3.select("#insertedNode").insert("circle", "#inserted")
    .style("fill", "#faf3df")
    .style("stroke", "black")
    .style("stroke-width", "2px")
    .style("display", "none")
    .attr("class", "presentation-graphics")
    .attr("r", 22)
    .attr("cx", 0)

    d3.select("#insertedNode").append("circle")
    .style("fill", "darkred")
    .style("display", "none")
    .attr("class", "presentation-graphics")
    .attr("r", 10)
    .attr("cx", 18)
    .attr("cy", -18)

    d3.select("#insertedNode").append("text")
    .attr("r", 10)
    .attr("dx", 13)
    .attr("dy", -13)
    .attr("class", "presentation-graphics presentation-order-text")
    .style("fill", "white")
    .style("font-weight", 900)
    .style("display", "none")
    .text("0")
    
    d3.select("#insertedNode").attr("id", "node" + newNodeID)
    
    d3.select("#genLine")
    .data([{source: newSource, target: newTarget}])
    .attr("id", "inserted")
    .attr("class", "connections")
    .style("pointer-events", "none")
    .transition()
    .duration(500)
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(newNode.column * columnSize), ((newNode.row * rowSize))])});

    var newUIG = d3.select("#mgBloomG").append("g").attr("id", "newUILine")
    .data([{source: newSource, target: newTarget}])
    .attr("class", "uiPath")
    .on("mouseover", pathOver)
    .on("mouseout", pathOut);
    
    newUIG
    .append("path")
    .style("stroke", "orange")
    .style("stroke-linecap", "round")
    .attr("class", "uiPath")
    .style("stroke-width", 8)
    .style("fill", "none")
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, (d.source.row * rowSize)],[d.target.column * columnSize, (d.target.row * rowSize)]) })
    .style("opacity", 0)
    ;
    
    newUIG
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
    .style("display", "none")


    newUIG
    .append("text")
    .attr("class", "uiPath")
    .attr("x", function(d) {return (((d.target.column * columnSize) + (d.source.column * columnSize)) / 2) - 4})
    .attr("y", function(d) {return (((d.target.row * rowSize) + (d.source.row * rowSize)) / 2) + 4})
    .text("x")
    .style("pointer-events", "none")
    .style("display", "none");
    
    
    testLayout.nodes().push(newNode)
    updatingNode = newNode;
    
    if (d3.select("#project-tour-5").classed("hidden") == false) {
        d3.selectAll(".project-tour").classed("hidden", true)
    }
    
    var newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
    var freshLayout = new d3_layout_bloomcase();
    freshLayout.nodes(newNodeArray);
    updatedBloomCase(freshLayout.nodes(),freshLayout.links())
    
    d3.select("#new-node-type > div").attr("class", "icon-" + d.toLowerCase()).html(d.toLowerCase())


    var runLater = setTimeout(function() {nodeDetailsDialog(createdNode)}, 1000)
    panToCenter(1000, newNode.column,newNode.row);

}

function nodeDetailsDialog(targetNode) {
    var nodeXY = d3.transform(targetNode.attr("transform"));
    d3.select("#new-node").classed("hidden", false)
}

function pathOver(d,i) {
    this.parentNode.appendChild(this);
    d3.select(this).select("circle.uiPath").style("display", "block")
    d3.select(this).select("text.uiPath").style("display", "block")
    d3.select(this).select("path.uiPath").style("opacity", .5)
    
    if (d.source.isMeta) {
	d3.selectAll("path.uiPath").filter(function(el) {return el.target == d.source ? this : null}).style("opacity", .5)
    }
    if (d.target.isMeta) {
	d3.selectAll("path.uiPath").filter(function(el) {return el.source == d.target ? this : null}).style("opacity", .5)	
    }
}

function pathOut(d,i) {
    d3.selectAll("circle.uiPath").style("display", "none")
    d3.selectAll("text.uiPath").style("display", "none")
    d3.selectAll("path.uiPath").style("opacity", 0)
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

    if ((d.source.sourceCount + d.source.targetCount) > 1 && (d.target.sourceCount + d.target.targetCount) > 1) {
	updatedEvolvedFromSimple(sourceNodeID, targetNode);
    }
    else if (d.source.laneTotal == d.target.laneTotal) {
	updatedEvolvedFromSimple(sourceNodeID, targetNode);
    }
    else if (d.source.laneTotal < d.target.laneTotal) {
	updatedEvolvedForward(sourceNodeID, targetNode, targetNodeID);
    }
    else if (d.source.laneTotal > d.target.laneTotal) {
	updatedEvolvedBackward(sourceNodeID, targetNode, targetNodeID);
    }

    d3.selectAll("path.connections").filter(function(el) {return el.source == d.source && el.target == d.target}).remove();
    d3.selectAll("g.uiPath").filter(function(el) {return el.source == d.source && el.target == d.target}).remove();
    
    var newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
    var freshLayout = new d3_layout_bloomcase();
    freshLayout.nodes(newNodeArray);
    updatedBloomCase(freshLayout.nodes(),freshLayout.links())
}

function updatedEvolvedForward(incSourceID, incTarget, incTargetID) {
    d3.select("#node" + incSourceID).attr("transform", "translate(20,20)").each(function() {document.getElementById("toolboxG").appendChild(this);})
    updatedEvolvedFromSimple(incSourceID, incTarget);
}

function updatedEvolvedBackward(incSourceID, incTarget, incTargetID) {
    d3.select("#node" + incTargetID).attr("transform", "translate(20,20)").each(function() {document.getElementById("toolboxG").appendChild(this);})
    updatedEvolvedFromSimple(incSourceID, incTarget);
}

function updatedEvolvedFromSimple(nodeID, incNode) {
    //Need to account for meta-nodes being deleted because the link is no long multi
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
    d3.select("#betweenLayer").selectAll("div.zoom2").style("border", "2px solid #121212")
    d3.selectAll(".highlighter").remove();
    d3.select("#morePanel").classed("hidden", true)
    d3.select("#node-popup").classed("hidden", true);
    d3.select("#new-node").classed("hidden", true);
    d3.selectAll(".options").remove();
    d3.select("#genNode").remove();
    d3.select("#genLine").remove();
    d3.select("#map").on("mousemove", null)
}

function moveGenNode(d,i) {
    var curMouse = d3.mouse(this);
    forBack = (curMouse[0] - bloomZoom.translate()[0] - x1GenLine);
    upDown = (curMouse[1] - bloomZoom.translate()[1] - y1GenLine);
    
    if (forBack > 0) {
	forBack = ((Math.floor(forBack / rowSize) * rowSize));
    }
    else {
	forBack = ((Math.round(forBack / rowSize) * rowSize));
    }

    if (upDown > 0) {
	upDown = ((Math.floor(upDown / columnSize) * columnSize));
    }
    else {
	upDown = ((Math.round(upDown / columnSize) * columnSize));
    }
    
/*    d3.select("#genNode")
    .attr("transform","translate("+(curMouse[0] - bloomZoom.translate()[0])+","+(curMouse[1] - bloomZoom.translate()[1])+")")
    d3.select("#genLine")
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(curMouse[0] - bloomZoom.translate()[0]), (curMouse[1] - bloomZoom.translate()[1])])});
    */

    d3.select("#genNode")
    .attr("transform","translate("+(x1GenLine + forBack)+","+(y1GenLine + upDown)+")")

    d3.select("#genLine")
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(x1GenLine + forBack), (y1GenLine + upDown)])});

        
}

function updatedBloomCase(newBCNodes, newBCLinks) {
    var oldLinks = testLayout.links();
    var oldNodes = testLayout.nodes();    
    
    //first cut out the nodes that are no longer there
    var n = oldNodes.length - 1;
    while (n >= 0) {
	var foundNode = false;
	for (y in newBCNodes) {
	    if (newBCNodes[y].nid == oldNodes[n].nid) {
		foundNode = true;
	    }
	}
	if(foundNode == false) {
	    d3.selectAll("g.sec").filter(function(el) {return el.nid == oldNodes[n].nid}).remove();
	    oldNodes.splice(n,1);
	}
	n--;
    }

//Add new nodes
    for (x in newBCNodes) {
	var foundNode = false;
	for (y in oldNodes) {
	    if (newBCNodes[x].nid == oldNodes[y].nid) {
		newBCNodes[x] = oldNodes[y];
		foundNode = true;
		break;
	    }
	}
	if (foundNode == false) {
	    oldNodes.push(newBCNodes[x]);

    d3.select("#bloomG").append("g")
    .data([newBCNodes[x]])
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
//    .style("display", function(d) {return d.isMeta ? "block" : "block"})
    .attr("class", "sec")
    .attr("transform", function(d,i) {return "translate("+ (d.column * columnSize) +","+ ((d.row * rowSize)) +")"})
    .on("mousedown", startMove)
    .on("mouseup", endMove)
    .append("path")
    .attr("class", function(d){ return "nodeSymbol " + d.kind; })
    .attr("d", function(d,i) {return shapeMeasures[d.kind]["pathd"]})
    .style("opacity", 0)
    .transition()
    .duration(1000)
    .style("opacity", 1);

	}
    }

    //cut out the old links that are no longer there
    var n = oldLinks.length - 1;
    while (n >= 0) {
	var foundLink = false;
	for (y in newBCLinks) {
	    if (newBCLinks[y].id == oldLinks[n].id) {
		oldLinks[n] = newBCLinks[y];
		foundLink = true;
		break;
	    }
	}
	if(foundLink == false) {	    
	    d3.selectAll("g.uiPath").filter(function(el) {return el.id == oldLinks[n].id}).remove();
	    d3.selectAll("path.connections").filter(function(el) {return el.id == oldLinks[n].id}).remove();
	    oldLinks.splice(n);
	}
	n--;
    }

    //Add new links
    for (x in newBCLinks) {
	var foundLink = false;
	var newLink = {};
	for (y in oldLinks) {
	    if (newBCLinks[x].id == oldLinks[y].id) {
		oldLinks[y] = newBCLinks[x];
		foundLink = true;
		break;
	    }
	}
	if (foundLink == false) {
	    oldLinks.push(newBCLinks[x]);
    d3.selectAll("#bloomG").append("path").data([newBCLinks[x]])
    .style("stroke", "black")
    .attr("class", "connections")
    .style("stroke-width", 2)
    .style("pointer-events", "none")
    .style("fill", "none")
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, (d.source.row * rowSize)],[d.target.column * columnSize, (d.target.row * rowSize)]) })
    .style("opacity", 0)
    ;

	}
    }
    
    redrawBC(500);

}

function newNodeFormExpand() {
    var nnLeft = parseInt(d3.select("#new-node").style("left"));
    var nnBottom = parseInt(d3.select("#new-node").style("bottom"));
    d3.select("#new-node").style("left", (nnLeft + 125) + "px").style("bottom", (nnBottom - 260) + "px");
}

function hideToolbox() {
    var currentToolboxY = d3.transform(d3.select("#toolboxG").attr("transform")).translate[1]
    var newY = 0;
    
    if (toolboxHidden) {
	toolboxOffset = 200;
	toolboxHidden = false;
	newY = currentToolboxY - 180;
    }
    else {
	toolboxOffset = 20;
	toolboxHidden = true;
	newY = currentToolboxY + 180;
    }
    d3.select("#toolboxG")
    .transition()
    .duration(500)
    .attr("transform", "translate(0,"+ newY+")");
    
}

function moveNodeToToolbox() {
    document.getElementById("toolboxG").appendChild(this);
}

function tutorial(nextPart) {
	d3.selectAll("g.sec").style("opacity", 0);
    if (nextPart == 1) {
        d3.select("#bloomViz").insert("div", "#project-tour-1").attr("id","disabledDiv").style("height","100%").style("width","100%").style("background","red").style("position","absolute").style("top","0").style("z-index","2").style("opacity",0);
	d3.selectAll("g.sec").style("opacity", 0);
    }
    
    d3.selectAll(".project-tour").classed("hidden", true)
    d3.select("#project-tour-" + nextPart).classed("hidden", false)
}

function uploadImage() {
    
        reader = new FileReader();
        reader.onloadend = function() {
	    d3.select("#new-node-image-preview").attr("src", reader.result);
        d3.select("#new-node-image-preview").classed("icon-camera", false);
        d3.select("#new-node-image-preview").classed("image-preview", true);
	    updatingNode.imgUrl = reader.result;
        }
    	file = document.getElementById("submitfile").files[0];
        reader.readAsDataURL(file);
	
}

function createFirstNode() {
        d3.selectAll(".project-tour").classed("hidden", true)

    	d3.selectAll("g.sec").transition().duration(1000).style("opacity", 1);
	d3.select("#disabledDiv").remove();

    d3.select("g.sec").each(function(d,i) {panToCenter(1, d.column,d.row)});
    initializeTypeSelector(d3.select("g.sec"), false)
    
//    nodeDetailsDialog(d3.select("g.sec"));
    updatingNode = testLayout.nodes()[0];
}

function validateParsley() {
    var formValid = $( '#new-node-form' ).parsley( 'isValid' );
    document.getElementById("new-node-form").focus();

////Hack to skip validation   
    formValid = true;

    if(formValid) {
	d3.select("#new-node").classed("hidden", true)
	updatingNode.title = document.getElementById("new-node-form-title").value;
	updatingNode.summary = document.getElementById("new-node-form-desc").value;
	updatingNode.webUrl = document.getElementById("new-node-form-url").value;
	updatingNode.timestamp = document.getElementById("new-node-form-date").value;
	updatingNode.tags = document.getElementById("new-node-form-tags").value;
	d3.select("#new-node #new-node-image-preview").attr("src", "../../../img/icon-camera.png");
    d3.select("#new-node #new-node-image-preview").classed("icon-camera", true);
    d3.select("#new-node #new-node-image-preview").classed("image-preview", false);
	d3.selectAll(".parsley-validated").property("value", "")
	createRemainingNodeComponents(updatingNode);
	
	if (testLayout.nodes().length == 1) {
	    d3.select("#project-tour-8").classed("hidden", false)
	}
	else {
	    d3.select("#project-tour-8").classed("hidden", true)	    
	}

    }
    else {
	console.log("Form is invalid")
    }
    
    return false;
}

function selectImage() {
    document.getElementById("submitfile").click();
}

function createRemainingNodeComponents(incNode) {
    if (d3.selectAll("g.sec")[0].length == d3.selectAll("div.sec")[0].length) {

    d3.select("#betweenLayer").selectAll("div.zoom2").each(function(d,i) {
	d3.select(this).select("img").remove();
	d3.select(this).select(".text").remove();	
    if(d.imgUrl) {
    if (d.imgUrl.length > 2) {
    d3.select(this)
    .append("img").attr("src", d.imgUrl.substr(0,10) == "data:image" ? d.imgUrl : "../../../img/example/zoom2/" + d.imgUrl)
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

	d3.selectAll("div.sec")
	.each(function (d) {
	d3.select(this).select(".node-info-title").html("<img class='node-info-type' src='../../../img/icon-"+d.kind.toLowerCase() +"-sm.png' />" + d.title)
	d3.select(this).select(".node-info-desc").html("<div>" + d.summary + "</div>")
	if (d.imgUrl) {
	    d3.select(this).select("img").attr("src", d.imgUrl.substr(0,10) == "data:image" ? d.imgUrl : "../../../img/example/zoom2/" + d.imgUrl)
	}
	}
	)
    }
    else {

    d3.select("#betweenLayer").append("div")
    .attr("class", "newDiv")
    .style("position", "absolute")
    .style("left", "400px")
    .style("top", "300px")
    .style("opacity", 0)
    .style("pointer-events", "none");

    d3.select("div.newDiv")
    .data([incNode])
    .attr("class", "zoom2")
    .each(function(d,i) {
    if(d.imgUrl) {
    if (d.imgUrl.length > 2) {
    d3.select(this)
    .append("img").attr("src", d.imgUrl.substr(0,10) == "data:image" ? d.imgUrl : "../../../img/example/zoom2/" + d.imgUrl)
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
    
    var newSecDiv = d3.select("#aboveLayer").append("div")
    .data([incNode])
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "zoom2 zoom2Overlay")
    .style("position", "absolute")
    .style("left", "30px")
    .style("top", "200px")
    .style("background-color", "rgba(255, 255, 255, 0)")
    .style("border", "0")
    .style("opacity", 0)
    .style("pointer-events", "none")
    .style("cursor", "pointer")
    .on("click", function(d) {	panToCenter(1000, d.column, d.row);populateMorePanel(d);showMorePanel(d)});

    var newSecDiv = d3.select("#aboveLayer").append("div")
    .data([incNode])
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "sec modal node-info")
    .style("position", "absolute")
    .style("left", "30px")
    .style("top", "200px")
    .style("opacity", 0)
    .style("pointer-events", "none");
    
    newSecDiv.append("div")
    .attr("class", "node-info-image")
    .each(function(d,i) {
	if(d.imgUrl) {
    if (d.imgUrl.length > 2) {
    d3.select(this)
    .append("img").attr("src", d.imgUrl.substr(0,10) == "data:image" ? d.imgUrl : "../../../img/example/zoom3/" + d.imgUrl)
    }
    }
    });
    
    newSecDiv.append("div").attr("class", "node-info-title").html(function(d) {return "<img class='node-info-type' src='../../../img/icon-"+d.kind.toLowerCase() +"-sm.png' />" + d.title})
    newSecDiv.append("div").attr("class", "node-info-desc ellipsis").html(function(d) {return "<div>" + d.summary + "</div>"})
    var secButtonDiv = newSecDiv.append("div").attr("class", "node-info-buttons")
    
    secButtonDiv.append("a")
    .attr("class", "node-info-edit button blue")
    .attr("href", "#")
    .on("click", function(d) {	editNode(d)})
    .html("edit")

    secButtonDiv.append("a")
    .attr("class", "node-info-more button purple")
    .attr("href", "#")
    .on("click", function(d) {	panToCenter(1000, d.column, d.row);populateMorePanel(d);showMorePanel(d)})
    .html("more");
    }
    var thisZoom = d3.select("div.zoom2").style("pointer-events") == "none" ? 1 : 2;
    setZoomLevel(thisZoom);
}

function editNode(incNode) {
    
	updatingNode = incNode;
    	d3.select("#node-popup").classed("hidden", true)
    	d3.select("#new-node").classed("hidden", false)
	d3.select("#new-node-type > div").attr("class", "icon-" + updatingNode.kind.toLowerCase()).html(updatingNode.kind.toLowerCase())
	document.getElementById("new-node-form-title").value = updatingNode.title;
	document.getElementById("new-node-form-desc").value = updatingNode.summary;
	document.getElementById("new-node-form-url").value = updatingNode.webUrl;
	document.getElementById("new-node-form-date").value = updatingNode.timestamp;
	document.getElementById("new-node-form-tags").value = updatingNode.tags;
	if (updatingNode.imgUrl.length > 2) {
	    d3.select("#new-node #new-node-image-preview").attr("src", updatingNode.imgUrl.substr(0,10) == "data:image" ? updatingNode.imgUrl : "../../../img/example/zoom2/" + updatingNode.imgUrl);
	}
	else {
	d3.select("#new-node #new-node-image-preview").attr("src", "../../../img/icon-camera.png");
        d3.select("#new-node #new-node-image-preview").classed("icon-camera", true);
        d3.select("#new-node #new-node-image-preview").classed("image-preview", false);
	}
//	d3.selectAll(".parsley-validated").property("value", "")

}

function presentationMode() {
    setZoomLevel(1);
    d3.select("#edit-presentation-header").style("display", "block")
    d3.select("#project-menu").style("display", "none")
    d3.select("#presentation-edit-link").attr("onclick", "exitPresentationMode()")
    d3.select("#zoom-controls").style("display", "none")
    d3.selectAll(".presentation-graphics").style("display", function(d) {return d.featured > 0 ? "block" : "none"})
    d3.selectAll("g.sec").on("mousedown", function() {}).on("mouseup", function() {}).on("click", setPresentation);
        
    reorderList();
}

function reorderList() {
    d3.select("#edit-presentation-reorder-nodes").selectAll(".reorder-node").remove();
    var presentedNodes = testLayout.nodes().filter(function(el) {return el.featured > 0})
    
    presentedNodes.sort(function (a,b) {
    if (parseInt(a.featured) > parseInt(b.featured))
    return 1;
    if (parseInt(a.featured) < parseInt(b.featured))
    return -1;
    return 0;
    });
    
    var reorderNode = d3.select("#edit-presentation-reorder-nodes").selectAll(".reorder-node").data(presentedNodes)
    .enter()
    .append("div")
    .attr("class", "reorder-node")
    .attr("draggable", true)
    .style("-moz-user-select", "none")
    .style("-webkit-user-select", "none")
    .style("-user-select", "none")
    .style("-khtml-user-drag", "element")
    .style("-webkit-user-drag", "element")
    .style("cursor", "move")
    .on('dragstart', reorderDragStart)
    .on('dragend', reorderDragEnd)
    .on('dragenter', reorderDragEnter)
    .on('dragover', reorderDragOver)
    .on('dragleave', reorderDragLeave)
    .on('mouseover', reorderHighlight)
    .on('mouseout', reorderDragEnd)
    .on('drop', reorderDrop)
    
    var subDiv = reorderNode.append("div").attr("class", "reorder-node-title");
    
    subDiv.append("img")
    .attr("class", "node-info-type")
    .attr("src", function(d) {return "../../../img/icon-"+d.kind+"-sm.png"})
    .style("width", "20px")
    .style("height", "20px")

    subDiv.append("span")
    .html(function(d) {return d.title})
    
    reorderNode.append("div").attr("class", "icon-reorder").append("img")
    .attr("src", "../../../img/icon-reorder.png")
    .style("width", "20px")
    .style("height", "20px")
    
}

function reorderDragStart(d,i) {
    updatingNode = d;
    
    d3.selectAll(".presentation-node-background").filter(function(p) {return p == d ? this : null}).style("fill", "#eed588")
//    
    d3.select(this).style("opacity", .5)
}

function reorderDragEnd(d,i) {
    d3.select(this).style("opacity", 1)
    d3.selectAll(".presentation-node-background").style("fill", "#faf3df")
    d3.selectAll(".reorder-node").style("border-bottom", "1px solid #e9e9e9")

}

function reorderHighlight(d,i) {
    d3.selectAll(".presentation-node-background").filter(function(p) {return p == d ? this : null}).style("fill", "#eed588")
}

function reorderDrop(d,i) {
    var oldOrder = parseInt(updatingNode.featured);
    var newOrder = parseInt(d.featured);
    if (oldOrder == newOrder) {
	d3.selectAll(".reorder-node").style("border-bottom", "1px solid #e9e9e9")
	return;
    }
    
    if (oldOrder - newOrder > 0) {
	
    for (x in testLayout.nodes()) {
	if (testLayout.nodes()[x].featured > newOrder && testLayout.nodes()[x].featured <= oldOrder) {
	    testLayout.nodes()[x].featured = parseInt(testLayout.nodes()[x].featured) + 1;
	}
    }
	
    }
    else if (oldOrder - newOrder < 0) {

    for (x in testLayout.nodes()) {
	if (testLayout.nodes()[x].featured <= newOrder && testLayout.nodes()[x].featured >= oldOrder) {
	    testLayout.nodes()[x].featured = parseInt(testLayout.nodes()[x].featured) - 1;
	}
    }
	
    }
    
    updatingNode.featured = parseInt(d.featured) + 1;

    presentationMode();
    refreshPresentationValues();

}

function reorderDragEnter(d,i) {
    d3.select(this).style("border-bottom", "5px solid black")
    d3.event.preventDefault();
}
function reorderDragOver(d,i) {
    d3.select(this).style("border-bottom", "5px solid black")
    d3.event.preventDefault();
}
function reorderDragLeave(d,i) {
    d3.select(this).style("border-bottom", "1px solid #e9e9e9")
    d3.event.preventDefault();
}


function exitPresentationMode() {
    d3.select("#edit-presentation-reorder").style("display", "none")    
    d3.select("#edit-presentation-header").style("display", "none")
    d3.select("#project-menu").style("display", "block")
    d3.select("#presentation-edit-link").attr("onclick", "presentationMode()")
    d3.select("#zoom-controls").style("display", "block")
    d3.selectAll(".presentation-graphics").style("display", "none")
    d3.selectAll("g.sec").on("mousedown", startMove).on("mouseup", endMove).on("click", function() {});
}

function setPresentation(d,i) {
    var oldValue = parseInt(testLayout.nodes()[i].featured);
    var newValue = (d.featured == 0 ? parseInt(d3.max(testLayout.nodes(), function(el) {return el.featured})) + 1 : 0);
    testLayout.nodes()[i].featured = newValue;
    
    if (oldValue > 0) {
    for (x in testLayout.nodes()) {
	if (parseInt(testLayout.nodes()[x].featured) > oldValue) {
	    testLayout.nodes()[x].featured = parseInt(testLayout.nodes()[x].featured) - 1;
	}
    }
    }
    refreshPresentationValues();
    reorderList();
}

function refreshPresentationValues() {
    d3.selectAll(".presentation-order-text")
    .text(function(d) {return d.featured});
    
    d3.selectAll(".presentation-graphics").style("display", function(d) {return d.featured > 0 ? "block" : "none"})
}

function showReorderingPanel() {
    d3.select("#edit-presentation-reorder").style("display", "block")
}

function hideReorderingPanel() {
    d3.select("#edit-presentation-reorder").style("display", "none")    
}

function showMorePanel(d) {
    hideModal();
    d3.select("#betweenLayer").selectAll("div.zoom2")
    .style("border", "2px solid #121212")
    d3.select("#betweenLayer").selectAll("div.zoom2").filter(function(p) {return p == d ? this : null})
    .style("border", "5px solid #121212")
//    if (d3.select("div.zoom2").style("pointer-events") == "none") {
        d3.selectAll("g.sec").filter(function(p) {return p == d ? this : null})
        .insert("circle", "path").attr("class","highlighter").attr("r", 20);
//    }
    d3.select("#morePanel").classed("hidden", false);
}