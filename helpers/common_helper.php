<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:17
 */
if (!function_exists('isEmpty')) {
    /**
     * Function isEmpty
     *
     * @param mixed $input
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/07/2020 29:13
     */
    function isEmpty($input = '')
    {
        if ($input === null || $input === false) {
            return true;
        }
        $isset = isset($input);
        if ($isset === true) {
            $empty = empty($input);
            if ($empty) {
                $output = true;
            } else {
                $output = false;
            }
        } else {
            $output = true;
        }
        return $output;
    }
}
