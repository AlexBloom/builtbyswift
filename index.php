<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Swift Industries
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( 890 ), 'product-banner-mobile' ); ?>
			<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( 890 ), 'product-banner-tablet' ); ?>
			<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( 890 ), 'product-banner-desktop' ); ?>
			<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( 890 ), 'product-banner-retina' ); ?>

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

			<div class="blog-container">

				<h1 class="page-title">Blog</h1>

				<div class="blog-content">
					<?php while ( have_posts() ) : ?>

						<?php the_post(); ?>

						<article class="post">

							<div class="post-meta">
								<h2><?php the_title(); ?></h2>
								<span class="post-author">by <?php the_author_posts_link(); ?> </span>
							</div>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
							
						</article>

					<?php endwhile; ?>
				</div>

			</div>

		<?php endif; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
