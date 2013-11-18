<?php 
// PROFILE
$nestLevel = 1;
$loggedIn = true;
$bodyclass = "logged-in profile";
$userMenuActive = "my-profile";
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
	        	<h1>My Profile</h1>

	        	<div class="row">
	                <div class="span3 float-left">
						<img class="profile-image" src="<?php print $pathPrefix; ?>img/laurie-square.jpg" width="300" alt="" />
					</div>
					<div class="span9">
						
						<h2 class="profile-name">Laurie Reid</h2>
						<p class="lead">An aspiring architect, studying at San Francisco State University. Passionate about design, psychology, and cookies.</p>
						<p>I thrive on creative, challenging work at the forefront of sustainability in architectural design. I believe that the world needs revolutionary, cost-effective, sustainable solutions for a future of over-population and poverty. In my work, I strive to showcase a thoughtful balance of new techniques, innovation, and cost-efficiency.</p>

						<div class="profile-links">
							<h3>Connect</h3>
							<a href="#">www.bloomcase.com/laurie-reid</a> 
							<a href="#">www.twitter.com/lauriereid</a> 
						</div>

						<p><a href="<?php print $pathPrefix; ?>profile/edit" class="button blue">Edit Profile</a> </p>
					</div>
				</div>

				<div class="row well">
					<h3>Featured Projects</h3>
					<div class="row compact divider">
                		<div class="float-left">
        					<img src="<?php print $pathPrefix; ?>img/project-3-red.jpg" width="100" alt="" />
        				</div>
        				<h3 class="project-title">Solar home <span class="featured">Featured</span></h3>
        				<p class="project-summary small">The final project for my Sustainable Architecture class where I was asked to design a custom, modular, solar home.</p>
        				<p><a href="#" class="tag">architecture</a> <a href="#" class="tag">CAD model</a> <a href="#" class="tag">home design</a> <a href="#" class="tag">sustainability</a></p>
        				<p class="date small">Last updated October 27, 2013 at 5:37pm</p>
        				<p><a href="<?php print $pathPrefix; ?>profile/projects/solar-home/presentation" class="button green">View Presentation</a> </p>
        			</div>
        			<div class="row compact divider">
                		<div class="float-left">
        					<img src="<?php print $pathPrefix; ?>img/project-1-apts.jpg" width="100" alt="" />
        				</div>
        				<h3 class="project-title">Archview Apartments <span class="featured">Featured</span></h3>
        				<p class="project-summary small">A study of energy-efficient modern living, Archview Apartments captures the essence of an affordable, hip lifestyle.</p>
        				<p><a href="#" class="tag">architecture</a> <a href="#" class="tag">CAD model</a> <a href="#" class="tag">sustainability</a></p>
        				<p class="date small">Last updated August 15, 2013 at 1:10pm</p>
        				<p><a href="#" class="button green">View Presentation</a> </p>
        			</div>
        			<p><a href="<?php print $pathPrefix; ?>profile/projects" class="">See all projects (3)</a></p>
				</div>

               

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>