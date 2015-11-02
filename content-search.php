<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Swift Industries
 */
?>

<section class="page-content-container">

	<article id="post-<?php the_ID(); ?>" class="page-content">
		<header class="entry-header">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php basis_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

	</article><!-- #post-## -->

</section>
