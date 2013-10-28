<?php 
// SIGN IN
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
            	<h1>Sign In</h1>
            	<p class="small"><em>All fields are required.</em></p>
            	<form id="sign-in-form" class="" data-validate="parsley" novalidate>
					<input id="sign-in-form-username" name="username" type="text" placeholder="username" data-trigger="change focusout keyup" data-required="true" data-validation-minlength="3">
					<input id="sign-in-form-password" name="password" type="password" placeholder="password" data-trigger="keyup" data-validation-minlength="4"  data-required="true" data-minlength="6" >
					
					<p class="small"><input id="sign-in-form-remember" name="remember" type="checkbox" data-required="true" > Remember me</p>
			        <input id="sign-in-form-submit" class="button green" type="submit" value="sign in">
			    </form>
			    <p class="small">Need an account? <a href="<?php print $pathPrefix; ?>sign-up">Sign up</a></p>
            	
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>