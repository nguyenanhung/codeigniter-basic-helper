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

use nguyenanhung\Libraries\Basic\Miscellaneous\Miscellaneous;

class ChartRender extends BaseHelper
{
    protected function misc()
    {
        return new Miscellaneous();
    }

    public function get_data_chart($item_list, $valueGet, $total)
    {
        return $this->misc()->metronic_get_data_chart($item_list, $valueGet, $total);
    }

    public function get_data_chart_report($item_list, $valueGet)
    {
        return $this->misc()->metronic_get_data_chart_report($item_list, $valueGet);
    }
}
