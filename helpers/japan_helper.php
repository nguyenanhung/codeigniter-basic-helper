<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 18/04/2023
 * Time: 10:44
 */
if (!function_exists('_japan_pref_code_')) {
    function _japan_pref_code_()
    {
        return \nguyenanhung\CodeIgniter\BasicHelper\JapanUtils::getJapanPrefCode();
    }
}
