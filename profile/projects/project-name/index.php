<?php 
// PROJECT NAME
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
        				drawBloomcase("new8");
        			</script>
                </svg>
                <div class="light" id="aboveLayer">
                </div>

<!-- New node form -->
<div id="new-node" class="modal is-short hidden">
     <div class="modal-arrow"></div>
    <div id="new-node-cancel">
        <a class="" href="#">
            <img class="icon-cancel" src="<?php print $pathPrefix; ?>img/icon-cancel.png" alt="Cancel" width="17" height="17" />
        </a>
    </div>
    <form id="new-node-form" class="" data-validate="parsley" novalidate>
        <div class="form-divider">
            <a id="new-node-type" href="#" class="dark-background">
                <div class="icon-sketch">sketch</div>
            </a>
            <a id="new-node-image" href="#" class="dark-background">
                <img class="icon-camera" src="<?php print $pathPrefix; ?>img/icon-camera.png" alt="Choose image" width="32" height="25" />
            </a>
        </div>
        
        <input id="new-node-form-title" name="node-title" type="text" placeholder="Name it" data-trigger="change focusout keyup" data-required="true" data-validation-minlength="0">
        <textarea id="new-node-form-desc" rows="5" name="node-desc" placeholder="Describe it" data-trigger="keyup" data-notblank="true" data-validation-minlength="1"></textarea>
        <input id="new-node-form-url" name="node-url" type="text" placeholder="http://"  data-trigger="keyup" data-type="url" data-validation-minlength="4">
        <input id="new-node-form-date" name="node-date" type="text" placeholder="
        <?php 
            date_default_timezone_set('America/Los_Angeles');
            $date = date('Y-m-d', time());
            print $date;
         ?>" data-type="dateIso" data-trigger="keyup" data-notblank="true">
        <input id="new-node-form-tags" name="node-tags" type="text" placeholder="Tag it, comma separated" data-trigger="keyup" data-notblank="true">
        <div id="new-node-form-buttons">
            <input id="new-node-delete" class="button red" type="button" value="delete">
            <input id="new-node-form-submit" class="button green disabled" type="submit" value="done">
            <input id="new-node-more" class="button purple more-link" onclick="newNodeFormExpand();" type="button" value="more">
        </div>
    </form>
</div>

<!-- Cards at zoom level 3 -->
<div id="node-popup" class="modal node-info hidden">
    <div class="node-info-image">
        <img class="" src="<?php print $pathPrefix; ?>img/node-thumb-popup.png" alt="" width="156" height="94" />
    </div>
    <div class="node-info-title">
        <img class="node-info-type" src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /> 
        A big idea that took some thought
    </div>
    <div class="node-info-desc ellipsis">
        <div>My big idea is to create a website to showcase funny cats. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus.</div>
    </div>
    <div class="node-info-buttons">
        <a class="node-info-edit button blue" href="#">edit</a>
        <a class="node-info-more button purple more-link" href="#">more</a>
    </div>
    <div class="modal-arrow"></div>
</div>

<!-- Example side panel when you have a node selected and then click "more" -->
<div class="panel hidden">
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

            </div> <!-- End bloomViz -->


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>