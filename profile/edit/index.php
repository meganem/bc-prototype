<?php 
// EDIT PROFILE
$nestLevel = 2;
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

	        <div class="container constrained light align-center">
            	<h1>Edit Profile</h1>
            	<div class="row">
            		<div class="well align-left center span4">
		            	<p class="small"><em>First and last name are required.</em></p>
		            	<form id="edit-profile-form" class="" data-validate="parsley" novalidate action="<?php print $pathPrefix; ?>profile" method="POST">
							<input id="edit-profile-form-firstname" name="firstname" type="text" placeholder="first name" data-trigger="change focusout keyup" data-required="true" data-validation-minlength="3"  value="Laurie">
					        <input id="edit-profile-form-lastname" name="lastname" type="text" placeholder="last name" data-trigger="change focusout keyup" data-required="true" data-validation-minlength="3" value="Reid">
					        <textarea id="edit-profile-form-teaser" rows="5" name="teaser" placeholder="summary" data-trigger="keyup" data-notblank="true" data-validation-minlength="1"></textarea>
                            <textarea id="edit-profile-form-bio" rows="5" name="bio" placeholder="full bio" data-trigger="keyup" data-notblank="true" data-validation-minlength="1"></textarea>
							<input id="edit-profile-form-url" name="profile-url" type="text" placeholder="http://"  data-trigger="keyup" data-type="url" data-validation-minlength="4">
							<p id="edit-profile-form-link" class="small"><a href="#" class="button beige"><img class="icon-new" src="<?php print $pathPrefix; ?>img/icon-new.png" alt="" width="13" height="13" /> Add another link</a></p>
					        <input id="edit-profile-form-submit" class="button green" type="submit" value="save">
					    </form>
					   
					</div>
        		</div>
	        </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>