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
			arrows: true,
			dots: false,
			// autoplay: true,
			// autoplaySpeed: 3000,
			// pauseOnHover: true,
			// centered: true,
			mobileFirst: true,
		    lazyLoad: 'ondemand',
		});

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

<section class="front-page">

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Begin Gallery -->

		<section class="home-page-slider-container">

			<section class="home-page-slider">

				<!-- Repeater -->
				<?php if( have_rows('gallery_images') ) : ?>

				    <?php while ( have_rows('gallery_images') ) : ?>

				        <?php the_row(); ?>

						<?php if( get_row_layout() == 'home_page_slider' ) : ?>

							<div class="slide">

								<?php $mobile_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'product-banner-mobile'); ?>
								<?php $tablet_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'product-banner-tablet'); ?>
								<?php $desktop_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'product-banner-desktop'); ?>
								<?php $retina_page_banner = wp_get_attachment_image_src(get_sub_field('slider_image'), 'product-banner-retina'); ?>

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

								<div class="slide-caption">
									<?php if( get_sub_field('category_toggle') ) : ?>
										<?php
											$category_links = get_sub_field('category_link');
											if( $category_links ) :
										?>
										<?php foreach( $category_links as $cat_link ) : ?>
											<a href="<?php echo get_term_link( $cat_link ); ?>">
											<?php endforeach; ?>
										<?php endif; ?>

									<?php elseif( get_sub_field('page_toggle') ) : ?>
										<a href="<?php the_sub_field('page_link'); ?>">

									<?php elseif( get_sub_field('blog_post_toggle') ) : ?>
										<?php
											$blog_post_links = get_sub_field('blog_post_link');
											if( $blog_post_links ) :

												$post = $blog_post_links;
												setup_postdata( $post );
										?>
										<a href="<?php the_permalink(); ?>">

											<?php wp_reset_postdata(); ?>

											<?php endif; ?>

									<?php endif; ?>

										<?php the_sub_field('caption'); ?>
									</a>
								</div>

							</div>
						<?php endif; ?>

				    <?php endwhile; ?>

				<?php endif; ?>

			</section>

		</section>

<!-- End Gallery -->

		<section class="page-content">

			<?php get_template_part('shop-portals'); ?>

			<?php get_template_part('double-portals'); ?>

			<?php get_template_part('story-portal'); ?>

		</section>

	<?php endwhile; // end of the loop. ?>

</section>

<?php get_footer(); ?>
