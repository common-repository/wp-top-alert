<?php

/**
 * Fired during plugin activation
 *
 * @link       https://novintech.info
 * @since      1.0.0
 *
 * @package    Wp_top_alert
 * @subpackage Wp_top_alert/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_top_alert
 * @subpackage Wp_top_alert/includes
 * @author     novintech <novintech.info24@gmail.com>
 */
class Wp_top_alert_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        
        $main = array( 
            'wpa_alert_status'      => 0,
            'wpa_alert_align'       => 'ltr',
            'wpa_alert_location'    => '1',
            'wpa_alert_bgColor'     => '#e89200',
            'wpa_alert_link_txt'    => __('Show', 'wp_top_alert'),
            'wpa_alert_txt'         => __('Alert main text', 'wp_top_alert'),
            'wpa_alert_txt_font_size'  => 16,
            'wpa_alert_link'        => 'Http://YourPage.com',
            'wpa_alert_link_bgColor'=> '#3fcc64'
        );

        foreach( $main as $key=>$value )
        {
            if( get_option($key) == FALSE )
				update_option($key, $value);
        }

	}

}
