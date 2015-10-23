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
			dots: false,
			centered: true,
			mobileFirst: true,
		    lazyLoad: 'ondemand',
		});

		function updateImageSize() {
			jQuery(".home-page-slider-container").each(function(){
				var ratio_cont = jQuery(this).width()/jQuery(this).height();
				var $img = jQuery(this).find("img");
				var ratio_img = $img.width()/$img.height();
				if (ratio_cont > ratio_img) {
					$img.css({"width": "100%", "height": "auto"});
				}
				else if (ratio_cont < ratio_img) {
					$img.css({"width": "auto", "height": "100%"});
				}
			});
		};

		if (jQuery(window).width() > 375) {

			var answer = jQuery(window).height();
			jQuery( '.home-page-slider-container' ).css('height', answer);
			jQuery( '.page-content' ).css('top', answer);

			var width_answer = jQuery(window).width();
			jQuery( '.home-page-slider-container' ).css('width', width_answer);

		}

	});

</script>

<section class="front-page">

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Begin Gallery -->

		<section class="home-page-slider-container">

			<section class="home-page-slider">

				<!-- Repeater -->
				<?php if( have_rows('gallery_images') ) : ?>

				    <?php while ( have_rows('gallery_images') ) : ?>

				        <?php the_row(); ?>

						<div class="slide">

							<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-mobile'); ?>
							<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-tablet'); ?>
							<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-desktop'); ?>
							<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'portal-retina'); ?>

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

			</section>

		</section>

	<!-- End Gallery -->

		<section class="page-content">
			<?php get_template_part( 'content', 'page' ); ?>
		</div>

	<?php endwhile; // end of the loop. ?>

</section>

<?php get_footer(); ?>
