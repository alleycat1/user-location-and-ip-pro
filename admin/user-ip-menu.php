<?php
/**
 * User IP and Location Admin File for Creating the Menu and Sub-Menus
 */

function user_location_and_ip_menu(){
    add_options_page( 'User Location and IP', 'User Location and IP', 'manage_options', 'user-location-and-ip', 'user_location_and_ip_settings_page' );
}
add_action( 'admin_menu', 'user_location_and_ip_menu' );