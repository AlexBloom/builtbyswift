<?php
/**
 * The template for displaying all single posts.
 *
 * @package Swift Industries
 */

get_header('campout'); ?>

<script>
	jQuery(document).ready(function(){
		//move the search into the table, left of the map
		jQuery('label[for="geo_mashup_search"]').prependTo('.ui-widget-content');

		jQuery("label[for='geo_mashup_search']:contains('Find a new location:')").html(function(_, html) {
		return html.split('Find a new location:').join("<div class='map-orphan-text'></div>");
		});


	});
</script>

<div class="swift-campout">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php $mobile = wp_get_attachment_image_src( get_post_thumbnail_id( 5815 ), 'background-mobile' ); ?>
		<?php $tablet = wp_get_attachment_image_src( get_post_thumbnail_id( 5815 ), 'background-tablet' ); ?>
		<?php $desktop = wp_get_attachment_image_src( get_post_thumbnail_id( 5815 ), 'background-desktop' ); ?>
		<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( 5815 ), 'background-retina' ); ?>

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

		<div class="profile-container">

			<?php if( bp_is_my_profile() && bp_is_profile_edit() ) : ?>

				<div class="page-notes">
					<?php the_field('edit_profile_copy', 5815); ?>
				</div>

			<?php elseif( bp_is_my_profile() ) : ?>

				<div class="page-notes">
					<?php the_field('welcome_profile_copy', 5815); ?>
				</div>

			<?php endif; ?>

			<?php $public_profile = bp_get_profile_field_data( 'field=Public' ); ?>

			<?php if( bp_is_my_profile() && bp_is_profile_edit() ) : ?>

				<h2>Put your location on the map!</h2>
				<?php echo GeoMashupUserUIManager::get_instance()->print_form(); ?>

			<?php endif; ?>

			<?php the_content(); ?>

		</div>

	<?php endwhile; ?>

</div>

<?php get_footer('campout'); ?>
