<?php
/**
 * Cross-sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$crosssells = WC()->cart->get_cross_sells();

if ( sizeof( $crosssells ) == 0 ) return;

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => apply_filters( 'woocommerce_cross_sells_total', $posts_per_page ),
	'orderby'             => $orderby,
	'post__in'            => $crosssells,
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );

if ( $products->have_posts() ) : ?>

	<div class="cross-sells shop-portals">

		<h4><?php _e( 'You may be interested in&hellip;', 'woocommerce' ) ?></h4>

		<?php woocommerce_product_loop_start(); ?>

			<div class="portal-container">

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<div class="portal" id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink(); ?>">
							<?php $mobile_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-mobile'); ?>
							<?php $tablet_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-tablet'); ?>
							<?php $desktop_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-desktop'); ?>
							<?php $retina_page_banner = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'page-banner-retina'); ?>

							<picture>
								<!--[if IE 9]><video style="display: none"><![endif]-->
								<source
									srcset="<?php echo $mobile_page_banner[0]; ?>"
									media="(max-width: 500px)" />
								<source
									srcset="<?php echo $tablet_page_banner[0]; ?>"
									media="(max-width: 860px)" />
								<source
									srcset="<?php echo $desktop_page_banner[0]; ?>"
									media="(max-width: 1180px)" />
								<source
									srcset="<?php echo $retina_page_banner[0]; ?>"
									media="(min-width: 1181px)" />
								<!--[if IE 9]></video><![endif]-->
								<img srcset="<?php echo $image[0]; ?>">
							</picture>
							<h4>
								<?php the_title(); ?>
							</h4>
						</a>
					</div>

				<?php endwhile; // end of the loop. ?>
			</div>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_query();
