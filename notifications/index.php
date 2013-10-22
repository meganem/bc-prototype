<?php 
// NOTIFICATIONS
$nestLevel = 1;
$loggedIn = true;

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
                    <h1>Notifications</h1>
                    <p>All your notifications are belong to us.</p>
            </div>



<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>