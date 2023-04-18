<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 18/04/2023
 * Time: 10:29
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

class JapanUtils extends BaseHelper
{
    public static function getData($configName)
    {
        $path = __DIR__ . '/japan/' . trim($configName) . '.php';
        if (is_file($path) && file_exists($path)) {
            return require $path;
        }

        return array();
    }

    public static function getJapanPrefCode()
    {
        return self::getData('pref_code');
    }
}
