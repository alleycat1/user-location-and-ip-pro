<?php
/**
* Plugin Name: User Location and IP
* Plugin URI: https://mytechtalky.com/
* Version: 1.6
* Author: MyTechTalky
* Author URI: https://mytechtalky.com/author/sunny/
* Description: This plugin allows you to insert a user's IP address, location, ISP, city, country, and country flag and various other informations in your WordPress blog posts, pages and widgets with simple shortcodes.
* License: GPLv2
* Requires PHP: 5.4
 * Tested up to: 6.1
* Text Domain: user-location-and-ip
*/

defined( 'ABSPATH') or die( 'No Access Allowed...' );


#Define Constants for the plugin
define( 'USER_LOCATION_AND_IP_PLUGIN_URL',              plugin_dir_url( __FILE__ ) );
define( 'USER_LOCATION_AND_IP_PLUGIN_PATH',             plugin_dir_path( __FILE__ ) );
define( 'USER_LOCATION_AND_IP_PLUGIN_BASENAME',         plugin_basename( __FILE__ ) );
define( 'USER_LOCATION_AND_IP_ADMIN_PATH',              USER_LOCATION_AND_IP_PLUGIN_PATH . 'admin/' );
define( 'USER_LOCATION_AND_IP_INC_PATH',                USER_LOCATION_AND_IP_PLUGIN_PATH . 'inc/' );
define( 'USER_LOCATION_AND_IP_FLAGS',                   plugin_dir_url( __FILE__ ) . 'flags/' );
define( 'USER_LOCATION_AND_IP_CSS_PATH',                USER_LOCATION_AND_IP_PLUGIN_PATH . 'assets/css/' );
define( 'USER_LOCATION_AND_IP_VERSION',                 '1.5' );


#Load the plugin
function user_location_and_ip_load() {
    if ( current_user_can( 'activate_plugins' ) ) {
        require_once USER_LOCATION_AND_IP_ADMIN_PATH . 'user-ip-admin.php';
    }
}
add_action( 'plugins_loaded', 'user_location_and_ip_load' );

#Load functions and classes
require USER_LOCATION_AND_IP_INC_PATH . 'user-ip-functions.php';

#Registering activation hook
register_activation_hook( __FILE__, 'user_location_and_ip_activation' );

function user_location_and_ip_activation() {
    set_transient( 'user-location-and-ip-activate', true, 5 );
}

add_action( 'admin_notices', 'user_location_and_ip_activation_notice' );

function user_location_and_ip_activation_notice() {
    if ( get_transient( 'user-location-and-ip-activate' ) ) { ?>
        <div class="updated notice is-dismissible">
            <p><?php _e( 'User IP and Location is activated. Please go to the <a href="admin.php?page=user-location-and-ip">User Location and IP</a> page to configure the plugin.', 'user-location-and-ip' ); ?></p>
        </div>
        <?php delete_transient( 'user-location-and-ip-activate' );
    }
}
?>
