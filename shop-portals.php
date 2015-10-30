<div class="product-portal-row">
	<?php

		$args = array(
			'post_type' => 'product',
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => 'hinterland',
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

		<h2 class="product-row-description"><?php the_field('collection_title', 886); ?></h2>
		<h1 class="collection-title"><a href="/product-category/hinterland/">Hinterland</a></h1>

		<section class="product-slider">

			  <?php while($query->have_posts()) : ?>

				<?php $query->the_post(); ?>

				<div class="slide">

					<div class="product-portal">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('portal-mobile'); ?>
							<h3><?php the_title(); ?></h3>
						</a>
					</div>

				</div>

			  <?php endwhile; ?>

		  </section>

	<?php endif; ?>

</div>

<div class="product-portal-row swift-designs">

	<h2 class="product-row-description"><a href="/swift-designs"><?php the_field('design_title', 886); ?></a></h2>

	<div class="product-slider">

		<?php $taxonomyName = "product_cat";
		//This gets top layer terms only.  This is done by setting parent to 0.
		  $parent_terms = get_terms($taxonomyName, array('parent' => 220, 'orderby' => 'slug', 'hide_empty' => false));

		  foreach ($parent_terms as $pterm) {

			  $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'thumbnail_id', true);
			  // get the image URL for parent category
			  $image = wp_get_attachment_url($thumbnail_id, 'portal-mobile');
			  // print the IMG HTML for parent category
			  echo "<div class='slide'>";
			  echo "<div class='product-portal'>";
			  echo '<a href="' . get_term_link($pterm->name, $taxonomyName) . '">';
			  echo "<img src='{$image}' alt='' />";
			  echo '<h3>'. $pterm->name . '</h3></a></div>';
			  echo '</div>';


		  } ?>

	</div>

</div>

<div class="product-portal-row">
	<?php

		$args = array(
			'post_type' => 'product',
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => 'general-store',
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

		<h2 class="product-row-description"><a href="/product-category/general-store"><?php the_field('adventure_title', 886); ?></a></h2>

		<section class="product-slider">

			  <?php while($query->have_posts()) : ?>

				<?php $query->the_post(); ?>

				<div class="slide">

					<div class="product-portal">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('portal-mobile'); ?>
							<h3><?php the_title(); ?></h3>
						</a>
					</div>

				</div>

			  <?php endwhile; ?>

		  </section>

	<?php endif; ?>

</div>
