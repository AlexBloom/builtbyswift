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

<!-- Removed shop banner image code, archived in template parts > archived-components > shop-banner -->

		<div class="page-content">

				<?php get_template_part('shop-portals'); ?>

				<?php get_template_part('double-portals'); ?>


		</div>

	</div><!-- #primary -->

<?php get_footer(); ?>
