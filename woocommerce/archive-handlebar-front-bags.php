<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php get_template_part('partials/breadcrumbs'); ?>

<div class="collection-row">
	<?php

		$args = array(
			'post_type' => 'product',
			'posts_per_page'=> -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => 'handlebar-front-bags',
				),
			)
		);
		$query = new WP_Query($args);

		if($query->have_posts()) : ?>

		<h1 class="collection-title"><a href="/product-category/customizable-baggage/">Handlebar &amp; Front Bags</a></h1>
		<!-- <h4>Design your own. Choose your colors and features.</h4> -->

		<section class="collection">

		  	<?php while($query->have_posts()) : ?>

				<?php $query->the_post(); ?>

				<div class="product-portal">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('portal-mobile'); ?>
						<h3><?php the_title(); ?></h3>
					</a>
				</div>

			<?php endwhile; ?>

		  </section>

	<?php endif; ?>

</div>

<?php
/**
* woocommerce_after_main_content hook.
*
* @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
*/
do_action( 'woocommerce_after_main_content' );
?>

<?php
/**
* woocommerce_sidebar hook.
*
* @hooked woocommerce_get_sidebar - 10
*/
do_action( 'woocommerce_sidebar' );
?>

<?php get_footer( 'shop' ); ?>
