<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Swift Industries
 */

get_header(); ?>

<script>

	jQuery(document).ready(function(){
		jQuery('.product-portal').matchHeight();
	});

</script>

	<div id="primary" class="content-area">

		<div class="taxonomy-banner-image">

			<?php $mobile = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-mobile' ); ?>
			<?php $tablet = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-tablet' ); ?>
			<?php $desktop = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-desktop' ); ?>
			<?php $retina = wp_get_attachment_image_src( get_field( 'randonneur-bags', 3223 ), 'product-banner-retina' ); ?>

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

		</div>

		<?php get_template_part('partials/breadcrumbs'); ?>

		<?php do_action( 'woocommerce_before_single_product' ); ?>

		<section class="swift-designs product-taxonomies">

			<h2 class="product-row-description"><?php the_field('swift_designs', 3223); ?></h2>



			<?php $taxonomyName = "product_cat";
			//This gets top layer terms only.  This is done by setting parent to 0.
			  $parent_terms = get_terms($taxonomyName, array('exclude' => array(170, 167, 232),'parent' => 220, 'orderby' => 'slug', 'hide_empty' => false));

			  foreach ($parent_terms as $pterm) {

				  $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
				  // get the image URL for parent category
				  $image = wp_get_attachment_url($thumbnail_id);
				  // print the IMG HTML for parent category
				  echo "<div class='product-portal'>";
				  echo '<a href="' . get_term_link($pterm->name, $taxonomyName) . '">';
				  echo "<img src='{$image}' alt='' />";
				  echo '<h3>'. $pterm->name . '</h3></a></div>';


			  } ?>

		</section>

	</div><!-- #primary -->

<?php get_footer(); ?>
