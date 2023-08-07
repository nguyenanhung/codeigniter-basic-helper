<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/06/2022
 * Time: 22:40
 */
if (!function_exists('placeholder_img')) {
    /**
     * Function placeholder_img
     *
     * @param $size
     * @param $bg_color
     * @param $text_color
     * @param $text
     * @param $domain
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/06/2022 42:35
     */
    function placeholder_img($size = '300x250', $bg_color = '', $text_color = '', $text = '', $domain = 'https://placehold.co/')
    {
        if (!empty($bg_color)) {
            $bg_color = '/' . $bg_color;
        }
        if (!empty($text_color)) {
            $text_color = '/' . $text_color;
        }
        if (!empty($text)) {
            $text = '/' . $text;
        }
        $link = trim($domain) . trim($size) . trim($bg_color) . trim($text_color) . trim($text);
        return '<img alt="Place-Holder" title="Place Holder" src="' . $link . '">';
    }
}
