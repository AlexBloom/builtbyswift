<?php
/**
 * Template Name: Swift Campout
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Swift Industries
 */

get_header('campout'); ?>

	<div class="swift-campout">

		<?php while ( have_posts() ) : the_post(); ?>

				<div class="page-content">
					<?php function the_title_trim($title) {
						$title = attribute_escape($title);
						$findthese = array(
							'#Protected:#',
							'#Private:#'
						);
						$replacewith = array(
							'goober', // What to replace "Protected:" with
							'' // What to replace "Private:" with
						);
						$title = preg_replace($findthese, $replacewith, $title);
						return $title;
					}
					add_filter('the_title', 'the_title_trim');
					?>
					<?php the_title(); ?>
					<?php the_content(); ?>
				</div>

			</div>

		<?php endwhile; ?>

	</div><!-- .swift-campout -->

<?php get_footer('campout'); ?>
