<div class="content-portal-row story-portal">
	<div class="full-size-portal portal">
		<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('story_portal_image', 886), 'story-portal-mobile'); ?>
		<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('story_portal_image', 886), 'story-portal-tablet'); ?>
		<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('story_portal_image', 886), 'story-portal-desktop'); ?>

		<a href="<?php the_field('story_link', 886); ?>">
			<picture class="picture">
				<!--[if IE 9]><video style="display: none"><![endif]-->
				<source
					srcset="<?php echo $mobile_page_banner[0]; ?>"
					media="(max-width: 500px)" />
				<source
					srcset="<?php echo $tablet_page_banner[0]; ?>"
					media="(max-width: 860px)" />
				<source
					srcset="<?php echo $desktop_page_banner[0]; ?>"
					media="(min-width: 1180px)" />
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $image[0]; ?>">
			</picture>
			<div class="portal-content">
				<h4><?php the_field('story_portal_content', 886); ?></h4>
			</div>
		</a>
	</div>
</div>
