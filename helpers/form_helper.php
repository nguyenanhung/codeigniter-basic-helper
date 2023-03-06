<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 24/02/2023
 * Time: 00:00
 */
if (!function_exists('join_value_multiple')) {
    /**
     * Join value multiple
     *
     * @param $str
     *
     * @return string
     */
    function join_value_multiple($str)
    {
        $num = count($str);
        $max = $num - 1;
        $string = "";
        for ($i = 0; $i < $num; $i++) {
            $string = $i < $max ? $string . $str[$i] . ',' : $string . $str[$i];
        }
        unset($i);

        if ($string === '') {
            return '0';
        }

        return $string;
    }
}
