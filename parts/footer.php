            <div id="footer" class="dark">
                <div class="container">
                    <div id="footer-menu" class="">
                        <?php if($loggedIn == false) { ?>
                            <ul class="menu">
                                <li><a href="<?php print $pathPrefix; ?>">Home</a></li>
                                <li><a href="<?php print $pathPrefix; ?>features">Features</a></li>
                                <li><a href="<?php print $pathPrefix; ?>pricing">Pricing</a></li>
                                <li><a href="<?php print $pathPrefix; ?>sign-up">Sign up</a></li>
                                <li><a href="<?php print $pathPrefix; ?>support">Support</a></li>
                                <li><a href="<?php print $pathPrefix; ?>terms">Terms of Use</a></li>
                                <li><a href="<?php print $pathPrefix; ?>privacy">Privacy Policy</a></li>
                            </ul>
                        <?php } elseif($loggedIn == true) { ?>
                            <ul class="menu">
                                <li><a href="<?php print $pathPrefix; ?>dashboard">Dashboard</a></li>
                                <li><a href="<?php print $pathPrefix; ?>support">Support</a></li>
                                <li><a href="<?php print $pathPrefix; ?>account">Account</a></li>
                                <li><a href="<?php print $pathPrefix; ?>terms">Terms of Use</a></li>
                                <li><a href="<?php print $pathPrefix; ?>privacy">Privacy Policy</a></li>
                            </ul>
                        <?php } ?>
                    </div>
                    <p>© 2013 Megan Erin Miller</p>
                </div>
            </div>

        </div><!-- End wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="<?php print $pathPrefix; ?>js/vendor/d3.vs.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php print $pathPrefix; ?>js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="<?php print $pathPrefix; ?>js/main.js"></script>
    </body>
</html>
