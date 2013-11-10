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

	        <div class="container constrained light">
                    <h1>My Dashboard</h1>
                	<!-- <div class="row well alert alert-info">
                		<p><strong>Hi Laurie!</strong> We just added the ability for you to view your project's history – <a href="#">click here to check it out</a>.</p>
                	</div> -->
                    <div class="row">
	                    <div class="span8 well">
                    	
                    		<h2>Active Projects</h2>
                    		<div class="row compact divider">
	                    		<div class="float-left">
                					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
                				</div>
                				<h3 class="project-title">Solar home <span class="featured">Featured</span></h3>
                				<p class="project-summary small">The final project for my Sustainable Architecture class where I was asked to design a custom, modular, solar home.</p>
                				<p><a href="#" class="tag">architecture</a> <a href="#" class="tag">modeling</a> <a href="#" class="tag">CAD</a> <a href="#" class="tag">sustainability</a></p>
                				<p class="date small">Last updated October 27, 2013 at 5:37pm</p>
                				<p><a href="#" class="button blue">Edit</a> <a href="#" class="button green">Open</a> </p>
                			</div>
                			<div class="row compact divider">
	                    		<div class="float-left">
                					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" />
                				</div>
                				<h3 class="project-title">Archview Apartments <span class="featured">Featured</span></h3>
                				<p class="project-summary small">A study of energy-efficient modern living, Archview Apartments captures the essence of an affordable, hip lifestyle.</p>
                				<p><a href="#" class="tag">architecture</a> <a href="#" class="tag">modeling</a> <a href="#" class="tag">sustainability</a></p>
                				<p class="date small">Last updated August 15, 2013 at 1:10pm</p>
                				<p><a href="#" class="button blue">Edit</a> <a href="#" class="button green">Open</a> </p>
                			</div>
                			<p><a href="<?php print $pathPrefix; ?>profile/projects" class="">See all projects (10)</a> | <a href="<?php print $pathPrefix; ?>profile/projects/new" class="">New project</a></p>
                    	

	                    </div>
	                    <div class="span4">
	                    	
	                    	<div class="row well">
	                    		<h2>My Profile</h2>
	                    		<div class="row divider">
	                				<div class="">
	                					<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="336" height="165" alt="" />
	                				</div>
	                				<h3>Laurie Reid</h3>
	                				<p class="small">An aspiring architect, studying at San Francisco State University. Passionate about design, psychology, and cookies.</p>
	                				<p><a href="<?php print $pathPrefix; ?>profile/edit" class="button blue">Edit</a> <a href="<?php print $pathPrefix; ?>profile" class="button green">View</a> <a href="<?php print $pathPrefix; ?>account" class="button purple">My Account</a></p>
	                    		</div>
	                    		<h2>Public Lnks</h2>
	                    		<p class="small"><strong>My profile:</strong><br>
		                    		<input type="text" onclick="this.select();" name="copylink" value="http://bloomcase.com/laurie-reid">
		                    	</p>
		                    	<p class="small"><strong>My projects:</strong><br>
		                    		<input type="text" onclick="this.select();" name="copylink" value="http://bloomcase.com/laurie-reid/projects">
		                    	</p>
			                    
	                    	</div>

	                    	
	                    	<!-- <div class="row well">
	                    		<h2>My Activity</h2>
	                    		<p class="notification-message"><span class="date">August 15, 2013 at 1:10pm</span> <br>
	                    			Idea "A big idea" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
	                    			<p class="notification-message"><span class="date">August 15, 2013 at 12:54pm</span> <br>
	                    			Sketch "First sketches" added to <a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a></p>
	                    			<p class="notification-message"><span class="date">August 15, 2013 at 12:42pm</span> <br>
	                    			<a href="<?php print $pathPrefix; ?>profile/projects/project-name">My Project</a> created</p>
	                    		<p><a href="<?php print $pathPrefix; ?>history" class="">See full history</a></p>
	                    	</div> -->
	                    	
	                    </div>
	                </div><!-- end row -->

	                <div id="dashboard-tips" class="row">
                		<p><strong>Tip:</strong> In the project menu, you can edit your project details, edit your presentation, and view your history. <a href="<?php print $pathPrefix; ?>tips" class="">See more tips</a></p>
                		
	                </div>
                    
                    
            </div>



<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>