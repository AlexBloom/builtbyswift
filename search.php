<?php
/**
 * The template for displaying search results pages.
 *
 * @package Swift Industries
 */

get_header(); ?>

	<section id="primary" class="content-area">

		<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( 4273 ), 'product-banner-mobile' ); ?>
		<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( 4273 ), 'product-banner-tablet' ); ?>
		<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( 4273 ), 'product-banner-desktop' ); ?>
		<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( 4273 ), 'product-banner-retina' ); ?>

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

		<div class="search-container">

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Swift Industries' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php

				$keyword = get_search_query();
			    $args = array(
			        'post_type' => array(
						// 'post',
						'product'
					),
					's' => $keyword,
					'posts_per_page' => -1,
					'tax_query' => array(
						'relation' => 'OR',
						array(
							'taxonomy' => 'product_cat',
							'field' => 'slug',
							'terms' => array(
								'add-on',
								'bundled-simple',
								'bundled-variable',
								// 'each',
								// 'set',
							),
							'operator' => 'NOT IN'
						),
					),
			    );
			    $query = new WP_Query($args); ?>

			    <?php if($query->have_posts()) : ?>

				<div class="individual-search-results">

					<h2>Products</h2>

				    <?php while($query->have_posts()) : ?>

				        <?php $query->the_post(); ?>

				        <h3>
							<a href="<?php the_permalink(); ?>">
								<?php the_title() ?>
							</a>
						</h3>

				    <?php endwhile; ?>

				</div>

					<?php else : ?>

				<div class="individual-search-results">
					<h2>Products</h2>
					<?php get_template_part( 'content', 'none' ); ?>
				</div>

			<?php endif; ?>

			<?php

				$keyword = get_search_query();
			    $args = array(
			        'post_type' => array(
						'post',
					),
					's' => $keyword,
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => array(
								'uncategorized'
							),
							'operator' => 'NOT IN',
						),
					),
			    );
			    $query = new WP_Query($args); ?>

				<?php if($query->have_posts()) : ?>

				<div class="individual-search-results">

					<h2>Blog Posts</h2>

				    <?php while($query->have_posts()) : ?>

				        <?php $query->the_post(); ?>

				        <h3>
							<a href="<?php the_permalink(); ?>">
								<?php the_title() ?>
							</a>
						</h3>

				    <?php endwhile; ?>

				</div>

					<?php else : ?>

				<div class="individual-search-results">
					<h2>Blog Posts</h2>
					<?php get_template_part( 'content', 'none' ); ?>
				</div>

			<?php endif; ?>

		</div>

	</section><!-- #primary -->

<?php get_footer(); ?>
