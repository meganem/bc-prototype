<?php 
// DASHBOARD
$nestLevel = 1;
$loggedIn = true;
$bodyclass = "logged-in dashboard";
$userMenuActive = "dashboard";

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
	                    <div id="dashboard-projects" class="span8 well">
                    	
                    		<h2>Active Projects</h2>
                    		<p>Get started by making your first project!</p>
                    		<p class="lead"><a href="<?php print $pathPrefix; ?>profile/projects/new" class="button purple"><img class="icon-new" src="<?php print $pathPrefix; ?>img/icon-new-white.png" alt="" width="30" height="30" /> New Project</a></p>
                			
                    	

	                    </div>
	                    <div class="span4">
	                    	
	                    	<div class="row well">
	                    		<h2>My Profile</h2>
	                    		<div class="row divider">
	                				<div class="">
	                					<img src="<?php print $pathPrefix; ?>img/user-placeholder.png" width="336"  alt="" />
	                				</div>
	                				<h3>Laurie Reid</h3>
	                				<p class="small"><em>Edit your profile to add a description and photo.</em></p>
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

	                    	
	                    	
	                    </div>
	                </div><!-- end row -->

	                <div id="dashboard-tips" class="row">
                		<p><strong>Tip:</strong> You can view your project in three different ways: story mode, presentation mode, and blog mode. <a href="<?php print $pathPrefix; ?>tips" class="">See more tips</a></p>
                		
	                </div>
                    
                    
            </div>



<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>