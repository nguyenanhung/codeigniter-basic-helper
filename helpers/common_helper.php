<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:17
 */
if (!function_exists('dd')) {
    /**
     * Function dd
     *
     * @param $var
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 18:15
     */
    function dd($var)
    {
        echo '<pre>';
        array_map(function ($var) {
            var_dump($var);
        }, func_get_args());
        die;
    }
}
if (!function_exists('isEmpty')) {
    /**
     * Function isEmpty
     *
     * @param string $input
     *
     * @return bool
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/07/2020 29:13
     */
    function isEmpty($input = '')
    {
        if ($input === null) {
            $output = true;
        } elseif ($input === false) {
            $output = true;
        } else {
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
        }

        return $output;
    }
}
