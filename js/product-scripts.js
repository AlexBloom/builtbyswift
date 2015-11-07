jQuery(document).ready(function() {

	jQuery('.gfield_radio input').on('change', function() {

		// Get input gfield_label's label color
		var color = jQuery(this).next().text();
		var this_color = jQuery(color).attr('class');

		// Get the current group of color's parent
		var ginput_container = jQuery(this).parents('.ginput_container_radio');
		var ginput_container_classes = jQuery(this).parents('.ginput_container_radio').attr('class');

		var gfield = jQuery(this).parent().parent().parent();
		var gfield_classes = jQuery(this).parent().parent().parent().parent().attr('class');

		var gfield_label = jQuery(this).parents('.ginput_container_radio').prev().text();

		// Remove the asterisk from the Option sections for use as classes
		var gfield_label_clean = jQuery(this).parents('.ginput_container_radio').prev().text().slice(0,-1);

		// Get the next group of colors
		var ginput_container_radio = jQuery(this).parent().parent().parent().parent().next('.gfield_price').children('.ginput_container_radio');

		// Slide up the current group after selection
		jQuery(ginput_container).delay(500).slideUp();

		// Slide down the next group
		jQuery(ginput_container_radio).delay(1000).slideDown();

		if ( jQuery(this).parents('.first-set').length ) {
			if ( jQuery('.color-selection-container').length == 0 ) {
				jQuery( '.bundle_wrap' ).append( '<div class="color-selection-container"></div>' );
				jQuery( '.color-selection-container' ).append( '<div class="color-selection first-set ' + gfield_label_clean + '"></div>' );
				jQuery( '.' + gfield_label_clean ).append( gfield_label_clean + '<div class="color ' + color + '"><h6>' + color + '</h6></div>' );
				// jQuery('.color-selection-container .first-set .color').removeClass(color);
			} else {
				if ( jQuery('.color-selection-container .first-set .color').length ) {
					jQuery('.color-selection-container .first-set .color').remove();
					jQuery('.color-selection-container .first-set').append('<div class="color ' + color + '"><h6>' + color + '</h6></div>');
				}
			}
		}

		if ( jQuery(this).parents('.second-set').length ) {
			if ( jQuery('.color-selection-container .second-set').length == 0 ) {
				jQuery( '.color-selection-container' ).append( '<div class="color-selection second-set ' + gfield_label_clean + '"></div>' );
				jQuery( '.' + gfield_label_clean ).append( gfield_label_clean + '<div class="color ' + color + '"><h6>' + color + '</h6></div>' );
			} else {
				if ( jQuery('.color-selection-container .second-set .color').length ) {
					jQuery('.color-selection-container .second-set .color').remove();
					jQuery('.color-selection-container .second-set').append('<div class="color ' + color + '"><h6>' + color + '</h6></div>');
				}
			}
		}

		if ( jQuery(this).parents('.third-set').length ) {
			if ( jQuery('.color-selection-container .third-set').length == 0 ) {
				jQuery( '.color-selection-container' ).append( '<div class="color-selection third-set ' + gfield_label_clean + '"></div>' );
				jQuery( '.' + gfield_label_clean ).append( gfield_label_clean + '<div class="color ' + color + '"><h6>' + color + '</h6></div>' );
			} else {
				if ( jQuery('.color-selection-container .third-set .color').length ) {
					jQuery('.color-selection-container .third-set .color').remove();
					jQuery('.color-selection-container .third-set').append('<div class="color ' + color + '"><h6>' + color + '</h6></div>');
				}
			}
		}

		var color_selection_width = jQuery('.color-selection .color').width();
		jQuery('.color-selection .color').css('height', color_selection_width);

	});

});
