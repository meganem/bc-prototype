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
		
                <svg id="background" style="position:absolute;top:0;width:100%;height:500px;">
                </svg>
	        <div class="light" id="betweenLayer" style="position:relative;top:0;">
		</div>

                <svg id="map" style="position:relative;top:0;">
        			<script type="text/javascript">
        				drawBloomcase();
        			</script>
                </svg>

                <!-- Modal popup for new node form -->
                <div id="new-node" class="modal is-short">
                    <div id="new-node-cancel">
                        <a class="" href="#">
                            <img class="icon-cancel" src="<?php print $pathPrefix; ?>img/icon-cancel.png" alt="Cancel" width="17" height="17" />
                        </a>
                    </div>
                    <form id="new-node-form" class="">
                        <div class="form-divider">
                            <a id="new-node-type" href="#" class="dark-background">
                                <div class="icon-sketch">sketch</div>
                            </a>
                            <a id="new-node-image" href="#" class="dark-background">
                                <img class="icon-camera" src="<?php print $pathPrefix; ?>img/icon-camera.png" alt="Choose image" width="32" height="25" />
                            </a>
                        </div>
                        
                        <input id="new-node-form-title" name="node-title" type="text" placeholder="Name it" >
                        <textarea id="new-node-form-desc" rows="5" name="node-desc" placeholder="Describe it"></textarea>
                        <input id="new-node-form-url" name="node-url" type="text" placeholder="http://" >
                        <input id="new-node-form-date" name="node-date" type="text" placeholder="
                        <?php 
                            date_default_timezone_set('America/Los_Angeles');
                            $date = date('m/d/Y', time());
                            print $date;
                         ?>" >
                        <input id="new-node-form-tags" name="node-tags" type="text" placeholder="Tag it, comma separated" >
                        <div id="new-node-form-buttons">
                            <input id="new-node-delete" class="button red" type="button" value="delete">
                            <input id="new-node-form-submit" class="button green" type="submit" value="done">
                            <input id="new-node-more" class="button purple more-link" type="button" value="more">
                        </div>
                    </form>
                </div>

                <!-- Example div for zoom level 3: cards are the same as the node-info popup -->
                <div class="modal node-info hidden">
                    <div id="node-info-image">
                        <img class="" src="<?php print $pathPrefix; ?>img/node-thumb-popup.png" alt="" width="156" height="94" />
                    </div>
                    <div id="node-info-title"><img class="node-info-type" src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /> A big idea that took some thought</div>
                    <div id="node-info-desc" class="ellipsis">
                        <div>My big idea is to create a website to showcase funny cats. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus.</div>
                    </div>
                    <div id="node-info-buttons">
                        <a id="node-info-edit" class="button blue" href="#">edit</a>
                        <a id="node-info-more" class="button purple more-link" href="#">more</a>
                    </div>
                </div>


            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>