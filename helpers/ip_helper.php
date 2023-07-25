<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2021
 * Time: 01:09
 */
if (!function_exists('getIPAddress')) {
    /**
     * Function getIPAddress
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:22
     */
    function getIPAddress($convertToInteger = false)
    {
        $ipKeys = array(
            0 => 'HTTP_CF_CONNECTING_IP',
            1 => 'HTTP_X_FORWARDED_FOR',
            2 => 'HTTP_X_FORWARDED',
            3 => 'HTTP_X_IPADDRESS',
            4 => 'HTTP_X_CLUSTER_CLIENT_IP',
            5 => 'HTTP_FORWARDED_FOR',
            6 => 'HTTP_FORWARDED',
            7 => 'HTTP_CLIENT_IP',
            8 => 'HTTP_IP',
            9 => 'REMOTE_ADDR'
        );

        foreach ($ipKeys as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if ($convertToInteger === true) {
                        return ip2long($ip);
                    }

                    return $ip;
                }
            }
        }

        if (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] === 'localhost') {
            return '127.0.0.1';
        }

        return false;
    }
}
if (!function_exists('getIPAddressByHaProxy')) {
    /**
     * Function getIPAddressByHaProxy
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:22
     */
    function getIPAddressByHaProxy($convertToInteger = false)
    {
        $key = 'HTTP_X_FORWARDED_FOR';
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if ($this->ipValidate($ip)) {
                    if ($convertToInteger === true) {
                        return ip2long($ip);
                    }

                    return $ip;
                }
            }
        }
        if (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] === 'localhost') {
            return '127.0.0.1';
        }

        return false;
    }
}
if (!function_exists('get_ip_by_ha_proxy')) {
    /**
     * Function get_ip_by_ha_proxy
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:22
     */
    function get_ip_by_ha_proxy($convertToInteger = false)
    {
        return getIPAddressByHaProxy($convertToInteger);
    }
}
if (!function_exists('get_ip_address_2017')) {
    /**
     * Function get_ip_address_2017
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:22
     */
    function get_ip_address_2017($convertToInteger = false)
    {
        return getIPAddress($convertToInteger);
    }
}
if (!function_exists('get_ip_address')) {
    /**
     * Function get_ip_address
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:22
     */
    function get_ip_address($convertToInteger = false)
    {
        return getIPAddress($convertToInteger);
    }
}
if (!function_exists('getUserIP')) {
    /**
     * Function getUserIP
     *
     * @param bool $convertToInteger
     *
     * @return bool|int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:22
     */
    function getUserIP($convertToInteger = false)
    {
        return getIPAddress($convertToInteger);
    }
}
if (!function_exists('validate_ip')) {
    /**
     * Function validate_ip
     *
     * @param $ip
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/02/2023 47:49
     */
    function validate_ip($ip)
    {
        return validateIP($ip);
    }
}
if (!function_exists('validateIP')) {
    /**
     * Function validateIP
     *
     * @param $ip
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:32
     */
    function validateIP($ip)
    {
        return !(filter_var($ip, FILTER_VALIDATE_IP) === false);
    }
}
if (!function_exists('validateIPV4')) {
    /**
     * Function validateIPV4
     *
     * @param $ip
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:36
     */
    function validateIPV4($ip)
    {
        return !(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false);
    }
}
if (!function_exists('validateIPV6')) {
    /**
     * Function validateIPV6
     *
     * @param $ip
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/09/2020 59:40
     */
    function validateIPV6($ip)
    {
        return !(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false);
    }
}
if (!function_exists('getIpInformation')) {
    /**
     * Function getIpInformation
     *
     * @param string $ip
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/10/2020 00:31
     */
    function getIpInformation($ip = '')
    {
        $isIP = empty($ip) ? getIPAddress() : $ip;

        try {
            $endpoint = 'http://ip-api.com/json/' . trim($isIP);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL            => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "GET",
                CURLOPT_POSTFIELDS     => "",
                CURLOPT_HTTPHEADER     => array(),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                $response = "cURL Error #:" . $err;
            }

            return $response;
        }
        catch (Exception $e) {
            if (function_exists('log_message')) {
                log_message('error', __get_error_message__($e));
                log_message('error', __get_error_trace__($e));
            }

            return $e->getMessage();
        }
    }
}
