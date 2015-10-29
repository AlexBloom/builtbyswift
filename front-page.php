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

			<div class="product-portal-row">
				<?php

				    $args = array(
				        'post_type' => 'product',
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field' => 'slug',
								'terms' => 'hinterland',
							),
							array(
								'taxonomy' => 'product_cat',
								'field' => 'slug',
								'terms' => array(
									'bundled-simple',
									'bundled-variable',
									'add-on'
								),
								'operator' => 'NOT IN'
							)
						)
				    );
				    $query = new WP_Query($args);

				    if($query->have_posts()) : ?>

					<h2 class="product-row-descriptor"><?php the_field('collection_title', 886); ?></h2>
					<h1 class="collection-title"><a href="/product-category/hinterland/">Hinterland</a></h1>

					<section class="product-slider">

					      <?php while($query->have_posts()) : ?>

					        <?php $query->the_post(); ?>

							<div class="slide">

								<div class="product-portal">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('thumb'); ?>
										<h3><?php the_title(); ?></h3>
									</a>
								</div>

							</div>

						  <?php endwhile; ?>

					  </section>

				<?php endif; ?>

			</div>

			<div class="product-portal-row">

				<h2 class="product-row-descriptor"><?php the_field('design_title', 886); ?></h2>

				<div class="product-slider">

					<?php $taxonomyName = "product_cat";
					//This gets top layer terms only.  This is done by setting parent to 0.
					  $parent_terms = get_terms($taxonomyName, array('parent' => 220, 'orderby' => 'slug', 'hide_empty' => false));

					  foreach ($parent_terms as $pterm) {

						  $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
						  // get the image URL for parent category
						  $image = wp_get_attachment_url($thumbnail_id);
						  // print the IMG HTML for parent category
						  echo "<div class='slide'>";
						  echo "<div class='product-portal'>";
						  echo '<a href="' . get_term_link($pterm->name, $taxonomyName) . '">';
						  echo "<img src='{$image}' alt='' />";
						  echo '<h3>'. $pterm->name . '</h3></a></div>';
						  echo '</div>';


					  } ?>

				</div>

			</div>

			<div class="product-portal-row">
				<?php

					$args = array(
						'post_type' => 'product',
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field' => 'slug',
								'terms' => 'general-store',
							),
							array(
								'taxonomy' => 'product_cat',
								'field' => 'slug',
								'terms' => array(
									'bundled-simple',
									'bundled-variable',
									'add-on'
								),
								'operator' => 'NOT IN'
							)
						)
					);
					$query = new WP_Query($args);

					if($query->have_posts()) : ?>

					<h2 class="product-row-descriptor"><?php the_field('adventure_title', 886); ?></h2>

					<section class="product-slider">

						  <?php while($query->have_posts()) : ?>

							<?php $query->the_post(); ?>

							<div class="slide">

								<div class="product-portal">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('thumbnail'); ?>
										<h3><?php the_title(); ?></h3>
									</a>
								</div>

							</div>

						  <?php endwhile; ?>

					  </section>

				<?php endif; ?>

			</div>

			<div class="content-portal-row">
				<div class="retail-portal portal">
					<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('retail_portal_image', 886), 'portal-mobile'); ?>
					<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('retail_portal_image', 886), 'portal-tablet'); ?>

					<a href="<?php the_field('retail_link', 886); ?>">
						<picture class="picture">
							<!--[if IE 9]><video style="display: none"><![endif]-->
							<source
								srcset="<?php echo $mobile_page_banner[0]; ?>"
								media="(max-width: 500px)" />
							<source
								srcset="<?php echo $tablet_page_banner[0]; ?>"
								media="(min-width: 860px)" />
							<!--[if IE 9]></video><![endif]-->
							<img srcset="<?php echo $image[0]; ?>">
						</picture>
						<div class="portal-content">
							<h4><?php the_field('retail_portal_content', 886); ?></h4>
						</div>
					</a>
				</div>

				<div class="blog-portal portal">
					<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('blog_portal_image', 886), 'portal-mobile'); ?>
					<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('blog_portal_image', 886), 'portal-tablet'); ?>

					<a href="<?php the_field('blog_link', 886); ?>">
						<picture class="picture">
							<!--[if IE 9]><video style="display: none"><![endif]-->
							<source
								srcset="<?php echo $mobile_page_banner[0]; ?>"
								media="(max-width: 500px)" />
							<source
								srcset="<?php echo $tablet_page_banner[0]; ?>"
								media="(min-width: 860px)" />
							<!--[if IE 9]></video><![endif]-->
							<img srcset="<?php echo $image[0]; ?>">
						</picture>
						<div class="portal-content">
							<h4><?php the_field('blog_portal_content', 886); ?></h4>
						</div>
					</a>
				</div>
			</div>

			<div class="content-portal-row story-portal">
				<div class="story-portal portal">
					<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_portal_image', 886), 'story-portal-mobile'); ?>
					<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_portal_image', 886), 'story-portal-tablet'); ?>
					<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_portal_image', 886), 'story-portal-desktop'); ?>

					<a href="<?php the_field('story_link', 886); ?>">
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
								media="(min-width: 1180px)" />
							<!--[if IE 9]></video><![endif]-->
							<img srcset="<?php echo $image[0]; ?>">
						</picture>
						<div class="portal-content">
							<h4><?php the_field('story_portal_content', 886); ?></h4>
						</div>
					</a>
				</div>
			</div>

		</section>

	<?php endwhile; // end of the loop. ?>

</section>

<?php get_footer(); ?>
