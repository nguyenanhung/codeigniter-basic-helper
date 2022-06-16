<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/05/2021
 * Time: 04:11
 */
if (!function_exists('dayFloor')) {
    /**
     * Function dayFloor
     *
     * @param string $beginTime
     * @param string $endTime
     *
     * @return int
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/05/2021 12:01
     */
    function dayFloor($beginTime = '', $endTime = '')
    {
        if (empty($beginTime) && empty($endTime)) {
            return 0;
        }

        $floor = abs(strtotime($beginTime) - strtotime($endTime));

        return (int) floor($floor / (60 * 60 * 24));
    }
}
if (!function_exists('getZuluTime')) {
    /**
     * Function getZuluTime
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 40:35
     */
    function getZuluTime()
    {
        try {
            $dateUTC = new DateTime("now", new DateTimeZone("UTC"));

            return $dateUTC->format('Y-m-d\TH:i:s\Z');
        } catch (Exception $e) {
            return null;
        }
    }
}
if (!function_exists('iso_8601_utc_time')) {
    /**
     * Function iso_8601_utc_time
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 41:19
     */
    function iso_8601_utc_time()
    {
        return getZuluTime();
    }
}