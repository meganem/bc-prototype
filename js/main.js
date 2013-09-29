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

// New node
$('#new-node-form-submit').click(function(e) {
    alert("Your node is added!");
});
    
// New node form validation
// validate string is a date in javascript
// use javascript to convert tags into pills when they type comma
// validate URL in javascript, see if you can get a default value of http:// ?
// onclick for the "done" button that calls a function, after validation, then pass to the map
