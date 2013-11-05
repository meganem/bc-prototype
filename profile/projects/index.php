<?php 
// MY PROJECTS
$nestLevel = 2;
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

	        <div class="container constrained light">

                <h1>My Projects</h1>
                 <div class="row">
                    <div class="span8">
                    	<div class="row compact divider">
                    		<div class="float-left">
            					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
            				</div>
            				<h3 class="project-title">Solar home</h3>
            				<p class="project-summary small">The final project for my Sustainable Architecture class where I was asked to design a custom, modular, solar home.</p>
            				<p class="date small">Last updated October 27, 2013 at 5:37pm</p>
            				<p><a href="#" class="button blue">Edit Project Details</a> <a href="#" class="button green">Open Project</a> <a href="#" class="featured">Featured</a></p>
            			</div>
            			<div class="row compact divider">
                    		<div class="float-left">
            					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
            				</div>
            				<h3 class="project-title">Archview Apartments</h3>
            				<p class="project-summary small">A study of energy-efficient modern living, Archview Apartments captures the essence of an affordable, hip lifestyle.</p>
            				<p class="date small">Last updated August 15, 2013 at 1:10pm</p>
            				<p><a href="#" class="button blue">Edit Project Details</a> <a href="#" class="button green">Open Project</a> <a href="#" class="featured">Featured</a> </p>
            			</div>
            			<div class="row compact divider">
                    		<div class="float-left">
            					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
            				</div>
            				<h3 class="project-title">Solar home</h3>
            				<p class="project-summary small">The final project for my Sustainable Architecture class where I was asked to design a custom, modular, solar home.</p>
            				<p class="date small">Last updated October 27, 2013 at 5:37pm</p>
            				<p><a href="#" class="button blue">Edit Project Details</a> <a href="#" class="button green">Open Project</a> </p>
            			</div>
            			<div class="row compact divider">
                    		<div class="float-left">
            					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
            				</div>
            				<h3 class="project-title">Archview Apartments</h3>
            				<p class="project-summary small">A study of energy-efficient modern living, Archview Apartments captures the essence of an affordable, hip lifestyle.</p>
            				<p class="date small">Last updated August 15, 2013 at 1:10pm</p>
            				<p><a href="#" class="button blue">Edit Project Details</a> <a href="#" class="button green">Open Project</a> </p>
            			</div>
                    </div>

                     <div class="span4 well">
                     	do we need this sidebar? Use it for new project button? or for previewing project info...
                    </div>
                </div>
           

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>