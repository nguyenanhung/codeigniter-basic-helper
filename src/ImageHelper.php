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

use nguyenanhung\CodeIgniter\BasicHelper\Traits\Version;

/**
 * Class ImageHelper
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class ImageHelper implements Environment
{
    use Version;

    /**
     * Function googleGadgetsProxy
     *
     * @param string   $url
     * @param int      $width
     * @param null|int $height
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 11:20
     */
    public static function googleGadgetsProxy($url = '', $width = 100, $height = null)
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
        $imageUrl = str_replace('https://', '', $imageUrl);
        $imageUrl = str_replace('http://', '', $imageUrl);
        $imageUrl = str_replace('//', '', $imageUrl);
        $url      = 'https://' . trim($server) . '.wp.com/' . $imageUrl;

        return trim($url);
    }
}
