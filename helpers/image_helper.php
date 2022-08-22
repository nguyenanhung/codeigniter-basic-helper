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
     * @param int|null $height
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
        $images_url = trim($input);
        if (function_exists('config_item') && !empty($images_url)) {
            $no_thumb = [
                'images/system/no_avatar.jpg',
                'images/system/no_avatar_100x100.jpg',
                'images/system/no_video_available.jpg',
                'images/system/no_video_available_thumb.jpg',
                'images/system/no-image-available.jpg',
                'images/system/no-image-available_60.jpg',
                'images/system/no-image-available_330.jpg'
            ];
            if (in_array($images_url, $no_thumb)) {
                return assets_url($images_url);
            }

            $parse_input = parse_url($images_url);
            if (isset($parse_input['host'])) {
                return $images_url;
            }
            if (trim(mb_substr($images_url, 0, 12)) === 'crawler-news') {
                $images_url = trim('uploads/' . $images_url);
            }
            $images_url  = str_replace(
                array('upload-vcms/news/news/', 'upload-vcms/mheath/mheath/'),
                array('upload-vcms/news/', 'upload-vcms/mheath/'),
                $images_url
            );

            return config_item('static_url') . $images_url;
        }

        return $images_url;
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
     * @return mixed|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/06/2022 03:06
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
     * @return mixed|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/06/2022 03:06
     */
    function create_image_thumbnail($url = '', $width = 100, $height = 100)
    {
        return nguyenanhung\CodeIgniter\BasicHelper\ImageHelper::createThumbnail($url, $width, $height);
    }
}
