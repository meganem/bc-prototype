<?php 
// HOMEPAGE
$nestLevel = 0;
$bodyclass = "front";

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

	        <div id="home-splash" class="container constrained light align-center">
            	<h1>Bloomcase</h1>
            	<p id="tagline">Show your creative process.</p>
            	<p class="lead">A new tool for creatives of all kinds to document and showcase creative process.</p>
            	<iframe src="//player.vimeo.com/video/79631479?title=0&amp;byline=0&amp;portrait=0&amp;color=a85fab" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="container constrained light align-center">
                <p class="lead"> <a href="how-it-works" class="button">How it works</a> <a href="sign-up" class="button purple">Sign Up</a></p>
	        </div>

            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-left"><img src="<?php print $pathPrefix; ?>img/home-pitch-story.png" width="500" alt="" /></div>
                	<p class="lead">The most interesting part of any project is how it was created.</p>
                	<p>As creatives, we not only need to show our finished work, but the process we took to get there. Bloomcase enables you to share the story behind your creative work – the inspirations, ideas, and steps along the way.</p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-right"><img src="<?php print $pathPrefix; ?>img/home-pitch-visualize.png" width="500" alt="" /></div>
                	<p class="lead">Blogs, portfolios, and mindmapping tools don't provide the structure needed to communicate process.</p>
                	<p>Bloomcase provides just enough structure to enable you to tell the unique story of your creative process. Bloomcase creates a dynamic relational process map out of your materials that can show how your ideas evolved over time. To do this, we've developed a visual vocabulary for storytelling that helps you define key moments in your creative process.</p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-left"><img src="<?php print $pathPrefix; ?>img/home-pitch-present.png" width="500" alt="" /></div>
                	<p class="lead">A powerful way to present your work.</p>
                	<p>By visualizing the steps of your creative process, you can create a unique context for presenting your work. Bloomcase provides flexible presentation templates that allow you to curate a public presenation of your projects, in addition to letting visitors explore your process maps.</p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row align-center">
                    <p class="lead"> <a href="sign-up" class="button purple">Sign Up</a></p>
                </div>
            </div>
            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>