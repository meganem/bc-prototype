<?php 
// BLOG
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in project-page blog-mode";
$projectMenuActive = "blog";

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
                    
                    <h1 class="project-title">My Project</h1>
                    <?php include $pathPrefix . "parts/project-menu.php" ?>

                </div> <!-- End container -->
            </div> <!-- End project-header -->
			
			<div class="light constrained container">
				<h1>Blog Mode</h1>
				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/second-inking.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						January 15, 2013 at 5:23pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /> 
				    	Second inking session
				    </h2>
				    <div class="blog-post-desc">
				        <div>I did decide to get color when I went in to my second inking session.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">tattoo</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Considering color</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/considering-color.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						November 21, 2013 at 2:23pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-sketch-sm.png" alt="" width="20" height="20" /> 
				    	Considering color
				    </h2>
				    <div class="blog-post-desc">
				        <div>Before my final inking session, I played around in Photoshop to consider whether I wanted to add color to my tattoo.</div>
				    </div>
				    <div class="blog-post-tags">
				    	
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">1st inking session</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/first-inking.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						October 3, 2013 at 6:57pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-final-sm.png" alt="" width="20" height="20" /> 
				    	1st inking session
				    </h2>
				    <div class="blog-post-desc">
				        <div>The first inking session took two hours, and my artist, Todd Tauscher of Hold Fast Studio in Redwood City, did an amazing job on the outline.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">tattoo</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Final draft of the outline</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/finished-outline.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						September 23, 2013 at 1:40pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /> 
				    	Final draft of the outline
				    </h2>
				    <div class="blog-post-desc">
				        <div>Once I added the leaves, I decided I was ready to schedule my appointment. I printed it out at the exact size I wanted on my back.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">sketch</a> <a href="#" class="tag">outline</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Adding the second flower</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/second-flower.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						September 15, 2013 at 5:33pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /> 
				    	Adding the second flower
				    </h2>
				    <div class="blog-post-desc">
				        <div>I traced the flower photo I had found and retraced my first flower so that the scale and line weights would match.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">sketch</a> <a href="#" class="tag">outline</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">A beautiful flower</a>, <a href="#" class="post-evolvedfrom">Finishing the first flower</a> 
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/dahlia-photo.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						September 15, 2013 at 11:24pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-inspiration-sm.png" alt="" width="20" height="20" /> 
				    	A beautiful flower
				    </h2>
				    <div class="blog-post-desc">
				        <div>This photo I found of a dahlia online was the one I decided to trace for my second flower.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">photo</a> <a href="#" class="tag">flower</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	
				    </div>
				    <div class="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div class="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/finished-first-flower.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						September 14, 2013 at 7:03pm
				    </div>
				    <h2 class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /> 
				    	Finishing the first flower
				    </h2>
				    <div class="blog-post-desc">
				        <div>I finished the first flower by removing the extra graphics from the original artwork I had found, and retracing it to make it my own.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">sketch</a> <a href="#" class="tag">outline</a>
				    </div>
				    <div class="blog-post-evolvedfrom">
				    	Evolved from: <a href="#" class="post-evolvedfrom">Dahlia outline artwork</a>, <a href="#" class="post-evolvedfrom">Dahlia pictures</a>, <a href="#" class="post-evolvedfrom">Sketch Idea #1</a>, <a href="#" class="post-evolvedfrom">Sketch Idea #2</a>, <a href="#" class="post-evolvedfrom">Sketch Idea #3</a>
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