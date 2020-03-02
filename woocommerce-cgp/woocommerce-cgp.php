<?php

/**
 * Plugin Name: WooCommerce CGP
 * Plugin URI: https://github.com/alexeyartisan/woocommerce-cgp-plugin
 * Description: Тестовое задание для компании CGP
 * Version: 1.0.0
 * Author: Alexey Stetsyura
 * Author URI: https://github.com/alexeyartisan/
 * Developer: Alexey Stetsyura
 * Developer URI: https://github.com/alexeyartisan/
 * Text Domain: woocommerce-cgp
 *
 * WC requires at least: 3.9.2
 * WC tested up to: 3.9.2
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	echo "Access denied.";
    exit;
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	// Setup

	define( 'WOOCGP_PLUGIN_URL', __FILE__ );

	// Includes

	require( 'includes/admin/coupons.php' );
	require( 'includes/activate.php' );
	require( 'includes/admin/init.php' );
	require( 'includes/admin/menu.php' );
	require( 'includes/admin/options-page.php' );
	require( 'includes/admin/statistics-page.php' );
	require( 'includes/process/save-options.php' );

	require( 'includes/front/discount-selection.php' );
	require( 'includes/front/footer-init.php' );
	require( 'includes/front/front-cookie.php' );
	require( 'includes/front/cart-coupon.php' );
	require( 'includes/front/enqueue.php' );


	// Hooks

	register_activation_hook( __FILE__, 'woocgp_activate_plugin' );
	add_action( 'admin_menu', 'woocgp_admin_menu' );
	add_action( 'admin_init', 'woocgp_admin_init' );

	add_action( 'wp_enqueue_scripts', 'woocgp_enqueue_scripts' );
	add_action( 'wp_footer', 'woocgp_footer_init' );
	add_action( 'init', 'woocgp_set_visit_cookie', 50 );
	add_action( 'woocommerce_before_cart', 'woocgp_apply_matched_coupons' );

}