<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 30/07/2022
 * Time: 01:05
 */
if (!function_exists('bear_framework_default_get_data_chart')) {
    function bear_framework_default_get_data_chart($item_list, $valueGet, $total)
    {
        return (new \nguyenanhung\CodeIgniter\BasicHelper\ChartRender())->get_data_chart($item_list, $valueGet, $total);
    }
}

if (!function_exists('bear_framework_default_get_data_chart_report')) {
    function bear_framework_default_get_data_chart_report($item_list, $valueGet)
    {
        return (new \nguyenanhung\CodeIgniter\BasicHelper\ChartRender())->get_data_chart_report($item_list, $valueGet);
    }
}
