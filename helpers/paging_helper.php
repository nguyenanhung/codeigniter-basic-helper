<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:22
 */
if (!function_exists('view_paginations')) {
    /**
     * Function view_paginations
     *
     * @param        $type
     * @param        $total_rows
     * @param        $per_page
     * @param        $page_number
     * @param string $page_links
     * @param        $begin
     * @param        $end
     * @param string $title
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 19:53
     */
    function view_paginations($type, $total_rows, $per_page, $page_number, $page_links, $begin, $end, $title = '')
    {
        /**
         * Kiểm tra giá trị page_number truyền vào
         * Nếu ko có giá trị hoặc giá trị = 0 -> set giá trị = 1
         */
        if (empty($page_number)) {
            $page_number = 1;
        }
        /**
         * Tính tổng số page có
         */
        $total = ceil($total_rows / $per_page);
        $main  = '';
        if ($total <= 1) {
            return '';
        }
        if ($page_number !== 1) {
            if ($type === 'site_page') {
                $main .= "\n<li class=\"waves-effect\"><a href=\"" . $page_links . ".html\"><i class=\"fa fa-angle-double-left\"></i></a></li>";
            } elseif ($type === 'search_page') {
                $main .= "\n<li class=\"waves-effect\"><a href=\"" . $page_links . "\"><i class=\"fa fa-angle-double-left\"></i></a></li>";
            } else {
                $main .= "<li class=\"left\"><a href=\"" . $page_links . "/\" title=\"" . $title . "\">&nbsp;</a></li>";
            }
        }
        for ($num = 1; $num <= $total; $num++) {
            if ($num < $page_number - $begin || $num > $page_number + $end) {
                continue;
            }
            if ($num === $page_number) {
                if ($type === 'site_page') {
                    $main .= "\n<li class=\"active\"><a href=\"" . $page_links . "/trang-" . $num . ".html\" title='" . $title . "'>" . $num . "</a></li>";
                } elseif ($type === 'search_page') {
                    $main .= "\n<li class=\"active\"><a href=\"" . $page_links . "&page=" . $num . "\" title='" . $title . "'>" . $num . "</a></li>";
                } else {
                    $main .= "<li class=\"selected\"><a href=\"" . $page_links . "/page/" . $num . "/\" title=\"" . $title . "\">" . $num . "</a></li>";
                }
            } else {
                if ($type === 'site_page') {
                    $main .= "\n<li class=\"waves-effect\"><a href=\"" . $page_links . "/trang-" . $num . ".html\">" . $num . "</a></li>";
                } elseif ($type === 'search_page') {
                    $main .= "\n<li class=\"waves-effect\"><a href=\"" . $page_links . "&page=" . $num . "\">" . $num . "</a></li>";
                } else {
                    $main .= "<li><a href=\"" . $page_links . "/page/" . $num . "/\" title=\"" . $title . " trang " . $num . "\">" . $num . "</a></li>";
                }
            }
        }
        unset($num);
        if ($page_number !== $total) {
            if ($type === 'site_page') {
                $main .= "\n<li class=\"waves-effect\"><a href=\"" . $page_links . "/trang-" . $total . ".html\"><i class=\"fa fa-angle-double-right\"></i></a></li>";
            } elseif ($type === 'search_page') {
                $main .= "\n<li class=\"waves-effect\"><a href=\"" . $page_links . "&page=" . $total . "\"><i class=\"fa fa-angle-double-right\"></i></a></li>";
            } else {
                $main .= "<li class=\"right\"><a href=\"" . $page_links . "/page/" . $total . "/\" title=\"" . $title . " trang cuối\">&nbsp;</a></li>";
            }
        }

        return $main;
    }
}
if (!function_exists('view_more')) {
    /**
     * Function view_more
     *
     * @param        $page_number
     * @param        $page_total
     * @param        $page_size
     * @param string $url
     * @param string $title
     * @param string $more_type
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 19:00
     */
    function view_more($page_number, $page_total, $page_size, $url = '', $title = '', $more_type = '')
    {
        $is_total = ceil($page_total / $page_size);
        if ($is_total <= 1) {
            return '';
        }

        if ($is_total === $page_number) {
            $back_page = $page_number - 1;
            if ($more_type === 'search') {
                $main = '<a title="' . $title . ' trang ' . $back_page . '" href="' . $url . '&page=' . $back_page . '">Trang trước</a>';
            } else {
                $main = '<a title="' . $title . ' trang ' . $back_page . '" href="' . $url . '/trang-' . $back_page . '.html">Trang trước</a>';
            }
        } else {
            if (!empty($page_number) && $page_number !== 0) {
                $next_page = $page_number + 1;
            } else {
                $next_page = $page_number + 2;
            }
            if ($more_type === 'search') {
                $main = '<a title="' . $title . ' trang ' . $next_page . '" href="' . $url . '&page=' . $next_page . '">Xem thêm</a>';
            } else {
                $main = '<a title="' . $title . ' trang ' . $next_page . '" href="' . $url . '/trang-' . $next_page . '.html">Xem thêm</a>';
            }
        }

        return $main;
    }
}
if (!function_exists('select_page')) {
    /**
     * Function select_page
     *
     * @param        $total_rows
     * @param        $per_page
     * @param        $page_number
     * @param string $type
     * @param string $page_links
     * @param string $begin
     * @param string $end
     * @param string $title
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 19:09
     */
    function select_page($total_rows, $per_page, $page_number, $type = '', $page_links = '', $begin = '', $end = '', $title = '')
    {
        /**
         * ----------------------------------------------
         * Kiểm tra giá trị page_number truyền vào
         * Nếu ko có giá trị hoặc giá trị = 0 -> set giá trị = 1
         * ----------------------------------------------
         */
        if (empty($page_number)) {
            $page_number = 1;
        }
        /**
         * ----------------------------------------------
         * Tính tổng số page có
         * ----------------------------------------------
         */
        $total = ceil($total_rows / $per_page);
        $main  = '';
        if ($total <= 1) {
            return '';
        }
        if ($page_number !== 1) {
            if ($type === 'select_page') {
                $main .= "<li class=\"left\"><a href=\"" . $page_links . ".html\" title=\"" . $title . "\">&nbsp;</a></li>";
            } else {
                $main .= "";
            }
        }
        for ($num = 1; $num <= $total; $num++) {
            if ($num === $page_number) {
                if ($type === 'select_page') {
                    $main .= "<li class=\"selected\"><a href=\"" . $page_links . "/trang-" . $num . ".html\" title=\"" . $title . " trang " . $num . "\">" . $num . "</a></li>";
                } else {
                    $main .= "<option selected value=\"" . $num . "\">Trang " . $num . "</option>";
                }
            } else {
                if ($type === 'select_page') {
                    $main .= "<li><a href=\"" . $page_links . "/trang-" . $num . ".html\" title=\"" . $title . " trang " . $num . "\">" . $num . "</a></li>";
                } else {
                    $main .= "<option value=\"" . $num . "\">Trang " . $num . "</option>";
                }
            }
        }
        unset($num);
        if ($page_number !== $total) {
            if ($type === 'select_page') {
                $main .= "<li class=\"right\"><a href=\"" . $page_links . "/trang-" . $total . ".html\" title=\"" . $title . " trang cuối\">&nbsp;</a></li>";
            } else {
                $main .= "<option value=\"" . $total . "\">Trang cuối</option>";
            }
        }

        return $main;
    }
}
if (!function_exists('get_paginations_title')) {
    /**
     * Function get_paginations_title
     *
     * @param $str
     *
     * @return string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 19:16
     */
    function get_paginations_title($str)
    {
        return str_replace('trang-', 'Trang ', $str);
    }
}
if (!function_exists('get_paginations_number')) {
    /**
     * Function get_paginations_number
     *
     * @param $str
     *
     * @return int
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 19:24
     */
    function get_paginations_number($str)
    {
        $str = str_replace('trang-', '', $str);

        return (int) $str;
    }
}
if (!function_exists('bear_framework_news_view_pagination')) {
    /**
     * Function bear_framework_news_view_pagination - Hàm phân trang theo kiểu bear framework
     *
     * @param $data
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 54:23
     */
    function bear_framework_news_view_pagination($data = array())
    {
        // $page_type           = isset($input_data['page_type']) ? $input_data['page_type'] : '';
        $page_link           = isset($data['page_link']) ? $data['page_link'] : '';
        $page_title           = isset($data['page_title']) ? $data['page_title'] : '';
        $page_prefix         = isset($data['page_prefix']) ? $data['page_prefix'] : '';
        $page_suffix         = isset($data['page_suffix']) ? $data['page_suffix'] : '';
        $current_page_number = isset($data['current_page_number']) ? $data['current_page_number'] : 1;
        $total_item          = isset($data['total_item']) ? $data['total_item'] : 0;
        $item_per_page       = isset($data['item_per_page']) ? $data['item_per_page'] : 10;
        $begin               = isset($data['pre_rows']) ? $data['pre_rows'] : 3;
        $end                 = isset($data['suf_rows']) ? $data['suf_rows'] : 3;
        $first_link          = isset($data['first_link']) ? $data['first_link'] : '&nbsp;';
        $last_link           = isset($data['last_link']) ? $data['last_link'] : '&nbsp;';

        /**
         * Kiểm tra giá trị page_number truyền vào
         * Nếu ko có giá trị hoặc giá trị = 0 -> set giá trị = 1
         */
        if (empty($current_page_number)) {
            $current_page_number = 1;
        }
        // Tính tổng số page có
        $total_page = ceil($total_item / $item_per_page);
        if ($total_page <= 1) {
            return null;
        }
        $output_html = '';
        if ($current_page_number <> 1) {
            $output_html .= '<li class="left"><a href="' . trim($page_link) . trim($page_suffix) . '" title="' . trim($page_title) . '">' . trim($first_link) . '</a></li>';
        }
        for ($page_number = 1; $page_number <= $total_page; $page_number++) {
            if ($page_number < ($current_page_number - $begin) || $page_number > ($current_page_number + $end)) {
                continue;
            }
            if ($page_number == $current_page_number) {
                $output_html .= '<li class="selected"><a href="' . trim($page_link) . trim($page_prefix) . trim($page_number) . trim($page_suffix) . '" title="' . $page_title . ' trang ' . $page_number . '">' . $page_number . '</a></li>';
            } else {
                $output_html .= '<li><a href="' . trim($page_link) . trim($page_prefix) . trim($page_number) . trim($page_suffix) . '" title="' . $page_title . ' trang ' . $page_number . '">' . $page_number . '</a></li>';
            }
        }
        unset($page_number);
        if ($current_page_number <> $total_page) {
            $output_html .= '<li class="right"><a href="' . trim($page_link) . trim($page_prefix) . trim($total_page) . trim($page_suffix) . '" title="' . trim($page_title) . ' - trang cuối">' . trim($last_link) . '</a></li>';
        }

        return $output_html;
    }
}
