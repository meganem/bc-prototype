<?php 
// PRESENTATION - LAURIE
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in";
$projectIconPath = "img/example-laurie-icon.jpg";
$userName = "Laurie";
$projectName = "Solar Home";
$projectURL = "solar-home";

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
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/model6.jpg" />
		<div class="slide-overlay">
			<div class="slide-title">Solar Home</div>
		</div>
	</div>

	<div id="slide-2" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/Modern-Architecture-3.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-inspiration-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Example house</div>
			<p class="lead">I found this example of a modern piece of architecture to be inspiring as I was trying to think of the style of my design.</p>
		</div>
	</div>

	<div id="slide-3" class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/model1.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-draft-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">A first draft of the blueprint</div>
		</div>
	</div>

	<div id="slide-4" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/model7.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-sketch-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Flat rendering</div>
			<p class="lead">Here I am rendering out the different levels of the house straight on so you can see the proportions and scale. The angle is from the font.</p>
		</div>
	</div>
	<div id="slide-5" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/model8.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-sketch-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Angled rendering</div>
			<p class="lead">Here I've rendered out the levels from an angle so you can view each level and it's full footprint.</p>
		</div>
	</div>

	<div id="slide-6" class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/model4.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-final-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">A view from the side</div>
		</div>
	</div>

	<div id="slide-7" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/model5.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-final-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">A detailed view of the walkway</div>
			<p class="lead">Getting the details right is hard. In this rendering I show the wood paneling in my design.</p>
		</div>
	</div>

	<div id="slide-8" class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/model6.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-inspiration-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">An angled perspective</div>
		</div>
	</div>





	

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>