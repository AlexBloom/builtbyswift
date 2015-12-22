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
		jQuery('.product').matchHeight();
	});

</script>

	<div id="primary" class="content-area">

		<?php

		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); // get current term
		$parent = get_term($term->parent, get_query_var('taxonomy') ); // get parent term
		$children = get_term_children($term->term_id, get_query_var('taxonomy')); // get children
		if(($parent->term_id!="" && sizeof($children)>0)) : ?>

			<!-- echo 'has parent and child'; -->
			<div class="taxonomy-banner-image">

				<?php $term_slug = $term->slug; ?>
				<?php $mobile = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-mobile' ); ?>
				<?php $tablet = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-tablet' ); ?>
				<?php $desktop = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-desktop' ); ?>
				<?php $retina = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-retina' ); ?>

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

			<div class="product-taxonomies">

				<?php
					$term_slug = $term->slug;
					$term_parent = $term->parent;
				?>

				<?php if( $term_parent = 'camp-and-adventure-gear' ) : ?>

					<h2 class="taxonomy-title"><?php echo $term->name; ?></h2>

					<div class="<?php echo $term_slug; ?>">
						<?php

						$args = array(
							'post_type' => 'product',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => array(
										'camp-and-adventure-gear',
									),
								),
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => array(
										'bundled-simple',
										'bundled-variable',
										'add-on'
									),
									'operator' => 'NOT IN'
								)
							)
						);
						$query = new WP_Query($args);

						if($query->have_posts()) : ?>

							<div class="taxonomy-product-portal-row">
								<?php while($query->have_posts()) : ?>

									<?php $query->the_post(); ?>

									<div class="product-portal">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('portal-mobile'); ?>
											<h3><?php the_title(); ?></h3>
										</a>
									</div>

								<?php endwhile; ?>
							</div>

						<?php endif; ?>

					</div>

				<?php endif; ?>

			</div>

		<?php elseif(($parent->term_id!="") && (sizeof($children)==0)) : ?>

			<!-- echo 'has parent, no child'; -->

			<div class="taxonomy-banner-image">

				<?php
					$term_slug = $term->slug;
					if( $term_slug = array('bike-racks-and-hardware', 'guidebooks-and-maps', 'swift-picks')) : ?>
						<?php $mobile = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-mobile' ); ?>
						<?php $tablet = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-tablet' ); ?>
						<?php $desktop = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-desktop' ); ?>
						<?php $retina = wp_get_attachment_image_src( get_field( 'readymade', 3223 ), 'product-banner-retina' ); ?>
					<?php else : ?>
						<?php $mobile = wp_get_attachment_image_src( get_field( $term_slug, 3223 ), 'product-banner-mobile' ); ?>
						<?php $tablet = wp_get_attachment_image_src( get_field( $term_slug, 3223 ), 'product-banner-tablet' ); ?>
						<?php $desktop = wp_get_attachment_image_src( get_field( $term_slug, 3223 ), 'product-banner-desktop' ); ?>
						<?php $retina = wp_get_attachment_image_src( get_field( $term_slug, 3223 ), 'product-banner-retina' ); ?>
					<?php endif; ?>

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

			<div class="product-taxonomies">

				<?php
					$term_slug = $term->slug;
					$term_parent = $term->parent;
				?>

				<?php if( $term_parent = 'adventure-store' ) : ?>

					<div class="adventure-store">

						<?php if( has_term('swift-picks', 'product_cat') ) : ?>

							<?php

							    $args = array(
							        'post_type' => 'product',
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'swift-picks',
											),
										),
									),
							    );
							    $query = new WP_Query($args);

							    if($query->have_posts()) : ?>

								<h2>Swift Picks</h2>
								<div class="product-portal-row">

									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

							<?php wp_reset_postdata(); ?>

						<?php endif; ?>

						<?php if( has_term('apparel', 'product_cat') ) : ?>

							<?php

							    $args = array(
							        'post_type' => 'product',
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'apparel',
											),
										),
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'bundled-simple',
												'bundled-variable',
												'add-on'
											),
											'operator' => 'NOT IN'
										)
									)
							    );
							    $query = new WP_Query($args);

							    if($query->have_posts()) : ?>

								<h2>Apparel</h2>
								<div class="product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						<?php endif; ?>

						<?php if( has_term('bike-racks-and-hardware', 'product_cat') ) : ?>

							<?php

							    $args = array(
							        'post_type' => 'product',
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'bike-racks-and-hardware',
											),
										),
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'bundled-simple',
												'bundled-variable',
												'add-on'
											),
											'operator' => 'NOT IN'
										)
									)
							    );
							    $query = new WP_Query($args);

							    if($query->have_posts()) : ?>

								<h2>Bike Racks and Hardware</h2>
								<div class="product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						<?php endif; ?>

						<?php if( has_term('camp-and-adventure-gear', 'product_cat') ) : ?>

							<?php

							    $args = array(
							        'post_type' => 'product',
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'camp-and-adventure-gear',
											),
										),
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'bundled-simple',
												'bundled-variable',
												'add-on'
											),
											'operator' => 'NOT IN'
										)
									)
							    );
							    $query = new WP_Query($args);

							    if($query->have_posts()) : ?>

								<h2>Camp and Adventure Gear</h2>
								<div class="product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						<?php endif; ?>

						<?php if( has_term('guidebooks-and-maps', 'product_cat') ) : ?>

							<?php

							    $args = array(
							        'post_type' => 'product',
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'guidebooks-and-maps',
											),
										),
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array(
												'bundled-simple',
												'bundled-variable',
												'add-on'
											),
											'operator' => 'NOT IN'
										)
									)
							    );
							    $query = new WP_Query($args);

							    if($query->have_posts()) : ?>

								<h2>Guidebooks and Maps</h2>
								<div class="product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

				<?php if( $term_parent = 'swift-designs' ) : ?>

					<?php if( has_term('saddle-bags', 'product_cat') ) : ?>

						<div class="readymade-products <?php echo $term_slug; ?>">

							<h3>ReadyMade</h3>
							<?php the_field('readymade_description', 3223); ?>
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											$term_slug,
											'readymade',
										),
										'operator' => 'AND',
									),
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											'bundled-simple',
											'bundled-variable',
											'add-on'
										),
										'operator' => 'NOT IN'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()) : ?>

								<div class="taxonomy-product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						</div>

						<div class="custom-products <?php echo $term_slug; ?>">

							<h3>Custom</h3>
							<?php the_field('custom_description', 3223); ?>
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											$term_slug,
											'custom',
										),
										'operator' => 'AND',
									),
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											'bundled-simple',
											'bundled-variable',
											'add-on'
										),
										'operator' => 'NOT IN'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()) : ?>

								<div class="taxonomy-product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						</div>

					<?php elseif( has_term('randonneur-bags', 'product_cat') ) : ?>

						<div class="readymade-products <?php echo $term_slug; ?>">

							<h3>ReadyMade</h3>
							<?php the_field('readymade_description', 3223); ?>
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											$term_slug,
											'readymade',
										),
										'operator' => 'AND',
									),
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											'bundled-simple',
											'bundled-variable',
											'add-on'
										),
										'operator' => 'NOT IN'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()) : ?>

								<div class="taxonomy-product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						</div>

						<div class="custom-products <?php echo $term_slug; ?>">

							<h3>Custom</h3>
							<?php the_field('custom_description', 3223); ?>
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											$term_slug,
											'custom',
										),
										'operator' => 'AND',
									),
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											'bundled-simple',
											'bundled-variable',
											'add-on'
										),
										'operator' => 'NOT IN'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()) : ?>

								<div class="taxonomy-product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						</div>

					<?php elseif( has_term('panniers', 'product_cat') ) : ?>

						<div class="readymade-products <?php echo $term_slug; ?>">

							<h3>ReadyMade</h3>
							<?php the_field('readymade_description', 3223); ?>
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											$term_slug,
											'readymade',
										),
										'operator' => 'AND',
									),
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											'bundled-simple',
											'bundled-variable',
											'add-on'
										),
										'operator' => 'NOT IN'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()) : ?>

								<div class="taxonomy-product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						</div>

						<div class="custom-products <?php echo $term_slug; ?>">

							<h3>Custom</h3>
							<?php the_field('custom_description', 3223); ?>
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											$term_slug,
											'custom',
										),
										'operator' => 'AND',
									),
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											'bundled-simple',
											'bundled-variable',
											'add-on'
										),
										'operator' => 'NOT IN'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()) : ?>

								<div class="taxonomy-product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						</div>

					<?php elseif( has_term('porteur-bags', 'product_cat') ) : ?>

						<div class="custom-products <?php echo $term_slug; ?>">

							<h3>Custom</h3>
							<?php the_field('custom_description', 3223); ?>
							<?php

							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											$term_slug,
											'custom',
										),
										'operator' => 'AND',
									),
									array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => array(
											'bundled-simple',
											'bundled-variable',
											'add-on'
										),
										'operator' => 'NOT IN'
									)
								)
							);
							$query = new WP_Query($args);

							if($query->have_posts()) : ?>

								<div class="taxonomy-product-portal-row">
									<?php while($query->have_posts()) : ?>

										<?php $query->the_post(); ?>

										<div class="product-portal">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('portal-mobile'); ?>
												<h3><?php the_title(); ?></h3>
											</a>
										</div>

									<?php endwhile; ?>
								</div>

							<?php endif; ?>

						</div>

					<?php endif; ?>




				<?php endif; ?>

			</div>

		<?php elseif(($parent->term_id=="") && (sizeof($children)>0)) : ?>

			<!-- echo 'no parent, has child'; -->

			<div class="taxonomy-banner-image">

				<?php $mobile = wp_get_attachment_image_src( get_field( 'adventure-store', 3223 ), 'product-banner-mobile' ); ?>
				<?php $tablet = wp_get_attachment_image_src( get_field( 'adventure-store', 3223 ), 'product-banner-tablet' ); ?>
				<?php $desktop = wp_get_attachment_image_src( get_field( 'adventure-store', 3223 ), 'product-banner-desktop' ); ?>
				<?php $retina = wp_get_attachment_image_src( get_field( 'adventure-store', 3223 ), 'product-banner-retina' ); ?>

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

			<div class="product-taxonomies">

					<?php
		   	 			$prod_categories = get_terms( 'product_cat', array(
		   	 				'orderby' => 'name',
		   	 				'order' => 'ASC',
		   	 				'parent' => $term->term_id,
		   	 				'hide_empty' => 1
		   	 			)); ?>

		   	 			<?php foreach( $prod_categories as $prod_cat ) :
		   	 				$cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
		   	 				$cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
		   	 				$term_link = get_term_link( $prod_cat, 'product_cat' );
		   	 			?>

						<div class="taxonomy-product-portal-row">

							<h2><?php echo $prod_cat->name; ?></h2>
							<?php echo do_shortcode('[product_category category="' . $prod_cat->name . '"]'); ?>

						</div>

		   	 		<?php endforeach; wp_reset_query(); ?>

			</div>

		<?php endif; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
