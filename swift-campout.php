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

		<?php
			$mobile = wp_get_attachment_image_src(get_field('background_image'), 'background-mobile');
			$tablet = wp_get_attachment_image_src(get_field('background_image'), 'background-tablet');
			$desktop = wp_get_attachment_image_src(get_field('background_image'), 'portal-desktop');
			$retina = wp_get_attachment_image_src(get_field('background_image'), 'portal-retina');
		?>
		<div class="swift-background">
			<picture>
				<!--[if IE 9]><video style="display: none"><![endif]-->
				<source
					srcset="<?php echo $mobile[0]; ?>"
					media="(max-width: 500px)" />
				<source
					srcset="<?php echo $tablet[0]; ?>"
					media="(max-width: 860px)" />
				<source
					srcset="<?php echo $desktop[0]; ?>"
					media="(min-width: 1180px)" />
				<source
					srcset="<?php echo $retina[0]; ?>"
					media="(min-width: 1181px)" />
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $image[0]; ?>">
			</picture>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="lead-in section">

				<div class="section-content-container">

					<div class="section-content">

						<a href="/swiftcampout">
							<img src="<?php the_field('swift_campout_logo'); ?>" />
						</a>
						<h1><?php the_field('call_out_text'); ?></h1>

						<div class="callout-banner">
							<img src="<?php the_field('swift_campout_callout'); ?>" />
						</div>

					</div>

				</div>

			</div>

			<div class="overview section">

				<div class="section-content-container">

					<div class="section-content">

						<div class="two-up">
							<div class="content">
								<?php the_field('overview_text'); ?>
							</div>
						</div>

						<div class="two-up">
							<div class="content">
								<?php the_field('overview_call_to_action'); ?>
								<div class="button-container">
									<script>
										jQuery(document).ready(function(){

											jQuery('.sign-up-button').click(function() {
												jQuery(window).scrollTo('.registration-form', 2000, 'ease');
											});
										});
									</script>
									<span class="button orange-button sign-up-button">- Sign up! -</span>
								</div>
							</div>
							<?php echo GeoMashup::map('object_name=user&width=100%&height=400&map_type=G_NORMAL_MAP'); ?>
						</div>

					</div>

				</div>

			</div>

			<div class="partners section">

				<div class="section-content-container">

					<div class="section-content">

						<h1><?php the_field('partnership_title'); ?></h1>

						<div class="partner-section">

							<div class="content">

								<h2>Collaborative Partners</h2>

								<?php if( have_rows('partners') ) : ?>

									<div class="collaborative-partners">

										<?php while ( have_rows('partners') ) : ?>

											<?php the_row(); ?>

											<div class="partner">
												<a href="<?php the_sub_field('partner_link'); ?>" target="_blank"><img src="<?php the_sub_field('partner_logo'); ?>" /></a>
											</div>

										<?php endwhile; ?>

									</div>

								<?php endif; ?>

							</div>

						</div>

						<div class="two-up partner-section">

							<div class="content">
								<?php the_field('partnership_text'); ?>
							</div>

						</div>

						<div class="two-up partner-section">

							<div class="content">

								<h2>Sidekicks</h2>

								<div class="sidekick-partners">

									<?php if( have_rows('sidekicks', 5802) ) : ?>

										<?php while ( have_rows('sidekicks', 5802) ) : ?>

											<?php the_row(); ?>

											<div class="partner">
												<a href="<?php the_sub_field('sidekick_link', 5802); ?>" target="_blank"><img src="<?php the_sub_field('sidekick_logo', 5802); ?>" /></a>
											</div>

										<?php endwhile; ?>

									<?php endif; ?>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<?php if( is_user_logged_in() ) : ?>
				<!-- Do nothing! -->
			<?php else: ?>
				<div id="registration" class="registration-form section">

					<div class="section-content-container">

						<div class="section-content">

							<h1><?php the_field('registration_title'); ?></h1>

							<div class="content">

								<script>
									jQuery(document).ready(function(){

										jQuery('ul.tabs').each(function(){
											// For each set of tabs, we want to keep track of
											// which tab is active and its associated content
											var $active, $content, $links = jQuery(this).find('a');

											// If the location.hash matches one of the links, use that as the active tab.
											// If no match is found, use the first link as the initial active tab.
											$active = jQuery($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
											$active.addClass('active');

											$content = jQuery($active[0].hash);

											// Hide the remaining content
											$links.not($active).each(function () {
												jQuery(this.hash).hide();
											});

											// Bind the click event handler
											jQuery(this).on('click', 'a', function(e){
												// Make the old tab inactive.
												$active.removeClass('active');
												$content.hide();

												// Update the variables with the new link and content
												$active = jQuery(this);
												$content = jQuery(this.hash);

												// Make the tab active.
												$active.addClass('active');
												$content.show();

												// Prevent the anchor's default click action
												e.preventDefault();
											});
										});
									});
								</script>

								<ul class='tabs'>
									<li><a href="#tab1" class="button">I'm new to Swift!</a></li>
									<li><a href="#tab2" class="button">I already have an account with Swift Industries</a></li>
								</ul>
								<div id='tab1'>
									<?php the_field('registration_form'); ?>
								</div>
								<div id='tab2'>
									<?php
										$login_args = array(
											'redirect' => '/update-camper/'
										);
									?>
									<?php wp_login_form($login_args); ?>
								</div>

							</div>

						</div>

					</div>

				</div>
			<?php endif; ?>

			<div class="profiles section">

				<div class="section-content-container">

					<script>
						jQuery(document).ready(function(){

							jQuery('.profile-slider').slick({
								arrows: true,
								dots: false,
								autoplay: false,
								mobileFirst: true,
								lazyLoad: 'ondemand',
							});

						});

					</script>

					<div class="section-content">

						<h1><?php the_field('profile_title'); ?></h1>

							<div class="profile-slider">
							<?php
								function include_users() {
									$included_campers = implode(',',get_users('role=camper&fields=ID'));
									$included_customers = implode(',',get_users('role=customer&fields=ID'));
									return $included_campers . $included_customers;
								}
 							?>
							<?php if ( bp_has_members('type=random&per_page=2000&include='.include_users() ) ) : ?>

								<?php while ( bp_members() ) : bp_the_member(); ?>

									<?php $public_profile = bp_get_profile_field_data( 'field=Would you like your profile to be public?&user_id=' . bp_get_member_user_id() ); ?>
									<?php if( $public_profile == 'Yes' ) : ?>

										<div class="profile slide">

											<div class="first-column">

												<div class="content">

													<div class="name-avatar">

														<div class="name">
															<h2><a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a></h2>
														</div>

													</div>

													<?php $where_to = bp_get_profile_field_data( 'field=Where are you heading on your Swift Campout, and how far is it to your destination?&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $where_to) ): ?>
														<h4>Where are you heading on your Swift Campout, and how far is it to your destination?</h4>
														<p><?php echo $where_to; ?></p>
													<?php endif; ?>

													<?php $camp_meal = bp_get_profile_field_data( 'field=What is your go-to camp meal?&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $camp_meal) ): ?>
														<h4>What's your go-to camp meal?</h4>
														<p><?php echo $camp_meal; ?></p>
													<?php endif; ?>

													<?php $favorite_gear = bp_get_profile_field_data( 'field=Tell us about your favorite piece of gear.&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $favorite_gear) ): ?>
														<h4>Tell us about your favorite piece of gear.</h4>
														<p><?php echo $favorite_gear; ?></p>
													<?php endif; ?>

													<?php $hear_about = bp_get_profile_field_data( 'field=How did you hear about Swift Campout?&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $hear_about) ): ?>
														<h4>How did you hear about Swift Campout?</h4>
														<p><?php echo $hear_about; ?></p>
													<?php endif; ?>

													<?php $first_overnight = bp_get_profile_field_data( 'field=Is this your first bike-overnight?&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $first_overnight) ): ?>
														<h4>Is this your first bike-overnight?</h4>
														<p><?php echo $first_overnight; ?></p>
													<?php endif; ?>

													<?php $posse_name = bp_get_profile_field_data( 'field=Are you heading out with a posse? Does it have a name?&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $posse_name) ): ?>
														<h4>Are you heading out with a posse? What's your crew's name?</h4>
														<p><?php echo $posse_name; ?></p>
													<?php endif; ?>

													<?php $kind_of_bike = bp_get_profile_field_data( 'field=What kind of bike are you riding?&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $kind_of_bike) ): ?>
														<h4>What kind of bike are you riding?</h4>
														<p><?php echo $kind_of_bike; ?></p>
													<?php endif; ?>

													<?php $love_bike_camping = bp_get_profile_field_data( 'field=Why do you love camping by bicycle?&user_id=' . bp_get_member_user_id() ); ?>
													<?php if ( !empty ( $love_bike_camping) ): ?>
														<h4>Why do you love camping by bicycle?</h4>
														<p><?php echo $love_bike_camping; ?></p>
													<?php endif; ?>

												</div>

											</div>

											<div class="second-column">

												<div class="camper-profile-pic">
													<?php echo bp_core_fetch_avatar( array( 'item_id' => bp_get_member_user_id(), 'type' => 'full' ) ); ?>
												</div>

												<?php $public_campout = bp_get_profile_field_data( 'field=Are you organizing a public campout?&user_id=' . bp_get_member_user_id() ); ?>
												<?php if( $public_campout == 'Yes' ) : ?>

													<div class="content">

														<div class="public-profile-callout">
															<h3><?php the_field('public_profile_callout'); ?></h3>
															<div class="button-container">
																<a class="button orange-button" href="<?php bp_member_permalink(); ?>">- Connect with Me! -</a>
															</div>
														</div>

													</div>

												<?php else: ?>

													<!-- Nothing! -->

												<?php endif; ?>

											</div>

										</div>

									<?php elseif( $public_profile == '' ) : ?>
									<?php else: ?>
									<?php endif; ?>

								<?php endwhile; ?>

							<?php endif; ?>

						</div>

					</div>

				</div>

			</div>

			<div class="social-media section">

				<div class="section-content-container">

					<div class="section-content">

						<h1><?php the_field('social_media_title'); ?></h1>

						<div class="two-up">

							<div class="content">

								<div class="hashtag-feed">
									<?php echo wdi_feed(array('id'=>'1')); ?>
									<h2>#swiftcampout</h2>
								</div>

								<div class="video-embed">
									<?php the_field('video_embed'); ?>
								</div>

							</div>

						</div>

						<div class="two-up blog-portal-container">

							<div class="blog-portal">
								<?php $mobile = wp_get_attachment_image_src(get_field('blog_portal_image'), 'portal-mobile'); ?>
								<?php $tablet = wp_get_attachment_image_src(get_field('blog_portal_image'), 'portal-tablet'); ?>
								<?php $desktop = wp_get_attachment_image_src(get_field('blog_portal_image'), 'portal-desktop'); ?>
								<?php $retina = wp_get_attachment_image_src(get_field('blog_portal_image'), 'portal-retina'); ?>

								<picture class="picture">
									<!--[if IE 9]><video style="display: none"><![endif]-->
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

								<div class="portal-content">
									<h1><?php the_field('blog_portal_title_text'); ?></h1>
									<h3><?php the_field('blog_portal_text'); ?></h3>
								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="gear-up section">

				<div class="section-content-container">

					<div class="section-content">

						<h1><?php the_field('gear_up_title'); ?></h1>

						<div class="two-up">

							<div class="hipcamp-plug">

								<a href="https://www.hipcamp.com/discover#hipbook=1?utm_campaign=swiftcampout-2016&utm_medium=web&utm_source=swift&utm_content=booknow&utm_term=-" target="_blank"><img src="<?php the_field('hipcamp_banner'); ?>" /></a>

								<div class="content">
									<div class="hipcamp-callout">
										<?php the_field('hipcamp_callout'); ?>
									</div>
									<div class="button-container">
										<a href="https://www.hipcamp.com/discover#hipbook=1?utm_campaign=swiftcampout-2016&utm_medium=web&utm_source=swift&utm_content=booknow&utm_term=-" class="button brown-button" target="_blank">- Book Now! -</a>
									</div>
								</div>

							</div>

						</div>

						<div class="two-up">

							<h2 class="shop-portal-title">Browse Swift Baggage</h2>

							<div class="shop-portals">
								<?php

								    $args = array(
								        'post_type' => 'product',
										'posts_per_page' => 4,
										'orderby' => 'rand',
										'tax_query' => array(
											array(
												'taxonomy' => 'product_cat',
												'field' => 'slug',
												'terms' => array(
													'readymade-bags',
													'carbon-glacier-collection',
													'customizable-baggage',
													'hinterland-collection'
												)
											)
										)
								    );
								    $query = new WP_Query($args);

								    if($query->have_posts()) : ?>

								    <?php while($query->have_posts()) : ?>

								        <?php $query->the_post(); ?>

										<div class="portal">
											<?php the_post_thumbnail(); ?>
									        <h4><?php the_title() ?></h4>
										</div>

								    <?php endwhile; ?>

								<?php endif; ?>

							</div>

						</div>

					</div>

				</div>

			</div>

		<?php endwhile; ?>

	</div><!-- .swift-campout -->

<?php get_footer('campout'); ?>
