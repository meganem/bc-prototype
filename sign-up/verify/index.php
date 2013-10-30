<?php 
// VERIFY
$nestLevel = 2;

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
            	<h1>You're almost done!</h1>
            	<p>Thanks username!</p>
            	<p>Check your email to verify your account.</p>
            	<p><a href="<?php print $pathPrefix; ?>sign-in" class="button green">Sign in</a></p>
            	
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>