<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:04
 */
if (!function_exists('share_url')) {
    /**
     * Function share_url
     *
     * @param string $href
     * @param string $platform
     * @param string $app_id
     * @param string $redirect
     * @param string $display
     * @param string $images
     * @param string $title
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 05:50
     */
    function share_url($href = '', $platform = '', $app_id = '', $redirect = '', $display = '', $images = '', $title = '')
    {
        $baseUrl = function_exists('base_url') ? base_url() : '';
        $share_link = $href === '' ? urlencode($baseUrl) : urlencode($href);
        if (empty($redirect)) {
            $redirect_link = urlencode($baseUrl);
        } else {
            $redirect_link = urlencode($redirect);
        }
        if ($platform === 'fb_share') {
            if ($display !== '') {
                $share_url = 'https://www.facebook.com/dialog/share?' . http_build_query(array('app_id' => $app_id, 'display' => $display, 'href' => $share_link, 'redirect_uri' => $redirect_link));
            } else {
                $share_url = 'https://www.facebook.com/dialog/share?' . http_build_query(array('app_id' => $app_id, 'href' => $share_link, 'redirect_uri' => $redirect_link));
            }
        } elseif ($platform === 'fb_send') {
            if ($display !== '') {
                $share_url = 'https://www.facebook.com/dialog/send?app_id=' . $app_id . '&amp;display=' . $display . '&amp;link=' . $share_link . '&amp;redirect_uri=' . $redirect_link;
            } else {
                $share_url = 'https://www.facebook.com/dialog/send?app_id=' . $app_id . '&amp;link=' . $share_link . '&amp;redirect_uri=' . $redirect_link;
            }
        } elseif ($platform === 'twitter') {
            $share_url = 'https://twitter.com/home?status=' . $share_link;
        } elseif ($platform === 'googleplus') {
            $share_url = 'https://plus.google.com/share?url=' . $share_link;
        } elseif ($platform === 'pinterest') {
            $share_url = 'https://pinterest.com/pin/create/button/?url=' . $share_link . '&media=' . $images . '&description=' . $title;
        } elseif ($platform === 'linkedin') {
            $share_url = 'https://www.linkedin.com/shareArticle?mini=true&url=%3Ca%20href=%22https%3A//www.linkedin.com/shareArticle?mini=true%26url=' . $share_link . '%26title=%25C3%25A1df%26summary=%25C3%25A1%26source=TV%2520News%22%3EShare%20on%20LinkedIn%3C/a%3E&title=' . $title . '&summary=&source=TV%20News';
        } else {
            $share_url = $share_link;
        }

        return $share_url;
    }
}
if (!function_exists('encodeId_Url_byHungDEV')) {
    /**
     * Function encodeId_Url_byHungDEV
     *
     * Mã hóa Url ID của bài viết, tăng tính bảo mật
     * Sử dụng Chuỗi sau khi đã Encode để show ra Url
     *
     * @param $id
     *
     * @return array|int|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 05:58
     */
    function encodeId_Url_byHungDEV($id)
    {
        $id += 1112223333;

        return str_replace(
            array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),
            array('E', 'R', 'M', 'N', 'J', 'I', 'Z', 'K', 'L', 'O'),
            $id
        );
    }
}
if (!function_exists('decodeId_Url_byHungDEV')) {
    /**
     * Function decodeId_Url_byHungDEV
     *
     * Giải mãi Url ID của bài viết để lấy ID gốc
     * Sử dụng ID gốc này để truy vấn vào server lấy thông tin
     *
     * @param $id
     *
     * @return array|int|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 06:42
     */
    function decodeId_Url_byHungDEV($id)
    {
        $id = mb_strtoupper($id);
        $id = str_replace(
            array('E', 'R', 'M', 'N', 'J', 'I', 'Z', 'K', 'L', 'O'),
            array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),
            $id);
        $id -= 1112223333;

        return $id;
    }
}
if (!function_exists('convertToLatin')) {
    /**
     * Function convertToLatin
     *
     * Hàm dùng để convert các ký tự có dấu thành không dấu
     * Dùng tốt cho các chức năng SEO
     * vì nhiều engine không hiểu được dấu tiếng Việt
     * nên cần phải bỏ dấu tiếng Việt đi
     *
     * @param string $string
     * @param false $alphabetOnly
     * @param bool $toLower
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 07:43
     */
    function convertToLatin($string = '', $alphabetOnly = false, $toLower = true)
    {
        $output = $string;
        if ($output !== '') {
            //Tien hanh xu ly bo dau o day
            $search = array('&#225;', '&#224;', '&#7843;', '&#227;', '&#7841;', '&#259;', '&#7855;', '&#7857;', '&#7859;', '&#7861;', '&#7863;', '&#226;', '&#7845;', '&#7847;', '&#7849;', '&#7851;', '&#7853;', '&#273;', '&#233;', '&#232;',
                '&#7867;', '&#7869;', '&#7865;', '&#234;', '&#7871;', '&#7873;', '&#7875;', '&#7877;', '&#7879;', '&#237;', '&#236;', '&#7881;', '&#297;', '&#7883;', '&#243;', '&#242;', '&#7887;', '&#245;', '&#7885;', '&#244;',
                '&#7889;', '&#7891;', '&#7893;', '&#7895;', '&#7897;', '&#417;', '&#7899;', '&#7901;', '&#7903;', '&#7905;', '&#7907;', '&#250;', '&#249;', '&#7911;', '&#361;', '&#7909;', '&#432;', '&#7913;', '&#7915;', '&#7917;',
                '&#7919;', '&#7921;', '&#253;', '&#7923;', '&#7927;', '&#7929;', '&#7925;', '&#193;', '&#192;', '&#7842;', '&#195;', '&#7840;', '&#258;', '&#7854;', '&#7856;', '&#7858;', '&#7860;', '&#7862;', '&#194;', '&#7844;',
                '&#7846;', '&#7848;', '&#7850;', '&#7852;', '&#272;', '&#201;', '&#200;', '&#7866;', '&#7868;', '&#7864;', '&#202;', '&#7870;', '&#7872;', '&#7874;', '&#7876;', '&#7878;', '&#205;', '&#204;', '&#7880;', '&#296;',
                '&#7882;', '&#211;', '&#210;', '&#7886;', '&#213;', '&#7884;', '&#212;', '&#7888;', '&#7890;', '&#7892;', '&#7894;', '&#7896;', '&#416;', '&#7898;', '&#7900;', '&#7902;', '&#7904;', '&#7906;', '&#218;', '&#217;',
                '&#7910;', '&#360;', '&#7908;', '&#431;', '&#7912;', '&#7914;', '&#7916;', '&#7918;', '&#7920;', '&#221;', '&#7922;', '&#7926;', '&#7928;', '&#7924;');
            $search2 = array('á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'đ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'í', 'ì', 'ỉ', 'ĩ', 'ị', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ó ', 'ô', 'ố', 'ồ', 'ổ',
                'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'u', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Đ', 'É',
                'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Ý',
                'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ');
            $replace = array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
                'o', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'y', 'y', 'y', 'y', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'D', 'E', 'E', 'E',
                'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'Y', 'Y', 'Y',
                'Y', 'Y');
            $output = str_replace(array($search, $search2), array($replace, $replace), $output);
            if ($alphabetOnly) {
                $output = alphabetOnly($output);
            }
            if ($toLower) {
                $output = mb_strtolower($output);
            }
        }

        return $output;
    }
}
if (!function_exists('specialCharToNormalChar')) {
    /**
     * Function specialCharToNormalChar
     *
     * Chuyển đổi ký tự đặc biệt thành char
     *
     * @param string $string
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 08:00
     */
    function specialCharToNormalChar($string = '')
    {
        $output = $string;
        if ($output !== '') {
            //Tien hanh xu ly bo dau o day
            $search = array('&#225;', '&#224;', '&#7843;', '&#227;', '&#7841;', '&#259;', '&#7855;', '&#7857;', '&#7859;', '&#7861;', '&#7863;', '&#226;', '&#7845;', '&#7847;', '&#7849;', '&#7851;', '&#7853;', '&#273;', '&#233;', '&#232;',
                '&#7867;', '&#7869;', '&#7865;', '&#234;', '&#7871;', '&#7873;', '&#7875;', '&#7877;', '&#7879;', '&#237;', '&#236;', '&#7881;', '&#297;', '&#7883;', '&#243;', '&#242;', '&#7887;', '&#245;', '&#7885;', '&#244;',
                '&#7889;', '&#7891;', '&#7893;', '&#7895;', '&#7897;', '&#417;', '&#7899;', '&#7901;', '&#7903;', '&#7905;', '&#7907;', '&#250;', '&#249;', '&#7911;', '&#361;', '&#7909;', '&#432;', '&#7913;', '&#7915;', '&#7917;',
                '&#7919;', '&#7921;', '&#253;', '&#7923;', '&#7927;', '&#7929;', '&#7925;', '&#193;', '&#192;', '&#7842;', '&#195;', '&#7840;', '&#258;', '&#7854;', '&#7856;', '&#7858;', '&#7860;', '&#7862;', '&#194;', '&#7844;',
                '&#7846;', '&#7848;', '&#7850;', '&#7852;', '&#272;', '&#201;', '&#200;', '&#7866;', '&#7868;', '&#7864;', '&#202;', '&#7870;', '&#7872;', '&#7874;', '&#7876;', '&#7878;', '&#205;', '&#204;', '&#7880;', '&#296;',
                '&#7882;', '&#211;', '&#210;', '&#7886;', '&#213;', '&#7884;', '&#212;', '&#7888;', '&#7890;', '&#7892;', '&#7894;', '&#7896;', '&#416;', '&#7898;', '&#7900;', '&#7902;', '&#7904;', '&#7906;', '&#218;', '&#217;',
                '&#7910;', '&#360;', '&#7908;', '&#431;', '&#7912;', '&#7914;', '&#7916;', '&#7918;', '&#7920;', '&#221;', '&#7922;', '&#7926;', '&#7928;', '&#7924;');
            $replace = array('á', 'à', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'đ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ', 'í', 'ì', 'ỉ', 'ĩ', 'ị', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ',
                'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự', 'ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Đ', 'É', 'È', 'Ẻ',
                'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'Ý', 'Ỳ', 'Ỷ',
                'Ỹ', 'Ỵ');
            $output = str_replace($search, $replace, $output);
        }

        return $output;
    }
}
if (!function_exists('alphabetOnly')) {
    /**
     * Function alphabetOnly - Loại bỏ các ký tự không phải alphabet
     *
     * @param string $string
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 09:19
     */
    function alphabetOnly($string = '')
    {
        if (empty($string)) {
            return $string;
        }
        $output = $string;
        // replace no alphabet character
        $output = preg_replace("/[^a-zA-Z0-9]/", "-", $output);
        $output = preg_replace("/-+/", "-", $output);

        return trim($output, '-');
    }
}
if (!function_exists('boDauTiengViet')) {
    /**
     * Function boDauTiengViet - Tính năng chả khác mịa gì codau2khongdau()
     *
     * @param $input_string
     *
     * @return array|mixed|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 23/02/2023 56:11
     */
    function boDauTiengViet($input_string = '')
    {
        $str = $input_string;
        if ($str !== '') {
            // Mảng tiếng Việt
            $marTViet = array("à", "á", "ạ", "ả", "ã", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "â", "ằ", "ắ", "ặ", "ẳ", "ẵ", "ă", "è", "é", "ẹ", "ẻ", "ẽ", "ề", "ế", "ệ", "ể", "ễ", "ê", "ì", "í", "ị", "ỉ", "ĩ", "ò", "ó", "ọ", "ỏ", "õ", "ồ", "ố", "ộ", "ổ", "ỗ",
                "ô", "ờ", "ớ", "ợ", "ở", "ỡ", "ơ", "ù", "ú", "ụ", "ủ", "ũ", "ừ", "ứ", "ự", "ử", "ữ", "ư", "ỳ", "ý", "ỵ", "ỷ", "ỹ", "đ", "A", "À", "Á", "Ạ", "Ả", "Ã", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Â", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ", "Ă", "È",
                "É", "Ẹ", "Ẻ", "Ẽ", "E", "Ề", "Ế", "Ệ", "Ể", "Ễ", "Ê", "I", "Ì", "Í", "Ị", "Ỉ", "Ĩ", "O", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ô", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ", "Ơ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "U", "Ừ", "Ứ", "Ự",
                "Ử", "Ữ", "Ư", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ", "Y", "Đ", "B", "C", "D", "F", "G", "H", "I", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "V", "X", "Y", "Z", "W");
            // Mảng ko dấu
            $marKoDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
                "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e",
                "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u",
                "u", "u", "u", "y", "y", "y", "y", "y", "y", "d", "b", "c", "d", "f", "g", "h", "i", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "x", "y", "z", "w");
            // Tiến hành chuyển đổi Mảng tiếng Việt thành Mảng ko dấu
            // Lọc các ký tự đặc biệt
            // Bỏ khoảng trắng
            $str = str_replace(
                array($marTViet, ',', ';', '\'', '"', '(', ')', '.', ':', '…', '[', ']', '|', '\\', '?', "/", "!", "@", "#", "$", "^", "&", "*", "+", "=", "<", ">", "–", '™', '®', '%', '“', '”', '’', '‘', ' '),
                array($marKoDau, '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-', '-', '-',
                    '-'),
                $str
            );
            // Loại bỏ ký tự trùng lặp special (-)
            while (mb_strpos($str, '--') > 0) {
                $str = str_replace('--', '-', $str);
            }
            while (mb_strpos($str, '--') === 0) {
                $str = str_replace('--', '-', $str);
            }
        }

        return $str;
    }
}
if (!function_exists('removeSpecialChar')) {
    /**
     * Function remove_special_char - Loại bỏ ký tự tiếng Việt theo phong cách phức tạp hơn
     *
     * @param string $input_string
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 10:51
     */
    function removeSpecialChar($input_string = '')
    {
        if (empty($input_string)) {
            return $input_string;
        }
        $str = trim($input_string);
        if ($str) {
            $str = str_replace(
                array(
                    '#039', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')',
                    '_', '=', '{', '}', '[', ']', '\\', '/', '|', ':', ';',
                    '"', "'", '=', "<", ",", ">", ".", '=', '?'
                ),
                '',
                $str
            );
        }

        return $str;
    }
}
if (!function_exists('getPermalinksSEO')) {
    /**
     * Function getPermalinksSEO
     *
     * Hàm dùng để convert các ký tự có dấu thành không dấu
     * Dùng tốt cho các chức năng SEO
     * vì nhiều engine không hiểu được dấu tiếng Việt
     * nên cần phải bỏ dấu tiếng Việt đi
     *
     * @param string $input_string
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 11:10
     */
    function getPermalinksSEO($input_string = '')
    {
        if (empty($input_string)) {
            return $input_string;
        }
        $str = $input_string;
        if ($str !== '') {
            $str = str_replace(array(' ', '---'), '-', boDauTiengViet(trim($str)));
            $str = specialCharToNormalChar($str);
            $str = convertToLatin($str);
            $str = removeSpecialChar($str);
            $str = trim(trim(trim($str, '-'), '?'), '!');
        }

        return $str;
    }
}
if (!function_exists('private_url')) {
    /**
     * Function private_url
     *
     * @param $uri
     *
     * @return mixed|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 44:55
     */
    function private_url($uri = '')
    {
        if (function_exists('config_item')) {
            return config_item('private_url') . $uri;
        }

        return $uri;
    }
}
if (!function_exists('private_api_url')) {
    /**
     * Function private_api_url
     *
     * @param $uri
     *
     * @return mixed|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 44:55
     */
    function private_api_url($uri = '')
    {
        if (function_exists('config_item')) {
            return config_item('private_api_url') . $uri;
        }

        return $uri;
    }
}
if (!function_exists('cdn_url')) {
    /**
     * Function cdn_url
     *
     * @param $uri
     *
     * @return mixed|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 16/06/2022 44:55
     */
    function cdn_url($uri = '')
    {
        if (function_exists('config_item')) {
            return config_item('cdn_url') . $uri;
        }

        return $uri;
    }
}
if (!function_exists('images_url')) {
    /**
     * Function images_url
     *
     * @param $url
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/02/2023 19:42
     */
    function images_url($url = '')
    {
        $url = trim($url);
        $url = bear_framework_image_url($url);
        return trim($url);
    }
}
if (!function_exists('audio_url')) {
    /**
     * Function audio_url
     *
     * @param $input
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/02/2023 01:27
     */
    function audio_url($input = '')
    {
        $audio_url = trim($input);
        if (!empty($audio_url)) {
            $parse_input = parse_url($audio_url);
            if (isset($parse_input['host'])) {
                return $audio_url;
            }

            return static_url($audio_url);
        }

        return $audio_url;
    }
}
if (!function_exists('append_params_into_url')) {
    /**
     * Function Append parameters to URL
     *
     * @param $url
     * @param $params
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 17/04/2023 29:59
     */
    function append_params_into_url($url, $params)
    {
        $urlParts = parse_url($url);
        if (isset($urlParts['query'])) {
            $queryParams = array();
            parse_str($urlParts['query'], $queryParams);
            $queryParams = array_merge($queryParams, $params);
            $urlParts['query'] = http_build_query($queryParams);
        } else {
            $urlParts['query'] = http_build_query($params);
        }

        $newUrl = $urlParts['scheme'] . '://' . $urlParts['host'] . $urlParts['path'] . '?' . $urlParts['query'];

        if (isset($urlParts['port'])) {
            $newUrl = $urlParts['scheme'] . '://' . $urlParts['host'] . ':' . $urlParts['port'] . $urlParts['path'] . '?' . $urlParts['query'];
        }

        return $newUrl;
    }
}
if (!function_exists('append_query_string_to_current_url')) {
    /**
     * Function Get current URL including query string
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 17/04/2023 31:27
     */
    function append_query_string_to_current_url()
    {
        if (function_exists('current_url')) {
            $url = current_url();
            if (!empty($_SERVER['QUERY_STRING'])) {
                $url .= '?' . $_SERVER['QUERY_STRING'];
            }

            return $url;
        }

        return '';
    }
}
