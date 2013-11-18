<?php 
// MY PROJECTS
$nestLevel = 2;
$loggedIn = true;
$bodyclass = "logged-in projects";
$userMenuActive = "my-projects";
$userIconPath = "img/laurie-icon.jpg";

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
                    <div class="span8 well">
                    	<h2>My Projects</h2>
                    	<div id="projects-search">
                    		<form>
                    			<input class="search" type="text" placeholder="Search projects" />
                    			<input class="search-submit" type="submit" value="search" />
                    		</form>
                    	</div>

                    	<div class="row compact divider">
                    		<div class="float-left">
            					<img src="<?php print $pathPrefix; ?>img/project-3-red.jpg" width="100" alt="" />
            				</div>
            				<h3 class="project-title">Solar home <span class="featured">Featured</span></h3>
            				<p class="project-summary small">The final project for my Sustainable Architecture class where I was asked to design a custom, modular, solar home.</p>
            				<p><a href="#" class="tag">architecture</a> <a href="#" class="tag">CAD model</a> <a href="#" class="tag">home design</a> <a href="#" class="tag">sustainability</a></p>
            				<p class="date small">Last updated October 27, 2013 at 5:37pm</p>
            				<p><a href="<?php print $pathPrefix; ?>profile/projects/solar-home" class="button blue">Edit</a> <a href="<?php print $pathPrefix; ?>profile/projects/solar-home" class="button green">Open</a></p>
            			</div>
            			<div class="row compact divider">
                    		<div class="float-left">
            					<img src="<?php print $pathPrefix; ?>img/project-1-apts.jpg" width="100" alt="" />
            				</div>
            				<h3 class="project-title">Archview Apartments <span class="featured">Featured</span></h3>
            				<p class="project-summary small">A study of energy-efficient modern living, Archview Apartments captures the essence of an affordable, hip lifestyle.</p>
            				<p><a href="#" class="tag">architecture</a> <a href="#" class="tag">CAD model</a> <a href="#" class="tag">sustainability</a></p>
            				<p class="date small">Last updated August 15, 2013 at 1:10pm</p>
            				<p><a href="#" class="button blue">Edit</a> <a href="#" class="button green">Open</a></p>
            			</div>
            			<div class="row compact divider">
                    		<div class="float-left">
            					<img src="<?php print $pathPrefix; ?>img/project-2-wood.jpg" width="100" alt="" />
            				</div>
            				<h3 class="project-title">Sustainable Office</h3>
            				<p class="project-summary small">An energy-efficient, modern office design. Designed during my Sustainable Architecture class.</p>
            				<p><a href="#" class="tag">architecture</a> <a href="#" class="tag">wood</a> <a href="#" class="tag">sustainability</a></p>
            				<p class="date small">Last updated March 10, 2013 at 8:02pm</p>
            				<p><a href="#" class="button blue">Edit</a> <a href="#" class="button green">Open</a> </p>
            			</div>
            			
                    </div>

                     <div class="span4">
                     	<p class="lead"><a href="<?php print $pathPrefix; ?>profile/projects/new" class="button purple"><img class="icon-new" src="<?php print $pathPrefix; ?>img/icon-new-white.png" alt="" width="30" height="30" /> New Project</a></p>

                     	<p><strong>Tip:</strong> To feature a project, edit the project details. <a href="<?php print $pathPrefix; ?>tips" class="">See more tips</a></p>
                     	
                    </div>
                </div>
           

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>