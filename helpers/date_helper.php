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
