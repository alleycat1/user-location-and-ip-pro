<?php
/**
 * Main function for getting the user's details.
 */

if (!defined("ABSPATH")) {
    exit(); // Exit if accessed directly.
}
require_once USER_LOCATION_AND_IP_INC_PATH . "class.IP.php";
require_once USER_LOCATION_AND_IP_INC_PATH . "class.Browser.php";

function user_location_and_ip($atts)
{
    extract(
        shortcode_atts(
            [
                "type" => [" "],
                "height" => "auto",
                "width" => "50px",
                "vertical_align" => "baseline",
            ],
            $atts
        )
    );
    if($type){
        $type = strtolower($type);
    }

    if ("ip" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_ip();
    } elseif ("continent" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_continent();
    } elseif ("country" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_country();
    } elseif ("countrycode" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_countrycode();
    } elseif ("region" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_region();
    } elseif ("regionname" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_regionname();
    } elseif ("city" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_city();
    } elseif ("lat" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_lat();
    } elseif ("lon" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_lon();
    } elseif ("timezone" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_timezone();
    } elseif ("currency" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_currency();
    } elseif ("isp" == $type) {
        $ip = new User_Location_and_IP();
        return $ip->get_isp();
    } elseif ("browser" == $type) {
        $ip = new User_Browser();
        return $ip->get_browser_name();
    } elseif ("os" == $type) {
        $ip = new User_Browser();
        return $ip->get_operating_system();
    }  elseif ("flag" == $type) {
        $ip = new User_Location_and_IP();
        $flag_country = ($ip->get_flag()) ?: "us";
        $flag = plugins_url().'/'.explode('/', plugin_basename( __file__ ))[0].'/flags/'.strtolower($flag_country).'.png';
        $ip_flag = '<img src="'.$flag.'" style="height:'.$height.'!important; width:'.$width.'!important;vertical-align:'.$vertical_align.'!important;" >';
        return $ip_flag;
    } else {
        return "<p>Invalid type</p>";
    }
}
add_shortcode("useriploc", "user_location_and_ip"); // Add the shortcode.
