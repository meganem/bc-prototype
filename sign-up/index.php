<?php 
// SIGN UP
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
            	<h1>Sign Up</h1>
            	<p class="small"><em>All fields are required.</em></p>
            	<form id="sign-up-form" class="" data-validate="parsley" novalidate action="<?php print $pathPrefix; ?>sign-in/verify" method="POST">
					<input id="sign-up-form-username" name="username" type="text" placeholder="username" data-trigger="change focusout keyup" data-required="true" data-validation-minlength="3">
			        <input id="sign-up-form-email" name="email" type="text" placeholder="email" data-trigger="keyup" data-type="email" data-validation-minlength="4"  data-required="true">
					<input id="sign-up-form-password" name="password" type="password" placeholder="password" data-trigger="keyup" data-validation-minlength="4"  data-required="true" data-minlength="6" >
					<input id="sign-up-form-password-validate" name="password-validate" type="password" placeholder="repeat password" data-trigger="keyup" data-validation-minlength="4"  data-required="true" data-equalto="#sign-up-form-password" >
					<p class="small"><input id="sign-up-form-terms" name="agree-terms" type="checkbox" data-required="true" > I agree to Bloomcase Terms of Service</p>
			        <input id="sign-up-form-submit" class="button green" type="submit" value="sign up">
			    </form>
			    <p class="small">Already have an account? <a href="<?php print $pathPrefix; ?>sign-in">Sign in</a></p>
            	
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>