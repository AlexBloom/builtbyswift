<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Swift Industries
 * @version 2.0.0
 */

get_header(); ?>

<script>

	jQuery(document).ready(function(){
		jQuery('.product-slider').slick({
			arrows: true,
			dots: false,
			mobileFirst: true,
			lazyLoad: 'ondemand',
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						centered: true,
						infinite: true,
						slidesToScroll: 1,
						slidesToShow: 4,
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToScroll: 1,
						slidesToShow: 1,
					}
				}
			]
		});
	});

</script>

	<div id="primary" class="content-area">

		<div class="shop-banner-image">

			<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'product-banner-mobile' ); ?>
			<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'product-banner-tablet' ); ?>
			<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'product-banner-desktop' ); ?>
			<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'product-banner-retina' ); ?>

			<picture class="document-header-image">
				<!--[if IE 9]><video style="display: none"><![endif]-->
				<source
					srcset="<?php echo $mobile[0]; ?>"
					media="(max-width: 500px)" />
				<source
					srcset="<?php echo $tablet[0]; ?>"
					media="(max-width: 860px)" />
				<source
					srcset="<?php echo $desktop[0]; ?>"
					media="(max-width: 1180px)" />
				<source
					srcset="<?php echo $retina[0]; ?>"
					media="(min-width: 1181px)" />
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $image[0]; ?>">
			</picture>

		</div>

		<div class="page-content">

				<?php get_template_part('shop-portals'); ?>

				<?php get_template_part('double-portals'); ?>

				<?php get_template_part('story-portal'); ?>

		</div>

	</div><!-- #primary -->

<?php get_footer(); ?>
