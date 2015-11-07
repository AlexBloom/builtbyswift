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
		jQuery('.product-portal').matchHeight();
	});

</script>

	<div id="primary" class="content-area">

		<div class="taxonomy-banner-image">

			<?php $mobile = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-mobile' ); ?>
			<?php $tablet = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-tablet' ); ?>
			<?php $desktop = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-desktop' ); ?>
			<?php $retina = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-retina' ); ?>

			<picture class="document-header-image">
				<!--[if IE 9]><video style="display: none;"><![endif]-->
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

			<div class="hinterland">

				<?php

					$args = array(
						'post_type' => 'product',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field' => 'slug',
								'terms' => array(
									'hinterland',
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

		</section>

	</div><!-- #primary -->

<?php get_footer(); ?>
