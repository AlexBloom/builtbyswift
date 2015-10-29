jQuery(document).ready(function(){

	jQuery('.menu .sub-menu').css('display', 'none');
	jQuery('.menu-item-has-children').hover(function(){
		jQuery(this).children('.sub-menu').slideToggle('blind');
	});


	if ( jQuery('.document-header-image').length ) {
	// do nothing
	} else {
		desktop_header_height = jQuery('.desktop-header').height();
		jQuery('.site-content').css('padding-top', desktop_header_height);
		jQuery('.site-content').addClass('no-document-header-image');
	}

	if ( jQuery('.no-document-header-image').length > 0 ) {
		jQuery('.desktop-header').addClass('transparent-header');
	}


	if (jQuery(window).width() < 860) {

		// Mobile menu toggle
		jQuery(".slide-out").hide();

		jQuery(".menu-hook").click(function(){
			jQuery(".overlay").show("fade");

		});

		jQuery(".overlay-close").click(function(){
			jQuery(".overlay").hide('fade');
		});

	}

	// Check and uncheck classes on product image selections
	jQuery('.gfield_radio input').click(function(){
		jQuery('input:not(:checked)').removeClass("checked");
        jQuery('input:checked').addClass("checked");
	})

});
