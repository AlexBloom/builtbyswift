<?php
/**
 * Swift Industries functions and definitions
 *
 * @package Swift Industries
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'swift_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function swift_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Swift Industries, use a find and replace
	 * to change 'Swift Industries' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'swiftindustries', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'left' => __( 'Left of logo', 'swiftindustries' ),
		'right' => __( 'Right of logo', 'swiftindustries' ),
		'shop-footer' => __( 'Footer Shop Navigation', 'swiftindustries'),
		'support-footer' => __( 'Footer Support Navigation', 'swiftindustries'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // swift_setup
add_action( 'after_setup_theme', 'swift_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function swift_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'swiftindustries' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'swift_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function swift_scripts() {
	wp_enqueue_style( 'swift-style', get_stylesheet_directory_uri() . '/css/style.css', false, filemtime(get_stylesheet_directory() . '/css/style.css') );

	wp_enqueue_script( 'swift-site-scripts', get_template_directory_uri() . '/js/site-scripts.js', array(), '20130115', true );

	wp_enqueue_script( 'swift-jQuery', '//code.jquery.com/ui/1.11.4/jquery-ui.js', false, true );

	wp_enqueue_script( 'swift-pictureFill', get_template_directory_uri() . '/js/pictureFill.js', array(), '20130115', true );

	wp_enqueue_script( 'swift-matchHeight', get_template_directory_uri() . '/js/matchHeight.min.js', array(), '20130115', true );

	wp_enqueue_script( 'swift-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20130115', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'swift_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Declare Woocommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_image_size( 'portal-mobile', '480', '360', 'true' );
add_image_size( 'portal-tablet', '768', '576', 'true' );
add_image_size( 'portal-desktop', '1280', '960', 'true' );
add_image_size( 'portal-retina', '2400', '1800', 'true' );

add_image_size( 'story-portal-mobile', '480', '300', 'true' );
add_image_size( 'story-portal-tablet', '768', '230', 'true' );
add_image_size( 'story-portal-desktop', '2000', '600', 'true' );

add_image_size( 'product-banner-mobile', '480', '315', 'true' );
add_image_size( 'product-banner-tablet', '768', '307', 'true' );
add_image_size( 'product-banner-desktop', '1280', '512', 'true' );
add_image_size( 'product-banner-retina', '2000', '800', 'true' );

// Remove Woo styling
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_role('dealer', 'Dealer', array(
    'read' => true, // True allows that capability
    'edit_posts' => true,
    'delete_posts' => false, // Use false to explicitly deny
));

// Force price to show on variation products
add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {
if ($value['price_html'] == '') {
$value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
}
return $value;
}, 10, 3);

/**
 * TypeKit Fonts
 */
function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/vmv6ysj.js');
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
  	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'theme_typekit_inline' );

// Disable reviews on products
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

// Swift Logo on login
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a {
		background-image: url('.get_bloginfo('template_directory').'/images/swift_login_logo.png) !important;
		background-size: 150px !important;
		height: 150px;
		width: 150px !important;
	}
	</style>';
}
add_action('login_head', 'custom_login_logo');

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Built by Swift';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

add_filter( 'woocommerce_bundles_optional_bundled_item_suffix', 'wc_pb_remove_optional_suffix', 10, 3 );
function wc_pb_remove_optional_suffix( $suffix, $bundled_item, $bundle ) {
	return '';
}

/**
 * Add custom status to order list
 */
add_action( 'init', 'register_custom_post_status', 10 );
function register_custom_post_status() {
	register_post_status( 'wc-backorder', array(
		'label'                     => _x( 'Back Order', 'Order status', 'woocommerce' ),
		'public'                    => true,
		'exclude_from_search'       => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Back Order <span class="count">(%s)</span>', 'Back Order <span class="count">(%s)</span>', 'woocommerce' )
	) );

}

/**
 * Add custom status to order page drop down
 */
add_filter( 'wc_order_statuses', 'custom_wc_order_statuses' );
function custom_wc_order_statuses( $order_statuses ) {
	$order_statuses['wc-backorder'] = _x( 'Back Order', 'Order status', 'woocommerce' );
	return $order_statuses;
}

/**
 * Add order status icon CSS
 */
add_action('admin_head', 'backorder_font_icon');

function backorder_font_icon() {
  echo '<style>
			.widefat .column-order_status mark.backorder:after{
				font-family:WooCommerce;
				speak:none;
				font-weight:400;
				font-variant:normal;
				text-transform:none;
				line-height:1;
				-webkit-font-smoothing:antialiased;
				margin:0;
				text-indent:0;
				position:absolute;
				top:0;
				left:0;
				width:100%;
				height:100%;
				text-align:center;
			}

			.widefat .column-order_status mark.backorder:after{
				content:"\e012";
				color:#ff0000;
			}
  </style>';
}

add_action('admin_menu', 'add_custom_post_menu');

function add_custom_post_menu(){
     add_submenu_page( 'edit.php?post_type=shop_order', 'test', $menu_title, $capability, $menu_slug, $function);
}

/**
* Change the test for "In Stock / Quantity Left / Out of Stock".
*/

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
	if( ! current_user_can('customer') && has_term('readymade','product_cat') ) {
		global $product;

			// Change In Stock Text
		if ( $_product->is_in_stock() ) {
		    $availability['availability'] = __('In stock', 'woocommerce');
		}

		// Change in Stock Text to only 1 or 2 left
		if ( $_product->is_in_stock() && $product->get_stock_quantity() <= 5 ) {
			$availability['availability'] = sprintf( __('Stock low', 'woocommerce'), $product->get_stock_quantity());
		}

		// Change Out of Stock Text
		if ( ! $_product->is_in_stock() ) {
			$availability['availability'] = __('Out of stock', 'woocommerce');
		}

		return $availability;
	}
}

/**
 * Apply a different tax rate based on the user role.
 */
function wc_diff_rate_for_user( $tax_class, $product ) {
	if ( is_user_logged_in() && current_user_can( 'dealer' ) ) {
		$tax_class = 'Zero Rate';
	}

	return $tax_class;
}
add_filter( 'woocommerce_product_tax_class', 'wc_diff_rate_for_user', 1, 2 );

// Charge Tax for Local Pickup
add_filter( 'woocommerce_apply_base_tax_for_local_pickup', '__return_false' );

// Add Google Analytics
add_action('wp_footer', 'google_analytics_script');
function google_analytics_script() { ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-21808495-1', 'auto');
	  ga('send', 'pageview');

	</script>
<?php } ?>
