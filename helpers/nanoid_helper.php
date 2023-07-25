<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/14/2021
 * Time: 13:06
 */
if (!function_exists('randomNanoId')) {
    /**
     * Function randomNanoId
     *
     * @param $size
     * @param $prefix
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 20/03/2023 48:05
     */
    function randomNanoId($size = 21, $prefix = 'Bear-')
    {
        if (class_exists('Hidehalo\Nanoid\Client')) {
            $client = new Hidehalo\Nanoid\Client();

            return $client->generateId($size);
        }

        return uniqid($prefix, true);
    }
}
