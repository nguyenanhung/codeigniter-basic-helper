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
            return (new DateTime("now", new DateTimeZone("UTC")))->format('Y-m-d\TH:i:s\Z');
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
if (!function_exists('getYesterday')) {
    function getYesterday($format = 'Y-m-d')
    {
        return date($format, strtotime("-1 days"));
    }
}
if (!function_exists('smart_bear_date_range')) {
    function smart_bear_date_range($first, $last, $step = '+1 day', $format = 'Y-m-d')
    {
        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);
        while ($current <= $last) {
            $dates[] = date($format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }
}
if (!function_exists('format_datetime_vn')) {
    function format_datetime_vn($datetime = '', $type = 'datetime')
    {
        if (empty($datetime)) {
            if (array_key_exists('REQUEST_TIME', $_REQUEST)) {
                $timestamp = $_REQUEST('REQUEST_TIME');
            } else {
                $timestamp = time();
            }
        } elseif ($type !== 'datetime') {
            $timestamp = $datetime;
        } else {
            $timestamp = strtotime($datetime);
        }

        return date('d-m-Y H:i:s', $timestamp);
    }
}
if (!function_exists('get_start_and_end_date_for_week')) {
    /**
     * Function get_start_and_end_date_for_week
     *
     * @param $week
     * @param $year
     *
     * @return array
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 24/02/2023 22:06
     */
    function get_start_and_end_date_for_week($week, $year)
    {
        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7 * $week) + 1 - $day) * 24 * 3600;
        $return[0] = date('d-m-Y', $time);
        $time += 6 * 24 * 3600;
        $return[1] = date('d-m-Y', $time);

        return $return;
    }
}
