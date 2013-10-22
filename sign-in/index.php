<?php 
// SIGN IN
$nestLevel = 1;

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
            	<h1>Sign In</h1>
            	<p class="lead">put login form here.</p>
            	
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>