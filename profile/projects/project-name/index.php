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
$footer2Include = $pathPrefix . "parts/footer-presentation.php";

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
                <div class="light" id="slideLayer" style="z-index:1; position:relative;">
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
            <input id="new-node-delete" class="button red" type="button" value="delete" onclick="deleteNode();">
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

<!--- Edit Presentation Node Sitde Panel -->
<div class="panel hidden" id="editPresentationPanel">
    <div id="edit-presentation-node">
        <img class="" src="<?php print $pathPrefix; ?>img/node-big.png" alt="" width="347" height="200" />
    </div>
    <div class="node-info-title"><img class="node-info-type" src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /> A big idea that took some thought</div>
    <div class="node-info-desc ellipsis">
        <div>My big idea is to create a website to showcase funny cats. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus.</div>
    </div>
    <div id="node-info-buttons">
        <a id="node-info-edit" class="button blue" href="#">edit</a>
    </div>

    <div class="divider"></div>

    <form id="edit-presentation-node-form">
        <div class="form-row">
            <input id="edit-presentation-node-form-included" type="checkbox" name="included" value="included" checked> Include in presentation
        </div>
        <div class="form-row hidden">
            <input id="edit-presentation-node-form-order" name="order" type="number" maxlength="5" placeholder="7"> Order in presentation
        </div>
        <div class="form-row">
            Choose template (click thumbnail to preview):
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Full image
                <input type="radio" id="full-image-radio" name="template" value="full-image"> 
            </div>
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Half image
                <input type="radio" id="half-image-radio" name="template" value="half-image"> 
            </div>
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Half map
                <input type="radio" id="half-map-radio" name="template" value="half-map" checked> 
            </div>
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Full map
                <input type="radio" id="full-map-radio" name="template" value="full-map"> 
            </div>
        </div>
        <div id="edit-presentation-node-form-buttons">
            <input type="button" class="button gray" value="cancel">
            <input type="submit" class="button green" value="save">
        </div>
    </form>
    


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

<!-- Creative Process Modal -->
<div id="creativeProcessModal" style="position:absolute;top:20px;left:20px;">
<svg id="creativeSVG" style="background: white; border: 1px black solid;" height="200" width="300">
	<g id="creativeG">
  <g
     id="arrow_final"
     transform="matrix(-0.2947811,-0.11994303,0.11994303,-0.2947811,224.619,202.85743)"
     inkscape:label="#g3158">
    <path
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="M 34.981918,139.38731 242.99024,54.490153"
       id="path3160"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="cc" />
    <path
       sodipodi:nodetypes="ccccc"
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="m 35.262071,132.7175 0.551692,6.19853 3.626631,4.07044 -14.355555,-0.11511 z"
       id="path3162"
       inkscape:connector-curvature="0" />
  </g>
  <rect
     style="fill:#ffffff;stroke:#000000;stroke-width:0.31824869"
     id="rect3164"
     width="193.32932"
     height="201.40575"
     x="0.16876853"
     y="0.19921842" />
  <rect
     style="fill:#ffffff;stroke:none"
     id="rect3166"
     width="193.75433"
     height="61.077934"
     x="0.22008364"
     y="85.438911" />
  <g
     transform="matrix(-0.2947811,-0.11994303,0.11994303,-0.2947811,123.66374,150.36069)"
     id="arrow_draft_idea"
     inkscape:label="#g3108">
    <path
       sodipodi:nodetypes="cc"
       inkscape:connector-curvature="0"
       id="path3110"
       d="M 34.981918,139.38731 251.36357,51.08314"
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" />
    <path
       inkscape:connector-curvature="0"
       id="path3112"
       d="m 35.262071,132.7175 0.551692,6.19853 3.626631,4.07044 -14.355555,-0.11511 z"
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       sodipodi:nodetypes="ccccc" />
  </g>
  <g
     id="arrow_draft_sketch"
     transform="matrix(0.01112187,-0.3180543,0.3180543,0.01112187,51.234856,148.418)"
     inkscape:label="#g3128">
    <path
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="M 34.981918,139.38731 C 92.88664,116.5259 123.89462,61.537029 136.37694,8.5713239"
       id="path3130"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="cc" />
    <path
       sodipodi:nodetypes="ccccc"
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="m 35.262071,132.7175 0.551692,6.19853 3.626631,4.07044 -14.355555,-0.11511 z"
       id="path3132"
       inkscape:connector-curvature="0" />
  </g>
  <g
     transform="matrix(-0.31824869,0,0,-0.31824869,97.116812,105.04932)"
     id="arrow_draft_inspiration"
     inkscape:label="#g3096">
    <path
       sodipodi:nodetypes="cc"
       inkscape:connector-curvature="0"
       id="path3098"
       d="M 33.129734,137.89787 C 86.224733,125.65801 136.63787,57.963224 141.48576,9.1212351"
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" />
    <path
       inkscape:connector-curvature="0"
       id="path3100"
       d="m 36.474565,131.72569 -0.461703,4.61703 2.77022,5.54044 -13.851101,0 z"
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" />
  </g>
  <path
     id="shape_draft"
     d="m 55.078061,109.02257 h -5.826686 c -0.499792,0 -0.906903,-0.40662 -0.906903,-0.9069 v -5.82668 c 0,-0.49979 0.407111,-0.9069 0.906903,-0.9069 h 5.826686 c 0.500274,0 0.906903,0.40711 0.906903,0.9069 v 5.82668 c 0,0.50028 -0.407111,0.9069 -0.906903,0.9069 z"
     style="fill:#206c88;fill-opacity:1;stroke:none"
     inkscape:connector-curvature="0"
     inkscape:label="#sketch_1_" />
  <g
     transform="matrix(-0.3180543,-0.01112187,0.01112187,-0.3180543,141.76993,155.7903)"
     id="arrow_sketch_idea"
     inkscape:label="#g3122">
    <path
       sodipodi:nodetypes="cc"
       inkscape:connector-curvature="0"
       id="path3124"
       d="M 34.981918,139.38731 C 92.88664,116.5259 122.23625,74.739206 134.71857,21.773501"
       style="fill:none;stroke:#000000;stroke-width:1.59899998;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6.39599996, 6.39599996;stroke-dashoffset:0" />
    <path
       inkscape:connector-curvature="0"
       id="path3126"
       d="m 35.262071,132.7175 0.551692,6.19853 3.626631,4.07044 -14.355555,-0.11511 z"
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       sodipodi:nodetypes="ccccc" />
  </g>
  <g
     id="arrow_sketch_draft"
     transform="matrix(0,0.31824869,-0.31824869,0,96.744088,106.7446)"
     inkscape:label="#g3090">
    <path
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="M 33.129734,137.89787 C 86.224733,125.65801 133.34402,54.802715 138.19191,5.9607255"
       id="path3092"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="cc" />
    <path
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="m 36.474565,131.72569 -0.461703,4.61703 2.77022,5.54044 -13.851101,-1.60852 z"
       id="path3094"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="ccccc" />
  </g>
  <g
     id="arrow_idea_sketch"
     inkscape:label="#g3062"
     transform="matrix(0.31824869,0,0,0.31824869,97.37624,105.19779)">
    <path
       sodipodi:nodetypes="cc"
       inkscape:connector-curvature="0"
       id="path2987"
       d="M 33.129734,137.89787 C 86.224733,125.65801 138.49213,60.532379 138.49213,9.151022"
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" />
    <path
       inkscape:connector-curvature="0"
       id="path3060"
       d="m 36.474565,131.72569 -0.461703,4.61703 2.77022,5.54044 -13.851101,0 z"
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" />
  </g>
  <path
     id="shape_idea"
     d="m 141.47313,98.772372 c -0.77782,2.334458 -3.11228,5.446748 -5.44674,6.225548 2.33446,0.77734 4.66892,3.8906 5.44674,6.22506 0.77832,-2.33494 3.11277,-5.44723 5.44724,-6.22506 -2.33447,-0.77929 -4.66844,-3.89158 -5.44724,-6.225548 z"
     style="fill:#b08e16;fill-opacity:1;stroke:none"
     inkscape:connector-curvature="0"
     inkscape:label="#idea_1_" />
  <g
     id="arrow_inspiration_idea"
     transform="matrix(0,-0.31824869,0.31824869,0,96.95808,103.59234)"
     inkscape:label="#g3102">
    <path
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="M 33.129734,137.89787 C 86.224733,125.65801 134.22509,62.2629 139.07298,13.420911"
       id="path3104"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="cc" />
    <path
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="m 36.474565,131.72569 -0.461703,4.61703 2.77022,5.54044 -13.046841,-3.21704 z"
       id="path3106"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="ccccc" />
  </g>
  <path
     inkscape:connector-curvature="0"
     style="fill:#87508c;fill-opacity:1;stroke:none"
     d="m 97.398274,63.442052 c -0.146714,-0.0043 -4.147895,-0.18689 -4.147895,-4.108904 0,-4.045399 3.996773,-4.148799 4.147895,-4.148799 l 0.146714,0 c 0,0 3.963582,0.130817 3.963582,4.148799 l 0,0 c 0,3.960957 -4.110296,4.108904 -4.110296,4.108904 z"
     id="shape_inspiration"
     sodipodi:nodetypes="cccsccc"
     inkscape:label="#path2992" />
  <g
     id="arrow_idea_inspiration"
     transform="matrix(-0.01112187,0.3180543,-0.3180543,-0.01112187,146.37701,60.086793)"
     inkscape:label="#g3116">
    <path
       style="fill:none;stroke:#000000;stroke-width:1.59936059px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="M 34.981918,139.38731 C 92.88664,116.5259 122.23625,74.739206 134.71857,21.773501"
       id="path3118"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="cc" />
    <path
       sodipodi:nodetypes="ccccc"
       style="fill:#000000;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
       d="m 35.262071,132.7175 0.551692,6.19853 3.626631,4.07044 -14.355555,-0.11511 z"
       id="path3120"
       inkscape:connector-curvature="0" />
  </g>
  <path
     id="shape_final"
     d="m 259.00346,162.45306 h -8.16285 c -0.67126,0 -1.21736,-0.54548 -1.21736,-1.21736 v -8.16222 c 0,-0.67126 0.54673,-1.21736 1.21736,-1.21736 h 8.16285 c 0.67187,0 1.21735,0.5461 1.21735,1.21736 v 8.16284 c 0,0.67188 -0.54548,1.21674 -1.21735,1.21674 z"
     style="fill:#1a1a1a;stroke:#1a1a1a;stroke-width:0.6226899"
     inkscape:connector-curvature="0"
     inkscape:label="#draft_1_" />
  <path
     inkscape:connector-curvature="0"
     style="fill:#4b7216;fill-opacity:1;stroke:none"
     d="m 101.03935,154.09895 h -5.826684 c -0.499792,0 -0.906903,-0.40662 -0.906903,-0.9069 v -5.82669 c 0,-0.49979 0.407111,-0.9069 0.906903,-0.9069 h 5.826684 c 0.50028,0 0.9069,0.40711 0.9069,0.9069 v 5.82669 c 0,0.50028 -0.40711,0.9069 -0.9069,0.9069 z"
     id="shape_sketch"
     inkscape:label="#path3058" />
  <text
     xml:space="preserve"
     style="font-size:12.72994804px;font-style:normal;font-weight:normal;line-height:125%;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;font-family:Sans"
     x="1.7961721"
     y="109.23588"
     id="text3134"
     sodipodi:linespacing="125%"><tspan
       sodipodi:role="line"
       id="tspan3136"
       x="1.7961721"
       y="109.23588"
       style="font-size:10.18395805px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:Arial;-inkscape-font-specification:Arial">testing</tspan></text>
  <text
     sodipodi:linespacing="125%"
     id="text3138"
     y="172.13306"
     x="81.034798"
     style="font-size:12.72994804px;font-style:normal;font-weight:normal;line-height:125%;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;font-family:Sans"
     xml:space="preserve"><tspan
       style="font-size:10.18395805px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:Arial;-inkscape-font-specification:Arial"
       y="172.13306"
       x="81.034798"
       id="tspan3140"
       sodipodi:role="line">making</tspan></text>
  <text
     xml:space="preserve"
     style="font-size:12.72994804px;font-style:normal;font-weight:normal;line-height:125%;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;font-family:Sans"
     x="155.99025"
     y="108.95631"
     id="text3142"
     sodipodi:linespacing="125%"><tspan
       sodipodi:role="line"
       id="tspan3144"
       x="155.99025"
       y="108.95631"
       style="font-size:10.18395805px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:Arial;-inkscape-font-specification:Arial">thinking</tspan></text>
  <text
     sodipodi:linespacing="125%"
     id="text3150"
     y="46.493431"
     x="76.037766"
     style="font-size:12.72994804px;font-style:normal;font-weight:normal;line-height:125%;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;font-family:Sans"
     xml:space="preserve"><tspan
       style="font-size:10.18395805px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:Arial;-inkscape-font-specification:Arial"
       y="46.493431"
       x="76.037766"
       id="tspan3152"
       sodipodi:role="line">gathering</tspan></text>
  <text
     sodipodi:linespacing="125%"
     id="text3154"
     y="173.13254"
     x="234.80045"
     style="font-size:12.72994804px;font-style:normal;font-weight:normal;line-height:125%;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;font-family:Sans"
     xml:space="preserve"><tspan
       style="font-size:10.18395805px;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-family:Arial;-inkscape-font-specification:Arial"
       y="173.13254"
       x="234.80045"
       id="tspan3156"
       sodipodi:role="line">presenting</tspan></text>
	</g>
</svg>
</div>

            </div> <!-- End bloomViz -->


<?php 
//INCLUDE FOOTER
include $footerInclude;
include $footer2Include;
?>