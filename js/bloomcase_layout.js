blHashExposed = {};
d3_layout_bloomcase = function() {
    var topLayer = 0, bottomLayer = 0, eventRelations = [], temporalProjection, eventHash = {}, tlWidth = 100, tlHeight = 100, temporalRange =[0,1], temporalType = "date", timeScale = 1, featureCollection, temporalPeriods = [], temporalEvents = [], timeSegments, numLanes = 1, earliestDate = 1, latestDate = 10;

    var firstNodes=[], lastNodes=[], numColumns = 1, blNodes = [], blLinks = [], columnStep = 30, blNodeHash = {},columnsByRows = {};
    var shapeHierarchy = ["Draft", "Final", "Sketch","Idea","Inspiration", "last", "meta"];
    shapeMeasures = {
	    Inspiration: {myWidth: 21.6, myHeight: 21.6, rank: 1, color: "#874C81",
	    pathd: "m 0.01026027,10.787444 c 0,0.06589 -10.81177127,-0.487141 -10.81177127,-10.7101314 0,-10.5446036 10.83852269,-10.8141296 10.81177127,-10.8141296 l 0,0 c 0,0 10.71375373,0.340986 10.71375373,10.8141296 l 0,0 c 0,10.3244924 -10.71375373,10.7101314 -10.71375373,10.7101314 z",
	    smalld: "m 0.00187403,8.9462199 c 0,0.054619 -8.96167943,-0.4037825 -8.96167943,-8.87743225 0,-8.74022905 8.9838532,-8.96363435 8.96167943,-8.96363435 l 0,0 c 0,0 8.88043507,0.2826372 8.88043507,8.96363435 l 0,0 c 0,8.55778295 -8.88043507,8.87743225 -8.88043507,8.87743225 z"
            },
	    Final: {myWidth: 27, myHeight: 31, rank: 4, color: "#352C2A",
	    pathd: "m 10.374464,13.522842 h -20.811 c -1.712,0 -3.105,-1.391 -3.105,-3.104001 v -20.810999 c 0,-1.711 1.394,-3.104 3.105,-3.104 h 20.812 c 1.713,0 3.104,1.393 3.104,3.104 v 20.811999 c 0,1.713001 -1.392,3.103001 -3.105,3.103001 z",
	    smalld: "m 6.0230397,7.9580576 h -12.008 c -1.03,0 -1.869,-0.838 -1.869,-1.869 v -12.008 c 0,-1.03 0.839,-1.869 1.869,-1.869 h 12.008 c 1.031,0 1.869,0.839 1.869,1.869 v 12.008 c 0,1.031 -0.839,1.869 -1.869,1.869 z"
	    },
	    Draft: {myWidth: 27, myHeight: 31, rank: 5, color: "#2D83A5",
	    pathd: "m 10.426267,13.570795 h -20.811 c -1.712,0 -3.105,-1.391 -3.105,-3.104 v -20.811 c 0,-1.711 1.394,-3.104 3.105,-3.104 h 20.812 c 1.713,0 3.104,1.393 3.104,3.104 v 20.812 c 0,1.713 -1.392,3.103 -3.105,3.103 z",
	    smalld: "m 6.515752,8.53477 h -13.109 c -1.078,0 -1.955,-0.876 -1.955,-1.955 v -13.108 c 0,-1.078 0.878,-1.955 1.955,-1.955 h 13.109 c 1.0789997,0 1.9549997,0.877 1.9549997,1.955 v 13.109 c 0,1.079 -0.876,1.954 -1.9549997,1.954 z"
	    },
	    Sketch: {myWidth: 25.1, myHeight: 29.1, rank: 3, color: "#628C31",
	    pathd: "m 9.5280883,12.597289 h -19.126 c -1.6410003,0 -2.9770003,-1.334 -2.9770003,-2.9769991 V -9.5047105 c 0,-1.6410005 1.336,-2.9770005 2.9770003,-2.9770005 h 19.126 c 1.6419997,0 2.9779997,1.336 2.9779997,2.9770005 V 9.6202899 c -10e-4,1.6429991 -1.337,2.9769991 -2.9779997,2.9769991 z",
	    smalld: "m 6.0230397,7.9580576 h -12.008 c -1.03,0 -1.869,-0.838 -1.869,-1.869 v -12.008 c 0,-1.03 0.839,-1.869 1.869,-1.869 h 12.008 c 1.031,0 1.869,0.839 1.869,1.869 v 12.008 c 0,1.031 -0.839,1.869 -1.869,1.869 z"
	    },
	    Idea: {myWidth: 31.7, myHeight: 36.3, rank: 2, color: "#C69722",
	    pathd: "M 0.06251087,-18.075117 C -2.2034891,-11.272117 -9.0074895,-2.2021174 -15.81049,0.06688262 -9.0064895,2.3328826 -2.2034891,11.404883 0.06251087,18.208883 2.3295109,11.404883 9.1345109,2.3358826 15.93551,0.06688262 9.1345109,-2.2021174 2.3335109,-11.272117 0.06251087,-18.075117 z",
	    smalld: "M 0,-12.677255 C -1.603,-7.8662548 -6.414,-1.4522548 -11.225,0.1527452 -6.414,1.7547455 -1.603,8.1707455 0,12.981745 1.604,8.1697455 6.4149997,1.7557455 11.226,0.1527452 6.4149997,-1.4532548 1.605,-7.8672548 0,-12.677255 z"
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
                incNodes[incNode].component = 0;
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
			updateLink.id = updateLink.id.replace("meta","");
                        blNodes.splice(deleteNodeID,1);
                    }
                }
            }
            x--;
        }
    }
    
    function hierarchicalLayout() {
//        return;

	var currentComponent = 1;
	var allSorted = false;
	var sortedNodes = [];

	for (blNode in blNodes) {
	    if (blNodes[blNode].column == -1) {
		blNodes[blNode].column = -100;
		sortedNodes.push(blNodes[blNode]);
		blNodes[blNode].component = currentComponent;
		currentComponent++;

	    }
	    while (sortedNodes.length > 0) {
	    for (blLink in blLinks) {
		if (sortedNodes[0] == blLinks[blLink].source && blLinks[blLink].target.column == -1) {
		    blLinks[blLink].target.column = blLinks[blLink].source.column + 1;
		    blLinks[blLink].target.component = blLinks[blLink].source.component;
		    sortedNodes.push(blLinks[blLink].target);
		}
		if (sortedNodes[0] == blLinks[blLink].target && blLinks[blLink].source.column == -1) {
		    blLinks[blLink].source.column = blLinks[blLink].target.column - 1;
		    blLinks[blLink].source.component = blLinks[blLink].target.component;
		    sortedNodes.push(blLinks[blLink].source);
		}
	    }
	    sortedNodes.splice(0,1);
	    }
	}
        
    //Now sort the nodes by placeholder column so the layout starts with the earliest discovered node    
    blNodes.sort(function (a,b) {
    if (a.column < b.column)
    return -1;
    if (a.column > b.column)
    return 1;
    return 0;
    });
    
    
    //Set the earliest node to column position 2 (we're numbering columns in intervals of 2 to leave room for meta-columns)
    
    while (currentComponent > 0) {
	for (blNode in blNodes) {
	    if (blNodes[blNode].component == currentComponent) {
		blNodes[blNode].column = 2;
		break;
	    }
	}
		    currentComponent--;
	}

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
    if (a["component"] < b["component"])
    return 1;
    if (a["component"] > b["component"])
    return -1;
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
