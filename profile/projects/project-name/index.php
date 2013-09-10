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
                                    <li><a href="#">Edit description</a></li>
                                    <li><a href="#">Share</a></li>
                                    <li><a href="#">Archive</a></li>
                                    <li><a href="#">Change thumbnail</a></li>
                                    <li class="separator"></li>
                                    <li><a href="#">Edit presentation</a></li>
                                    <li><a href="#">Launch presentation</a></li>
                                    <li class="separator"></li>
                                    <li><a href="#">View history</a></li>
                                </ul>
                            </li>
                       </ul>
                    </div> <!-- End click-nav -->
                    
                    <h1 class="project-title">My Project</h1>
                    <div id="project-menu" class="">
                        <ul class="menu">
                            <li><a href="story">Story mode</a></li>
                            <li><a href="presentation">Presentation mode</a></li>
                            <li><a href="blog">Blog mode</a></li>
                            <li><a href="#">Group</a></li>
                            <li><a href="#">New</a></li>
                        </ul>
                    </div>
                </div> <!-- End container -->
            </div> <!-- End project-header -->
            
	        <div id="content" class="container">
                <div class="light">
                    
                    <svg id="timeline">
                    </svg>

                    <div class="new-node">
                        <div id="new-node-thumb">
                            <img src="" alt="node thumbnail" width="100" height="100" />
                        </div>
                        <form id="new-node-form">
                            <input name="node-title" type="text" placeholder="Name it" >
                            <input type="submit" value="Done">
                        </form>
                        <div id="new-node-cancel">
                            <a class="btn" href="#">Cancel</a>
                        </div>

                    </div>

                </div>
            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>