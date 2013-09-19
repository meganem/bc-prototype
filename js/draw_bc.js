
    rowSize = 50;
    columnSize = 25;
    updatingNode = {};
    x1GenLine = 0;
    y1GenLine = 0;
    currentNewNode = "Idea";
    possibleShapes = ["Inspiration", "Final", "Draft", "Sketch"]

function drawBloomcase() {
    
    newNodes = {};
    testLayout = new d3_layout_bloomcase();
    d3.json("../../../json/new8.json", function(data) {
    newNodes = data;
    testLayout.nodes(newNodes.nodes);
    
    d3.select("svg").append("g").attr("id", "bloomG");    

    drawBC(testLayout.nodes(),testLayout.links());
    });
    
}

    var curvyLine = function(startPoint,endPoint) {

	var xStep = (endPoint[0] - startPoint[0]);
	var yStep = (endPoint[1] - startPoint[1]);
	var xyDiff = Math.abs(yStep) - rowSize;
	var firstDiff = xyDiff * .375;
	var secDiff = xyDiff * .17;
		
	if (startPoint[1] < endPoint[1] && startPoint[0] < endPoint[0]) {
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff) + ",0 " + (-secDiff) + ","+ (yStep) + " " + xStep + "," + yStep;
	}
	else if (startPoint[1] < endPoint[1] && startPoint[0] > endPoint[0]) {
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff) + ",0 " + (-secDiff) + ","+ (yStep) + " " + xStep + "," + yStep;
	}
	else if (startPoint[1] > endPoint[1] && startPoint[0] < endPoint[0]) {
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff) + ",0 " + (-secDiff) + ","+ (yStep) + " " + xStep + "," + yStep;
	}
	else if (startPoint[1] > endPoint[1] && startPoint[0] > endPoint[0]) {
	return "M" + startPoint[0] + "," + startPoint[1] + "c" + (xStep + firstDiff) + ",0 " + (-secDiff) + ","+ (yStep) + " " + xStep + "," + yStep;
	}
	else {
	return "M" + startPoint[0] + "," + startPoint[1] + "c0,0 "+xStep+"," + (yStep) + " " + xStep + "," + yStep;
	}
    }
    
function drawBC(nodeData,linkData) {
    d3.selectAll("path.connections").remove();
    d3.selectAll("g.sec").remove();
    
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

    
    secG.append("path")
    .attr("class", function(d){ return d.kind; })
    .attr("d", function(d,i) {return shapeMeasures[d.kind]["pathd"]})
    .attr("transform", function(d) { 
	return "translate(" + (-1*(shapeMeasures[d.kind]["myWidth"]/2)) + "," + (-1*(shapeMeasures[d.kind]["myHeight"]/2)) + ")"; 
    });

    /*secG.append("text")
                .attr("dx", -1)
                .attr("dy", ".35em")
                .attr("alignment-baseline", "center")
                .attr("text-anchor", "middle")
                .style("fill", "white")
                .text(function(d) { return d.nid })
		.style("pointer-events", "none");*/
		
    redrawBC();
}

function redrawBC() {
    d3.selectAll("g.sec").transition().duration(1000)
    .attr("transform", function(d,i) {return "translate("+ (d.column * columnSize) +","+ (200 + (d.row * rowSize)) +")"})
    
    d3.selectAll("path.connections").transition()
    .duration(1000)
    .attr("d", function(d) {return curvyLine([d.source.column * columnSize, (200 + d.source.row * rowSize)],[d.target.column * columnSize, (200 + d.target.row * rowSize)]) });

}

function startMove(d,i) {
    if (!d3.select("#genNode").empty()) {return;}
    x1GenLine = d.column * columnSize;
    y1GenLine = 200 + (d.row * rowSize);
    updatingNode = d;
    var curMouse = d3.mouse(this.parentNode);
    d3.select("svg").on("mousemove", moveGenNode)
    d3.select("#bloomG").on("mouseup", endMove)
    d3.select("#bloomG").append("path")
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
	    blNodes[no].evolvedFrom.length == 0 ? blNodes[no].evolvedFrom = updatingNode.nid : blNodes[no].evolvedFrom += ("," + updatingNode.nid)
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
    .attr("class", "optionsBC")
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
    .transition()
    .duration(500)
    .attr("d", shapeMeasures[currentNewNode]["pathd"])
    .style("fill", shapeMeasures[currentNewNode]["color"]);

    currentNewNode = d;
    d3.select("#newNode")
    .on("click", function() {createNewNode(d,0)})
    .transition()
    .duration(500)
    .attr("d", shapeMeasures[d]["pathd"])
    .style("fill", shapeMeasures[d]["color"]);
}

function createNewNode(d,i) {
    d3.select("#genNode").remove();
    d3.select("#genLine").remove();
    var forBack = 50;
    var evolvedVal = "";
    var newNodeID = "100" + testLayout.nodes().length;
    if (forBack > 0) {
	evolvedVal = updatingNode.nid;
    }
    else {
	updatingNode.evolvedFrom.length == 0 ? updatingNode.evolvedFrom = newNodeID : updatingNode.evolvedFrom += ("," + newNodeID)
    }
    
    var newNode = {nid: newNodeID,
    kind: d, datetime: testLayout.nodes()[0].datetime,
    timestamp: testLayout.nodes()[0].timestamp,
    row: -1,
    column: -1,
    isMeta: false,
    evolvedFrom: evolvedVal}
    
    testLayout.nodes().push(newNode)
    newNodeArray = testLayout.nodes().filter(function(el) {return el.isMeta ? null : this});
    
    freshLayout = new d3_layout_bloomcase();
    freshLayout.nodes(newNodeArray);
    
    drawBC(freshLayout.nodes(),freshLayout.links())
//    testLayout.nodes(newNodeArray);
//    redrawBC();
}

function moveGenNode(d,i) {
    var curMouse = d3.mouse(this);
    d3.select("#genNode")
    .attr("transform","translate("+curMouse[0]+","+curMouse[1]+")")

    d3.select("#genLine")
    .attr("d", function(d) {return curvyLine([x1GenLine, y1GenLine],[curMouse[0], curMouse[1]])});
        
}