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
                return true;
            }

            return false;
        }

        return true;
    }
}
if (!function_exists('defaultCompressHtmlOutput')) {
    /**
     * Function defaultCompressHtmlOutput
     *
     * @param mixed $html
     *
     * @return array|string|string[]|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 26/12/2022 00:42
     */
    function defaultCompressHtmlOutput($html = '')
    {
        $search = array(
            '/\n/',             // replace end of line by a space
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s'          // shorten multiple whitespace sequences
        );
        $replace = array(
            ' ',
            '>',
            '<',
            '\\1'
        );

        return preg_replace($search, $replace, $html);
    }
}
