<?php
/**
 * Browser Class for getting the user's browser details.
 */

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly.
    
}

if (!class_exists('User_Browser'))
{
    class User_Browser
    {
        public function __construct()
        {
            $this->browser_data = $this->get_browser_data();
        }
        private function get_browser_data()
        {
            $browser_user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
            return $browser_user_agent;
        }
        public function get_browser_name()
        {
            $browser_user_agent = $this->browser_data;
            $browser_name = $this->get_browser_name_from_user_agent($browser_user_agent);
            return $browser_name;
        }
        private function get_browser_name_from_user_agent($browser_user_agent)
        {
            $browser_name = 'Unknown';
            $browser_array = array(
                '/msie/i' => 'Internet Explorer',
                '/firefox/i' => 'Firefox',
                '/safari/i' => 'Safari',
                '/chrome/i' => 'Chrome',
                '/edge/i' => 'Edge',
                '/opera/i' => 'Opera',
                '/netscape/i' => 'Netscape',
                '/maxthon/i' => 'Maxthon',
                '/konqueror/i' => 'Konqueror',
                '/mobile/i' => 'Handheld Browser'
            );
            foreach ($browser_array as $regex => $value)
            {
                if (preg_match($regex, $browser_user_agent))
                {
                    $browser_name = $value;
                }
            }
            return $browser_name;
        }
        public function get_operating_system()
        {
            $browser_user_agent = $this->browser_data;
            $operating_system = $this->get_operating_system_from_user_agent($browser_user_agent);
            return $operating_system;
        }
        private function get_operating_system_from_user_agent($browser_user_agent)
        {
            $os_platform = "Unknown OS Platform";
            $os_array = array(
                '/windows nt 10/i' => 'Windows 10',
                '/windows nt 6.3/i' => 'Windows 8.1',
                '/windows nt 6.2/i' => 'Windows 8',
                '/windows nt 6.1/i' => 'Windows 7',
                '/windows nt 6.0/i' => 'Windows Vista',
                '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
                '/windows nt 5.1/i' => 'Windows XP',
                '/windows xp/i' => 'Windows XP',
                '/windows nt 5.0/i' => 'Windows 2000',
                '/windows me/i' => 'Windows ME',
                '/win98/i' => 'Windows 98',
                '/win95/i' => 'Windows 95',
                '/win16/i' => 'Windows 3.11',
                '/macintosh|mac os x/i' => 'Mac OS X',
                '/mac_powerpc/i' => 'Mac OS 9',
                '/linux/i' => 'Linux',
                '/ubuntu/i' => 'Ubuntu',
                '/iphone/i' => 'iPhone',
                '/ipod/i' => 'iPod',
                '/ipad/i' => 'iPad',
                '/android/i' => 'Android',
                '/blackberry/i' => 'BlackBerry',
                '/webos/i' => 'Mobile'
            );
            foreach ($os_array as $regex => $value)
            {
                if (preg_match($regex, $browser_user_agent))
                {
                    $os_platform = $value;
                }
            }
            return $os_platform;
        }
    }
}