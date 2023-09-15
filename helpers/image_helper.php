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
     * @param string      $url
     * @param int|null    $width
     * @param int|null    $height
     * @param string|null $server
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 37:48
     */
    function google_image_resize($url = '', $width = 100, $height = null, $server = 'images1')
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::googleGadgetsProxy($url, $width, $height, $server);
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
if (!function_exists('bear_framework_image_url')) {
    /**
     * Function bear_framework_image_url
     *
     * @param $input
     * @param $server
     * @param $base
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/06/2022 54:18
     */
    function bear_framework_image_url($input = '', $server = '', $base = 'live')
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::formatImageUrl($input, $server, $base);
    }
}
if (!function_exists('bear_framework_create_image_thumbnail')) {
    /**
     * Function bear_framework_create_image_thumbnail
     *
     * @param $url
     * @param $width
     * @param $height
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/09/2023 57:40
     */
    function bear_framework_create_image_thumbnail($url = '', $width = 100, $height = 100)
    {
        return create_image_thumbnail($url, $width, $height);
    }
}
if (!function_exists('create_image_thumbnail')) {
    /**
     * Function create_image_thumbnail
     *
     * @param $url
     * @param $width
     * @param $height
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/09/2023 50:33
     */
    function create_image_thumbnail($url = '', $width = 100, $height = 100)
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::createThumbnail($url, $width, $height);
    }
}
if (!function_exists('bear_framework_create_image_thumbnail_with_cache')) {
    /**
     * Function bear_framework_create_image_thumbnail_with_cache
     *
     * @param $url
     * @param $width
     * @param $height
     *
     * @return mixed|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 25/02/2023 27:49
     */
    function bear_framework_create_image_thumbnail_with_cache($url = '', $width = 100, $height = 100)
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::createThumbnailWithCodeIgniterCache($url, $width, $height);
    }
}
