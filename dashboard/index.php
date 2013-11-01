<?php 
// DASHBOARD
$nestLevel = 1;
$loggedIn = true;
$bodyclass = "logged-in dashboard";

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

	        <div class="container light">
                    <h1>My Dashboard</h1>
                    <div class="row">
	                    <div class="span8">

	                    	<div id="dashboard-profile">
	                    		<h2>My Profile</h2>
	                    		<div class="row compact">
                    				<div class="float-left">
                    					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
                    				</div>
                    				<h3>Laurie Reid</h3>
                    				<p class="small">An aspiring architect, studying at San Francisco State University. Passionate about design, psychology, and cookies.</p>
                    				<p><a href="#" class="button blue">Edit Profile</a> <a href="#" class="button purple">My Account</a></p>
	                    		</div>
	                    	</div>
	                    	<div id="dashboard-projects">
	                    		<h2>My Projects</h2>
	                    		<div class="row compact divider">
		                    		<div class="float-left">
	                					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
	                				</div>
	                				<h3 class="project-title">Solar home</h3>
	                				<p class="project-summary small">The final project for my Sustainable Architecture class where I was asked to design a custom, modular, solar home.</p>
	                				<p class="project-updated-date small">Last updated October 27, 2013 at 5:37pm</p>
	                				<p><a href="#" class="button blue">Edit</a> <a href="#" class="button green">View</a> </p>
	                			</div>
	                			<div class="row compact divider">
		                    		<div class="float-left">
	                					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
	                				</div>
	                				<h3 class="project-title">Archview Apartments</h3>
	                				<p class="project-summary small">A study of energy-efficient modern living, Archview Apartments captures the essence of an affordable, hip lifestyle.</p>
	                				<p class="project-updated-date small">Last updated August 15, 2013 at 1:10pm</p>
	                				<p><a href="#" class="button blue">Edit</a> <a href="#" class="button green">View</a> </p>
	                			</div>
	                			<p><a href="#" class="">See all projects</a></p>
	                    	</div>

	                    </div>
	                    <div class="span4">
	                    	<div class="alert-info">
	                    		<p>Note from the system about something!</p>
	                    	</div>
	                    	<div id="dashboard-tips">
	                    		<h2>Tips</h2>
	                    		<div class="row">
	                    			<p>Did you know? blah blah blah</p>
	                    		</div>
	                    		<div class="row">
	                    			<p>Did you know? blah blah blah</p>
	                    		</div>
	                    		<div class="row">
	                    			<p>Did you know? blah blah blah</p>
	                    		</div>
	                    		<p><a href="#" class="">See more tips</a></p>
	                    	</div>
	                    </div>
	                </div>
                    
                    
            </div>



<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>