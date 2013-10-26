<?php 
// NEW PROJECT
$nestLevel = 3;
$loggedIn = true;
$bodyclass = "logged-in";

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
                
                    <?php include $pathPrefix . "parts/project-actions-menu.php" ?>
                    
                    <h1 class="project-title">New Project</h1>
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
                    <button id="zoom-1" onclick="setZoomLevel(1)" class="zoom-control active">Zoom 1</button>
                    <button id="zoom-2" onclick="setZoomLevel(2)" class="zoom-control">Zoom 2</button>
                    <button id="zoom-3" onclick="setZoomLevel(3)" class="zoom-control">Zoom 3</button>
                </div>
		
                <svg id="background">
                </svg>

                <div class="light" id="betweenLayer">
                </div>

                <svg id="map">
        			<script type="text/javascript">
        				drawBloomcase("empty8");
        			</script>
                </svg>
                <div class="light" id="aboveLayer">
                </div>
		
		<!-- Example side panel when you have a node selected and then click "more" -->
<div class="panel hidden" id="morePanel">
    <div id="node-info-image">
        <img class="" src="<?php print $pathPrefix; ?>img/node-big.png" alt="" width="347" height="" />
    </div>
    <div class="node-info-title"><img class="node-info-type" src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /> A big idea that took some thought</div>
    <div class="node-info-desc">
        <div>My big idea is to create a website to showcase funny cats. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus.</div>
    </div>
    <div id="node-info-buttons">
        <a id="node-info-edit" class="button blue" href="#">edit</a>
    </div>
</div>

		
<div id="project-tour-1" class="modal modal-center project-tour align-center">
	<p>Your project has been created!</p>
	<a onclick="tutorial(2)" class="button green more-link">Take a tour</a>
</div>

<div id="project-tour-2" class="modal project-tour align-center">
	<div class="modal-arrow"></div>
	<p>In the project menu, you can edit your project details, edit your presentation, and view your history.</p>
	<ul class="project-tour-status">
		<li><a href="#" class="active"></a></li>
		<li><a href="#"></a></li>
		<li><a href="#"></a></li>
	</ul>
	<a onclick="tutorial(3)" class="button more-link">Next</a>
</div>

<div id="project-tour-3" class="modal project-tour align-center">
	<div class="modal-arrow"></div>
	<p>Toggle viewing your project between story, presentation, and blog modes.</p>
	<ul class="project-tour-status">
		<li><a href="#"></a></li>
		<li><a href="#" class="active"></a></li>
		<li><a href="#"></a></li>
	</ul>
	<a onclick="tutorial(4)" class="button more-link">Next</a>
</div>

<div id="project-tour-4" class="modal modal-center project-tour align-center">
	<p>To get started, add your first artifact to your project!</p>
	<ul class="project-tour-status">
		<li><a href="#"></a></li>
		<li><a href="#"></a></li>
		<li><a href="#" class="active"></a></li>
	</ul>
	<a onclick="tutorial(5)" class="button blue">Let's do it!</a>
	<div class="modal-arrow"></div>
</div>

<div id="project-tour-5" class="modal modal-center project-tour align-center">
	<div class="close">
        <a class="" href="#">
            <img class="icon-close" src="<?php print $pathPrefix; ?>img/icon-close-black.png" alt="close" width="11" height="11" />
        </a>
    </div>
	<p>Congrats! You've added your first artifact. Click on it and drag out to create another one.</p>
	<div>
		<img src="<?php print $pathPrefix; ?>img/diagram-new-artifact.png" width="115" height="68" alt="Diagram showing how to create another artifact" />
	</div>
	<div class="modal-arrow"></div>
</div>

<div id="project-tour-6" class="modal modal-center project-tour align-center">
	<div class="close">
        <a class="" href="#">
            <img class="icon-close" src="<?php print $pathPrefix; ?>img/icon-close-black.png" alt="close" width="11" height="11" />
        </a>
    </div>
	<p>Connect two artifacts by dragging and targeting.</p>
	<div>
		<img src="<?php print $pathPrefix; ?>img/diagram-connect-artifacts.png" width="144" height="68" alt="Diagram showing how to connect two artifacts" />
	</div>
	<div class="modal-arrow"></div>
</div>

            </div> <!-- End bloomViz -->


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>