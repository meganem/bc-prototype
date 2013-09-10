// User menu dropdown
$(function () {
    $('.click-nav-1 > ul').toggleClass('no-js js');
    $('.click-nav-1 .js ul').hide();
    $('.click-nav-1 .js').click(function(e) {
        $('.click-nav-1 .js ul').slideToggle(200);
        $('.clicker').toggleClass('active');
        e.stopPropagation();
    });
    $(document).click(function() {
        if ($('.click-nav-1 .js ul').is(':visible')) {
            $('.click-nav-1 .js ul', this).slideUp();
            $('.clicker').removeClass('active');
        }
    });
});
// Project menu dropdown
$(function () {
    $('.click-nav-2 > ul').toggleClass('no-js js');
    $('.click-nav-2 .js ul').hide();
    $('.click-nav-2 .js').click(function(e) {
        $('.click-nav-2 .js ul').slideToggle(200);
        $('.clicker').toggleClass('active');
        e.stopPropagation();
    });
    $(document).click(function() {
        if ($('.click-nav-2 .js ul').is(':visible')) {
            $('.click-nav-2 .js ul', this).slideUp();
            $('.clicker').removeClass('active');
        }
    });
});