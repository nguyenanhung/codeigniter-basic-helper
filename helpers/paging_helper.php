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
        if (!$page_number || empty($page_number)) {
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
        if (!$page_number || empty($page_number)) {
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