/Menu/
$(document).ready(function () {

    $(".menu-level-1 li").hover(function () {
        $('>ul', this).fadeIn(200);

    }, function () {
        // $(".menu-level-1 li").hover(function () {
        $('>ul', this).fadeOut(200);

    });

    $(".responsive-menu-level-1 li").click(function () {
        $('>ul', this).slideToggle();

    }, function () {
        // $(".menu-level-1 li").hover(function () {
        $('>ul', this).slideToggle(200);

    });


});

//jq menu responsive WEBSITE qq.HTML

$(document).ready(function () {
    $('.responsive-menu-icon').click(function () {
        var responsiveMenu = $('.responsive-menu');
        $('.responsive-menu').show();
        responsiveMenu.show();
        responsiveMenu.animate({
            right: 0
        }, 900);
        $('body').append('<div class="back-container"></div>');
        $('.back-container').click(function () {
            var responsiveMenu = $('.responsive-menu');
            responsiveMenu.animate({
                right: '-1300px'
            }, 900, function () {
                responsiveMenu.hide();
            });
            $(this).remove();
        });
    });
});

