// User menu dropdown
$(function () {
    $('.click-nav-1 > ul').toggleClass('no-js js');
    $('.click-nav-1 .js ul').hide();
    $('.click-nav-1 .js').click(function(e) {
        if ($('.click-nav-2 .js ul').is(':visible')) {
            $('.click-nav-2 .js ul').slideUp();
            $('.click-nav-2 .clicker').removeClass('active');
        }
        if ($('.click-nav-3 .js ul').is(':visible')) {
            $('.click-nav-3 .js ul').slideUp();
            $('.click-nav-3 .clicker').removeClass('active');
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
        if ($('.click-nav-3 .js ul').is(':visible')) {
            $('.click-nav-3 .js ul').slideUp();
            $('.click-nav-3 .clicker').removeClass('active');
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

// Edit Presentation menu dropdown
$(function () {
    $('.click-nav-3 > ul').toggleClass('no-js js');
    $('.click-nav-3 .js ul').hide();
    $('.click-nav-3 .js').click(function(e) {
        if ($('.click-nav-1 .js ul').is(':visible')) {
            $('.click-nav-1 .js ul').slideUp();
            $('.click-nav-1 .clicker').removeClass('active');
        }
        if ($('.click-nav-2 .js ul').is(':visible')) {
            $('.click-nav-2 .js ul').slideUp();
            $('.click-nav-2 .clicker').removeClass('active');
        }
        $('.click-nav-3 .js ul').slideToggle(200);
        $('.click-nav-3 .clicker').toggleClass('active');
        e.stopPropagation();
    });
    $(document).click(function() {
        if ($('.click-nav-3 .js ul').is(':visible')) {
            $('.click-nav-3 .js ul', this).slideUp();
            $('.click-nav-3 .clicker').removeClass('active');
        }
    });
});


// New node form modal expose longer form
$('#new-node-more').click(function(e) {
    $('#new-node').toggleClass('is-short is-long');
});


// Bind form to parsley -- not sure if we need this?
$( '#new-node-form' ).parsley();

// Add a listener to the form
$( '#new-node-form' ).parsley('addListener', {
    onFormSubmit: function ( isFormValid, event ) {
                if ( isFormValid ) {
                    console.log("Now Submit Data");
                }
                else {
                    console.log("Form Bad Dude");
                }
    }
} );


//Close things
function closeThis(theId) {
    $('#' + theId).addClass('hidden');
}

//Open things 
function openThis(theId) {
    $('#' + theId).removeClass('hidden');
}
