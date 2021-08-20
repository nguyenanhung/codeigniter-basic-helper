<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2021
 * Time: 01:11
 */
if (!function_exists('assets_url')) {
    /**
     * Function assets_url
     *
     * @param string      $uri
     * @param null|string $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 11:56
     */
    function assets_url($uri = '', $protocol = NULL)
    {
        if (function_exists('base_url') && function_exists('config_item')) {
            $fileExt = substr(trim($uri), strrpos(trim($uri), '.') + 1);
            $fileExt = strtoupper($fileExt);
            $version = '';
            if ($fileExt == 'CSS' || $fileExt == 'JS') {
                $version = config_item('assets_version');
            }

            return trim(base_url('assets/' . $uri, $protocol) . $version);
        }

        return trim($uri);

    }
}
if (!function_exists('templates_url')) {
    /**
     * Function templates_url
     *
     * @param string      $uri
     * @param null|string $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 12:12
     */
    function templates_url($uri = '', $protocol = NULL)
    {
        if (function_exists('base_url') && function_exists('config_item')) {
            $fileExt = substr(trim($uri), strrpos(trim($uri), '.') + 1);
            $fileExt = strtoupper($fileExt);
            $version = '';
            if ($fileExt == 'CSS' || $fileExt == 'JS') {
                $version = config_item('assets_version');
            }

            return trim(base_url('templates/' . $uri, $protocol) . $version);
        }

        return trim($uri);
    }
}