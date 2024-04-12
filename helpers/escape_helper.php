<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/02/2023
 * Time: 22:25
 */
if (!function_exists('bear_framework_basic_clean_str')) {
    function bear_framework_basic_clean_str($str = '')
    {
        if (empty($str)) {
            return $str;
        }
        $str = trim($str);
        $str = strip_tags($str);
        $str = htmlspecialchars($str, ENT_QUOTES | ENT_HTML5 | ENT_XHTML, 'UTF-8');
        return trim($str);
    }
}
