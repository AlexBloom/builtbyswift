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
		// jQuery('.product-portal img').matchHeight();
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

		<section class="readymade product-taxonomies">

			<h2 class="product-row-description"><?php the_field('readymade_description', 3223); ?></h2>

			<?php if ( have_posts() ) : ?>

				<?php

				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // get current term
				$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
				$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
				if(($parent->term_id!="" && sizeof($children)>0)) : ?>

					echo 'has parent and child';

				<?php elseif(($parent->term_id!="") && (sizeof($children)==0)) : ?>

					<!-- has parent, no child -->
					<?php

						$args = array(
							'post_type' => 'product',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => 'readymade',
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

				<?php elseif(($parent->term_id=="") && (sizeof($children)>0)) : ?>

					echo 'no parent, has child';

				<?php endif; ?>

				<?php while ( have_posts() ) : ?>

					<?php the_post(); ?>

				<?php endwhile; ?>

		<?php endif; ?>

		</section>

	</div><!-- #primary -->

<?php get_footer(); ?>
