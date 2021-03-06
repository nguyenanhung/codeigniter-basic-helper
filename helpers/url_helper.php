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
        $baseUrl    = function_exists('base_url') ? base_url() : '';
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
     * M?? h??a Url ID c???a b??i vi???t, t??ng t??nh b???o m???t
     * S??? d???ng Chu???i sau khi ???? Encode ????? show ra Url
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
     * Gi???i m??i Url ID c???a b??i vi???t ????? l???y ID g???c
     * S??? d???ng ID g???c n??y ????? truy v???n v??o server l???y th??ng tin
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
        $id = strtoupper($id);
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
     * H??m d??ng ????? convert c??c k?? t??? c?? d???u th??nh kh??ng d???u
     * D??ng t???t cho c??c ch???c n??ng SEO
     * v?? nhi???u engine kh??ng hi???u ???????c d???u ti???ng Vi???t
     * n??n c???n ph???i b??? d???u ti???ng Vi???t ??i
     *
     * @param string $string
     * @param false  $alphabetOnly
     * @param bool   $toLower
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
            $search  = array('&#225;', '&#224;', '&#7843;', '&#227;', '&#7841;', '&#259;', '&#7855;', '&#7857;', '&#7859;', '&#7861;', '&#7863;', '&#226;', '&#7845;', '&#7847;', '&#7849;', '&#7851;', '&#7853;', '&#273;', '&#233;', '&#232;',
                             '&#7867;', '&#7869;', '&#7865;', '&#234;', '&#7871;', '&#7873;', '&#7875;', '&#7877;', '&#7879;', '&#237;', '&#236;', '&#7881;', '&#297;', '&#7883;', '&#243;', '&#242;', '&#7887;', '&#245;', '&#7885;', '&#244;',
                             '&#7889;', '&#7891;', '&#7893;', '&#7895;', '&#7897;', '&#417;', '&#7899;', '&#7901;', '&#7903;', '&#7905;', '&#7907;', '&#250;', '&#249;', '&#7911;', '&#361;', '&#7909;', '&#432;', '&#7913;', '&#7915;', '&#7917;',
                             '&#7919;', '&#7921;', '&#253;', '&#7923;', '&#7927;', '&#7929;', '&#7925;', '&#193;', '&#192;', '&#7842;', '&#195;', '&#7840;', '&#258;', '&#7854;', '&#7856;', '&#7858;', '&#7860;', '&#7862;', '&#194;', '&#7844;',
                             '&#7846;', '&#7848;', '&#7850;', '&#7852;', '&#272;', '&#201;', '&#200;', '&#7866;', '&#7868;', '&#7864;', '&#202;', '&#7870;', '&#7872;', '&#7874;', '&#7876;', '&#7878;', '&#205;', '&#204;', '&#7880;', '&#296;',
                             '&#7882;', '&#211;', '&#210;', '&#7886;', '&#213;', '&#7884;', '&#212;', '&#7888;', '&#7890;', '&#7892;', '&#7894;', '&#7896;', '&#416;', '&#7898;', '&#7900;', '&#7902;', '&#7904;', '&#7906;', '&#218;', '&#217;',
                             '&#7910;', '&#360;', '&#7908;', '&#431;', '&#7912;', '&#7914;', '&#7916;', '&#7918;', '&#7920;', '&#221;', '&#7922;', '&#7926;', '&#7928;', '&#7924;');
            $search2 = array('??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '??', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '??', '???', '??', '???', 'o?? ', '??', '???', '???', '???',
                             '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', 'u', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??',
                             '??', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??',
                             '???', '???', '???', '???');
            $replace = array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
                             'o', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'y', 'y', 'y', 'y', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'D', 'E', 'E', 'E',
                             'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'Y', 'Y', 'Y',
                             'Y', 'Y');
            $output  = str_replace(array($search, $search2), array($replace, $replace), $output);
            if ($alphabetOnly) {
                $output = alphabetOnly($output);
            }
            if ($toLower) {
                $output = strtolower($output);
            }
        }

        return $output;
    }
}
if (!function_exists('specialCharToNormalChar')) {
    /**
     * Function specialCharToNormalChar
     *
     * Chuy???n ?????i k?? t??? ?????c bi???t th??nh char
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
            $search  = array('&#225;', '&#224;', '&#7843;', '&#227;', '&#7841;', '&#259;', '&#7855;', '&#7857;', '&#7859;', '&#7861;', '&#7863;', '&#226;', '&#7845;', '&#7847;', '&#7849;', '&#7851;', '&#7853;', '&#273;', '&#233;', '&#232;',
                             '&#7867;', '&#7869;', '&#7865;', '&#234;', '&#7871;', '&#7873;', '&#7875;', '&#7877;', '&#7879;', '&#237;', '&#236;', '&#7881;', '&#297;', '&#7883;', '&#243;', '&#242;', '&#7887;', '&#245;', '&#7885;', '&#244;',
                             '&#7889;', '&#7891;', '&#7893;', '&#7895;', '&#7897;', '&#417;', '&#7899;', '&#7901;', '&#7903;', '&#7905;', '&#7907;', '&#250;', '&#249;', '&#7911;', '&#361;', '&#7909;', '&#432;', '&#7913;', '&#7915;', '&#7917;',
                             '&#7919;', '&#7921;', '&#253;', '&#7923;', '&#7927;', '&#7929;', '&#7925;', '&#193;', '&#192;', '&#7842;', '&#195;', '&#7840;', '&#258;', '&#7854;', '&#7856;', '&#7858;', '&#7860;', '&#7862;', '&#194;', '&#7844;',
                             '&#7846;', '&#7848;', '&#7850;', '&#7852;', '&#272;', '&#201;', '&#200;', '&#7866;', '&#7868;', '&#7864;', '&#202;', '&#7870;', '&#7872;', '&#7874;', '&#7876;', '&#7878;', '&#205;', '&#204;', '&#7880;', '&#296;',
                             '&#7882;', '&#211;', '&#210;', '&#7886;', '&#213;', '&#7884;', '&#212;', '&#7888;', '&#7890;', '&#7892;', '&#7894;', '&#7896;', '&#416;', '&#7898;', '&#7900;', '&#7902;', '&#7904;', '&#7906;', '&#218;', '&#217;',
                             '&#7910;', '&#360;', '&#7908;', '&#431;', '&#7912;', '&#7914;', '&#7916;', '&#7918;', '&#7920;', '&#221;', '&#7922;', '&#7926;', '&#7928;', '&#7924;');
            $replace = array('??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '??', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???',
                             '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '??', '???',
                             '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???', '???', '???', '???', '??', '??', '???', '??', '???', '??', '???', '???', '???', '???', '???', '??', '???', '???',
                             '???', '???');
            $output  = str_replace($search, $replace, $output);
        }

        return $output;
    }
}
if (!function_exists('alphabetOnly')) {
    /**
     * Function alphabetOnly - Lo???i b??? c??c k?? t??? kh??ng ph???i alphabet
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
        $output = $string;
        // replace no alphabet character
        $output = preg_replace("/[^a-zA-Z0-9]/", "-", $output);
        $output = preg_replace("/-+/", "-", $output);

        return trim($output, '-');
    }
}
if (!function_exists('boDauTiengViet')) {
    /**
     * Function boDauTiengViet - T??nh n??ng ch??? kh??c m???a g?? codau2khongdau()
     *
     * @param string $input_string
     *
     * @return array|mixed|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 30/07/2022 29:01
     */
    function boDauTiengViet($input_string = '')
    {
        $str = $input_string;
        if ($str !== '') {
            // M???ng ti???ng Vi???t
            $marTViet = array("??", "??", "???", "???", "??", "???", "???", "???", "???", "???", "??", "??", "???", "???", "???", "???", "???", "??", "??", "??", "???", "???", "???", "???", "???", "???", "???", "???", "??", "??", "??", "???", "???", "??", "??", "??", "???", "???", "??", "???", "???", "???", "???", "???",
                              "??", "???", "???", "???", "???", "???", "??", "??", "??", "???", "???", "??", "???", "???", "???", "???", "???", "??", "???", "??", "???", "???", "???", "??", "A", "??", "??", "???", "???", "??", "???", "???", "???", "???", "???", "??", "??", "???", "???", "???", "???", "???", "??", "??",
                              "??", "???", "???", "???", "E", "???", "???", "???", "???", "???", "??", "I", "??", "??", "???", "???", "??", "O", "??", "??", "???", "???", "??", "???", "???", "???", "???", "???", "??", "???", "???", "???", "???", "???", "??", "??", "??", "???", "???", "??", "U", "???", "???", "???",
                              "???", "???", "??", "???", "??", "???", "???", "???", "Y", "??", "B", "C", "D", "F", "G", "H", "I", "J", "K", "L", "M", "N", "P", "Q", "R", "S", "T", "V", "X", "Y", "Z", "W");
            // M???ng ko d???u
            $marKoDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
                              "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e",
                              "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u",
                              "u", "u", "u", "y", "y", "y", "y", "y", "y", "d", "b", "c", "d", "f", "g", "h", "i", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "x", "y", "z", "w");
            // Ti???n h??nh chuy???n ?????i M???ng ti???ng Vi???t th??nh M???ng ko d???u
            // L???c c??c k?? t??? ?????c bi???t
            // B??? kho???ng tr???ng
            $str = str_replace(
                array($marTViet, ',', ';', '\'', '"', '(', ')', '.', ':', '???', '[', ']', '|', '\\', '?', "/", "!", "@", "#", "$", "^", "&", "*", "+", "=", "<", ">", "???", '???', '??', '%', '???', '???', '???', '???', ' '),
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
            // Lo???i b??? k?? t??? tr??ng l???p special (-)
            while (strpos($str, '--') > 0) {
                $str = str_replace('--', '-', $str);
            }
            while (strpos($str, '--') === 0) {
                $str = str_replace('--', '-', $str);
            }
        }

        return $str;
    }
}
if (!function_exists('removeSpecialChar')) {
    /**
     * Function remove_special_char - Lo???i b??? k?? t??? ti???ng Vi???t theo phong c??ch ph???c t???p h??n
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
        $str = trim($input_string);
        if ($str) {
            $str = str_replace(array('#039', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '=', '{', '}', '[', ']', '\\', '/', '|', ':', ';', '"', "'", '=', "<", ",", ">", ".", '=', '?'), '', $str);
        }

        return $str;
    }
}
if (!function_exists('getPermalinksSEO')) {
    /**
     * Function getPermalinksSEO
     *
     * H??m d??ng ????? convert c??c k?? t??? c?? d???u th??nh kh??ng d???u
     * D??ng t???t cho c??c ch???c n??ng SEO
     * v?? nhi???u engine kh??ng hi???u ???????c d???u ti???ng Vi???t
     * n??n c???n ph???i b??? d???u ti???ng Vi???t ??i
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
