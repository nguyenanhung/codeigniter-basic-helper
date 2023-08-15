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
     * @param $page_type
     * @param $total_item
     * @param $item_per_page
     * @param $current_page_number
     * @param $page_link
     * @param $begin
     * @param $end
     * @param $page_title
     * @param $page_prefix
     * @param $page_suffix
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 14/02/2023 29:41
     */
    function view_paginations($page_type, $total_item, $item_per_page, $current_page_number, $page_link, $begin, $end, $page_title = '', $page_prefix = '/trang-', $page_suffix = '.html')
    {
        if ($page_type === 'search_page' || $page_type === 'search') {
            $page_prefix = '&page=';
            $page_suffix = '';
        }
        $data = array(
            'page_type'                    => $page_type,
            'page_link'                    => $page_link,
            'page_title'                   => $page_title,
            'page_prefix'                  => $page_prefix,
            'page_suffix'                  => $page_suffix,
            'current_page_number'          => $current_page_number,
            'total_item'                   => $total_item,
            'item_per_page'                => $item_per_page,
            'page_begin'                   => $begin,
            'page_end'                     => $end,
            'pre_rows'                     => 3,
            'suf_rows'                     => 3,
            'first_link'                   => '&nbsp;',
            'last_link'                    => '&nbsp;',
            'default_page_title'           => 'trang',
            'default_last_page_name_title' => 'trang cuối',
            'left_class'                   => 'left',
            'right_class'                  => 'right',
            'selected_class'               => 'selected'
        );
        $pagination = new \nguyenanhung\Libraries\Pagination\Pagination\SimplePagination();
        $pagination->setData($data);
        return $pagination->build();
    }
}
if (!function_exists('view_more')) {
    /**
     * Function view_more
     *
     * @param $page_number
     * @param $page_total
     * @param $page_size
     * @param $url
     * @param $title
     * @param $more_type
     * @param $page_prefix
     * @param $page_suffix
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 14/02/2023 28:06
     */
    function view_more($page_number, $page_total, $page_size, $url = '', $title = '', $more_type = '', $page_prefix = '/trang-', $page_suffix = '.html')
    {
        if ($more_type === 'search_page' || $more_type === 'search') {
            $page_prefix = '&page=';
            $page_suffix = '';
        }
        $data = array(
            'page_number'             => $page_number,
            'total_item'              => $page_total,
            'item_per_page'           => $page_size,
            'page_link'               => $url,
            'page_title'              => $title,
            'page_type'               => $more_type,
            'page_prefix'             => $page_prefix,
            'page_suffix'             => $page_suffix,
            'default_page_title'      => 'trang',
            'default_page_title_more' => 'Xem thêm',
            'default_page_title_prev' => 'Trang trước'
        );
        $pagination = new \nguyenanhung\Libraries\Pagination\Pagination\SimplePagination();
        $pagination->setData($data);
        return $pagination->buildViewMore();
    }
}
if (!function_exists('select_page')) {
    /**
     * Function select_page
     *
     * @param $total_rows
     * @param $per_page
     * @param $page_number
     * @param $type
     * @param $page_links
     * @param $begin
     * @param $end
     * @param $title
     * @param $page_prefix
     * @param $page_suffix
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 14/02/2023 28:40
     */
    function select_page($total_rows, $per_page, $page_number, $type = '', $page_links = '', $begin = '', $end = '', $title = '', $page_prefix = '/trang-', $page_suffix = '.html')
    {
        if ($type === 'search_page' || $type === 'search') {
            $page_prefix = '&page=';
            $page_suffix = '';
        }
        $data = array(
            'page_number'                  => $page_number,
            'total_item'                   => $total_rows,
            'item_per_page'                => $per_page,
            'page_link'                    => $page_links,
            'page_title'                   => $title,
            'page_type'                    => $type,
            'page_begin'                   => $begin,
            'page_end'                     => $end,
            'page_prefix'                  => $page_prefix,
            'page_suffix'                  => $page_suffix,
            'left_class'                   => 'left',
            'right_class'                  => 'right',
            'selected_class'               => 'selected',
            'default_page_title'           => 'trang',
            'default_last_page_name_title' => 'Trang cuối',
        );
        $pagination = new \nguyenanhung\Libraries\Pagination\Pagination\SimplePagination();
        $pagination->setData($data);
        return $pagination->buildSelectPage();
    }
}
if (!function_exists('get_paginations_title')) {
    /**
     * Function get_paginations_title
     *
     * @param $str
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 14/02/2023 17:37
     */
    function get_paginations_title($str)
    {
        $pagination = new \nguyenanhung\Libraries\Pagination\Pagination\SimplePagination();
        return $pagination->getPaginationsTitle($str);
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
     * @time     : 14/02/2023 16:17
     */
    function get_paginations_number($str)
    {
        $pagination = new \nguyenanhung\Libraries\Pagination\Pagination\SimplePagination();
        return $pagination->getPageNumber($str);
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
     * @time     : 14/02/2023 16:29
     */
    function bear_framework_news_view_pagination($data = array())
    {
        $pagination = new \nguyenanhung\Libraries\Pagination\Pagination\SimplePagination();
        $pagination->setData($data);
        return $pagination->build();
    }
}
