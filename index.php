<?php 
// HOMEPAGE
$nestLevel = 0;
$frontPage = true;

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

	        <div class="container constrained light align-center">
            	<h1>Bloomcase</h1>
            	<p class="lead">Show your creative process.</p>
            	<p>A new tool for creatives of all kinds to document and showcase creative process.</p>
            	<div class="row">
                    <div class="grid-4">
                    	<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="300" height="300" alt="" />
                    	<p>Document your evolving ideas</p>
                    </div>
                    <div class="grid-4">
                    	<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="300" height="300" alt="" />
                    	<p>Visualize your creative process</p>
                	</div>
                    <div class="grid-4">
                    	<img src="<?php print $pathPrefix; ?>img/placeholder.png" width="300" height="300" alt="" />
                    	<p>Tell the story behind your work</p>
                    </div>
                </div>
	        </div>

            <div class="container constrained light border-top">
                <div class="row">
                	<p class="lead">The most interesting part of any project is how it was created.</p>
                	<p>We believe that sharing the story behind your creative work... Donec ullamcorper nulla non metus auctor fringilla. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue. </p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                	<p class="lead">Blogs, portfolios, and mindmapping tools don't provide the structure needed to communicate process.</p>
                	<p>Bloomcase provides just enough structure to enable to you to tell your unique story behing your creative work. ... Donec ullamcorper nulla non metus auctor fringilla. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue. </p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                	<p class="lead">A powerful way to present your work.</p>
                	<p>Sed posuere consectetur est at lobortis. Aenean lacinia bibendum nulla sed consectetur. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Curabitur blandit tempus porttitor.</p>
                </div>
            </div>


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>