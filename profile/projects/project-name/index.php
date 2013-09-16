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
                            <li><a href="#"><img class="icon-story-mode" src="<?php print $pathPrefix; ?>img/icon-story-mode.png" alt="" width="30" height="30" /> Story mode</a></li>
                            <li><a href="#"><img class="icon-presentation" src="<?php print $pathPrefix; ?>img/icon-presentation.png" alt="" width="30" height="30" /> Presentation mode</a></li>
                            <li><a href="#"><img class="icon-blog-mode" src="<?php print $pathPrefix; ?>img/icon-blog-mode.png" alt="" width="30" height="30" /> Blog mode</a></li>
                            <li><a href="#"><img class="icon-group" src="<?php print $pathPrefix; ?>img/icon-group.png" alt="" width="30" height="30" /> Group</a></li>
                            <li><a href="#"><img class="icon-new" src="<?php print $pathPrefix; ?>img/icon-new.png" alt="" width="30" height="30" /> New</a></li>
                        </ul>
                    </div>
                </div> <!-- End container -->
            </div> <!-- End project-header -->
            
	        <div id="content" class="container">
                <div class="light">
                    
                    <svg id="timeline">
                    </svg>

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
                            <input id="new-node-form-date" name="node-date" type="text" placeholder="09/15/2013" >
                            <input id="new-node-form-tags" name="node-tags" type="text" placeholder="Tag it" >
                            <div id="new-node-form-buttons">
                                <input id="new-node-delete" class="button red" type="button" value="delete">
                                <input id="new-node-form-submit" class="button green" type="submit" value="done">
                                <input id="new-node-more" class="button purple" type="button" value="more">
                            </div>
                        </form>
                        

                    </div>

                </div>
            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>