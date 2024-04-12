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

    public static function wordpressProxy($imageUrl = '', $server = 'i3', $width = null, $height = null)
    {
        return ImageHelperLib::wordpressProxy($imageUrl, $server, $width, $height);
    }

    public static function wordpressProxyDnsPrefetch()
    {
        return ImageHelperLib::wordpressProxyDnsPrefetch();
    }

    public static function createThumbnail($url = '', $width = 100, $height = 100)
    {
        return ImageHelperLib::createThumbnail($url, $width, $height);
    }

    public static function createThumbnailWithCodeIgniterCache($url = '', $width = 100, $height = 100)
    {
        return ImageHelperLib::createThumbnailWithCodeIgniterCache($url, $width, $height);
    }

    public static function formatImageUrl($input = '', $server = '', $base = 'live')
    {
        return ImageHelperLib::formatImageUrl($input, $server, $base);
    }
}
