<?php 
// SUPPORT
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
            	<h1>Support</h1>
            	<p class="lead">Having trouble with Bloomcase? Check our FAQ below, or <a href="mailto:support@bloomcase.com">email us</a> with your question. If you've found a bug, please <a href="mailto:support@bloomcase.com">let us know</a>.</p>

            	<h2>Frequently Asked Questions</h2>

            	<h3>Having trouble accessing your account?</h3>
            	<p>Did you forget your username or password? <a href="#">Recover your username here</a>, or <a href="#">request a new password</a>.	</p>

            	<h3>How do I create a new project?</h3>
            	<p>Log in to your account. From your dashboard, you can click "New project" or you can go to your projects page and click "New Project."</p>

            	<h3>How do I add an artifact to my project?</h3>
            	<p>Open a project. Drag out from an existing artifact and let go to launch the new artifact form. Fill out at least a name for your artifact, and then click "Done."</p>

            	<h3>How do I disconnect artifacts?</h3>
            	<p>In story mode, hover over the line that connects two artifacts. Click the "x" to disconnect them.</p>

            	<h3>How do I delete artifacts?</h3>
            	<p>Click on an existing artifact. Click "Edit" and click "Delete" at the bottom of the edit form.</p>

            	<h3>How do I delete a project?</h3>
            	<p>From your project, open the project menu (click the project icon). Click "Edit project" and look for the "Delete" button on the edit form.</p>

            	<h3>How do I make sure a project or artifact is private?</h3>
            	<p>From your project, open the project menu (click the project icon). Click "Edit project" and check to make sure the "Public" option is unchecked. To curate within a public project which artifacts are private, open the project and click on an existing artiface. Click "Edit" and make sure the "Public" option is unchecked.</p>

	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>