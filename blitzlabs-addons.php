<?php
/** 
 * Plugin Name:       Blitzlabs addon
 * Plugin URI:        #
 * Description:       This plugin contains some exclusive section for elementor page builder. 
 * Version:           1.0.0
 * Author:            Felix002
 * Author URI:        https://www.fiverr.com/felix002
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bitzlabs
 * Domain Path:       /languages
*/



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class BlitzlabsAddon {

	const VERSION = "1.0.0";
	const MINIMUM_ELEMENTOR_VERSION = "2.0.0";
	const MINIMUM_PHP_VERSION = "7.0";

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	public function init() {
		//Textdomain
		load_plugin_textdomain( 'bitzlabs' );

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		add_action('elementor/elements/categories_registered', [$this, 'register_new_category']);

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );

			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );

			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );

			return;
		}
	}

	public function register_new_category($manager){
		$manager->add_category(
			'blitzlabsaddon',[
				'title' => __('Blitzlabs Addon', 'bitzlabs'),
				'icon' => 'fa fa-block'
			]
		);
	}


	public function init_widgets() {

		// Include Widget files
		require_once(__DIR__ . '/widgets/header.php');
		require_once(__DIR__ . '/widgets/hero.php');
		require_once(__DIR__ . '/widgets/service.php');
		require_once(__DIR__ . '/widgets/explore.php');
		require_once(__DIR__ . '/widgets/road-map.php');
		require_once(__DIR__ . '/widgets/meet-team.php');
		require_once(__DIR__ . '/widgets/join-us.php');
		require_once(__DIR__ . '/widgets/footer.php');

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \HeroSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Explore() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \RoadMap() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \MeetTeam() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \JoinUs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Footer() );

	}

	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bitzlabs' ),
			'<strong>' . esc_html__( 'Blitzlabs Addon', 'bitzlabs' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bitzlabs' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bitzlabs' ),
			'<strong>' . esc_html__( 'Blitzlabs Addon', 'bitzlabs' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bitzlabs' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bitzlabs' ),
			'<strong>' . esc_html__( 'Blitzlabs Addon', 'bitzlabs' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bitzlabs' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function includes() {
	}

}

BlitzlabsAddon::instance();