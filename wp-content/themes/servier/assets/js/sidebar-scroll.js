jQuery(document).ready(function ($) {
    // Header scrolling class
    var width_container = jQuery(window).width(),
        sidebar = jQuery('#sidebarContainer'),
        header = jQuery('#header');

    if (sidebar.length > 0) {
        jQuery(window).scroll(function () {
            sideBarFixed(jQuery(this));
        });

        jQuery(window).resize(function () {
            if (jQuery(window).width() !== width_container) {
                width_container = jQuery(window).width();
                sideBarFixed(jQuery(this));
            }
        });

        jQuery(window).on('load', sideBarFixed(jQuery(this)));
    }

    function sideBarFixed($this) {
        width_container = jQuery(window).width();
        if (width_container > 991) {
            if ($this.scrollTop() >= header.innerHeight()) {
                sidebar.addClass('isScrolling');
            } else {
                sidebar.removeClass('isScrolling');
            }
        } else {
            sidebar.removeClass('isScrolling');
        }
    }
});
