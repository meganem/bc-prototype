<?php 
// MY PROJECTS
$nestLevel = 2;
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

	        <div id="content" class="container">

                <div class="light">
                    <h1>My Projects</h1>
                    <p class="lead">list of my projects</p>
                </div>

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>