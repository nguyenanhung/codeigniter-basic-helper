<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2021
 * Time: 01:15
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
if (!function_exists('ddd')) {
    /**
     * Function ddd
     *
     * @param $str
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 16:31
     */
    function ddd($str)
    {
        echo "<pre>";
        var_dump($str);
        echo "</pre>";
        die;
    }
}
