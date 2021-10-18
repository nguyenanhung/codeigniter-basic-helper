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
     * @param string   $url
     * @param int      $width
     * @param null|int $height
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 37:48
     */
    function google_image_resize($url = '', $width = 100, $height = null)
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::googleGadgetsProxy($url, $width, $height);
    }
}
if (!function_exists('google_image_proxy_dns_prefetch')) {
    /**
     * Function google_image_proxy_dns_prefetch
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 36:03
     */
    function google_image_proxy_dns_prefetch()
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::googleGadgetsProxyDnsPrefetch();
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
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::wordpressProxy($imageUrl, $server);
    }
}
if (!function_exists('wordpress_proxy_dns_prefetch')) {
    /**
     * Function wordpress_proxy_dns_prefetch
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 36:15
     */
    function wordpress_proxy_dns_prefetch()
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::wordpressProxyDnsPrefetch();
    }
}
