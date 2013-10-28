<?php 
// FEATURES
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
            	<h1>Features</h1>
            	
	        </div>

	        <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-left"><img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" /></div>
                	<p class="lead">Public profile</p>
                	<p>Bloomcase gives you a professional public profile where you can show a profile image, a bio, links, and other information. On your profile, you can feature select projects and you can share your profile using a succinct bloomcase.com URL (e.g. www.bloomcase.com/username).</p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-right"><img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" /></div>
                	<p class="lead">Projects portfolio</p>
                	<p>Bloomcase enables you to keep a professional public portfolio of your projects. By taggin projects you can organize them into categories that suit your work, and you can choose per project whether to make it public.</p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-left"><img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" /></div>
                	<p class="lead">Story mode, Presentation mode, and Blog mode</p>
                	<p>There are three modes you can view your projects in. <strong>Story mode</strong> is a exploratory visualization mode that features three zoom levels (icons, thumbnails, and cards). In this mode, you can click on each artifact to learn more, and view the process map.</p>
                	<p><strong>Presentation mode</strong> is a curated, step-by-step tour of your project where you can choose per artifact which presentation template you would like to use. There are four presentation templates that you can choose from.</p>
                	<p><strong>Blog mode</strong> a more traditional, linear way of viewing your project contents, and is more suitable for printing and reading in a chronological fashion.</p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-right"><img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" /></div>
                	<p class="lead">Project history</p>
                	<p>For each project, we store a history of your project as you add and remove artifacts and edit content. This helps you keep track of the activity in your projects.</p>
                </div>
            </div>
            <div class="container constrained light border-top">
                <div class="row">
                    <div class="float-left"><img src="<?php print $pathPrefix; ?>img/placeholder.png" width="100" alt="" /></div>
                	<p class="lead">Sharing your projects</p>
                	<p>Sharing your projects is easy. We provide a helpful set of social media, email, and link sharing options for your projects that will help you get your work noticed.</p>
                </div>
            </div>
            <div class="container constrained light border-top align-center">
            	<p class="lead align-center"><a href="<?php print $pathPrefix; ?>sign-up" class="button purple">Sign Up</a></p>
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>