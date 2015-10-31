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

		<?php if ( have_posts() ) : ?>

			<?php

			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // get current term
			$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
			$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
			if(($parent->term_id!="" && sizeof($children)>0)) : ?>

				echo 'has parent and child';

			<?php elseif(($parent->term_id!="") && (sizeof($children)==0)) : ?>

				<?php echo 'has parent, no child';
				echo $term->name; ?>
				<?php

					$args = array(
						'post_type' => 'product',
						'posts_per_page' => -1,
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

						<div class="slide">

							<div class="product-portal">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('portal-mobile'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>

						</div>

					  <?php endwhile; ?>

				<?php endif; ?>

			<?php elseif(($parent->term_id=="") && (sizeof($children)>0)) : ?>

				echo 'no parent, has child';
				<?php
				echo $term->name;
				echo $children->name;
				?>
				<?php

					$args = array(
						'post_type' => 'product',
						'posts_per_page' => -1,
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

					  <?php while($query->have_posts()) : ?>

						<?php $query->the_post(); ?>

						<div class="slide">

							<div class="product-portal">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('portal-mobile'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</div>

						</div>

					  <?php endwhile; ?>

				<?php endif; ?>

			<?php endif; ?>

			<?php while ( have_posts() ) : ?>

				<?php the_post(); ?>

			<?php endwhile; ?>

		<?php endif; ?>
	</div><!-- #primary -->

<?php get_footer(); ?>
