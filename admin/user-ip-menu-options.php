<?php
/**
 * User IP and Location Admin File for Creating Menu Content
 */

 if ( ! defined( 'ABSPATH' ) ) {
     exit; // Exit if accessed directly.
 }

 function user_location_and_ip_settings_page(){ ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">User Location and IP</h1>
            <p class="description">
            Using this plugin, you can display the IP address and location of your website visitors anywhere on your website.
            </p>
            <hr class="wp-header-end">
            <div class="user-ip-container">
              <h3 class="user-ip-title">Shortcodes for Displaying User IP and Location</h3>
              <ul style="display: block; list-style-type: disc; padding-inline-start: 40px;">
                <li><strong>Display IP:</strong> [useriploc type="ip"]</li>
                <li><strong>Display Continent Name:</strong> [useriploc type="continent"]</li>
                <li><strong>Display Country Name:</strong> [useriploc type="country"]</li>
                <li><strong>Display Country Code:</strong> [useriploc type="countrycode"]</li>
                <li><strong>Display Region:</strong> [useriploc type="region"]</li>
                <li><strong>Display Region Name:</strong> [useriploc type="regionname"]</li>
                <li><strong>Display City:</strong> [useriploc type="city"]</li>
                <li><strong>Display Latitude:</strong> [useriploc type="lat"]</li>
                <li><strong>Display Longitude:</strong> [useriploc type="lon"]</li>
                <li><strong>Display Timezone:</strong> [useriploc type="timezone"]</li>
                <li><strong>Display Currency:</strong> [useriploc type="currency"]</li>
                <li><strong>Display ISP Information:</strong> [useriploc type="isp"]</li>
                <li><strong>Display Browser Name:</strong> [useriploc type="browser"]</li>
                <li><strong>Display Operating System:</strong> [useriploc type="os"]</li>
                <li><strong>Display Country Flag:</strong> [useriploc type="flag" height="auto" width="50px" vertical_align="baseline"]</li>
              </ul>
              <p>For support and queries, you can visit our <a href="https://wordpress.org/plugins/user-location-and-ip/">WordPress.org plugin page here</a>...</p>
            </div>
            
        </div>
<?php }
