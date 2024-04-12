<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 30/07/2022
 * Time: 15:47
 */
if (!function_exists('bear_get_env')) {
    /**
     * Function bear_get_env
     *
     * @param $a
     *
     * @return array|false|mixed|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 30/07/2022 51:23
     */
    function bear_get_env($a)
    {
        if (!is_array($a)) {
            $a = array($a);
        }

        foreach ($a as $b) {
            if (isset($_SERVER[$b])) {
                return $_SERVER[$b];
            }
            if (isset($_ENV[$b])) {
                return $_ENV[$b];
            }
            if (@getenv($b)) {
                return @getenv($b);
            }
            if (function_exists('apache_getenv') && apache_getenv($b, true)) {
                return apache_getenv($b, true);
            }
        }

        return '';
    }
}
