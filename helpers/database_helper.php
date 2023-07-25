<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/02/2023
 * Time: 16:16
 */
if (!function_exists('generate_list_id_with_parent_id')) {
    /**
     * Function generate_list_id_with_parent_id - Tạo 1 list các ID, trong đó chứa các tập con phụ thuộc của ID đó
     *
     * VD: Dùng trong trường hợp muốn hiển thị nội dung của category cha và các category con trong cùng 1 page content
     *
     * @param array|object|mixed $allSubId
     * @param string|int         $parentId
     * @param string             $field
     *
     * @return array|string|int
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/02/2023 13:31
     */
    function generate_list_id_with_parent_id($allSubId, $parentId, $field = 'id')
    {
        if (is_array($allSubId) || is_object($allSubId)) {

            // Xác định lấy toàn bộ tin tức ở các category con
            $countSub = count($allSubId); // Đếm bảng ghi Category con

            if ($countSub) {

                // Nếu tồn tại các category con
                $listSub = array();
                $listSub[] = $parentId; // Push category cha

                foreach ($allSubId as $item) {
                    $itemId = is_array($item) ? $item[$field] : $item->$field;
                    $listSub[] = $itemId; // Push các category con vào mảng dữ liệu
                }

                return $listSub;
            }
        }

        return $parentId;
    }

}
