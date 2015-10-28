<?php
add_filter( 'woocommerce_breadcrumb_defaults', 'woocommerce_breadcrumbs' );
function woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( '', 'breadcrumb', 'woocommerce' ),
        );
} ?>

<section class="breadcrumbs-container">
	<div class="breadcrumbs">
		<?php do_action( 'woocommerce_before_main_content' ); ?>
	</div>
</section>
