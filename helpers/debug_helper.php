<?php
if (!function_exists('dd')) {
    function dd($var)
    {
        echo '<pre>';
        array_map(static function ($var) {
            var_dump($var);
        }, func_get_args());
        die;
    }
}
if (!function_exists('ddd')) {
    function ddd($str)
    {
        echo "<pre>";
        var_dump($str);
        echo "</pre>";
        die;
    }
}
if (!function_exists('dump')) {
    function dump($str = '')
    {
        echo "<pre>";
        print_r($str);
        echo "</pre>";
    }
}
