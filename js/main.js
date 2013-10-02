// User menu dropdown
$(function () {
    $('.click-nav-1 > ul').toggleClass('no-js js');
    $('.click-nav-1 .js ul').hide();
    $('.click-nav-1 .js').click(function(e) {
        if ($('.click-nav-2 .js ul').is(':visible')) {
            $('.click-nav-2 .js ul').slideUp();
            $('.click-nav-2 .clicker').removeClass('active');
        }
        $('.click-nav-1 .js ul').slideToggle(200);
        $('.click-nav-1 .clicker').toggleClass('active');
        e.stopPropagation();
    });
    $(document).click(function() {
        if ($('.click-nav-1 .js ul').is(':visible')) {
            $('.click-nav-1 .js ul', this).slideUp();
            $('.click-nav-1 .clicker').removeClass('active');
        }
    });
});

// Project menu dropdown
$(function () {
    $('.click-nav-2 > ul').toggleClass('no-js js');
    $('.click-nav-2 .js ul').hide();
    $('.click-nav-2 .js').click(function(e) {
        if ($('.click-nav-1 .js ul').is(':visible')) {
            $('.click-nav-1 .js ul').slideUp();
            $('.click-nav-1 .clicker').removeClass('active');
        }
        $('.click-nav-2 .js ul').slideToggle(200);
        $('.click-nav-2 .clicker').toggleClass('active');
        e.stopPropagation();
    });
    $(document).click(function() {
        if ($('.click-nav-2 .js ul').is(':visible')) {
            $('.click-nav-2 .js ul', this).slideUp();
            $('.click-nav-2 .clicker').removeClass('active');
        }
    });
});

// New node form modal expose longer form
$('#new-node-more').click(function(e) {
    $('#new-node').toggleClass('is-short is-long');
});

// New node form
$('#new-node-form-submit').click(function(e) {
    //alert("Your node is added!");

});

// Bind form to parsley
$( '#new-node-form' ).parsley();
// Add a listener to the form


$( '#new-node-form' ).parsley( 'addListener', {

    /*var isValid = $( '#new-node-form' ).parsley ( 'validate' );
    if(isValid == true) {
        //$('#new-node-form-submit').attr("disabled", "");
        console.log("Your form is valid!");
    }*/

    /*onFieldValidate: function() {
        var isValid = $( '#new-node-form' ).parsley( 'isValid' );
        if(isValid == true) {
            //$('#new-node-form-submit').attr("disabled", "");
            console.log("Your form is valid!");
        }
    }*/

    /*onFieldSuccess: function(a) {
        console.log("field success!");
        var isValid = $( '#new-node-form' ).parsley( 'isValid' );
        console.log(isValid);
    }*/

    /*
    onFieldError: function(elem) {
        console.log("field error!");
    }*/

    /*onFieldValidate: function ( elem ) {
        if ( !$( elem ).is( ':visible' ) ) {
            return true;
            console.log("Your form is valid!");
        }
        return false;
        console.log("Your form is NOT valid!");
    }*/
} );
    
// New node form validation
// validate string is a date in javascript
// use javascript to convert tags into pills when they type comma
// validate URL in javascript, see if you can get a default value of http:// ?
// onclick for the "done" button that calls a function, after validation, then pass to the map
