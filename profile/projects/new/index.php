<?php 
// NEW PROJECT FORM
$nestLevel = 3;
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

                <h1>New Project</h1>
                
                <form id="new-project-form" class="" data-validate="parsley" novalidate action="<?php print $pathPrefix; ?>profile/projects/new-project" method="POST">
                    <input id="new-project-form-title" name="project-title" type="text" placeholder="Name it" data-trigger="change focusout keyup" data-required="true" data-validation-minlength="3">
                    <textarea id="new-project-form-desc" rows="5" name="project-desc" placeholder="Describe it" data-trigger="keyup" data-notblank="true" data-validation-minlength="1"></textarea>
                    <input id="new-project-form-tags" name="project-tags" type="text" placeholder="Tag it, comma separated" data-trigger="keyup" data-notblank="true">
                    <input id="new-project-form-submit" class="button purple" type="submit" value="Create Project">
                </form>
                <p class="small"> <a href="<?php print $pathPrefix; ?>profile/projects">Cancel</a></p>

            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>