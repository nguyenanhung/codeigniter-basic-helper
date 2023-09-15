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
use nguyenanhung\Libraries\ImageHelper\ImageHelper as ImageHelperLib;

/**
 * Class ImageHelper
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class ImageHelper extends BaseHelper
{
    public static function googleGadgetsProxyServerList()
    {
        return ImageHelperLib::googleGadgetsProxyServerList();
    }

    public static function wordpressProxyProxyServerList()
    {
        return ImageHelperLib::wordpressProxyProxyServerList();
    }

    public static function googleGadgetsProxy($url = '', $width = 100, $height = null, $server = 'images1')
    {
        return ImageHelperLib::googleGadgetsProxy($url, $width, $height, $server);
    }

    public static function googleGadgetsProxyDnsPrefetch($server = 'images1')
    {
        return ImageHelperLib::googleGadgetsProxyDnsPrefetch($server);
    }

    public static function wordpressProxy($imageUrl = '', $server = 'i3')
    {
        return ImageHelperLib::wordpressProxy($imageUrl, $server);
    }

    public static function wordpressProxyDnsPrefetch()
    {
        return ImageHelperLib::wordpressProxyDnsPrefetch();
    }

    public static function createThumbnail($url = '', $width = 100, $height = 100)
    {
        return ImageHelperLib::createThumbnail($url, $width, $height);
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
