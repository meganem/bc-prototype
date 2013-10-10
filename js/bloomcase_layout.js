blHashExposed = {};
d3_layout_bloomcase = function() {
    var topLayer = 0, bottomLayer = 0, eventRelations = [], temporalProjection, eventHash = {}, tlWidth = 100, tlHeight = 100, temporalRange =[0,1], temporalType = "date", timeScale = 1, featureCollection, temporalPeriods = [], temporalEvents = [], timeSegments, numLanes = 1, earliestDate = 1, latestDate = 10;

    var firstNodes=[], lastNodes=[], numColumns = 1, blNodes = [], blLinks = [], columnStep = 30, blNodeHash = {},columnsByRows = {};
    var shapeHierarchy = ["Draft", "Final", "Sketch","Idea","Inspiration", "last", "meta"];
    shapeMeasures = {
	    Inspiration: {myWidth: 21.6, myHeight: 21.6, rank: 1, color: "#874C81",
	    pathd: "M 10.8,10.8 m -10.8,0 a 10.8,10.8 0 1,0 21.6,0 a 10.8,10.8 0 1,0 -21.6,0",
	    smalld: "M 9,9 m -9,0 a 9,9 0 1,0 18,0 a 9,9 0 1,0 -18,0"
            },
	    Final: {myWidth: 27, myHeight: 31, rank: 4, color: "#352C2A",
	    pathd: "M23.067,29.659H2.256c-1.712,0-3.105-1.391-3.105-3.104V5.744c0-1.711,1.394-3.104,3.105-3.104 h20.812c1.713,0,3.104,1.393,3.104,3.104v20.812C26.172,28.269,24.78,29.659,23.067,29.659z",
	    smalld: "M23.067,29.659h-13.109c-1.078,0-1.955-0.876-1.955-1.955v-13.108 c0-1.078,0.878-1.955,1.955-1.955h13.109c1.079,0,1.955,0.877,1.955,1.955v13.109C-364.97,642.153-365.846,643.028-366.925,643.028z"
	    },
	    Draft: {myWidth: 27, myHeight: 31, rank: 5, color: "#628C31",
	    pathd: "M23.067,29.659H2.256c-1.712,0-3.105-1.391-3.105-3.104V5.744c0-1.711,1.394-3.104,3.105-3.104 h20.812c1.713,0,3.104,1.393,3.104,3.104v20.812C26.172,28.269,24.78,29.659,23.067,29.659z",
	    smalld: "M23.067,29.659h-13.109c-1.078,0-1.955-0.876-1.955-1.955v-13.108 c0-1.078,0.878-1.955,1.955-1.955h13.109c1.079,0,1.955,0.877,1.955,1.955v13.109C-364.97,642.153-365.846,643.028-366.925,643.028z"
	    },
	    Sketch: {myWidth: 25.1, myHeight: 29.1, rank: 3, color: "#2D83A5",
	    pathd: "M20.56,27.996H1.434c-1.641,0-2.977-1.334-2.977-2.977V5.894c0-1.641,1.336-2.977,2.977-2.977 H20.56c1.642,0,2.978,1.336,2.978,2.977v19.125C23.537,26.662,22.201,27.996,20.56,27.996z",
	    smalld: "M20.56,27.996h-12.008c-1.03,0-1.869-0.838-1.869-1.869v-12.008 c0-1.03,0.839-1.869,1.869-1.869h12.008c1.031,0,1.869,0.839,1.869,1.869v12.008C-367.214,639.948-368.053,640.786-369.083,640.786z"
	    },
	    Idea: {myWidth: 31.7, myHeight: 36.3, rank: 2, color: "#C69722",
	    pathd: "M15.308-0.374C13.042,6.429,6.238,15.499-0.565,17.768c6.804,2.266,13.607,11.338,15.873,18.142 c2.267-6.804,9.072-15.873,15.873-18.142C24.38,15.499,17.579,6.429,15.308-0.374z",
	    smalld: "M15.308-0.374c-1.603,4.811-6.414,11.225-11.225,12.83 c4.811,1.602,9.622,8.018,11.225,12.829c1.604-4.812,6.415-11.226,11.226-12.829C-361.987,641.866-366.797,635.452-368.402,630.642z"
	    }
	}

    
    this.nodes = function(newNodes) {
        if(newNodes) {
            blNodes = newNodes;
            processNodes(blNodes);
            createLinks(blNodes);
            hierarchicalLayout();
            return this;
        }
        else {
            return blNodes;
        }
    }
    
    this.columnContents = function() {
        return columnsByRows;
    }
    
    this.firstNodes = function() {
        return firstNodes;
    }

    this.links = function(newLinks) {
        if(newLinks) {
            blLinks = newLinks;
            return this;
        }
        else {
            return blLinks;
        }
    }
    
    function processNodes(incNodes) {
        for (incNode in incNodes) {
            if (incNodes[incNode]) {
                var tArr = incNodes[incNode].timestamp.split("-");
                incNodes[incNode].datetime = new Date(tArr[0], tArr[1], tArr[2], tArr[3],tArr[4],tArr[5]);
                incNodes[incNode].column = -1;
                incNodes[incNode].row = -1;
                incNodes[incNode].lane = 1;
                incNodes[incNode].lane2 = 1;
		incNodes[incNode].sourceCount = 0;
		incNodes[incNode].targetCount = 0;
                incNodes[incNode].isMeta = false;                
                incNodes[incNode].evolvedFromArray = [];
                blNodeHash[incNodes[incNode].nid] = incNodes[incNode];
                //Find any nodes that didn't evolve from other nodes to make the first pass at finding the first nodes
                //Later we need to identify which of these aren't connected to anything at all
                //As well as which started somewhere down the line
                if(!incNodes[incNode].evolvedFrom) {
                    firstNodes.push(incNodes[incNode])
                }
            }
        }
        blHashExposed = blNodeHash;
    }

    function createLinks(incNodes) {
        for (incNode in incNodes) {
            if (incNodes[incNode]) {
                if (incNodes[incNode].kind == "meta") {
                    return;
                }
                if (incNodes[incNode].evolvedFrom) {
                    var linkArray = incNodes[incNode].evolvedFrom.split(",").sort();
                    for (l in linkArray) {
                        var linkObject1 = {id: 0, target: {}, source: {}}
                        var linkObject2 = {id: 0, target: {}, source: {}}
                        var metaNodeObject = {};
                        var alreadyExists = false;
                        if(linkArray[l]) {
                            for (tt in blNodes) {
                                if (blNodes[tt].isMeta) {
                                        if(blNodes[tt].evolvedFrom.split(",").sort() == linkArray) {
                                            metaNodeObject = blNodes[tt];
                                            alreadyExists = true;
                                        }
                                }
                            }
                        if (alreadyExists == true) {
                        }
                        else if (blNodeHash["meta" + incNodes[incNode].nid]) {
                            metaNodeObject = blNodeHash["meta" + incNodes[incNode].nid]
                        }
                        else {
                            metaNodeObject = {kind: blNodeHash[incNodes[incNode].nid].kind,
			    datetime: blNodeHash[incNodes[incNode].nid].datetime,
			    lane: 1,
			    lane2: 1,
			    sourceCount: 0,
			    targetCount: 0,
			    evolvedFrom: incNodes[incNode].evolvedFrom,
			    row: -1, column: -1, isMeta: true, nid: "meta" + incNodes[incNode].nid, evolvedFromArray: []}
                        blNodes.push(metaNodeObject);
                        incNodes[incNode].evolvedFromArray.push(metaNodeObject);
                            blNodeHash["meta" + incNodes[incNode].nid] = metaNodeObject;
                        }
                        linkObject1.source = blNodeHash[linkArray[l]];
                        linkObject1.target = metaNodeObject;
			linkObject1.id = metaNodeObject.nid + blNodeHash[linkArray[l]].nid;
                        linkObject2.source = metaNodeObject;
                        linkObject2.target = blNodeHash[incNodes[incNode].nid];
			linkObject2.id = metaNodeObject.nid + blNodeHash[incNodes[incNode].nid].nid;
			blNodeHash[incNodes[incNode].nid].sourceCount++;
			blNodeHash[linkArray[l]].targetCount++;
			metaNodeObject.sourceCount++;
			metaNodeObject.targetCount++;
                        metaNodeObject.evolvedFromArray.push(blNodeHash[linkArray[l]]);
                        blLinks.push(linkObject1);
                        blLinks.push(linkObject2);
                        //find other such linkobjects and create them                        
                        }
                    }
                }
            }
        }
        // delete metanodes that only connect two nodes
        
        var x = blNodes.length - 1;
        while (x > 0) {
            if (blNodes[x]) {
                if (blNodes[x].isMeta) {
                    var connections = 0;
                    var newSource = {};
                    var newTarget = {};
                    var deleteLinkID = 0;
                    var deleteNodeID = x;
                    var deleteNode = blNodes[x];
                    var updateLink = {};
                    for (y in blLinks) {
                        if (connections > 2) {
                            break;
                        }
                        if (blLinks[y].source == blNodes[x]) {
                            newTarget = blLinks[y].target;
                            updateLink = blLinks[y];
                            connections++;
                        }
                        else if (blLinks[y].target == blNodes[x]) {
                            newSource = blLinks[y].source;
                            deleteLinkID = y;
                            connections++;
                        }
                    }
                    if (connections == 2) {
                        newTarget.evolvedFromArray = [newSource];
                        blLinks.splice(deleteLinkID,1);
                        updateLink.source = newSource;
                        blNodes.splice(deleteNodeID,1);
                    }
                }
            }
            x--;
        }
    }
    
    function hierarchicalLayout() {
//        return;
        //Walk backward to find the lowest possible value
        for (blLink in blLinks) {
            blLinks[blLink].target.column--;
            if(blLinks[blLink].source.nid == "1") {
                blLinks[blLink].source.column++;
            }
        }
        
            //Now sort the nodes by placeholder column to the layout starts with the earliest discovered node    
    blNodes.sort(function (a,b) {
    if (a.column < b.column)
    return 1;
    if (a.column > b.column)
    return -1;
    return 0;
    });
    
    //Set the earliest node to column position 2 (we're numbering columns in intervals of 2 to leave room for meta-columns)
    blNodes[0].column = 2;
    
    zeroSourceLinks = blLinks.filter(function(el) {return el.source.sourceCount == 0})
    var z = 0;
    while (z <= zeroSourceLinks.length) {
	if (zeroSourceLinks[0]) {
	    if (zeroSourceLinks[0].target.lane <= zeroSourceLinks[0].source.lane) {
		zeroSourceLinks[0].target.lane = zeroSourceLinks[0].source.lane + 1;
	    }
	    foundLinks = blLinks.filter(function(el) {return el.source.nid == zeroSourceLinks[0].target.nid})
	    for (x in foundLinks) {
		if (zeroSourceLinks.indexOf(foundLinks[x]) == -1) {
		    zeroSourceLinks.push(foundLinks[x])
		}
	    }
	    zeroSourceLinks.shift();
	}
	else {
	    break;
	}
    }
    
    zeroSourceLinks = blLinks.filter(function(el) {return el.target.targetCount == 0})
    var z = 0;
    while (z <= zeroSourceLinks.length) {
	if (zeroSourceLinks[0]) {
	    if (zeroSourceLinks[0].source.lane2 <= zeroSourceLinks[0].target.lane2) {
		zeroSourceLinks[0].source.lane2 = zeroSourceLinks[0].target.lane2 + 1;
	    }
	    foundLinks = blLinks.filter(function(el) {return el.target.nid == zeroSourceLinks[0].source.nid})
	    for (x in foundLinks) {
		if (zeroSourceLinks.indexOf(foundLinks[x]) == -1) {
		    zeroSourceLinks.push(foundLinks[x])
		}
	    }
	    zeroSourceLinks.shift();
	}
	else {
	    break;
	}
    }
    
    //add them up
    for (x in blNodes) {
	blNodes[x].laneTotal = blNodes[x].lane + blNodes[x].lane2;
    }

    //Step through the array again starting
    var newLinks = [];
    for (z in blLinks) {
        if(blLinks[z]) {
            newLinks.push(blLinks[z])
        }
    }
    while (newLinks.length > 0) {
        for (l in newLinks) {
            if (newLinks[l]) {
            if (newLinks[l].source.column > 0 && newLinks[l].target.column < 0) {
                newLinks[l].target.column = newLinks[l].source.column + 2;
                newLinks.splice(l,1);
                break;
            }
            else if (newLinks[l].source.column < 0 && newLinks[l].target.column > 0) {
                newLinks[l].source.column = newLinks[l].target.column - 2;
                newLinks.splice(l,1);
                break;
            }
            else if (newLinks[l].source.column > 0 && newLinks[l].target.column > 0) {
                newLinks.splice(l,1);
                break;                
            }
            }
            else {
                newLinks.splice(l,1);
                break;                
            }
        }
    }
    //Arrange rows
    
    for (shapes in shapeHierarchy) {
        for (bn in blNodes) {
            if (blNodes[bn].kind == shapeHierarchy[shapes]) {
                if (!columnsByRows[blNodes[bn].column]) {
                    columnsByRows[blNodes[bn].column] = [];
                }
                columnsByRows[blNodes[bn].column].push(blNodes[bn]);
            }
        }
    }

    for (col in columnsByRows) {
    columnsByRows[col].sort(function (a,b) {
    var sortReturn = 0;
    if (a["laneTotal"] < b["laneTotal"])
    return 1;
    if (a["laneTotal"] > b["laneTotal"])
    return -1;
    if (shapeMeasures[a.kind]["rank"] < shapeMeasures[b.kind]["rank"])
    return 1;
    if (shapeMeasures[a.kind]["rank"] > shapeMeasures[b.kind]["rank"])
    return -1;
    if (a.datetime < b.datetime)
    return 1;
    if (a.datetime > b.datetime)
    return -1;
    return 0;
    });
    }
    
    exposedCols = columnsByRows;
            var currentKind = "";
        var currentList = [];
        var offset = 0;
        var isFirst = false;
        
    for (c in columnsByRows) {
        currentKind = "";
        currentLane = 0;
        currentList = [];
        offset = 0;
        isFirst = true;
        for (node in columnsByRows[c]) {
        if (columnsByRows[c][node].kind == currentKind && (columnsByRows[c][node].lane + columnsByRows[c][node].lane2) == currentLane) {
            currentList.push(columnsByRows[c][node]);
        }
            else {
            placeRows();
            currentKind = columnsByRows[c][node].kind;
	    currentLane = (columnsByRows[c][node].lane + columnsByRows[c][node].lane2);
            currentList.push(columnsByRows[c][node]);
            }
        }
        placeRows();
    }
    
    function placeRows() {
               if (currentList.length > 0) {
                for (pc in currentList) {
                if (isFirst == true) {
                    currentList[pc].row = pc - (currentList.length / 2)
                    offset = (currentList.length / 2);
                }
                else {
                    currentList[pc].row = offset;
                    offset++;
                }
                }
                isFirst = false;
            currentList = [];
            }
    }
    }

}
