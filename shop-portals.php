<div class="collection-row">
	<?php

		$args = array(
			'post_type' => 'product',
			'posts_per_page'=> -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => 'carbon-glacier-collection',
				),
			)
		);
		$query = new WP_Query($args);

		if($query->have_posts()) : ?>

		<h1 class="collection-title"><a href="/product-category/carbon-glacier-collection/">Carbon Glacier</a></h1>
		<h4>Where the mountain meets the sky: an homage to Mount Rainier.</h4>

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

<div class="collection-row">
	<?php

		$args = array(
			'post_type' => 'product',
			'posts_per_page'=> -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => 'hinterland-collection',
				),
			)
		);
		$query = new WP_Query($args);

		if($query->have_posts()) : ?>

		<h1 class="collection-title"><a href="/product-category/hinterland-collection/">Hinterland</a></h1>
		<h4>Push to the outskirts with our X-Pac<sup>(tm)</sup> adventure baggage and accessories</h4>

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

<div class="collection-row">
	<?php

		$args = array(
			'post_type' => 'product',
			'posts_per_page'=> -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => 'customizable-baggage',
				),
			)
		);
		$query = new WP_Query($args);

		if($query->have_posts()) : ?>

		<h1 class="collection-title"><a href="/product-category/customizable-baggage/">Customizable Baggage</a></h1>
		<h4>Design your own. Choose your colors and features.</h4>

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

<div class="collection-row">
	<?php

		$args = array(
			'post_type' => 'product',
			'posts_per_page'=> -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => 'readymade-bags',
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

		<h1 class="collection-title"><a href="/product-category/readymade-bags/">ReadyMade Baggage</a></h1>
		<h4>See what else is in stock and ready-to-go!</h4>

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

<script>
	jQuery(document).ready(function(){

		jQuery('.adventure-slider').slick({
			arrows: true,
			dots: false,
			autoplay: false,
			mobileFirst: true,
		    lazyLoad: 'ondemand',
			responsive: [
				{
			  		breakpoint: 1024,
			  		settings: {
						centered: true,
						infinite: true,
						slidesToScroll: 1,
					    slidesToShow: 4,
			  		}
				},
				{
					breakpoint: 480,
					settings: {
					    slidesToScroll: 1,
						slidesToShow: 1,
			  		}
				}
			]
		});

	});

</script>

<div class="collection-row">
	<h1 class="collection-title"><a href="/product-category/adventure-store/">Adventure Store</a></h1>
	<h4>Gear up for your next adventure with our top picks.</h4>

	<div class="adventure-slider">
		<?php

			$args = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => 'swift-picks'
					),
					array(
						'taxonomy' => 'product_cat',
						'field' => 'slug',
						'terms' => array(
							'bundled-simple',
							'bundled-variable',
							'set',
							'each',
						),
						'operator' => 'NOT IN',
					),
				),
			);
			$query = new WP_Query($args);

			if($query->have_posts()) : ?>

				<?php while($query->have_posts()) : ?>

					<?php $query->the_post(); ?>
					<div class="slide product-portal">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						<a href="<?php the_permalink(); ?>"><h3><?php the_title() ?></h3></a>
					</div>

				<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>
