<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Swift Industries
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if( has_post_thumbnail() ) : ?>
				<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product-banner-mobile' ); ?>
				<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product-banner-tablet' ); ?>
				<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product-banner-desktop' ); ?>
				<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product-banner-retina' ); ?>

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
			<?php endif; ?>

			<?php
				$post = get_post( $post_id );
				$slug = $post->post_name;
			?>
			<div class="page-content-container <?php echo $slug; ?>">

				<div class="page-content">
					<!-- <h1 class="page-title"><?php the_title(); ?></h1> -->

					<?php the_content(); ?>
				</div>

			</div>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
