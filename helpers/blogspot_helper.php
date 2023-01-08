<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/01/2023
 * Time: 00:26
 */
// ~~~~~ Blogspot
if (!function_exists('blogspotDescSortWithPublishedTime')) {
    function blogspotDescSortWithPublishedTime($item1, $item2)
    {
        if ($item1['published']['$t'] === $item2['published']['$t']) {
            return 0;
        }

        return ($item1['published']['$t'] < $item2['published']['$t']) ? 1 : -1;
    }
}
if (!function_exists('blogspotUSort')) {
    function blogspotUSort($data)
    {
        usort($data, 'blogspotDescSortWithPublishedTime');

        return $data;
    }
}
