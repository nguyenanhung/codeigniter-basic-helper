<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 30/07/2022
 * Time: 15:50
 */
if (!function_exists('bytesHumanFormat')) {
    /**
     * Function bytesHumanFormat
     *
     * @param $size
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 30/07/2022 52:44
     */
    function bytesHumanFormat($size)
    {
        if ($size <= 0) {
            return '0 bytes';
        }
        if ($size == 1) {
            return '1 byte';
        }
        if ($size < 1024) {
            return $size . ' bytes';
        }

        $i   = 0;
        $iec = array('bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

        while (($size / 1024) > 1) {
            $size = $size / 1024;
            ++$i;
        }

        return number_format($size, 2) . ' ' . $iec[$i];
    }
}
