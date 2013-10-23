<?php 
// BLOG
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in";
$projectMenuActive = "blog";

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
                
                    <?php include $pathPrefix . "parts/project-actions-menu.php" ?>
                    
                    <h1 class="project-title">My Project</h1>
                    <?php include $pathPrefix . "parts/project-menu.php" ?>

                </div> <!-- End container -->
            </div> <!-- End project-header -->
			
			<div class="light constrained container">
				<p>Blog mode will go here.</p>
			</div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>