<?php if( get_field('promo_portals', 886) ) : ?>
		<section class="promo-portals">
			<div class="promo-portal portal">
				<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('featured_area_1_image', 886), 'portal-mobile'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('featured_area_1_image', 886), 'portal-tablet'); ?>

				<a href="<?php the_field('featured_area_1_link', 886); ?>">
					<picture class="picture">
						<!--[if IE 9]><video style="display: none"><![endif]-->
						<source
							srcset="<?php echo $mobile_page_banner[0]; ?>"
							media="(max-width: 500px)" />
						<source
							srcset="<?php echo $tablet_page_banner[0]; ?>"
							media="(min-width: 500px)" />
						<!--[if IE 9]></video><![endif]-->
						<img srcset="<?php echo $image[0]; ?>">
					</picture>
				</a>
				<div class="portal-content">
					<div class="h1 bold">
						<?php the_field('featured_area_1_content', 886); ?>
						<a href="<?php the_field('featured_area_1_link', 886); ?>" class="button">
							<?php the_field('featured_area_1_call_to_action', 886); ?>
						</a>
					</div>
				</div>
			</div>
			<div class="promo-portal portal">
				<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('featured_area_2_image', 886), 'portal-mobile'); ?>
				<?php $tablet_page_banner = wp_get_attachment_image_src(get_field('featured_area_2_image', 886), 'portal-tablet'); ?>

				<a href="<?php the_field('featured_area_2_link', 886); ?>">
					<picture class="picture">
						<!--[if IE 9]><video style="display: none"><![endif]-->
						<source
							srcset="<?php echo $mobile_page_banner[0]; ?>"
							media="(max-width: 500px)" />
						<source
							srcset="<?php echo $tablet_page_banner[0]; ?>"
							media="(min-width: 500px)" />
						<!--[if IE 9]></video><![endif]-->
						<img srcset="<?php echo $image[0]; ?>">
					</picture>
				</a>
				<div class="portal-content">
					<div class="h1 bold">
						<?php the_field('featured_area_2_content', 886); ?>
						<a href="<?php the_field('featured_area_2_link', 886); ?>" class="button">
							<?php the_field('featured_area_2_call_to_action', 886); ?>
						</a>
					</div>
				</div>
			</div>
		</section>
<?php endif; ?>
