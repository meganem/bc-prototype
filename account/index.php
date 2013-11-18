<?php 
// ACCOUNT
$nestLevel = 1;
$loggedIn = true;
$bodyclass = "logged-in";
$userMenuActive = "my-account";
$userIconPath = "img/laurie-icon.jpg";

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

                <h1>My Account</h1>
                <p class="lead">Here's where you can change your password, edit your settings, change your email.</p>
                <p>Coming soon</p>
               

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>