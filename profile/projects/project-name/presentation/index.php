<?php 
// PRESENTATION
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in";
$projectIconPath = "img/example/icon-new-tattoo.png";
$userName = "Megan";
$projectName = "My new tattoo";

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
	<div id="presentation-controls">
		<div class="presentation-control previous hidden" id="presentation-control-previous">
			<a href="#" aria-label="Previous" role="button" tabindex="0" data-slide="prev" onclick="previousSlide();">&lsaquo;</a>
		</div>
		<div class="presentation-control next" id="presentation-control-next">
			<a href="#" aria-label="Next" role="button" tabindex="0" data-slide="next" onclick="nextSlide();">&rsaquo;</a>
		</div>
	</div>

	<div id="slide-1" class="slide-template slide-template-full-image slide-template-project-slide">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/tattoo-finished.jpg" />
		<div class="slide-overlay">
			<div class="slide-title">My new tattoo</div>
		</div>
	</div>

	<div id="slide-2" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/image-big.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-idea-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Idea will go here</div>
			<p class="lead">Short description of this slide goes here. Lorem ipsum whatsome dosome ho hum. Littleum mixum a sipsum dipsum tu tripsum mopsum plopsum.</p>
		</div>
	</div>

	<div class="slide-template slide-template-half-map hidden">
		<div class="slide-overlay">
			<div class="slide-image-container">
				<img class="" src="<?php print $pathPrefix; ?>img/image-big.jpg" />
			</div>
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-idea-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Idea will go here</div>
			<p class="lead">Short description of this slide goes here. Lorem ipsum whatsome dosome ho hum. Littleum mixum a sipsum dipsum tu tripsum mopsum plopsum.</p>
		</div>
	</div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>