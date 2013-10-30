<?php 
// DASHBOARD
$nestLevel = 1;
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

	        <div class="container light">
                    <h1>My Dashboard</h1>
                    <div class="row">
	                    <div class="span8">
	                    	main area with my profile, my projects
	                    </div>
	                    <div class="span4">
	                    	sidebar with alerts and tips
	                    </div>
	                </div>
                    
                    
            </div>



<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>