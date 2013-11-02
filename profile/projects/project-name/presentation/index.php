<?php 
// PRESENTATION
$nestLevel = 4;
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
$headerInclude = $pathPrefix . "parts/header-presentation.php";
$footerInclude = $pathPrefix . "parts/footer-presentation.php";

// INCLUDE HEADER
include $headerInclude; 
?>

	<div class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/image-big.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-idea-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Idea will go here</div>
		</div>
	</div>

	<div class="slide-template slide-template-half-image">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/image-big.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-idea-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Idea will go here</div>
			<p class="lead">Short description of this slide goes here. Lorem ipsum whatsome dosome ho hum. Littleum mixum a sipsum dipsum tu tripsum mopsum plopsum.</div>
		</div>
	</div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>