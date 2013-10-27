<?php 
// PRICING
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
            	<h1>Pricing</h1>
            	<p class="lead">Choose the account that's right for you.</p>
            	
            	<div class="row">
                    <div class="grid-4">
                    	<img src="<?php print $pathPrefix; ?>img/pricing-free.png" width="238" alt="" />
                    	<h2>Basic</h2>
                    	<p class="lead">Free</p>
                    	<p>Up to five projects of limited size<br>
                    		(limit 100 artifacts per project)<br>
                    		No collaborators<br>
                    		Self-service online support</p>
                    </div>
                    <div class="grid-4">
                    	<img src="<?php print $pathPrefix; ?>img/pricing-pro.png" width="238" alt="" />
                    	<h2>Pro</h2>
                    	<p class="lead">$8/month</p>
                    	<p>Up to ten projects of any size<br>
                    		Customizeable project presentation styles<br>
                    		Up to two collaborators per project<br>
                    		Email support</p>
                	</div>
                    <div class="grid-4">
                    	<img src="<?php print $pathPrefix; ?>img/pricing-business.png" width="238" alt="" />
                    	<h2>Business</h2>
                    	<p class="lead">$15/month</p>
                    	<p>Unlimited projects of any size<br>
                    		Customizeable project presentation styles<br>
                    		Unlimited collaborators per project<br>
                    		24/7 support</p>
                    </div>
                </div>
	        </div>

            


<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>