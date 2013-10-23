<?php 
// PROFILE
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

	        <div id="content" class="container">

                <div class="light">
                    <h1>My Profile</h1>
                    <p class="lead">stuff here</p>
                </div>

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>