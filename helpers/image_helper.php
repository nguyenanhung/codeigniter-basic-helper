<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2021
 * Time: 01:07
 */
if (!function_exists('google_image_resize')) {
    /**
     * Function google_image_resize
     *
     * @param string $url
     * @param int    $width
     * @param null   $height
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 37:48
     */
    function google_image_resize($url = '', $width = 100, $height = NULL)
    {
        $proxyUrl       = 'https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy';
        $proxyContainer = 'focus';
        $proxyRefresh   = 2592000;
        // Start
        $params             = array();
        $params['url']      = $url;
        $params['resize_w'] = $width;
        if (!empty($height)) {
            $params['resize_h'] = $height;
        }
        $params['container'] = $proxyContainer;
        $params['refresh']   = $proxyRefresh;
        // Result URL
        $url = $proxyUrl . '?' . urldecode(http_build_query($params));

        return trim($url);
    }
}
if (!function_exists('wordpress_proxy')) {
    /**
     * Function wordpress_proxy
     *
     * @param string $imageUrl
     * @param string $server
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 38:04
     */
    function wordpress_proxy($imageUrl = '', $server = 'i3')
    {
        $imageUrl = str_replace('https://', '', $imageUrl);
        $imageUrl = str_replace('http://', '', $imageUrl);
        $imageUrl = str_replace('//', '', $imageUrl);
        $url      = 'https://' . trim($server) . '.wp.com/' . $imageUrl;

        return trim($url);
    }
}