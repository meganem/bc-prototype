<!-- New node form -->
<div id="new-node" class="modal is-short">
     <div class="modal-arrow"></div>
    <div id="new-node-cancel">
        <a class="" href="#">
            <img class="icon-cancel" src="<?php print $pathPrefix; ?>img/icon-cancel.png" alt="Cancel" width="17" height="17" />
        </a>
    </div>
    <form id="new-node-form" class="" data-validate="parsley" novalidate>
        <div class="form-divider">
            <a id="new-node-type" href="#" class="dark-background">
                <div class="icon-sketch">sketch</div>
            </a>
            <a id="new-node-image" href="#" class="dark-background">
                <img class="icon-camera" src="<?php print $pathPrefix; ?>img/icon-camera.png" alt="Choose image" width="32" height="25" />
            </a>
        </div>
        
        <input id="new-node-form-title" name="node-title" type="text" placeholder="Name it" data-trigger="change focusout keyup" data-required="true" data-validation-minlength="0">
        <textarea id="new-node-form-desc" rows="5" name="node-desc" placeholder="Describe it" data-trigger="keyup" data-notblank="true" data-validation-minlength="1"></textarea>
        <input id="new-node-form-url" name="node-url" type="text" placeholder="http://"  data-trigger="keyup" data-type="url" data-validation-minlength="4">
        <input id="new-node-form-date" name="node-date" type="text" placeholder="
        <?php 
            date_default_timezone_set('America/Los_Angeles');
            $date = date('Y-m-d', time());
            print $date;
         ?>" data-type="dateIso" data-trigger="keyup" data-notblank="true">
        <input id="new-node-form-tags" name="node-tags" type="text" placeholder="Tag it, comma separated" data-trigger="keyup" data-notblank="true">
        <div id="new-node-form-buttons">
            <input id="new-node-delete" class="button red" type="button" value="delete">
            <input id="new-node-form-submit" class="button green disabled" type="submit" value="done">
            <input id="new-node-more" class="button purple more-link" type="button" value="more">
        </div>
    </form>
</div>