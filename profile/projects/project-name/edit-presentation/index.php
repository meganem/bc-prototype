<?php 
// EDIT PRESENTATION
$nestLevel = 4;
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

                    <div id="edit-presentation-header">
                        <div class="click-nav click-nav-3">
                            <ul class="no-js">
                                <li>
                                    <a href="#" class="clicker">
                                        <img src="<?php print $pathPrefix; ?>img/icon-edit-presentation.png" width="35" height="35" alt="" />
                                    </a>
                                    <ul id="edit-presentation-menu" class="menu dropdown">
                                        <li><a href="#"><img class="icon-history" src="<?php print $pathPrefix; ?>img/icon-history.png" alt="" width="20" height="20" /> Change order</a></li>
                                        <li><a href="#"><img class="icon-edit" src="<?php print $pathPrefix; ?>img/icon-edit.png" alt="" width="20" height="20" /> Edit styles</a></li>
                                    </ul>
                                </li>
                           </ul>
                        </div> <!-- End click-nav -->
                        <div id="edit-presentation-menu-title">Edit Presentation</div>
                        <div id="edit-presentation-done">
                            <a href="#" class="button blue">Done</a>
                        </div>
                    </div> <!-- End edit-presentation-header -->

                    
                </div> <!-- End container -->
            </div> <!-- End project-header -->
            
	        <div id="edit-presentation" class="light" style="height:500px; position:relative;">

                <p>Map will go here</p>
                <?php include $pathPrefix . "templates/edit-presentation-reorder-panel.php"; ?>

            </div> <!-- End map container -->


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>