<?php 
// PROFILE
$nestLevel = 1;
$loggedIn = true;
$bodyclass = "logged-in profile";

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
						<img class="profile-image" src="<?php print $pathPrefix; ?>img/placeholder.png" width="300" alt="" />
					</div>
					<div class="span9">
						
						<h2 class="profile-name">Laurie Reid</h2>
						<p class="lead">An aspiring architect, studying at San Francisco State University. Passionate about design, psychology, and cookies.</p>
						<p>More about Laurie... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula semper ante. Sed nec volutpat massa. Nam et tortor scelerisque, sagittis ipsum eget, porttitor sem. Duis aliquet ante in leo adipiscing, eu mattis ante luctus. Nunc at porta dui, vel dictum tellus. </p>

						<div class="profile-links">
							<h3>Connect</h3>
							<a href="#">www.bloomcase.com/lauriereid</a> 
							<a href="#">www.twitter.com/lauriereid</a> 
						</div>

						<p><a href="<?php print $pathPrefix; ?>profile/edit" class="button blue">Edit Profile</a> </p>
					</div>
				</div>

				<div class="row well">
					<h3>Featured Projects</h3>
					<div class="row compact divider">
                		<div class="float-left">
        					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
        				</div>
        				<h3 class="project-title">Solar home</h3>
        				<p class="project-summary small">The final project for my Sustainable Architecture class where I was asked to design a custom, modular, solar home.</p>
        				<p class="date small">Last updated October 27, 2013 at 5:37pm</p>
        				<p><a href="#" class="button green">View Presentation</a> </p>
        			</div>
        			<div class="row compact divider">
                		<div class="float-left">
        					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
        				</div>
        				<h3 class="project-title">Archview Apartments</h3>
        				<p class="project-summary small">A study of energy-efficient modern living, Archview Apartments captures the essence of an affordable, hip lifestyle.</p>
        				<p class="date small">Last updated August 15, 2013 at 1:10pm</p>
        				<p><a href="#" class="button green">View Presentation</a> </p>
        			</div>
        			<p><a href="<?php print $pathPrefix; ?>profile/projects" class="">See all projects</a></p>
				</div>

               

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>