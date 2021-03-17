<?php
/********************************************************************************************
 * Plugin Name: WDP IMAGE MAKER
 * Description: 
 * Version: 1.0.0
 * Text Domain: wd-product-subscription
 * Author: TEAM WORDPRESS DEEVELOPER PLANET
 * Plugin URI: https://www.wpdevplanet.com
 * Author URI: https://www.wpdevplanet.com
 *
 * 
 * You can contact the developers of this plugin, Team worpdressdeveloperplanet,  at email address info@wpdevplanet.com.
 *******************************************************************************************/
 error_reporting(1);
if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly
if ( ! class_exists( 'WDP_Js_Editor' ) ) :
	/**
	 * Main WDP_Js_Editor Class.
	 *
	 * @class WDP_Js_Editor Class
	 */
	class WDP_Js_Editor {
		public $version = '1.0.0';
		/**
		 * The single instance of the class.
		 *
		 * @var $_instance
		 */
		protected static $_instance = null;
		/**
		 * Main WDP_Js_Editor Instance.
		 *
		 * Ensures only one instance of WDP_Js_Editor is loaded or can be loaded.
		 *
		 * @static
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		/**
		 * WDP_Js_Editor Constructor.
		 */
		public function __construct() {
			$this->includes();
			$this->init_hooks();
		}
		/**
		 * Hook into actions and filters.
		 */
		private function init_hooks() {
			add_action( 'plugins_loaded', array( $this, 'init' ), 0 );
			//add_action( 'init', array( $this, 'wd_spec_seek_enqueue_scripts') );
		}
	
		/**
		 * Include required core files used in admin and on the frontend.
		 */
		public function includes() {

			
			include_once ( 'front-end.php' );
			include_once ( 'bajs.php' );
			include_once ( 'wd-shortcodes.php' );

		}
		/*
		public function wd_spec_seek_enqueue_scripts() {
		
		$oo_ls_assets = new OO_WD_Spec_Seek_Assets();
		}
		*/
		/**
		 * Init OO_WD_Spec_Seek when WordPress Initialises.
		 */
		public function init() {
				// Init action.
				do_action( 'wd_Product_Subscription_init' );
		}
		/**
		 * Get the plugin url.
		 * @return string
		 */
		public function plugin_url() {
			return untrailingslashit( plugins_url( '/', __FILE__ ) );
		}
		/**
		 * Get the plugin path.
		 * @return string
		 */
		public function plugin_path() {
			return untrailingslashit( plugin_dir_path( __FILE__ ) );
		}
		
	}
endif;
function wd_load_scripts() {
		//enque script
	wp_enqueue_script( 'wd-custom', plugin_dir_url( __FILE__ ) . 'js/wd-custom.js', array(), '1.0.0', true);
	wp_enqueue_script( 'wd-slick', plugin_dir_url( __FILE__ ) . 'js/slick.min.js', array(), '1.0.0', true);

	wp_enqueue_style('wd-main-design', plugin_dir_url( __FILE__ ) .'css/wd-main-style.css', array(),'0.1.0', 'all');
	wp_enqueue_style('wd-slick-design', plugin_dir_url( __FILE__ ) .'css/slick.css', array(),'0.1.0', 'all');

	wp_enqueue_style('ss-bootstrap-design', plugin_dir_url( __FILE__ ) .'css/bootstrap/bootstrap.min.css', array(),'0.1.0', 'all');
	wp_enqueue_style('ss-bootstrap2-design', plugin_dir_url( __FILE__ ) .'css/bootstrap/bootstrap.css', array(),'0.1.0', 'all');
	wp_enqueue_script( 'ss-jquery', plugin_dir_url( __FILE__ ) . 'js/jquery-3.2.1.min.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'wd_load_scripts' );
function wd_wp_head() {
    
    echo '<script>'
    . 'var WD_AJAX_URL = "' . admin_url('admin-ajax.php') . '";'
    . '</script>';
}
add_action("wp_head", "wd_wp_head");
function WDPJSEDITOR() {
	return WDP_Js_Editor::instance();
}
// Global for backwards compatibility.
$GLOBALS['wdp_js_editor'] = WDPJSEDITOR();
?>