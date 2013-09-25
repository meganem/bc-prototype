
    rowSize = -50;
    columnSize = 25;
    secDivSize = 25;
    secDivOffset = 25;
    secDivOpacity = 1;
    secDivPE = "auto";
    
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
    

function drawBloomcase() {
    d3.select("#bloomViz").append("button").attr("onclick", "setZoomLevel(1)").html("Zoom 1").style("position", "absolute").style("right", "10px").style("top", "200px")
    d3.select("#bloomViz").append("button").attr("onclick", "setZoomLevel(2)").html("Zoom 2").style("position", "absolute").style("right", "10px").style("top", "230px")
    d3.select("#bloomViz").append("button").attr("onclick", "setZoomLevel(3)").html("Zoom 3").style("position", "absolute").style("right", "10px").style("top", "260px")
    newNodes = {};
    testLayout = new d3_layout_bloomcase();
    d3.json("../../../json/new8.json", function(data) {
    newNodes = data;
    testLayout.nodes(newNodes.nodes);
    bloomZoom = d3.behavior.zoom()
    .on("zoom", panBC);

    d3.select("svg").on("click", hideModal).call(bloomZoom);
    d3.select("svg").append("g").attr("id", "bloomG");    

    drawBC(testLayout.nodes(),testLayout.links());
    });
    
}

function panBC() {
    d3.select("#bloomG").attr("transform", "translate(" +bloomZoom.translate()[0]+","+bloomZoom.translate()[1]+")")
    
    d3.selectAll("div.sec")
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - (secDivSize / 2)) + "px")})
    .style("top", function(d) {return "" + ((270 + (secDivOffset) + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})

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
    
    vGridData = [];
    hGridData = [];
    var x = 0;
    while (x < 100) {
	vGridData.push((x - 50));
	hGridData.push((x - 50));
	x++;
    }
    
    d3.select("#bloomG").selectAll("line.hGrid").data(vGridData).enter().append("line")
    .attr("x1", -10000)
    .attr("x2", 10000)
    .attr("class", "hGrid")
    .attr("y1", function(d) {return d * columnSize})
    .attr("y2", function(d) {return d * columnSize})
    .style("stroke", "lightgray")
    .style("stroke-width", "1px")

    d3.select("#bloomG").selectAll("line.vGrid").data(vGridData).enter().append("line")
    .attr("y1", -10000)
    .attr("y2", 10000)
    .attr("class", "vGrid")
    .attr("x1", function(d) {return d * rowSize})
    .attr("x2", function(d) {return d * rowSize})
    .style("stroke", "lightgray")
    .style("stroke-width", "1px")

    d3.select("#bloomG").selectAll("path.connections").data(linkData).enter().append("path")
    .style("stroke", "black")
    .attr("class", "connections")
    .style("stroke-width", 2)
    .style("fill", "none")
    .attr("d", function(d) {return "M"+rowSize+"," + (200) + "c0,0 0,0 0,0"})
    
    var secG = d3.select("#bloomG").selectAll("g.sec").data(nodeData).enter().append("g")
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "sec")
    .attr("transform", function(d,i) {return "translate(30,200)"})
    .on("mousedown", startMove)
    .on("mouseup", endMove)

    var secDiv = d3.select("#bloomViz").selectAll("div.sec").data(nodeData).enter().append("div")
    .style("display", function(d) {return d.isMeta ? "none" : "block"})
    .attr("class", "sec")
    .style("width", "100px")
    .style("height", "100px")
    .style("background", "beige")
    .style("border", "1px gray solid")
    .style("border-radius", "5px")
    .style("position", "absolute")
    .style("left", "30px")
    .style("top", "200px")
    .style("opacity", 0)
    .style("pointer-events", "none");
    
    secDiv.append("img").attr("src", "../../../img/bc-logo-dark.png")
    .attr("class", "secImage")
    .style("width", "100%")
    .style("height", "30%");
    
    secDiv.append("p").attr("class", "secText").html("Some text")
    
    secG.append("path")
    .attr("class", function(d){ return d.kind; })
    .attr("d", function(d,i) {return shapeMeasures[d.kind]["pathd"]})
    .attr("transform", function(d) { 
	return "translate(" + (-1*(shapeMeasures[d.kind]["myWidth"]/2)) + "," + (-1*(shapeMeasures[d.kind]["myHeight"]/2)) + ")"; 
    });
    /*
    secG.append("text")
                .attr("dx", -1)
                .attr("dy", ".35em")
                .attr("alignment-baseline", "center")
                .attr("text-anchor", "middle")
                .style("fill", "white")
                .text(function(d) { return "" + (d.laneTotal)})
		.style("pointer-events", "none");
		*/
    redrawBC();
}

function redrawBC() {
    d3.selectAll("g.sec").transition().duration(1000)
    .attr("transform", function(d,i) {return "translate("+ (d.column * columnSize) +","+ (200 + (d.row * rowSize)) +")"})

    d3.selectAll("path.connections").transition()
    .duration(1000)
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, (200 + d.source.row * rowSize)],[d.target.column * columnSize, (200 + d.target.row * rowSize)]) });
    
    d3.selectAll("line.hGrid")
    .transition()
    .duration(1000)
    .attr("y1", function(d) {return d * columnSize})
    .attr("y2", function(d) {return d * columnSize})

    d3.selectAll("line.vGrid")
    .transition()
    .duration(1000)
    .attr("x1", function(d) {return d * rowSize})
    .attr("x2", function(d) {return d * rowSize})

    d3.selectAll("div.sec").transition().duration(1000)
    .style("left", function(d) {return "" + (bloomZoom.translate()[0] + ((d.column * columnSize) - (secDivSize / 2)) + "px")})
    .style("top", function(d) {return "" + ((270 + secDivOffset + (d.row * rowSize)) + bloomZoom.translate()[1]) + "px"})
}

function startMove(d,i) {
    d3.event.stopPropagation();
    if (!d3.select("#genNode").empty()) {return;}
    x1GenLine = d.column * columnSize;
    y1GenLine = 200 + (d.row * rowSize);
    updatingNode = d;
    var curMouse = d3.mouse(this.parentNode);
    d3.select("svg").on("mousemove", moveGenNode)
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
    .attr("d", "M 1,1 m -1,0 a 1,1 0 1,0 2,0 a 1,1 0 1,0 -2,0")
    .attr("transform", "translate(1,1)")
    .style("fill", "black")
    .style("opacity", 0).transition().duration(500).style("opacity",1)
    .attr("d","M 10,10 m -10,0 a 10,10 0 1,0 20,0 a 10,10 0 1,0 -20,0")
    .attr("transform", "translate(-10,-10)")
  
}

function endMove(d,i) {
    if (!d3.select(".options").empty()) {return;}
    var curMouse = d3.mouse(this);
    var blNodes = testLayout.nodes();
    for (no in blNodes) {
	var checkX = Math.abs(blNodes[no].column * columnSize - curMouse[0]);
	var checkY = Math.abs(200 + (blNodes[no].row * rowSize) - curMouse[1]);
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
	    d3.select("svg").on("mousemove", null)
	    var newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
	    freshLayout = new d3_layout_bloomcase();
	    freshLayout.nodes(newNodeArray);
	    drawBC(freshLayout.nodes(),freshLayout.links())
	    return;
	}
    }

    d3.select("svg").on("mousemove", null)
    
    d3.select("#genNode")
    .insert("circle", "#newNode")
    .attr("class", "options")
    .style("fill", "white")
    .style("stroke", "black")
    .style("stroke-width", "2px")
    .attr("r", 0)
    .transition()
    .duration(500)
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

    var circBCOpts = nodeOpts.append("circle")
    .attr("class", "options optionsBC")
    .attr("r", 1)
    .attr("cx", 0)
    .attr("cy", 0)
    .style("fill", "white")
    .style("stroke", "black")
    .style("stroke-width", "2px");
    
    var shapeOpts = nodeOpts.append("path")
    .attr("class", function(p){ return "options " + p; })
    .attr("d", "M 1,1 m -1,0 a 1,1 0 1,0 2,0 a 1,1 0 1,0 -2,0")
    .attr("transform", "translate(-1,-1)")
    .attr("id", function(p) {return "opt" + p})
    .on("click", function(p) {selectNewNode(p,d)})
    
    nodeOpts
    .transition()
    .duration(500).attr("transform", function (p,q) {return "translate("+ pointsOnCircle(p,q) + ")scale(1)"});

    shapeOpts
    .transition()
    .duration(500)
    .attr("d", function(p) {
	return shapeMeasures[p]["pathd"]
    })
    .attr("transform", function(p) { 
	return "translate(" + (-1*(shapeMeasures[p]["myWidth"]/2)) + "," + (-1*(shapeMeasures[p]["myHeight"]/2)) + ")scale(1)"; 
    })
    
    circBCOpts
    .transition()
    .duration(500)
    .attr("r", 15)
    
    d3.select("#newNode")
    .transition()
    .duration(500)
    .style("fill", "#C69722")
    .attr("d", shapeMeasures[currentNewNode]["pathd"])
}

function selectNewNode(d,i) {
    possibleShapes.push(currentNewNode);
    for (i in possibleShapes) {
	if (possibleShapes[i] == d) {
	    possibleShapes.splice(i,1);
	}
    }
    d3.select("#opt"+d)
    .attr("id", "opt" + currentNewNode)
    .attr("d", shapeMeasures[currentNewNode]["pathd"])
    .style("fill", shapeMeasures[currentNewNode]["color"]);

    currentNewNode = d;
    d3.select("#newNode")
    .on("click", function() {createNewNode(d,0)})
    .attr("d", shapeMeasures[d]["pathd"])
    .style("fill", shapeMeasures[d]["color"]);
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
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(newNode.column * columnSize), (200 + (newNode.row * rowSize))])});
    
    testLayout.nodes().push(newNode)
    newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
    
//    freshLayout = new d3_layout_bloomcase();
//    freshLayout.nodes(newNodeArray);
    
//    drawBC(freshLayout.nodes(),freshLayout.links())
//    testLayout.nodes(newNodeArray);
    redrawBC();
    var runLater = setTimeout(function() {nodeDetailsDialog(createdNode)}, 1000)
}

function nodeDetailsDialog(targetNode) {
    var translateAtt = targetNode.attr("transform");
    console.log(translateAtt);
    var nodeXY = translateAtt.split("(")[1].split(")")[0].split(",");
    d3.select("#new-node").style("display", "block").style("left", ((parseInt(nodeXY[0]) - 75) + bloomZoom.translate()[0]) + "px").style("top", ((parseInt(nodeXY[1]) - 40) + bloomZoom.translate()[1]) + "px")

}

function setZoomLevel(zl) {
    switch(zl) {
	case 1:
	    rowSize = -50;
	    columnSize = 25;
	    secDivOpacity = 0;
	    secDivPE = "none";
	    break;
	case 2:
	    rowSize = -100;
	    columnSize = 100;
	    secDivSize = 50;
	    secDivOffset = 50;
	    secDivOpacity = 1;
	    secDivPE = "auto";
	    d3.selectAll(".secText").style("display", "none")
	    break;
	case 3:
	    rowSize = -200;
	    columnSize = 200;
	    secDivSize = 100;
	    secDivOffset = 25;
	    secDivOpacity = 1;
	    secDivPE = "auto";
	    d3.selectAll(".secText").style("display", "block")
	break;
    }
    
    	    d3.selectAll("div.sec")
	    .style("pointer-events", secDivPE)
	    .style("height", secDivSize + "px")
	    .style("width", secDivSize + "px")
	    .style("opacity", secDivOpacity)

    redrawBC();
}

function hideModal() {
    d3.select("#new-node").style("display", "none");
}

function moveGenNode(d,i) {
    var curMouse = d3.mouse(this);
    forBack = (curMouse[0] - bloomZoom.translate()[0] - x1GenLine);
    d3.select("#genNode")
    .attr("transform","translate("+(curMouse[0] - bloomZoom.translate()[0])+","+(curMouse[1] - bloomZoom.translate()[1])+")")

    d3.select("#genLine")
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[(curMouse[0] - bloomZoom.translate()[0]), (curMouse[1] - bloomZoom.translate()[1])])});
        
}