<?php 
// PRESENTATION
$nestLevel = 4;
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
$headerInclude = $pathPrefix . "parts/header-presentation.php";
$footerInclude = $pathPrefix . "parts/footer-presentation.php";

// INCLUDE HEADER
include $headerInclude; 
?>

	<div class="light container">		
		<p>Presentation page will go here, with custom footer.</p>
	</div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>