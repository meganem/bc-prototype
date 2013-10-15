<?php 
// HOW IT WORKS
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
            	<h1>How it works</h1>
            	<p class="lead">Show your creative process.</p>
            	<p>A new tool for creatives of all kinds to document and showcase creative process.</p>
            	
                <p class="lead"><a href="<?php print $pathPrefix; ?>/sign-up" class="button purple">Sign Up</a></p>
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>