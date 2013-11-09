<?php 
// HELP
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
                  <h1>Help</h1>
                  <p class="lead">We're here to help. Check the FAQs below for help regarding common tasks when you're creating projects. If you don't see what you're looking for, send us an email.</p>
            </div>
            <div class="row container constrained">
                  <div class="span8 well">
                  	
                  	<h2>Frequently Asked Questions</h2>

                  	<!-- <h3 class="faq">Having trouble accessing your account?</h3>
                  	<p>Did you forget your username or password? <a href="#">Recover your username here</a>, or <a href="#">request a new password</a>.	</p> -->

                  	<h3 class="faq">How do I create a new project?</h3>
                  	<p>Log in to your account. From your dashboard, you can click "New project" or you can go to your projects page and click "New Project."</p>

                  	<h3 class="faq">How do I add an artifact to my project?</h3>
                  	<p>Open a project. Drag out from an existing artifact and let go to launch the new artifact form. Fill out at least a name for your artifact, and then click "Done."</p>

                  	<h3 class="faq">How do I disconnect artifacts?</h3>
                  	<p>In story mode, hover over the line that connects two artifacts. Click the "x" to disconnect them.</p>

                  	<h3 class="faq">How do I delete artifacts?</h3>
                  	<p>Click on an existing artifact. Click "Edit" and click "Delete" at the bottom of the edit form.</p>

                  	<h3 class="faq">How do I make a presentation?</h3>
                  	<p>Open the project you want to make a presentation for. From the project menu (the icon next to the project name), click "Edit Presentation." Click on artifacts to include them in your presentation and customize which template they should use. Customize the order and styles of your presentation from the Edit Presentation menu (icon next to the "Edit Presentation" text). Click "Done" when you are done editing your presentation.</p>

                  	<h3 class="faq">How do I launch my presentation?</h3>
                  	<p>From the project menu, click "Launch Presentation" or the "Presentation Mode" button on the right side of the toolbar.</p>

                  	<h3 class="faq">How do I delete a project?</h3>
                  	<p>From your project, open the project menu (click the project icon). Click "Edit project" and look for the "Delete" button on the edit form.</p>

                  	<h3 class="faq">How do I archive a project?</h3>
                  	<p>Archiving a project hides it from your list of active projects, but doesn't delete it. From the project menu, click "Archive Project."</p>

                  	<h3 class="faq">How do I feature a project?</h3>
                  	<p>Edit the project details, check the "Featured" checkbox, and click "Done."</p>

                  	<h3 class="faq">How do I make sure a project or artifact is private?</h3>
                  	<p>From your project, open the project menu (click the project icon). Click "Edit project" and check to make sure the "Public" option is unchecked. To curate within a public project which artifacts are private, open the project and click on an existing artiface. Click "Edit" and make sure the "Public" option is unchecked.</p>
                  </div>
                  <div class="span4 well">
                        <h2>Contact Us</h2>
                        <p>Having trouble with Bloomcase? First, check our FAQs on this page for solutions to common problems.</p> 
                        <p>Have a specific question? Send us an email: </br>
                              <a href="mailto:support@bloomcase.com">support@bloomcase.com</a></p>
                        <p>If you've found a bug, please <a href="mailto:support@bloomcase.com">let us know</a>.</p>
                  </div>

	        </div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>