<?php 
// TEMPLATES PAGE for storing template markup
$nestLevel = 1;
$loggedIn = true;

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
        
    <div class="light" id="templates">
        <?php 
        //Comment/uncomment lines to include templates for testing:

        //include "node-info-side-panel.php"; 
        //include "zoom3-cards.php"; 
        include "new-node-form.php"; 
        
        ?>
    </div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>