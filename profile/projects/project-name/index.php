<?php 
// PROJECT NAME
$nestLevel = 3;
$loggedIn = true;

// DETERMINE PATH PREFIX
$pathLevel = "../";
$pathPrefix = "";
if ($nestLevel > 0) {
	for ($i = 0; $i < $nestLevel; $i++) {
		$pathPrefix = $pathPrefix . $pathLevel;
	}
}

// SET PATHS FOR INCLUDE FILES
$headerInclude = $pathPrefix . "parts/header.php";
$footerInclude = $pathPrefix . "parts/footer.php";

// INCLUDE HEADER
include $headerInclude; 
?>
<script src="<?php print $pathPrefix; ?>js/d3.v3.min.js"></script>
<script src="<?php print $pathPrefix; ?>js/bloomcase_layout.js"></script>
<script src="<?php print $pathPrefix; ?>js/draw_bc.js"></script>

			<div id="project-header" class="light">
                <div class="container">
                
                    <div class="click-nav click-nav-2">
                        <ul class="no-js">
                            <li>
                                <a href="#" class="clicker">
                                    <img src="<?php print $pathPrefix; ?>img/projectthumb-sm.png" width="35" height="35" alt="project thumbnail" />
                                </a>
                                <ul id="project-actions-menu" class="menu dropdown">
                                    <li><a href="#"><img class="icon-edit" src="<?php print $pathPrefix; ?>img/icon-edit.png" alt="" width="20" height="20" /> Edit description</a></li>
                                    <li><a href="#"><img class="icon-share" src="<?php print $pathPrefix; ?>img/icon-share.png" alt="" width="20" height="20" /> Share</a></li>
                                    <li><a href="#"><img class="icon-archive" src="<?php print $pathPrefix; ?>img/icon-archive.png" alt="" width="20" height="20" /> Archive</a></li>
                                    <li><a href="#"><img class="icon-change-thumb" src="<?php print $pathPrefix; ?>img/icon-change-thumb.png" alt="" width="20" height="20" /> Change thumbnail</a></li>
                                    <li class="separator"></li>
                                    <li><a href="#"><img class="icon-edit-presentation" src="<?php print $pathPrefix; ?>img/icon-edit-presentation.png" alt="" width="20" height="20" /> Edit presentation</a></li>
                                    <li><a href="#"><img class="icon-presentation" src="<?php print $pathPrefix; ?>img/icon-presentation.png" alt="" width="20" height="20" /> Launch presentation</a></li>
                                    <li class="separator"></li>
                                    <li><a href="#"><img class="icon-history" src="<?php print $pathPrefix; ?>img/icon-history.png" alt="" width="20" height="20" /> View history</a></li>
                                </ul>
                            </li>
                       </ul>
                    </div> <!-- End click-nav -->
                    
                    <h1 class="project-title">My Project</h1>
                    <div id="project-menu" class="">
                        <ul class="menu">
                            <li><a href="#" data-title="Story Mode" class="active"><img class="icon-story-mode" src="<?php print $pathPrefix; ?>img/icon-story-mode.png" alt="Story Mode" width="30" height="30" /></a></li>
                            <li><a href="#" data-title="Presentation Mode" ><img class="icon-presentation" src="<?php print $pathPrefix; ?>img/icon-presentation.png" alt="Presentation Mode" width="30" height="30" /></a></li>
                            <li><a href="#" data-title="Blog Mode"><img class="icon-blog-mode" src="<?php print $pathPrefix; ?>img/icon-blog-mode.png" alt="Blog Mode" width="30" height="30" /></a></li>
                            <!-- <li><a href="#"><img class="icon-group" src="<?php //print $pathPrefix; ?>img/icon-group.png" alt="" width="30" height="30" /> Group</a></li>
                            <li><a href="#"><img class="icon-new" src="<?php //print $pathPrefix; ?>img/icon-new.png" alt="" width="30" height="30" /> New</a></li> -->
                        </ul>
                    </div>
                </div> <!-- End container -->
            </div> <!-- End project-header -->
            
	        <div class="light" id="bloomViz">

                <!-- Zoom controls -->
                <div id="zoom-controls">
                    <div id="zoom-label">Zoom</div>
                    <button id="zoom-1" onclick="setZoomLevel(1)" class="zoom-control">Zoom 1</button>
                    <button id="zoom-2" onclick="setZoomLevel(2)" class="zoom-control">Zoom 2</button>
                    <button id="zoom-3" onclick="setZoomLevel(3)" class="zoom-control">Zoom 3</button>
                </div>
		
                <svg id="background">
                </svg>

                <div class="light" id="betweenLayer">
                </div>

                <svg id="map">
        			<script type="text/javascript">
        				drawBloomcase();
        			</script>
                </svg>


            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>