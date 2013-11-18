<?php 
// PRESENTATION
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in";
$projectIconPath = "img/example/icon-new-tattoo.png";
$userName = "Megan";
$projectName = "My new tattoo";
$projectURL = "project-name";

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
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/earth-tattoo.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-idea-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">An organic tattoo</div>
			<p class="lead">I have three tattoos already, but they are all astronomy or physics related. I had the idea that my next tattoo would be more organic.</p>
		</div>
	</div>

	<!-- <div class="slide-template slide-template-half-map hidden">
		<img class="slide-bkg" src="<?php print $pathPrefix; ?>img/example/slide-2-bkg.png" />
		<div class="slide-overlay">
			<div class="slide-image-container">
				<img class="" src="<?php print $pathPrefix; ?>img/example/huge/earth-tattoo.jpg" />
			</div>
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-idea-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">An organic tattoo</div>
			<p class="lead">I have three tattoos already, but they are all astronomy or physics related. I had the idea that my next tattoo would be more organic.</p>
		</div>
	</div> -->

	<div id="slide-3" class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/wedding-flowers.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-inspiration-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">My wedding flowers</div>
			<!-- <p class="lead">I chose dahlias as my flowers for my wedding, which took place on July 21, 2012.</p> -->
		</div>
	</div>

	<div id="slide-4" class="slide-template slide-template-half-map hidden">
		<img class="slide-bkg" src="<?php print $pathPrefix; ?>img/example/slide-4-bkg.png" />
		<div class="slide-overlay">
			<!-- <div class="slide-image-container">
				<img class="" src="<?php print $pathPrefix; ?>img/example/huge/earth-tattoo.jpg" />
			</div> -->
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-idea-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">My tattoo as a memory of my wedding day</div>
			<p class="lead">After my wedding, it hit me that I wanted my tattoo to be meaningful, and that if I chose dahlia flowers, my tattoo could be a reminder of my wedding day and the commitment that I share with my husband.</p>
		</div>
	</div>

	<div id="slide-5" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/second-sketches.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-sketch-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Sketch Idea #1</div>
			<p class="lead">I spent some time sketching ideas. At first I was very interested in incorporating patterns into the tattoo and not just a flower image.</p>
		</div>
	</div>

	<div id="slide-6" class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/dahlia-outline.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-inspiration-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Dahlia outline artwork</div>
			<!-- <p class="lead">I chose dahlias as my flowers for my wedding, which took place on July 21, 2012.</p> -->
		</div>
	</div>

	<div id="slide-7" class="slide-template slide-template-half-map hidden">
		<img class="slide-bkg" src="<?php print $pathPrefix; ?>img/example/slide-7-bkg.png" />
		<div class="slide-overlay">
			<div class="slide-image-container">
				<img class="" src="<?php print $pathPrefix; ?>img/example/huge/finished-first-flower.jpg" />
			</div>
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-draft-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Finishing the first flower</div>
			<p class="lead">I finished the first flower by removing the extra graphics from the original artwork I had found, and retracing it to make it my own.</p>
		</div>
	</div>

	<div id="slide-8" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/dahlia-photo.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-inspiration-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">A beautiful flower</div>
			<p class="lead">This photo I found of a dahlia online was the one I decided to trace for my second flower.</p>
		</div>
	</div>

	<div id="slide-9" class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/finished-outline.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-draft-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Final draft of the outline</div>
		</div>
	</div>

	<div id="slide-10" class="slide-template slide-template-half-map hidden">
		<img class="slide-bkg" src="<?php print $pathPrefix; ?>img/example/slide-10-bkg.png" />
		<div class="slide-overlay">
			<div class="slide-image-container">
				<img class="" src="<?php print $pathPrefix; ?>img/example/huge/first-inking.jpg" />
			</div>
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-final-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">1st Inking Session</div>
			<p class="lead">The first inking session took two hours, and my artist, Todd Tauscher of Hold Fast Studio in Redwood City, did an amazing job on the outline.</p>
		</div>
	</div>

	<div id="slide-11" class="slide-template slide-template-half-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/considering-color.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-sketch-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">Considering Color</div>
			<p class="lead">Before my final inking session, I played around in Photoshop to consider whether I wanted to add color to my tattoo.</p>
		</div>
	</div>

	<div id="slide-12" class="slide-template slide-template-half-map hidden">
		<img class="slide-bkg" src="<?php print $pathPrefix; ?>img/example/slide-12-bkg.png" />
		<div class="slide-overlay">
			<div class="slide-image-container">
				<img class="" src="<?php print $pathPrefix; ?>img/example/huge/second-inking2.jpg" />
			</div>
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-draft-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">2nd Inking Session</div>
			<p class="lead">I did decide to get color when I went in to my second inking session.</p>
		</div>
	</div>

	<div id="slide-13" class="slide-template slide-template-full-image hidden">
		<img class="full-image" src="<?php print $pathPrefix; ?>img/example/huge/tattoo-finished.jpg" />
		<div class="slide-overlay">
			<div class="slide-type">
				<img src="<?php print $pathPrefix; ?>img/icon-final-lg.png" width="70" height="70" alt="idea" />
			</div>
			<div class="slide-title">The finished tattoo</div>
		</div>
	</div>




	

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>