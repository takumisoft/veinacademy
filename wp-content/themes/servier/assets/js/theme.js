// Bootstrap
import 'bootstrap-sass/assets/javascripts/bootstrap/affix';
import 'bootstrap-sass/assets/javascripts/bootstrap/button';
import 'bootstrap-sass/assets/javascripts/bootstrap/dropdown';
import 'bootstrap-sass/assets/javascripts/bootstrap/collapse';
import 'bootstrap-sass/assets/javascripts/bootstrap/scrollspy';
import 'bootstrap-sass/assets/javascripts/bootstrap/tab';
import 'bootstrap-sass/assets/javascripts/bootstrap/transition';

import './sidebar-scroll';

jQuery(document).ready(function ($) {

	jQuery.fn.isVisible = function () {
		return this.length > 0;
	};

	var imageSources = [];

	jQuery('img').each(function () {
		var sources = jQuery(this).attr('src');
		imageSources.push(sources);
	});

	if (jQuery(imageSources).load()) {
		jQuery('.pre-loader').fadeOut('slow');
	}

});
