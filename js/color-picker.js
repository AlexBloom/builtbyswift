jQuery(document).ready(function() {

	// Wrap the add-ons with a div for better styling
	jQuery( ".bundle_form .bundled_product" ).wrapAll( "<div class='product-add-ons'></div>" );

	// Add a title to the Color Controls
	jQuery( ".gform_wrapper .gform_body" ).before( "<h3>Customize Your Bag</h3>" );

	jQuery('.gfield_radio').addClass('gfield_radio_list');
	jQuery('.gfield_radio_list').removeClass('gfield_radio');

	// Get the width of the input
	var radio_input_width = jQuery('.gfield_radio_list li').width();
	// Use that width and set the height of the input. This is done to make a perfect circle so that the input's background image
	// shows. Without the height set here, the background image does not show.
	jQuery('.gfield_radio_list input').css('height', radio_input_width);

	// This keeps gform stuff from happening on simple products
	if ( jQuery( '.bundle_form').length == 0 ) {
		jQuery('.simple-product').addClass('no-gform');
	}

	if ( jQuery( '.gform_variation_wrapper').length == 0 ) {
		// This keeps gform stuff from happening on variable products
		jQuery('.bundle_form').addClass('no-gform');
	} else {
			// If gform is here, add a class
			jQuery('.bundle_form').addClass('gform-exists');

	}

	jQuery('.ginput_container').prepend('<div class="current-color">&mdash;</div>');

	// When one of the inputs is selected...
	jQuery('.gfield_radio_list input').on('change', function() {

		// Get the Color title (ex: Black or Neon Green)
		var color = jQuery(this).next().text();

		// Not sure what this does...
		var this_color = jQuery(color).attr('class');

		// Takes the Color Title and turns it into a slug
		var pretty_color_name = color;
		pretty_color_name = pretty_color_name.replace(/[^a-zA-Z0-9\s]/g,"");
		pretty_color_name = pretty_color_name.toLowerCase();
		pretty_color_name = pretty_color_name.replace(/\s/g,'_');
		var color_slug = pretty_color_name;

		// Returns [object Object]
		var gfield = jQuery(this).parent().parent().parent();

		// Returns all classes of the current selections <li>
		var gfield_classes = jQuery(this).parent().parent().parent().parent().attr('class');

		// Body, Pocket, Flap etc WITH * from Gravity Forms
		var gfield_label = jQuery(this).parents('.ginput_container_radio').prev().text();
		// Body, Pocket, Flap etc (remove the *)
		var gfield_label_clean = jQuery(this).parents('.ginput_container_radio').prev().text().slice(0,-1);

		// Get the current group of color's parent
		var ginput_container = jQuery(this).parents('.ginput_container_radio');

		// Get the next group of colors
		var ginput_container_radio = jQuery(this).parent().parent().parent().parent().next('.gfield_price').children('.ginput_container_radio');

		// Toggle the input_checked scripts
		jQuery('input:not(:checked)').removeClass("input_checked");
		jQuery('input:checked').addClass("input_checked");

		// Add the slug as a class to the inputs - this will hook into the color picker opacity swap!
		jQuery(this).addClass(color_slug);

		// Slide up the current group after selection
		// jQuery(ginput_container).delay(500).slideUp();

		// Slide down the next group
		// jQuery(ginput_container_radio).delay(1000).slideDown();



		if ( jQuery(this).parents('.first-set').length ) {
			jQuery('.first-set .ginput_container .current-color').html(color);
			jQuery('.first-front-images img').css('z-index', '0');
			jQuery('.first-front-images .' + color_slug).css('opacity', '1');
			jQuery('.first-front-images .' + color_slug).css('z-index', '1');

			jQuery('.first-rear-images img').css('z-index', '0');
			jQuery('.first-rear-images .' + color_slug).css('opacity', '1');
			jQuery('.first-rear-images .' + color_slug).css('z-index', '1');
		}

		if ( jQuery(this).parents('.second-set').length ) {
			jQuery('.second-set .ginput_container .current-color').html(color);
			jQuery('.second-front-images img').css('z-index', '0');
			jQuery('.second-front-images .' + color_slug).css('opacity', '1');
			jQuery('.second-front-images .' + color_slug).css('z-index', '1');

			jQuery('.second-rear-images img').css('z-index', '0');
			jQuery('.second-rear-images .' + color_slug).css('opacity', '1');
			jQuery('.second-rear-images .' + color_slug).css('z-index', '1');
		}

		if ( jQuery(this).parents('.third-set').length ) {
			jQuery('.third-set .ginput_container .current-color').html(color);
			jQuery('.third-front-images img').css('z-index', '0');
			jQuery('.third-front-images .' + color_slug).css('opacity', '1');
			jQuery('.third-front-images .' + color_slug).css('z-index', '1');

			jQuery('.third-rear-images img').css('z-index', '0');
			jQuery('.third-rear-images .' + color_slug).css('opacity', '1');
			jQuery('.third-rear-images .' + color_slug).css('z-index', '1');
		}

	});

	// Swap the position of the Add Ons and the Colors.
	jQuery('.product-add-ons').insertAfter('.product-add-to-cart .bundle_data .gform_body');
	// Add a title to the add-ons
	if ( jQuery('.product-add-ons').length ) {
		jQuery( '.product-add-ons' ).before( '<div class="add-on-title">Add Ons</div>' );
	}

	if (jQuery(window).width() < 860) {
		jQuery('.gfield_radio_list').one('change', function() {
			// Get the current group of color's parent
			var toggle = jQuery(this).parent('.ginput_container');
			var toggle_children = jQuery(toggle).children('.gfield_radio_list');
			jQuery(toggle_children).delay(500).slideUp();
		});

		jQuery('.gfield_label').on('click', function() {
			var label_trigger = jQuery('.gfield_label').html();
			var label_trigger_sibling = jQuery(this).next('.ginput_container');
			var label_trigger_sibling_class = jQuery(this).next(label_trigger_sibling).children('.gfield_radio_list');
			// alert(label_trigger_sibling_class);
			// alert(label_trigger_sibling);
			jQuery(label_trigger_sibling_class).toggle('blind','1000');
		});
		// var label_trigger_sibling = jQuery('.three-choices_wrapper .first-set .gfield_label').next('.ginput_container');
		//
		// jQuery(label_trigger).click(function () {
		// 	jQuery(label_trigger_sibling).toggle('blind','1000');
		// });

	}

});

jQuery(window).load(function() {
	// Removing the main bag bundle after window load means we can style the add-ons cleanly.
	jQuery( '.product-add-ons .bundled_item_hidden' ).remove();
});
