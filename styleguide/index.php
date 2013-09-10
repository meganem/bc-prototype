<?php 
// STYLE GUIDE
$nestLevel = 1;
$loggedIn = false;

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

			<div id="styleguide" class="container">

                <div class="light">
                    <h1>Style Guide - Header One</h1>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h2>Header Two</h2>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h3>Header Three</h3>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h4>Header Four</h4>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h5>Header Five</h5>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h6>Header Six</h6>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <p class="lead">Lead sentence - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. </p>
                    <ol>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                    </ol>
                    <ul>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                    </ul>
                    <p><a href="#">Link Text</a></p>
                    <p><a class="btn btn-default" href="#">Link Text</a></p>
                    <p><a href="#" class="button">Button</a></p>
                    <p><a href="#" class="button purple">Button</a></p>
                    <p><a href="#" class="button green">Button</a></p>
                    <p><a href="#" class="button blue">Button</a></p>
                    <p><a href="#" class="button red">Button</a></p>
                </div>

                <div class="container dark">
                    <h1>Header One</h1>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h2>Header Two</h2>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h3>Header Three</h3>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h4>Header Four</h4>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h5>Header Five</h5>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <h6>Header Six</h6>
                    <p>Paragraph - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                    <p class="lead">Lead sentence - Curabitur blandit tempus porttitor. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. </p>
                    <ol>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                    </ol>
                    <ul>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                    </ul>
                    <p><a href="#">Link Text</a></p>
                    <p><a class="btn btn-default" href="#">Link Text</a></p>
                    <p><a href="#" class="button">Button</a></p>
                    <p><a href="#" class="button purple">Button</a></p>
                    <p><a href="#" class="button green">Button</a></p>
                    <p><a href="#" class="button blue">Button</a></p>
                    <p><a href="#" class="button red">Button</a></p>

                </div>
            </div>

<?php 
//INCLUDE FOOTER
include $footerInclude; 
?>