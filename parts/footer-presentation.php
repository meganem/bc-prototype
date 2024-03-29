            <div id="footer" class="presentation dark hidden">
                <div class="container">

                    <div class="click-nav click-nav-3">
                        <ul class="no-js">
                            <li>
                                <a href="#" class="clicker">
                                    <img src="<?php print $pathPrefix; print $projectIconPath; ?>" width="25" height="25" alt="project thumbnail" />
                                </a>
                                <ul id="presentation-navigator" class="menu dropdown">
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-sketch-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-sketch-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-sketch-sm.png" alt="" width="20" height="20" /></a></li>
                                    <li><a href="#" data-title="Name of this slide"><img src="<?php print $pathPrefix; ?>img/icon-draft-sm.png" alt="" width="20" height="20" /></a></li>
                                </ul>
                            </li>
                       </ul>
                    </div> <!-- End click-nav -->

                    <a href="<?php print $pathPrefix; ?>profile/projects/<?php print $projectURL; ?>"><?php print $projectName; ?></a> by <a href="<?php print $pathPrefix; ?>profile"><?php print $userName; ?></a>. Powered by 
                    <a href="#" class="logo-link">
                        <div class="logo"><img src="<?php print $pathPrefix; ?>img/bc-logo-dark.png" width="37" height="43" alt="bloomcase logo" /></div>
                        <div class="site-title">bloomcase</div>
                    </a>
                    <div id="presentation-exit">
                        <a href="<?php print $pathPrefix; ?>profile/projects/<?php print $projectURL; ?>" class="button">exit presentation</a>
                    </div>
                </div>
            </div>

        </div><!-- End wrapper -->

        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
        <script src="<?php print $pathPrefix; ?>js/vendor/jquery-1.10.1.min.js"></script>

<!-- seems to interfere        <script src="<?php print $pathPrefix; ?>js/vendor/d3.v3.min.js"></script> -->
        <script src="<?php print $pathPrefix; ?>js/vendor/parsley.js"></script>
        <script src="<?php print $pathPrefix; ?>js/vendor/parsley.extend.js"></script>
<!-- seems to interfere          <script>window.jQuery || document.write('<script src="<?php print $pathPrefix; ?>js/vendor/jquery-1.10.1.min.js"><\/script>')</script> -->

<!-- seems to interfere                 <script src="<?php print $pathPrefix; ?>js/main.js"></script> -->

        
    </body>
</html>
