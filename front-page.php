<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Swift Industries
 */

get_header(); ?>

<script>
	jQuery(document).ready(function(){

	  jQuery('.home-page-slider').slick({
		  arrows: false,
		  dots: true,
		  centered: true,
		  mobileFirst: true,
		//   lazyLoad: 'ondemand',
	  });

	});

</script>

<?php while ( have_posts() ) : the_post(); ?>

	<!-- Begin Gallery -->

	<section class="home-page-slider">

		<!-- Repeater -->
		<?php if( have_rows('gallery_images') ) : ?>

		    <?php while ( have_rows('gallery_images') ) : ?>

		        <?php the_row(); ?>

				<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-mobile'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-tablet'); ?>
				<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-desktop'); ?>
				<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-retina'); ?>

				<a href="<?php echo the_sub_field('page_link'); ?>">
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

					<div class="slide-caption <?php if( get_sub_field( 'caption_position' ) == 'Top of image') : ?>top-caption <?php else: ?>bottom-caption <?php endif; ?>">
						<?php the_sub_field('caption'); ?>
					</div>
				</a>

		    <?php endwhile; ?>

		<?php endif; ?>

	</section>


<!-- End Gallery -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
