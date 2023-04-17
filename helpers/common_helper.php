<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:17
 */
if (!function_exists('smart_bear_basic_helper_version')) {
    function smart_bear_basic_helper_version()
    {
        return \nguyenanhung\CodeIgniter\BasicHelper\BaseHelper::version();
    }
}
if (!function_exists('smart_bear_basic_helper_author')) {
    function smart_bear_basic_helper_author()
    {
        $helper = new \nguyenanhung\CodeIgniter\BasicHelper\BaseHelper();

        return $helper->getAuthor();
    }
}
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
        if ($input === null || $input === false || $input === '') {
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
        $replace = array(' ', '>', '<', '\\1');

        return preg_replace($search, $replace, $html);
    }
}
if (!function_exists('generateRandomUniqueId')) {
    function generateRandomUniqueId()
    {
        $uniqid = uniqid('-bear-', true);
        $uniqid = trim(str_replace('.', '', $uniqid));

        return date('Ymd') . '-' . generate_uuid_v4() . $uniqid;
    }
}
if (!function_exists('generateRandomNanoUniqueId')) {
    function generateRandomNanoUniqueId()
    {
        $uniqid = uniqid('-bear-', true);
        $uniqid = trim(str_replace('.', '', $uniqid));

        return date('Ymd') . '-' . randomNanoId(16) . $uniqid;
    }
}
if (!function_exists('__get_error_message__')) {
    /**
     * Function __get_error_message__
     *
     * @param \Exception|\Throwable $e
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 29/03/2023 53:17
     */
    function __get_error_message__($e)
    {
        return "Error Code: " . $e->getCode() . " - File: " . $e->getFile() . " - Line: " . $e->getLine() . " - Message: " . $e->getMessage();
    }
}
if (!function_exists('__get_error_trace__')) {
    /**
     * Function __get_error_trace__
     *
     * @param \Exception|\Throwable $e
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 29/03/2023 53:48
     */
    function __get_error_trace__($e)
    {
        return "Error Trace: " . $e->getTraceAsString();
    }
}
