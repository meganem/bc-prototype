<?php 
// BLOG
$nestLevel = 4;
$loggedIn = true;
$bodyclass = "logged-in project-page";
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
				
				<div class="blog-post">
					<div id="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/second-inking.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						January 15, 2013 at 5:23pm
				    </div>
				    <div class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /> 
				    	Second inking session
				    </div>
				    <div class="blog-post-desc">
				        <div>I did decide to get color when I went in to my second inking session.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">tattoo</a>
				    </div>
				    <div id="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div id="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/considering-color.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						November 21, 2013 at 2:23pm
				    </div>
				    <div class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-sketch-sm.png" alt="" width="20" height="20" /> 
				    	Considering color
				    </div>
				    <div class="blog-post-desc">
				        <div>Before my final inking session, I played around in Photoshop to consider whether I wanted to add color to my tattoo.</div>
				    </div>
				    <div class="blog-post-tags">
				    	
				    </div>
				    <div id="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

				<div class="blog-post">
					<div id="blog-post-image">
				        <img class="" src="<?php print $pathPrefix; ?>img/example/panel/first-inking.jpg" alt="" width="347" height="" />
				    </div>
				    <div class="blog-post-date date">
						October 3, 2013 at 6:57pm
				    </div>
				    <div class="blog-post-title">
				    	<img class="blog-post-type" src="<?php print $pathPrefix; ?>img/icon-final-sm.png" alt="" width="20" height="20" /> 
				    	1st inking session
				    </div>
				    <div class="blog-post-desc">
				        <div>The first inking session took two hours, and my artist, Todd Tauscher of Hold Fast Studio in Redwood City, did an amazing job on the outline.</div>
				    </div>
				    <div class="blog-post-tags">
				    	<a href="#" class="tag">tattoo</a>
				    </div>
				    <div id="blog-post-buttons">
				        <a id="blog-post-edit" class="button blue" href="#">edit</a>
				    </div>
				</div>

			</div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>