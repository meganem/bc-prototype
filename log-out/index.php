<?php 
// LOG OUT
$nestLevel = 1;
$loggedIn = false;

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
                    <h1>Log Out</h1>
                    <p>You have been logged out. <a href="<?php print $pathPrefix; ?>sign-in">Sign in again</a> or visit the <a href="<?php print $pathPrefix; ?>">Bloomcase homepage</a>.</p>
            </div>



<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>