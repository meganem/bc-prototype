<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php print $pathPrefix; ?>css/normalize.min.css">
        <link rel="stylesheet" href="<?php print $pathPrefix; ?>css/main.css">
        <link rel="stylesheet" href="<?php print $pathPrefix; ?>css/bloomcase.css">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,400italic,300italic,600italic,700italic' rel='stylesheet' type='text/css'>

        <script src="<?php print $pathPrefix; ?>js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body class="<?php if($loggedIn == true) { print "logged-in"; } ?>">

        <div id="wrapper">
            <div id="header" class="dark">
                <div class="container">
                    <a href="<?php if($loggedIn == false) { print $pathPrefix; } else { print $pathPrefix . "dashboard"; } ?>" class="logo-link">
                        <div class="logo"><img src="<?php print $pathPrefix; ?>img/bc-logo-dark.png" width="37" height="43" alt="bloomcase logo" /></div>
                        <div class="site-title">bloomcase</div>
                    </a>
                    <div id="main-menu" class="">
                    <?php if($loggedIn == false) { ?>
                        <ul class="menu">
                            <li><a href="<?php print $pathPrefix; ?>">Home</a></li>
                            <li><a href="<?php print $pathPrefix; ?>help">Help</a></li>
                            <li><a href="<?php print $pathPrefix; ?>account">Account</a></li>
                        </ul>
                    <?php } elseif($loggedIn == true) { ?>
                    	
                        <ul id="general-links" class="menu logged-in">
                            <li><a href="<?php print $pathPrefix; ?>help">Help</a></li>
                        </ul>
                        <div class="click-nav click-nav-1">
                        <ul class="no-js">
                            <li>
                                <a href="#" class="clicker">
                                    <img src="<?php print $pathPrefix; ?>img/user-sm.png" width="35" height="35" alt="User profile picture" /></a>
                            		<div class="notification">2</div>
                                </a>
                                <ul id="user-actions-menu" class="menu dropdown">
                                    <li><a href="#"><img class="icon-profile" src="<?php print $pathPrefix; ?>img/icon-profile.png" alt="" width="20" height="20" /> My profile</a></li>
                                    <li><a href="#"><img class="icon-account" src="<?php print $pathPrefix; ?>img/icon-account.png" alt="" width="20" height="20" /> My account</a></li>
                                    <li><a href="#"><img class="icon-logout" src="<?php print $pathPrefix; ?>img/icon-logout.png" alt="" width="20" height="20" /> Log out</a></li>
                                    <li class="separator"></li>
                                    <li class="notifications">
                                    	<div class="notifications-title">Notifications</div>
                                    	<div class="notification-message">first notification</div>
                                    	<div class="notification-message">first notification</div>
                                        <div class="notification-link"><a href="#">See all</a></div>
                                    </li>
                                </ul>
                            </li>
                       </ul>
                    </div> <!-- End click-nav -->
                        
                    <?php } ?>
                    </div>
                </div>
            </div>