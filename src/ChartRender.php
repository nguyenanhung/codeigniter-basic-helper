<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:25
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

use nguyenanhung\CodeIgniter\BasicHelper\Traits\Version;

/**
 * Class ChartRender
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class ChartRender implements Environment
{
    use Version;

    /**
     * Function get_data_chart
     *
     * @param $item_list
     * @param $valueGet
     * @param $total
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 26:39
     */
    public function get_data_chart($item_list, $valueGet, $total)
    {
        $dataChart = '';
        if (count($item_list) > 0) {
            $dataChart .= '[';
            foreach ($item_list as $key => $value) {
                $dataChart .= '{' . '"country" : ' . '"' . $value->$valueGet . '", ';
                $dataChart .= '"visits" : ' . $value->sl . ', ';
                $dataChart .= '"color" : ' . '"#FF9E01"';
                if ($key === count($item_list) - 1) {
                    $dataChart .= '}';
                } else {
                    $dataChart .= '}, ';
                }
            }
            if ($total) {
                $dataChart .= ', {"country" : "Total", "visits" : ' . $total . ', "color" : "#0D52D1" }';
            }
            $dataChart .= ']';
        } else {
            $dataChart = '[]';
        }

        return $dataChart;
    }

    /**
     * Function get_data_chart_report
     *
     * @param $item_list
     * @param $valueGet
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 26:43
     */
    public function get_data_chart_report($item_list, $valueGet)
    {
        $dataChart = '';
        if (count($item_list) > 0) {
            $dataChart .= '[';
            foreach ($item_list as $key => $value) {
                $dataChart .= '{' . '"country" : ' . '"' . date('d-m-Y', strtotime($value->date)) . '", ';
                $dataChart .= '"visits" : ' . $value->$valueGet . ', ';
                $dataChart .= '"color" : ' . '"#FF9E01"';
                if ($key === count($item_list) - 1) {
                    $dataChart .= '}';
                } else {
                    $dataChart .= '}, ';
                }
            }
            $dataChart .= ']';
        } else {
            $dataChart = '[]';
        }

        return $dataChart;
    }
}
