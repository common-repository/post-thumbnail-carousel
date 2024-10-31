<?php
/*
Plugin Name: Post Thumbnail Carousel
Description: <strong>Post Thumbnail Carousel</strong> is a simple plugin which shows the post featured images in a sliding mode.
Author: Webackstop & Zakaria Binsaifullah
Author URI: https://webackstop.com
Version: 1.0.0
Text Domain: post-thumbnail-carousel
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:  /languages
*/

/**
 * Security Chcek
 */

if ( !defined( 'ABSPATH' ) ) {
	exit();
}


require_once plugin_dir_path( __FILE__ ) . 'shortcode.php';

/**
 * Plugin Text Domain 
 */

function ptc_plugins_textdomain() {
	load_plugin_textdomain( 'post-thumbnail-carousel', false, dirname( plugin_basename( __FILE__ ).'/languages' ) );
}
add_action( 'plugins_loaded', 'ptc_plugins_textdomain' );

/**
 * Admin Subpage
 */


function ptc_admin_subpage() {
	add_submenu_page( 'tools.php', __( 'Post Thumbnail Carousel','post-thumbnail-carousel' ),  __( 'Post Thumbnail Carousel','post-thumbnail-carousel' ), 'manage_options', 'ptc_carousel', 'ptc_subpage_callback' );
}
add_action( 'admin_menu', 'ptc_admin_subpage' );


// Subpage callback 

function ptc_subpage_callback() {
	?>

	<h3 style="border-bottom: 2px solid green; padding-bottom: 5px"><?php echo __( 'Thanks for using Post Thumbnail Carousel', 'post-thumbnail-carousel' ); ?></h3>

	<p><strong><?php echo __( 'Shortcode', 'post-thumbnail-carousel' ); ?></strong>: <input style="text-align: center" type="text" readonly value="[ptc_shortcode]"></p>

	<?php
}


/**
 * Plugin Assets
 */
function ptc_plugin_assets() {

	wp_enqueue_style( 'slick-css', plugins_url( 'assets/css/slick.css', __FILE__ ), array(), time(), 'all' );
	wp_enqueue_style( 'slick-theme', plugins_url( 'assets/css/slick-theme.css', __FILE__ ), array(), time(), 'all' );
	wp_enqueue_style('plugin-css', plugins_url( 'assets/css/plugin.css', __FILE__ ), array(), time(), 'all');
	
	wp_enqueue_script('slick-js', plugins_url( 'assets/js/slick.min.js', __FILE__ ), array('jquery'), time(), true);
	wp_enqueue_script('plugin-js', plugins_url( 'assets/js/plugin.js', __FILE__ ), array('jquery'), time(), true);
}

add_action( 'wp_enqueue_scripts', 'ptc_plugin_assets' );








