<?php
/**
 * Template Name: Campout Login
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Swift Industries
 */

get_header('campout'); ?>

	<div id="primary" class="swift-campout">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'background-mobile' ); ?>
			<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'background-tablet' ); ?>
			<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'background-desktop' ); ?>
			<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'background-retina' ); ?>

			<div class="swift-background">
				<picture>
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

			<?php
				$post = get_post( $post_id );
				$slug = $post->post_name;
			?>
			<div class="campout-login <?php echo $slug; ?>">

				<div class="login">

					<?php
						wp_login_form();
					?>

				</div>

			</div>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer('campout'); ?>
