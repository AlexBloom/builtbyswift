<?php
/**
 * The template for displaying search results pages.
 *
 * @package Swift Industries
 */

get_header(); ?>

	<section id="primary" class="content-area">

		<?php

		    $args = array(
		        'post_type' => array('post','product'),
				'posts_per_page' => 5,
		    );
		    $query = new WP_Query($args);

		    if($query->have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Swift Industries' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

		    <?php while($query->have_posts()) : ?>

		        <?php $query->the_post(); ?>

		        <h1>
					<a href="<?php the_permalink(); ?>">
						<?php the_title() ?>
					</a>
				</h1>
		        <div class="post-content"><?php the_content(); ?></div>

		    <?php endwhile; ?>

			<?php basis_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section><!-- #primary -->

<?php get_footer(); ?>
