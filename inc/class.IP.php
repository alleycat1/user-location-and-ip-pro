<?php
/**
 * IP Class for getting the user's IP address and location.
 */

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly.
    
}

if (!class_exists('User_Location_and_IP'))
{
    class User_Location_and_IP
    {

        public function get_ip()
        {
            $ip = $this->get_ip_address();
            return $ip;
        }

        private function get_ip_address()
        {
            $client = @$_SERVER["HTTP_CF_CONNECTING_IP"];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $a = @$_SERVER['HTTP_X_FORWARDED'];
            $b = @$_SERVER['HTTP_FORWARDED_FOR'];
            $c = @$_SERVER['HTTP_FORWARDED'];
            $d = @$_SERVER['HTTP_CLIENT_IP'];
            $remote = @$_SERVER['REMOTE_ADDR'];
            if (filter_var($client, FILTER_VALIDATE_IP))
            {
                $ip = $client;
            }
            elseif (filter_var($forward, FILTER_VALIDATE_IP))
            {
                $ip = $forward;
            }
            elseif (filter_var($a, FILTER_VALIDATE_IP))
            {
                $ip = $a;
            }
            elseif (filter_var($b, FILTER_VALIDATE_IP))
            {
                $ip = $b;
            }
            elseif (filter_var($c, FILTER_VALIDATE_IP))
            {
                $ip = $c;
            }
            elseif (filter_var($d, FILTER_VALIDATE_IP))
            {
                $ip = $d;
            }
            elseif (filter_var($remote, FILTER_VALIDATE_IP))
            {
                $ip = $remote;
            }
            else
            {
                $ip = '';
            }
            return $ip;
        }

        public function get_continent()
        {
            $ip = $this->get_ip_address();
            $ip_continent = $this->get_ip_continent($ip);
            return $ip_continent;
        }

        private function get_ip_continent($ip)
        {
            $ip_continent = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['continent']))
                {
                    $ip_continent = $response_body['continent'];
                }
            }
            return $ip_continent;
        }

        public function get_country()
        {
            $ip = $this->get_ip_address();
            $ip_country = $this->get_ip_country($ip);
            return $ip_country;
        }

        private function get_ip_country($ip)
        {
            $ip_country = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['country']))
                {
                    $ip_country = $response_body['country'];
                }
            }
            return $ip_country;
        }

        public function get_countrycode()
        {
            $ip = $this->get_ip_address();
            $ip_countrycode = $this->get_ip_countrycode($ip);
            return $ip_countrycode;
        }

        private function get_ip_countrycode($ip)
        {
            $ip_countrycode = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['countryCode']))
                {
                    $ip_countrycode = $response_body['countryCode'];
                }
            }
            return $ip_countrycode;
        }

        public function get_region()
        {
            $ip = $this->get_ip_address();
            $ip_region = $this->get_ip_region($ip);
            return $ip_region;
        }

        private function get_ip_region($ip)
        {
            $ip_region = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['region']))
                {
                    $ip_region = $response_body['region'];
                }
            }
            return $ip_region;
        }

        public function get_regionName()
        {
            $ip = $this->get_ip_address();
            $ip_regionName = $this->get_ip_regionName($ip);
            return $ip_regionName;
        }

        private function get_ip_regionName($ip)
        {
            $ip_regionName = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['regionName']))
                {
                    $ip_regionName = $response_body['regionName'];
                }
            }
            return $ip_regionName;
        }

        public function get_city()
        {
            $ip = $this->get_ip_address();
            $ip_city = $this->get_ip_city($ip);
            return $ip_city;
        }

        private function get_ip_city($ip)
        {
            $ip_city = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['city']))
                {
                    $ip_city = $response_body['city'];
                }
            }
            return $ip_city;
        }

        public function get_lat()
        {
            $ip = $this->get_ip_address();
            $ip_lat = $this->get_ip_lat($ip);
            return $ip_lat;
        }

        private function get_ip_lat($ip)
        {
            $ip_lat = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['lat']))
                {
                    $ip_lat = $response_body['lat'];
                }
            }
            return $ip_lat;
        }

        public function get_lon()
        {
            $ip = $this->get_ip_address();
            $ip_lon = $this->get_ip_lon($ip);
            return $ip_lon;
        }

        private function get_ip_lon($ip)
        {
            $ip_lon = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['lon']))
                {
                    $ip_lon = $response_body['lon'];
                }
            }
            return $ip_lon;
        }

        public function get_timezone()
        {
            $ip = $this->get_ip_address();
            $ip_timezone = $this->get_ip_timezone($ip);
            return $ip_timezone;
        }

        private function get_ip_timezone($ip)
        {
            $ip_timezone = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['timezone']))
                {
                    $ip_timezone = $response_body['timezone'];
                }
            }
            return $ip_timezone;
        }

        public function get_currency()
        {
            $ip = $this->get_ip_address();
            $ip_currency = $this->get_ip_currency($ip);
            return $ip_currency;
        }

        private function get_ip_currency($ip)
        {
            $ip_currency = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['currency']))
                {
                    $ip_currency = $response_body['currency'];
                }
            }
            return $ip_currency;
        }

        public function get_isp()
        {
            $ip = $this->get_ip_address();
            $ip_isp = $this->get_ip_isp($ip);
            return $ip_isp;
        }

        private function get_ip_isp($ip)
        {
            $ip_isp = '';
            $url = 'http://ip-api.com/json/' . $ip . '?fields=status,continent,country,countryCode,region,regionName,city,lat,lon,timezone,currency,isp';
            $response = wp_remote_get($url);
            if (is_array($response))
            {
                $response_body = $response['body'];
                $response_body = json_decode($response_body, true);
                if (isset($response_body['isp']))
                {
                    $ip_isp = $response_body['isp'];
                }
            }
            return $ip_isp;
        }

        public function get_flag()
        {
            $ip = $this->get_ip_address();
            $ip_flag = $this->get_ip_flag($ip);
            return $ip_flag;
        }

        private function get_ip_flag($ip)
        {
            $ip = $this->get_ip_address();
            $flag_country = $this->get_countryCode($ip);
            return $flag_country;
            
        }


    }
}

