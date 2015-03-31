jQuery(function ($) {
    jQuery('#main-news-list a').hover(function () {
        jQuery('#main-news-list li').removeClass('active');
        $this = $(this);
        $this.parent().addClass('active');
        jQuery('#main-news div').addClass('hidden');
        jQuery('#main-news').children().eq($this.parent().index()).removeClass('hidden');
    });

    $("#carousel-1").owlCarousel({
        navigation: true,
        navigationText: "",
        items: 4,
        navigation: false,
    });
    $("#carousel-2").owlCarousel({
        navigation: true,
        navigationText: "",
        items: 5,
    });
    $("#carousel-3").owlCarousel({
        navigation: true,
        navigationText: "",
        items: 8,
    });

});