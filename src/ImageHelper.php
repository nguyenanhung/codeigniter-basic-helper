<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2021
 * Time: 01:07
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

use Exception;

/**
 * Class ImageHelper
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class ImageHelper extends BaseHelper
{
    /**
     * Function googleGadgetsProxyServer
     *
     * User: 713uk13m <dev@nguyenanhung.com>
     * Copyright: 713uk13m <dev@nguyenanhung.com>
     * @return string[]|array
     */
    public static function googleGadgetsProxyServerList()
    {
        return array('images1', 'images2', 'images3', 'images4', 'images5', 'images6', 'images7', 'images8', 'images9', 'images10');
    }

    /**
     * Function wordpressProxyProxyServerList
     *
     * User: 713uk13m <dev@nguyenanhung.com>
     * Copyright: 713uk13m <dev@nguyenanhung.com>
     * @return string[]|array
     */
    public static function wordpressProxyProxyServerList()
    {
        return array('i0', 'i1', 'i2', 'i3');
    }

    /**
     * Function googleGadgetsProxy
     *
     * @param string $url
     * @param int|null $width
     * @param int|null $height
     * @param string|null $server
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 11:20
     */
    public static function googleGadgetsProxy($url = '', $width = 100, $height = null, $server = 'images1')
    {
        $server = trim($server);
        if (in_array($server, self::googleGadgetsProxyServerList())) {
            $proxyUrl = 'https://' . trim($server) . '-focus-opensocial.googleusercontent.com/gadgets/proxy';
        } else {
            $proxyUrl = 'https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy';
        }
        $proxyContainer = 'focus';
        $proxyRefresh = 2592000;
        // Start
        $params = array();
        $params['url'] = $url;
        if ($width !== null) {
            $params['resize_w'] = $width;
        }
        if ($height !== null) {
            $params['resize_h'] = $height;
        }
        $params['container'] = $proxyContainer;
        $params['refresh'] = $proxyRefresh;
        // Result URL
        $url = $proxyUrl . '?' . urldecode(http_build_query($params));
        return trim($url);
    }

    /**
     * Function googleGadgetsProxyDnsPrefetch
     *
     * @param $server
     * User: 713uk13m <dev@nguyenanhung.com>
     * Copyright: 713uk13m <dev@nguyenanhung.com>
     * @return string
     */
    public static function googleGadgetsProxyDnsPrefetch($server = 'images1')
    {
        $html = '';
        if ($server === 'full') {
            foreach (self::googleGadgetsProxyServerList() as $proxy) {
                $html .= "<link href='//" . trim($proxy) . "-focus-opensocial.googleusercontent.com' rel='dns-prefetch' />" . PHP_EOL;
            }
        } else {
            $html .= "<link href='//images1-focus-opensocial.googleusercontent.com' rel='dns-prefetch' />" . PHP_EOL;
        }
        return $html;
    }

    /**
     * Function wordpressProxy
     *
     * @param string $imageUrl
     * @param string $server
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 11:39
     */
    public static function wordpressProxy($imageUrl = '', $server = 'i3')
    {
        $url = parse_url($imageUrl);
        $schema = isset($url['scheme']) ? $url['scheme'] : '';
        $host = isset($url['host']) ? $url['host'] : '';
        if (empty($host)) {
            return trim($imageUrl);
        }
        if ($schema === 'http') {
            // Default, WordPress Proxy not Support HTTP Protocol -> Auto Switch Google GadgetsProxy
            return self::googleGadgetsProxy($imageUrl, null);
        }
        $protocol = array($schema . '://', '//',);
        $imageUrl = str_replace($protocol, '', $imageUrl);
        $server = trim($server);
        if (in_array($server, self::wordpressProxyProxyServerList())) {
            $proxyUrl = 'https://' . trim($server) . '.wp.com/';
        } else {
            $proxyUrl = 'https://i3.wp.com/';
        }
        $url = $proxyUrl . $imageUrl;
        return trim($url);
    }

    /**
     * Function wordpressProxyDnsPrefetch
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 33:45
     */
    public static function wordpressProxyDnsPrefetch()
    {
        $html = '';
        foreach (self::wordpressProxyProxyServerList() as $server) {
            $html .= "<link href='//" . trim($server) . ".wp.com' rel='dns-prefetch' />" . PHP_EOL;
        }
        return $html;
    }

    /**
     * Function createThumbnail - Only use for CodeIgniter
     *
     * @param $url
     * @param $width
     * @param $height
     *
     * @return mixed|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/06/2022 00:20
     */
    public static function createThumbnail($url = '', $width = 100, $height = 100)
    {
        try {
            if (function_exists('base_url') && function_exists('config_item') && class_exists('nguyenanhung\MyImage\ImageCache')) {
                $tmpPath = config_item('image_tmp_path');
                $storagePath = config_item('base_storage_path');
                $cache = new \nguyenanhung\MyImage\ImageCache();
                $cache->setTmpPath($tmpPath)->setUrlPath(base_url($storagePath))->setDefaultImage();
                $thumbnail = $cache->thumbnail($url, $width, $height);
                if (!empty($thumbnail)) {
                    return $thumbnail;
                }

                return $cache->thumbnail(config_item('image_path_tmp_default'), $width, $height);
            }

            return $url;
        } catch (Exception $e) {
            if (function_exists('log_message')) {
                log_message('error', __get_error_message__($e));
            }

            return $url;
        }
    }

    /**
     * Function createThumbnailWithCodeIgniterCache
     *
     * @param $url
     * @param $width
     * @param $height
     *
     * @return mixed|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 25/02/2023 27:41
     */
    public static function createThumbnailWithCodeIgniterCache($url = '', $width = 100, $height = 100)
    {
        try {
            if (function_exists('base_url') && function_exists('config_item')) {
                $cacheKey = md5('createThumbnailWithCodeIgniterCache' . $url . $width . $height);
                $cacheTtl = 15552000; // Cache 6 tháng
                // Setup CodeIgniter
                $CI =& get_instance();
                $CI->load->driver('cache', array('adapter' => 'file', 'backup' => 'dummy'));
                if (!$urlThumbnail = $CI->cache->get($cacheKey)) {
                    $tmpPath = config_item('image_tmp_path');
                    $storagePath = config_item('base_storage_path');
                    $imageCache = new \nguyenanhung\MyImage\ImageCache();
                    $imageCache->setTmpPath($tmpPath)->setUrlPath(base_url($storagePath))->setDefaultImage();
                    $thumbnail = $imageCache->thumbnail($url, $width, $height);
                    if (!empty($thumbnail)) {
                        $urlThumbnail = $thumbnail;
                    } else {
                        $thumbnailTmp = $imageCache->thumbnail(config_item('image_path_tmp_default'), $width, $height);
                        $urlThumbnail = $thumbnailTmp;
                    }
                    if ($urlThumbnail !== null) {
                        $CI->cache->save($cacheKey, $urlThumbnail, $cacheTtl);
                    }
                }
                if (!empty($urlThumbnail)) {
                    return $urlThumbnail;
                }

                return $url;
            }

            return $url;
        } catch (Exception $e) {
            if (function_exists('log_message')) {
                log_message('error', __get_error_message__($e));
            }

            return $url;
        }
    }
}
