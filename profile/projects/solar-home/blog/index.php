<?php 
// BLOG - LAURIE
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in project-page blog-mode";
$projectMenuActive = "blog";
$projectIconPath = "img/example-laurie-icon.jpg";
$userIconPath = "img/laurie-icon.jpg";
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
$headerInclude = $pathPrefix . "parts/header.php";
$footerInclude = $pathPrefix . "parts/footer.php";

// INCLUDE HEADER
include $headerInclude; 
?>

			<div id="project-header" class="light">
                <div class="container">
                
                    <?php include $pathPrefix . "parts/project-actions-menu.php" ?>
                    
                    <h1 class="project-title">Solar Home</h1>
                    <?php include $pathPrefix . "parts/project-menu.php" ?>

                </div> <!-- End container -->
            </div> <!-- End project-header -->
			
			<div class="light constrained container">
				<h1>Blog Mode</h1>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/model6.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						May 15, 2013 at 2:23pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-final-sm.png" alt="" width="20" height="20" /> 
				    	An angled perspective
				    </h2>
				    <div class="blog-post-desc">
				        <div>In this final rendering you see the full scale and context of the house.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">rendering</a> <a href="#" class="tag">3D</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Flat rendering</a>, <a href="#" class="post-evolvedfrom">Angled rendering</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/model5.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						May 15, 2013 at 2:19pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-final-sm.png" alt="" width="20" height="20" /> 
				    	A detailed view of the walkway
				    </h2>
				    <div class="blog-post-desc">
				        <div>Getting the details right is hard. In this rendering I show the wood paneling in my design.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">rendering</a> <a href="#" class="tag">3D</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Flat rendering</a>, <a href="#" class="post-evolvedfrom">Angled rendering</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/model4.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						April 24, 2013 at 8:36pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-final-sm.png" alt="" width="20" height="20" /> 
				    	A view from the side
				    </h2>
				    <div class="blog-post-desc">
				        <div>Here I've rendered out the levels from an angle so you can view each level and it's full footprint.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">rendering</a> <a href="#" class="tag">3D</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Flat rendering</a>, <a href="#" class="post-evolvedfrom">Angled rendering</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/model8.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						April 24, 2013 at 7:04pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-sketch-sm.png" alt="" width="20" height="20" /> 
				    	Angled rendering
				    </h2>
				    <div class="blog-post-desc">
				        <div>Here I've rendered out the levels from an angle so you can view each level and it's full footprint.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">rendering</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">A first draft of the blueprint</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/model7.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						March 19, 2013 at 9:10pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-sketch-sm.png" alt="" width="20" height="20" /> 
				    	Flat rendering
				    </h2>
				    <div class="blog-post-desc">
				        <div>Here I am rendering out the different levels of the house straight on so you can see the proportions and scale. The angle is from the font.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">rendering</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">A first draft of the blueprint</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/model1.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						March 5, 2013 at 4:45pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /> 
				    	A first draft of the blueprint
				    </h2>
				    <div class="blog-post-desc">
				        <div>Here's a first draft of the blueprint of my house design. You can see the first level only in this snapshot.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">blueprint</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Example house</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/Modern-Architecture-3.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						February 21, 2013 at 5:06pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-inspiration-sm.png" alt="" width="20" height="20" /> 
				    	Example house
				    </h2>
				    <div class="blog-post-desc">
				        <div>I found this example of a modern piece of architecture to be inspiring as I was trying to think of the style of my design.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">modern architecture</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				


				

			</div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>