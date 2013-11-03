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
                    <p class="small">Small text looks like this.</p>
                    <p class="date small">Date text in combination with small text looks like this. Used for things like: August 15, 2013 – 5:13pm</p>
                    <p class="notification-message">Notification message I guess is the same as small...</p>

                    <div class="row well">
                        <h2>Header Two</h2>
                        <p>This is a well.</p>
                    </div>
                    <div class="row well well-dark">
                        <h2>A dark well</h2>
                        <p>This is a dark well.</p>
                    </div>
                    <div class="row well alert">
                        This is an alert inside a well. Alerts can also be applied to modals and panels.
                    </div>
                    <div class="row well alert alert-info">This is an alert info inside a well.</div>
                    <div class="row well alert alert-error">This is an alert error inside a well.</div>
                    <div class="row well alert alert-success">This is an alert success inside a well.</div>
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
                    
                    <p><a href="#" class="button">Button default</a></p>
                    <p><a href="#" class="button purple">Button purple</a></p>
                    <p><a href="#" class="button green">Button green</a></p>
                    <p><a href="#" class="button blue">Button blue</a></p>
                    <p><a href="#" class="button red">Button red</a></p>

                    <div class="row well">
                        <h2>Rows inside a well</h2>
                        <div class="row divider">
                            <p>This is a row with a divider on it.</p>
                        </div>
                        <div class="row divider align-center">
                            <p>This is a row with a divider on it that is aligned center.</p>
                        </div>
                        <div class="row border-top">
                            <p>This is a row with a border-top added to make a more dark separator.</p>
                        </div>
                        <div class="row divider compact">
                            <h3>Header Three</h3>
                            <p>This is a compact row (which means margins are removed) with a divider on it.</p>
                        </div>
                        <div class="row divider">
                            <div class="well well-dark float-left">
                                Float left
                            </div>
                            <p>This is a row with a divider on it.</p>
                        </div>
                        <div class="row divider">
                            <div class="well well-dark float-right">
                                Float right
                            </div>
                            <p>This is a row with a divider on it.</p>
                        </div>
                    </div>

                    <div class="row well">
                        <h2>A form</h2>
                        <form>
                            <input type="text" placeholder="A text input" >
                            <textarea>A text area input</textarea>
                            <input class="button green" type="submit" value="Submit button">

                        </form>
                    </div>


                </div><!-- end container -->

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