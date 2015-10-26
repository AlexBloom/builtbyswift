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

							<picture class="picture">
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

						<picture>
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

			<div class="product-add-to-cart">

					<h4><?php the_title(); ?></h4>

					<?php if( $product->is_type( 'simple' ) ) { ?>

						<?php if ( $price_html = $product->get_price_html() ) : ?>
							<h3><span class="price"><?php echo $price_html; ?></span></h3>
						<?php endif; ?>

					<?php } ?>

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
					<div class="lead-in-copy">
						<?php the_excerpt(); ?>
					</div>
				</div>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>