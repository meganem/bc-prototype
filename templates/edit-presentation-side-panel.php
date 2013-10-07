<!-- Edit presentation side panel - pops up when you click on a node -->
<div class="panel">
    <div id="edit-presentation-node">
        <img class="" src="<?php print $pathPrefix; ?>img/node-big.png" alt="" width="347" height="200" />
    </div>
    <div class="node-info-title"><img class="node-info-type" src="<?php print $pathPrefix; ?>img/icon-idea-sm.png" alt="" width="20" height="20" /> A big idea that took some thought</div>
    <div class="node-info-desc ellipsis">
        <div>My big idea is to create a website to showcase funny cats. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus.</div>
    </div>
    <div id="node-info-buttons">
        <a id="node-info-edit" class="button blue" href="#">edit</a>
    </div>

    <div class="divider"></div>

    <form id="edit-presentation-node-form">
        <div class="form-row">
            <input id="edit-presentation-node-form-included" type="checkbox" name="included" value="included" checked> Include in presentation
        </div>
        <div class="form-row">
            <input id="edit-presentation-node-form-order" name="order" type="number" maxlength="5" placeholder="7"> Order in presentation
        </div>
        <div class="form-row">
            Choose template (click thumbnail to preview):
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Full image
                <input type="radio" name="template" value="full-image"> 
            </div>
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Half image
                <input type="radio" name="template" value="half-image"> 
            </div>
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Half map
                <input type="radio" name="template" value="half-map" checked> 
            </div>
            <div class="edit-presentation-node-form-template-option">
                <img class="" src="<?php print $pathPrefix; ?>img/placeholder.png" alt="" width="80" height="50" />
                Full map
                <input type="radio" name="template" value="full-map"> 
            </div>
        </div>
        <div id="edit-presentation-node-form-buttons">
            <input type="button" class="button gray" value="cancel">
            <input type="submit" class="button green" value="save">
        </div>
    </form>
    


</div>