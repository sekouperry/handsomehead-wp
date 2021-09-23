
(function($){
    /*Onepage menu filter 
    ------------------------*/
    jQuery('#main-menu').onePageNav({
            currentClass: 'wl-current',
            changeHash: false,
            scrollSpeed: 1500,
            scrollThreshold: 0.5,
            filter: '',
            easing: 'swing',
    });
})(jQuery);