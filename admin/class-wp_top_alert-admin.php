<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://novintech.info
 * @since      1.0.0
 *
 * @package    Wp_top_alert
 * @subpackage Wp_top_alert/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_top_alert
 * @subpackage Wp_top_alert/admin
 * @author     novintech <novintech.info24@gmail.com>
 */
class Wp_top_alert_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_top_alert_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_top_alert_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp_top_alert-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_top_alert_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_top_alert_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 
		wp_enqueue_script( 'wp-color-picker' );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_top_alert-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function wpa_admin_menus()
	{

	    add_options_page(
	        __('WP Top Alert', 'wp_top_alert'),
	        __('WP Top Alert', 'wp_top_alert'), 
	        'manage_options',
	        'wpa_alert_settings',
	        array( $this, 'wpa_alert_settings_function' )
	   );

	}

	public function wpa_alert_settings_function()
	{
	    echo '<form action="options.php" method="post" class="form-setting">';

        do_settings_sections('wpa_alert_settings');

        settings_fields( 'wpa_alert_settings_group' );

        submit_button();

        echo '</form>';
	}

	public function wpa_admin_init()
	{
	    require_once plugin_dir_path(__FILE__) . 'partials/wpa_settings_patials.php';
	}
	
	function wpa_settings_link( array $links ) {
        $url = get_admin_url() . "admin.php?page=wpa_alert_settings";
        $settings_link = '<a href="'.$url.'">' . __('Settings', 'textdomain') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }


}
