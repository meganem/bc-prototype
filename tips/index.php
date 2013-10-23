<?php 
// TIPS
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

	        <div class="container constrained light">
                    <h1>Tips</h1>
                    <p class="lead">Here are some tips for how to get started creating your first project.</p>
            </div>

            <div class="container constrained light border-top">
                <div class="row">
                	<h2>Project Menu</h2>
                	<p>In the project menu, you can edit your project details, edit your presentation, and view your history.</p>
                </div>
            </div>

            <div class="container constrained light border-top">
                <div class="row">
                	<h2>Project Modes</h2>
                	<p>Toggle viewing your project between story, presentation, and blog modes.</p>
                </div>
            </div>

            <div class="container constrained light border-top">
                <div class="row">
                	<h2>Adding your first artifact</h2>
                	<p>To get started, add your first artifact to your project!</p>
                </div>
            </div>

            <div class="container constrained light border-top">
                <div class="row">
                	<h2>Adding your second artifact</h2>
                	<p>Once you've added your first artifact, click on it and drag out to create another one.</p>
					<div>
						<img src="<?php print $pathPrefix; ?>img/diagram-new-artifact.png" width="115" height="68" alt="Diagram showing how to create another artifact" />
					</div>
                </div>
            </div>

            <div class="container constrained light border-top">
                <div class="row">
                	<h2>Connecting two artifacts</h2>
                	<p>Connect two artifacts by dragging and targeting.</p>
					<div>
						<img src="<?php print $pathPrefix; ?>img/diagram-connect-artifacts.png" width="144" height="68" alt="Diagram showing how to connect two artifacts" />
					</div>
                </div>
            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>