<?php 
// HOW IT WORKS
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

	        <div class="container constrained light align-center">
            	<h1>How it works</h1>
            	
	        </div>

	        <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-left"><img src="<?php print $pathPrefix; ?>img/home-hero1.png" width="300" alt="" /></div>
                	<p class="lead">Document your evolving ideas</p>
                	<p>Take snapshots of your inspirations, ideas, sketches, drafts, and final work as you go or document the steps you took in a past project. Upload pictures, write notes, and add things like URLs and keyword tags to document the steps of your creative process. </p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-right"><img src="<?php print $pathPrefix; ?>img/home-hero2.png" width="300" alt="" /></div>
                	<p class="lead">Visualize your creative process</p>
                	<p>Connect your artifacts to show how your ideas evolve over time. For example, if you saw a movie and it inspired you to come up with a new idea for a story, add an "inspiration" artifact to document the movie you saw and connect it to an "idea" artifact that talks about the idea you had after seeing the movie. After adding connections, Bloomcase then automatically creates a dynamic relational process map out of your materials that can show how your ideas evolved over time. </p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-left"><img src="<?php print $pathPrefix; ?>img/home-hero3.png" width="300" alt="" /></div>
                	<p class="lead">Tell the story behind your work</p>
                	<p>Once you've added artifacts to your process map, you can choose which ones you want to include in a public presentation of your project. This is a curated way for you to tell your story. For each artifact, you can choose which presentation template you'd like to use. Choose a specific order for your presentation and use this in a live presentation, or send the presentation link to someone you want to share your project with. You can also allow people to browse your project in story mode in addition to seeing your presentation.</p>
                </div>
            </div>
            <div class="container constrained light border-top align-center">
            	<p class="lead align-center"><a href="<?php print $pathPrefix; ?>sign-up" class="button purple">Sign Up</a></p>
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>