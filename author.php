<?php
/**
 * The template for displaying Authors
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
			<?php
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata($author);
			endif;
			?>

			<h3>You're currently viewing <?php echo $curauth->user_firstname; ?> <?php echo $curauth->user_lastname; ?>'s page of posts:</h3>

			</div>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
