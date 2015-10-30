<div class="content-portal-row">
	<div class="retail-portal portal">
		<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('retail_portal_image', 886), 'portal-mobile'); ?>
		<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('retail_portal_image', 886), 'portal-tablet'); ?>

		<a href="<?php the_field('retail_link', 886); ?>">
			<picture class="picture">
				<!--[if IE 9]><video style="display: none"><![endif]-->
				<source
					srcset="<?php echo $mobile_page_banner[0]; ?>"
					media="(max-width: 500px)" />
				<source
					srcset="<?php echo $tablet_page_banner[0]; ?>"
					media="(min-width: 860px)" />
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $image[0]; ?>">
			</picture>
			<div class="portal-content">
				<h4><?php the_field('retail_portal_content', 886); ?></h4>
			</div>
		</a>
	</div>

	<div class="blog-portal portal">
		<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('blog_portal_image', 886), 'portal-mobile'); ?>
		<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('blog_portal_image', 886), 'portal-tablet'); ?>

		<a href="<?php the_field('blog_link', 886); ?>">
			<picture class="picture">
				<!--[if IE 9]><video style="display: none"><![endif]-->
				<source
					srcset="<?php echo $mobile_page_banner[0]; ?>"
					media="(max-width: 500px)" />
				<source
					srcset="<?php echo $tablet_page_banner[0]; ?>"
					media="(min-width: 860px)" />
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $image[0]; ?>">
			</picture>
			<div class="portal-content">
				<h4><?php the_field('blog_portal_content', 886); ?></h4>
			</div>
		</a>
	</div>
</div>
