<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Swift Industries
 */

get_header(); ?>

<script>

	jQuery(document).ready(function(){
	});

</script>

	<div id="primary" class="content-area">

		<div class="taxonomy-banner-image">

			<?php
				$current_term = get_query_var( 'term' );
			?>


			<?php $mobile = wp_get_attachment_image_src( get_field( $current_term, 3223 ), 'product-banner-mobile' ); ?>
			<?php $tablet = wp_get_attachment_image_src( get_field( $current_term, 3223 ), 'product-banner-tablet' ); ?>
			<?php $desktop = wp_get_attachment_image_src( get_field( $current_term, 3223 ), 'product-banner-desktop' ); ?>
			<?php $retina = wp_get_attachment_image_src( get_field( $current_term, 3223 ), 'product-banner-retina' ); ?>

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

		<?php get_template_part('partials/breadcrumbs'); ?>

		<?php do_action( 'woocommerce_before_single_product' ); ?>

		<section class="product-taxonomies">

			<div class="taxonomy-title">

				<h1><?php single_term_title(); ?></h1>

			</div>

			<?php if(has_term('porteur-bags', 'product_cat') ) : ?>

				<div class="porteur-bags">
					<?php

						$args = array(
							'post_type' => 'product',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => array(
										$term,
										'custom'
									),
									operator => 'AND',
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

						<?php while($query->have_posts()) : ?>

							<?php $query->the_post(); ?>

							<div class="product-portal">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('portal-mobile'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>

						<?php endwhile; ?>

					<?php endif; ?>

				</div>

			<?php elseif(has_term('general-store', 'product_cat') ) : ?>

				<div class="general-store">

					<?php

						$args = array(
							'post_type' => 'product',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => array(
										$term,
									),
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

						<?php while($query->have_posts()) : ?>

							<?php $query->the_post(); ?>

							<div class="product-portal">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('portal-mobile'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>

						<?php endwhile; ?>

					<?php endif; ?>

				</div>

			<?php else : ?>

				<div class="readymade-products products-column">
					<?php

					    $args = array(
					        'post_type' => 'product',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => array(
										$term,
										'readymade'
									),
									operator => 'AND',
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

						<div class="taxonomy-title">

							<h2>ReadyMade</h2>
							<?php the_field('readymade_description', 3223); ?>

						</div>

					    <?php while($query->have_posts()) : ?>

					        <?php $query->the_post(); ?>

							<div class="product-portal">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('portal-mobile'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>

					    <?php endwhile; ?>

					<?php endif; ?>

				</div>

				<div class="custom-products products-column">
					<?php

					    $args = array(
					        'post_type' => 'product',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => array(
										$term,
										'custom'
									),
									operator => 'AND',
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

						<div class="taxonomy-title">

							<h2>Custom</h2>
							<div class="description">
								<?php the_field('custom_description', 3223); ?>
							</div>

						</div>

					    <?php while($query->have_posts()) : ?>

					        <?php $query->the_post(); ?>

							<div class="product-portal">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('portal-mobile'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>

					    <?php endwhile; ?>

					<?php endif; ?>

				</div>

			<?php endif; ?>

		</section>

	</div><!-- #primary -->

<?php get_footer(); ?>
