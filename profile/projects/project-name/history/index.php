<?php 
// HISTORY
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in project-page";

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

				<div class="container constrained light">
                  	<h1>Project History</h1>	
                  	<p class=""><span class="date">August 15, 2013 at 2:23pm</span> <br>
        			Sketch "Adding second flower" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
                  	<p class=""><span class="date">August 15, 2013 at 2:15pm</span> <br>
        			Inspiration "Dahlia picture" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>	
					<p class=""><span class="date">August 15, 2013 at 1:25pm</span> <br>
        			Sketch "Trying color" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
					<p class=""><span class="date">August 15, 2013 at 1:17pm</span> <br>
        			Draft "First draft outline" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
		            <p class=""><span class="date">August 15, 2013 at 1:14pm</span> <br>
        			Inspiration "My wedding flowers" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
        			<p class=""><span class="date">August 15, 2013 at 1:12pm</span> <br>
        			Sketch "More sketches" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
		            <p class=""><span class="date">August 15, 2013 at 1:10pm</span> <br>
        			Idea "A big idea" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
        			<p class=""><span class="date">August 15, 2013 at 12:54pm</span> <br>
        			Sketch "First sketches" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
        			<p class=""><span class="date">August 15, 2013 at 12:42pm</span> <br>
        			<a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a> created</p>

				</div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>