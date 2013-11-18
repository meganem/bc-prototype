<?php 
// PROJECT NAME
$nestLevel = 3;
$loggedIn = true;
$bodyclass = "logged-in project-page";
$projectMenuActive = "story";
$projectIconPath = "img/example/icon-new-tattoo.png";
$userIconPath = "img/user-icon-megan.png";
$projectURL = "project-name";


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
                
		<div id="edit-presentation-header" style="display:none;">
                        <div class="click-nav click-nav-3">
                            <ul class="no-js">
                                <li>
                                    <a href="#" class="clicker">
                                        <img src="<?php print $pathPrefix; ?>img/icon-edit-presentation.png" width="35" height="35" alt="" />
                                    </a>
                                    <ul id="edit-presentation-menu" class="menu dropdown">
                                        <li><a href="#" onclick="showReorderingPanel()" ><img class="icon-history" src="<?php print $pathPrefix; ?>img/icon-history.png" alt="" width="20" height="20" /> Change order</a></li>
                                        <li><a href="#"><img class="icon-edit" src="<?php print $pathPrefix; ?>img/icon-edit.png" alt="" width="20" height="20" /> Edit styles</a></li>
                                    </ul>
                                </li>
                           </ul>
                        </div> <!-- End click-nav -->
                        <div id="edit-presentation-menu-title">Edit Presentation</div>
                        <div id="edit-presentation-done">
                            <a href="#" onclick="exitPresentationMode()" class="button blue">Done</a>
                        </div>
                    </div>

                    <?php include $pathPrefix . "parts/project-actions-menu.php" ?>
                    
                    <h1 class="project-title">My new tattoo</h1>

                    <?php include $pathPrefix . "parts/project-menu.php" ?>

                </div> <!-- End container -->
            </div> <!-- End project-header -->
            
	        <div class="light" id="bloomViz">

		<?php include $pathPrefix . "templates/edit-presentation-reorder-panel.php"; ?>

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
    <div id="new-node-cancel" class="close-button">
        <a class="" href="#" onclick="closeThis('new-node');">
            <img class="icon-cancel" src="<?php print $pathPrefix; ?>img/icon-cancel.png" alt="Cancel" width="17" height="17" />
        </a>
    </div>

    <form id="new-node-form" class="" data-validate="parsley" novalidate>
        <div class="form-divider">
            <a id="new-node-type" href="#" class="dark-background" style="cursor:pointer;")>
                <div class="icon-sketch">sketch</div>
            </a>
	<a id="new-node-image" onclick="selectImage()" class="dark-background" style="cursor:pointer;">
		<img id="new-node-image-preview" class="icon-camera" src="<?php print $pathPrefix; ?>img/icon-camera.png" alt="Choose image" />
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
            <input id="new-node-form-submit" class="button green" type="button" onclick="validateParsley();" value="done">
            <input id="new-node-more" class="button purple more-link" onclick="newNodeFormExpand();" type="button" value="more">
        </div>
    </form>
    <INPUT type="file"  onchange="uploadImage();" name="submitfile" id = "submitfile" style="display:none;" />
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
<div class="panel hidden" id="morePanel">
    <div id="morePanel-close" class="close-button">
        <a class="" href="#" onclick="closeThis('morePanel');">
            <img class="icon-cancel" src="<?php print $pathPrefix; ?>img/icon-cancel.png" alt="Cancel" width="17" height="17" />
        </a>
    </div>
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

<div id="project-tour-1" class="modal modal-center project-tour align-center hidden">
	<p>Your project has been created!</p>
	<a onclick="tutorial(2)" class="button green more-link">Take a tour</a>
</div>

<div id="project-tour-2" class="modal project-tour align-center hidden">
	<div class="modal-arrow"></div>
	<p>In the project menu, you can edit your project details, edit your presentation, and view your history.</p>
	<ul class="project-tour-status">
		<li><a href="#" class="active"></a></li>
		<li><a href="#"></a></li>
		<li><a href="#"></a></li>
	</ul>
	<a onclick="tutorial(3)" class="button more-link">Next</a>
</div>

<div id="project-tour-3" class="modal project-tour align-center hidden">
	<div class="modal-arrow"></div>
	<p>Toggle viewing your project between story, presentation, and blog modes.</p>
	<ul class="project-tour-status">
		<li><a href="#"></a></li>
		<li><a href="#" class="active"></a></li>
		<li><a href="#"></a></li>
	</ul>
	<a onclick="tutorial(4)" class="button more-link">Next</a>
</div>

<div id="project-tour-4" class="modal modal-center project-tour align-center hidden">
	<p>To get started, add your first artifact to your project!</p>
	<ul class="project-tour-status">
		<li><a href="#"></a></li>
		<li><a href="#"></a></li>
		<li><a href="#" class="active"></a></li>
	</ul>
	<a onclick="tutorial(5)" class="button blue">Let's do it!</a>
	<div class="modal-arrow"></div>
</div>

<div id="project-tour-5" class="modal modal-center project-tour align-center hidden">
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

<div id="project-tour-6" class="modal modal-center project-tour align-center hidden">
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

<!-- share modal -->
<div id="share-project" class="modal align-center hidden">
    <div class="close">
        <a class="" href="#" onclick="closeThis('share-project');">
            <img class="icon-close" src="<?php print $pathPrefix; ?>img/icon-close-black.png" alt="close" width="11" height="11" />
        </a>
    </div>
    <p>Share this project publicly using the following link:</p>
    <p class="small"><strong>Story mode:</strong><br>
        <input type="text" onclick="this.select();" name="copylink" value="http://bloomcase.com/laurie-reid/projects/project-name">
    </p>
    <p class="small"><strong>Presentation mode:</strong><br>
        <input type="text" onclick="this.select();" name="copylink" value="http://bloomcase.com/laurie-reid/projects/project-name/presentation">
    </p>
    <p class="small"><strong>Blog mode:</strong><br>
        <input type="text" onclick="this.select();" name="copylink" value="http://bloomcase.com/laurie-reid/projects/project-name/blog">
    </p>

    <p>Or share the link to this project through social media:</p>
    
    <span class='st_twitter_large' displayText='Tweet'></span>
    <span class='st_facebook_large' displayText='Facebook'></span>
    <span class='st_pinterest_large' displayText='Pinterest'></span>
    <span class='st_tumblr_large' displayText='Tumblr'></span>
    <span class='st_linkedin_large' displayText='LinkedIn'></span>
    <span class='st_email_large' displayText='Email'></span>
</div>
            </div> <!-- End bloomViz -->


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>