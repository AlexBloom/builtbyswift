<?php
/**
 * The template for displaying all single posts.
 *
 * @package Swift Industries
 * @version 1.6.4
*/

get_header(); ?>

<script>
	jQuery(document).ready(function(){

		jQuery('.product-lifestyle-slider').slick({
			arrows: false,
			dots: false,
			autoplay: false,
			autoplaySpeed: 3000,
			pauseOnHover: true,
			centered: true,
			mobileFirst: true,
		    lazyLoad: 'ondemand',
		});

		jQuery('.composite-images').slick({
			arrows: false,
			dots: true,
			autoplay: false,
			fade: true,
			pauseOnHover: true,
			centered: true,
			mobileFirst: true,
		    lazyLoad: 'ondemand',
		});

		jQuery('.product-image').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  asNavFor: '.product-thumbs'
		});

		jQuery('.product-thumbs').slick({
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  arrows: false,
		  asNavFor: '.product-image',
		  dots: false,
		  focusOnSelect: true
		});

		var radio_input_width = jQuery('.gfield_radio input').width();
		jQuery('.gfield_radio input').css('height', radio_input_width);

		if ( jQuery( '.bundle_form').length == 0 ) {
			jQuery('.simple-product').addClass('no-gform');
		}

		if ( jQuery( '.gform_variation_wrapper').length == 0 ) {
			jQuery('.bundle_form').addClass('no-gform');
		} else {
				jQuery('.bundle_form').addClass('gform-exists');

		}

		jQuery( '.color-disclaimer' ).appendTo( '.composite-images' );
		jQuery( '.custom-wait-message' ).appendTo( '.color-picker-controls .product-add-to-cart form' );

	});
</script>

<?php if( current_user_can('have_wholesale_price') ) : ?>
	<script>
		jQuery(window).load(function(){
			// First things first, get the wholesale price
			wholesale_price = jQuery('.wholesale_customer .variations_form .wholesale_price_container ins .amount').html();
			jQuery('.wholesale_customer .bundle_wrap .bundle_price').before('<h3>' + wholesale_price + '</h3>');

			jQuery('.bundled_item_cart_content .attribute-options select').on('change', function() {
				alert( this.value );
				updated_wholesale_price = jQuery('.wholesale_customer .variations_form .wholesale_price_container ins .amount').html();
				alert(updated_wholesale_price);
			});

		});
	</script>
<?php endif; ?>

<div id="primary" class="single-product-content content-area">
	<?php if( has_term('customizable-baggage', 'product_cat') ) : ?>
		<?php if( get_field('notification_toggle', 2908) ) : ?>
		<section class="notification-portal">
			<p>
				<?php the_field('notification_text', 2908); ?>
			</p>
		</section>
		<?php endif; ?>
	<?php endif; ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php do_action( 'woocommerce_before_single_product' ); ?>


		<?php get_template_part('partials/breadcrumbs'); ?>

		<?php if( has_term('customizable-baggage', 'product_cat') ) : ?>

			<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/color-picker.js'></script>

			<div class="color-picker-container">

				<div class="composite-images-container">

					<div class="composite-images">

						<div class="slide first-slide">

							<div class="color-parts">

								<?php if( have_rows('first_front_images') ) : ?>

									<div class="first-front-images images">
										<?php while ( have_rows('first_front_images') ) : ?>

											<?php the_row(); ?>

											<img src="<?php the_sub_field('first_front_image'); ?>" class="<?php the_sub_field('first_front_color_slug'); ?>" />

										<?php endwhile; ?>
									</div>

								<?php endif; ?>

								<?php if( have_rows('second_front_images') ) : ?>

									<div class="second-front-images images">
										<?php while ( have_rows('second_front_images') ) : ?>

											<?php the_row(); ?>

											<img src="<?php the_sub_field('second_front_image'); ?>" class="<?php the_sub_field('second_front_color_slug'); ?>" />

										<?php endwhile; ?>
									</div>

								<?php endif; ?>

								<?php if( have_rows('third_front_images') ) : ?>

									<div class="third-front-images">
										<?php while ( have_rows('third_front_images') ) : ?>

											<?php the_row(); ?>

											<img src="<?php the_sub_field('third_front_image'); ?>" class="<?php the_sub_field('third_front_color_slug'); ?>" />

										<?php endwhile; ?>
									</div>

								<?php endif; ?>

							</div>

							<div class="main-image">
								<img src="<?php the_field('main_front_image'); ?>" />
							</div>

						</div>

						<?php if( have_rows('first_rear_images') ) : ?>
							<div class="slide second-slide">

								<div class="color-parts">

									<?php if( have_rows('first_rear_images') ) : ?>

										<div class="first-rear-images images">
											<?php while ( have_rows('first_rear_images') ) : ?>

												<?php the_row(); ?>

												<img src="<?php the_sub_field('first_rear_image'); ?>" class="<?php the_sub_field('first_rear_color_slug'); ?>" />

											<?php endwhile; ?>
										</div>

									<?php endif; ?>

									<?php if( have_rows('second_rear_images') ) : ?>

										<div class="second-rear-images images">
											<?php while ( have_rows('second_rear_images') ) : ?>

												<?php the_row(); ?>

												<img src="<?php the_sub_field('second_rear_image'); ?>" class="<?php the_sub_field('second_rear_color_slug'); ?>" />

											<?php endwhile; ?>
										</div>

									<?php endif; ?>

									<?php if( have_rows('third_rear_images') ) : ?>

										<div class="third-rear-images">
											<?php while ( have_rows('third_rear_images') ) : ?>

												<?php the_row(); ?>

												<img src="<?php the_sub_field('third_rear_image'); ?>" class="<?php the_sub_field('third_rear_color_slug'); ?>" />

											<?php endwhile; ?>
										</div>

									<?php endif; ?>

								</div>

								<div class="main-image">
									<img src="<?php the_field('main_rear_image'); ?>" />
								</div>

							</div>
						<?php endif; ?>

						<?php if( have_rows('third_slide_first_pocket_images') ) : ?>
							<div class="slide third-slide">

								<div class="color-parts">

									<?php if( have_rows('third_slide_first_pocket_images') ) : ?>

										<div class="first-pocket-images images">
											<?php while ( have_rows('third_slide_first_pocket_images') ) : ?>

												<?php the_row(); ?>

												<img src="<?php the_sub_field('first_pocket_image'); ?>" class="<?php the_sub_field('first_pocket_color_slug'); ?>" />

											<?php endwhile; ?>
										</div>

									<?php endif; ?>

									<?php if( have_rows('second_pocket_images') ) : ?>

										<div class="second-pocket-images images">
											<?php while ( have_rows('second_pocket_images') ) : ?>

												<?php the_row(); ?>

												<img src="<?php the_sub_field('second_pocket_image'); ?>" class="<?php the_sub_field('second_pocket_color_slug'); ?>" />

											<?php endwhile; ?>
										</div>

									<?php endif; ?>

									<?php if( have_rows('third_pocket_images') ) : ?>

										<div class="third-pocket-images">
											<?php while ( have_rows('third_pocket_images') ) : ?>

												<?php the_row(); ?>

												<img src="<?php the_sub_field('third_pocket_image'); ?>" class="<?php the_sub_field('second_pocket_color_slug'); ?>" />

											<?php endwhile; ?>
										</div>

									<?php endif; ?>

								</div>

								<div class="main-image">
									<img src="<?php the_field('main_pocket_image'); ?>" />
								</div>

							</div>
						<?php endif; ?>

					</div>

					<div class="color-disclaimer">
						<em><?php the_field('custom_color_disclaimer', 3223); ?></em>
					</div>

				</div>

				<?php $selected = get_field('number_of_choices_available'); ?>
				<div class="color-picker-controls <?php if( $selected == '1' ) { ?>one-choice<?php } elseif( $selected == '2') { ?>two-choices<?php } elseif( $selected == '3') { ?>three-choices<?php } elseif( $selected == '4') { ?>four-choices<?php } ?>">

					<div class="product-add-to-cart <?php echo $post->post_name; ?>">
						<h1><?php echo the_title(); ?></h1>

						<?php
							/**
							* woocommerce_single_product_summary hook
							*
							* @hooked woocommerce_template_single_title - 5
							* @hooked woocommerce_template_single_rating - 10
							* @hooked woocommerce_template_single_price - 10
							* @hooked woocommerce_template_single_excerpt - 20
							* @hooked woocommerce_template_single_add_to_cart - 30
							* @hooked woocommerce_template_single_meta - 40
							* @hooked woocommerce_template_single_sharing - 50
							*/
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
							do_action( 'woocommerce_single_product_summary' );
						?>

					</div>

					<em class="custom-wait-message"><?php the_field('custom_wait_time', 3223); ?></em>

				</div>

			</div>

		<?php else: ?>

			<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/product-scripts.js'></script>

			<script>
				jQuery(document).ready(function(){

					jQuery( ".bundle_form .bundled_product" ).wrapAll( "<div class='product-add-ons'></div>" );
					// jQuery( ".bundle_form .bundled_product:first-child" ).before( "<h3>Additional Choices</h3>" );
					jQuery( ".gform_wrapper .gform_fields" ).before( "<h3>Choose your Colors</h3>" );

				});
			</script>

			<section class="product-section product-top">

				<div class="product-gallery-container">

					<div class="product-image">

						<?php if( get_field('product_gallery') ) : ?>

							<?php

							$images = get_field('product_gallery');

							if( $images ): ?>
								<?php foreach( $images as $image ): ?>

									<picture class="portal-image">
										<!--[if IE 9]><video style="display: none"><![endif]-->
										<source
											srcset="<?php echo $image['sizes']['portal-mobile']; ?>"
											media="(max-width: 500px)" />
										<source
											srcset="<?php echo $image['sizes']['portal-tablet']; ?>"
											media="(max-width: 860px)" />
										<source
											srcset="<?php echo $image['sizes']['portal-desktop']; ?>"
											media="(max-width: 1180px)" />
										<source
											srcset="<?php echo $image['sizes']['portal-retina']; ?>"
											media="(min-width: 1181px)" />
										<!--[if IE 9]></video><![endif]-->
										<img srcset="<?php echo $image['sizes']['portal-desktop']; ?>">
									</picture>

								<?php endforeach; ?>
							<?php endif; ?>

						<?php else: ?>

							<?php $mobile_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-mobile'); ?>
							<?php $tablet_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-tablet'); ?>
							<?php $desktop_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-desktop'); ?>
							<?php $retina_page_banner = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'portal-retina'); ?>

							<picture class="single-image">
								<!--[if IE 9]><video style="display: none"><![endif]-->
								<source
									srcset="<?php echo $mobile_page_banner[0]; ?>"
									media="(max-width: 500px)" />
								<source
									srcset="<?php echo $tablet_page_banner[0]; ?>"
									media="(max-width: 860px)" />
								<source
									srcset="<?php echo $desktop_page_banner[0]; ?>"
									media="(max-width: 1180px)" />
								<source
									srcset="<?php echo $retina_page_banner[0]; ?>"
									media="(min-width: 1181px)" />
								<!--[if IE 9]></video><![endif]-->
								<img srcset="<?php echo $image[0]; ?>">
							</picture>

						<?php endif; ?>

					</div>

					<div class="product-thumbs">

						<?php

						$images = get_field('product_gallery');

						if( $images ): ?>
							<?php foreach( $images as $image ): ?>

								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endforeach; ?>
						<?php endif; ?>

					</div>

				</div>


				<div class="product-description <?php if( $product->is_type( array('simple') ) ) : ?>simple-product <?php elseif( $product->is_type( array('variable') ) ) : ?>variable-product <?php elseif( $product->is_type( array('bundle') ) ) : ?>bundled-product<?php endif; ?>">

					<h1><?php the_title(); ?></h1>

					<?php the_excerpt(); ?>

					<?php if( $product->is_type( array('simple') ) ) : ?>
						<?php
							/**
							* woocommerce_single_product_summary hook
							*
							* @hooked woocommerce_template_single_title - 5
							* @hooked woocommerce_template_single_rating - 10
							* @hooked woocommerce_template_single_price - 10
							* @hooked woocommerce_template_single_excerpt - 20
							* @hooked woocommerce_template_single_add_to_cart - 30
							* @hooked woocommerce_template_single_meta - 40
							* @hooked woocommerce_template_single_sharing - 50
							*/
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
							// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
							do_action( 'woocommerce_single_product_summary' );
						?>

					<?php else : ?>

						<?php
							/**
							* woocommerce_single_product_summary hook
							*
							* @hooked woocommerce_template_single_title - 5
							* @hooked woocommerce_template_single_rating - 10
							* @hooked woocommerce_template_single_price - 10
							* @hooked woocommerce_template_single_excerpt - 20
							* @hooked woocommerce_template_single_add_to_cart - 30
							* @hooked woocommerce_template_single_meta - 40
							* @hooked woocommerce_template_single_sharing - 50
							*/
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
							remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
							do_action( 'woocommerce_single_product_summary' );
						?>
					<?php endif; ?>

				</div>

			</section>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_single_product' ); ?>

		<section class="product-section product-middle">

			<?php if(get_field('specs') ) : ?>
				<div class="product-specs-features">
					<h2>Specifications</h2>

					<?php the_field('specs'); ?>
					<?php the_field('features'); ?>
				</div>
			<?php endif; ?>

			<?php if(get_field('product_testimonials') ) : ?>

				<?php if( have_rows('product_testimonials') ) : ?>

					<div class="product-testimonials">

						<h2>Testimonials</h2>

						<?php while ( have_rows('product_testimonials') ) : ?>

							<?php the_row(); ?>

							<?php if( get_row_layout() == 'testimonial_entry' ) : ?>

								<div class="testimonial">

									<div class="quote">
										<svg version="1.1" id="Quote" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
										<path d="M5.315,3.401c-1.61,0-2.916,1.343-2.916,3c0,1.656,1.306,3,2.916,3c2.915,0,0.972,5.799-2.916,5.799v1.4
											C9.338,16.601,12.057,3.401,5.315,3.401z M13.715,3.401c-1.609,0-2.915,1.343-2.915,3c0,1.656,1.306,3,2.915,3
											c2.916,0,0.973,5.799-2.915,5.799v1.4C17.738,16.601,20.457,3.401,13.715,3.401z"/>
										</svg>
									</div>
									<?php the_sub_field('testimonial'); ?>
									<span class="attribution"><em>&mdash;&nbsp;<?php the_sub_field('attribution'); ?></em></span>

								</div>

							<?php endif; ?>

						<?php endwhile; ?>

					</div>

				<?php endif; ?>

			<?php else: ?>

				<?php $thecontent = get_the_content(); ?>
				<!-- <?php if(!empty($thecontent)) : ?> -->
					<div class="product-story">
						<h2>A bit more...</h2>
						<?php the_content(); ?>
					</div>
				<!-- <?php endif; ?> -->

			<?php endif; ?>

		</section>

		<?php if( have_rows('product_testimonials') ) : ?>
			<section class="product-section product-bottom">
				<div class="product-content">
					<h2>A bit more...</h2>
					<?php the_content(); ?>
				</div>
			</section>
		<?php endif; ?>

		<div class="product-lifestyle-slider">

			<?php if( have_rows('lifestyle_gallery') ) : ?>

				<?php while ( have_rows('lifestyle_gallery') ) : ?>

					<?php the_row(); ?>

					<div class="slide">

						<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'product-banner-mobile'); ?>
						<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'product-banner-tablet'); ?>
						<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'product-banner-desktop'); ?>
						<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('image'), 'product-banner-retina'); ?>

						<picture class="picture document-header-image">
							<!--[if IE 9]><video style="display: none"><![endif]-->
							<source
								srcset="<?php echo $mobile_page_banner[0]; ?>"
								media="(max-width: 500px)" />
							<source
								srcset="<?php echo $tablet_page_banner[0]; ?>"
								media="(max-width: 860px)" />
							<source
								srcset="<?php echo $desktop_page_banner[0]; ?>"
								media="(max-width: 1180px)" />
							<source
								srcset="<?php echo $retina_page_banner[0]; ?>"
								media="(min-width: 1181px)" />
							<!--[if IE 9]></video><![endif]-->
							<img srcset="<?php echo $image[0]; ?>">
						</picture>

						<div class="slide-caption <?php if( get_sub_field( 'caption_position' ) == 'Top of image') : ?>top-caption <?php else: ?>bottom-caption <?php endif; ?>">
							<a href="<?php echo the_sub_field('page_link'); ?>">
								<?php the_sub_field('caption'); ?>
							</a>
						</div>

					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>


		<section class="product-section related-products">

			<!-- <h2>Related Products</h2> -->
			<?php
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
				do_action( 'woocommerce_after_single_product_summary' );
			?>
		</section>

	<?php endwhile; ?>

</div>

<?php get_footer(); ?>
