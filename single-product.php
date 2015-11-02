<?php
/**
 * The template for displaying all single posts.
 *
 * @package Swift Industries
 */

get_header(); ?>

<script>
	jQuery(document).ready(function(){

		jQuery('.product-lifestyle-slider').slick({
			arrows: false,
			dots: false,
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

		var radio_input_width = jQuery('.gfield_radio input').width()
		jQuery('.gfield_radio input').css('height', radio_input_width);

		// Color accordions
		jQuery('.ginput_container_radio').hide();
		// Each color area should be closed except for the first one.
		jQuery('.first-set .ginput_container_radio').show();
		jQuery('.body-color .ginput_container_radio').css('display', 'block');
		jQuery('.gfield_label').click(function() {
			jQuery(this).siblings('.ginput_container_radio').slideToggle('blind');
		});

		if ( jQuery( '.bundle_form').length == 0 ) {
			jQuery('.simple-product').addClass('no-gform');
		}

		if ( jQuery( '.gform_variation_wrapper').length == 0 ) {
			jQuery('.bundle_form').addClass('no-gform');
		} else {
				jQuery('.bundle_form').addClass('gform-exists');

		}

		jQuery( ".bundle_form .bundled_product" ).wrapAll( "<div class='product-add-ons'></div>" );
		jQuery( ".bundle_form .bundled_product:first-child" ).before( "<h3>Add Ons</h3>" );
		jQuery( ".gform_wrapper .gform_fields" ).before( "<h3>Choose your Colors</h3>" );

	});
</script>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

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

			<?php get_template_part('partials/breadcrumbs'); ?>

			<?php do_action( 'woocommerce_before_single_product' ); ?>

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


				<div class="product-description">

					<h1><?php the_title(); ?></h1>

					<?php if( $product->is_type( array('simple') ) ) : ?>

						<div class="simple-product">
							<?php if ( $price_html = $product->get_price_html() ) : ?>
								<h2 class="price"><?php echo $price_html; ?>
									<?php $product_title = get_the_title( $post->ID );
									if( has_term(array('set'), 'product_cat') ) : ?>
										<em>a set</em>
									<?php elseif( has_term( array('each'), 'product_cat') ) : ?>
										<em>each</em>
									<?php endif; ?>
								</h2>
							<?php endif; ?>

								<?php the_excerpt(); ?>

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

					<?php elseif( $product->is_type( array('variable') ) ) : ?>

						<div class="variable-product">
							<?php if ( $price_html = $product->get_price_html() ) : ?>
								<?php $post = get_post( $post_id );
								$slug = $post->post_name; ?>
								<h2 class="price"><?php echo $price_html; ?>
									<?php $product_title = get_the_title( $post->ID );
									if( has_term(array('set'), 'product_cat') ) : ?>
										<em>a set</em>
									<?php elseif( has_term( array('each'), 'product_cat') ) : ?>
										<em>each</em>
									<?php endif; ?>
								</h2>
							<?php endif; ?>

								<?php the_excerpt(); ?>

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

					<?php elseif( $product->is_type( 'bundle' ) ) : ?>

						<?php $bundle_price_html = $product->get_price_html(); ?>
						<h2 class="price">
							<?php echo $bundle_price_html; ?>
							<?php $product_title = get_the_title( $post->ID );
							if( has_term(array('set'), 'product_cat') ) : ?>
								<em>a set</em>
							<?php elseif( has_term( array('each'), 'product_cat') ) : ?>
								<em>each</em>
							<?php endif; ?>
						</h2>

						<div class="content">
							<?php the_excerpt(); ?>
						</div>

					<?php endif; ?>

				</div>

				<?php if( has_term('custom', 'product_cat') ) : ?>
					<em><?php the_field('custom_wait_time', 3223); ?></em>
				<?php endif; ?>

			</section>

			<?php if( $product->is_type( 'bundle' ) ) : ?>
				<section class="product-section product-middle">

					<div class="product-add-to-cart">

					<h2 class="purchase">Purchase</h2>
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

				</section>
			<?php endif; ?>

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

			<section class="product-section related-products">

				<!-- <h2>Related Products</h2> -->
				<?php
					remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
					remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
					do_action( 'woocommerce_after_single_product_summary' );
				?>
			</section>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
