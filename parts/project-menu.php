					<div id="project-menu" class="">
                        <ul class="menu">
                            <li><a href="<?php print $pathPrefix; ?>profile/projects/project-name" data-title="Story Mode" class="<?php if ($projectMenuActive == "story") { print "active"; } ?>"><img class="icon-story-mode" src="<?php print $pathPrefix; ?>img/icon-story-mode.png" alt="Story Mode" width="30" height="30" /></a></li>
                            <li><a href="<?php print $pathPrefix; ?>profile/projects/project-name/presentation" data-title="Presentation Mode" ><img class="icon-presentation" src="<?php print $pathPrefix; ?>img/icon-presentation.png" alt="Presentation Mode" width="30" height="30" /></a></li>
                            <li><a href="<?php print $pathPrefix; ?>profile/projects/project-name/blog" data-title="Blog Mode" class="<?php if ($projectMenuActive == "blog") { print "active"; } ?>"><img class="icon-blog-mode" src="<?php print $pathPrefix; ?>img/icon-blog-mode.png" alt="Blog Mode" width="30" height="30" /></a></li>
                            <!-- <li><a href="#"><img class="icon-group" src="<?php //print $pathPrefix; ?>img/icon-group.png" alt="" width="30" height="30" /> Group</a></li>
                            <li><a href="#"><img class="icon-new" src="<?php //print $pathPrefix; ?>img/icon-new.png" alt="" width="30" height="30" /> New</a></li> -->
                        </ul>
                    </div>