<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 08:52
 */
if (!function_exists('uuid_is_valid')) {
    /**
     * @param $uuid
     *
     * @return bool
     */
    function uuid_is_valid($uuid)
    {
        return preg_match('/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?' . '[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i', $uuid) === 1;
    }
}
if (!function_exists('generate_uuid_v3')) {
    /**
     * Generate v3 UUID
     *
     * @param $namespace
     * @param $name
     *
     * @return bool|string
     */
    function generate_uuid_v3($namespace, $name)
    {
        if (!uuid_is_valid($namespace)) {
            return false;
        }
        // Get hexadecimal components of namespace
        $nhex = str_replace(array('-', '{', '}'), '', $namespace);
        // Binary Value
        $nstr = '';
        // Convert Namespace UUID to bits
        $iMax = mb_strlen($nhex);
        for ($i = 0; $i < $iMax; $i += 2) {
            $nstr .= mb_chr(hexdec($nhex[$i] . $nhex[$i + 1]));
        }
        // Calculate hash value
        $hash = md5($nstr . $name);

        return sprintf('%08s-%04s-%04x-%04x-%12s', // 32 bits for "time_low"
                       mb_substr($hash, 0, 8), // 16 bits for "time_mid"
                       mb_substr($hash, 8, 4), // 16 bits for "time_hi_and_version",

            // four most significant bits holds version number 3
                       (hexdec(mb_substr($hash, 12, 4)) & 0x0fff) | 0x3000, // 16 bits, 8 bits for "clk_seq_hi_res",

            // 8 bits for "clk_seq_low",

            // two most significant bits holds zero and one for variant DCE1.1
                       (hexdec(mb_substr($hash, 16, 4)) & 0x3fff) | 0x8000, // 48 bits for "node"
                       mb_substr($hash, 20, 12));
    }
}
if (!function_exists('generate_uuid_v4')) {
    /**
     * Function generate_uuid_v4
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 52:37
     */
    function generate_uuid_v4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), // 32 bits for "time_low"
                       mt_rand(0, 0xffff), // 16 bits for "time_mid"
                       mt_rand(0, 0xffff), // 16 bits for "time_hi_and_version",

            // four most significant bits holds version number 4
                       mt_rand(0, 0x0fff) | 0x4000, // 16 bits, 8 bits for "clk_seq_hi_res",

            // 8 bits for "clk_seq_low",

            // two most significant bits holds zero and one for variant DCE1.1
                       mt_rand(0, 0x3fff) | 0x8000, // 48 bits for "node"
                       mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
    }
}
if (!function_exists('generate_uuid_v5')) {
    /**
     * Generate v5 UUID
     *
     * @param $namespace
     * @param $name
     *
     * @return bool|string
     */
    function generate_uuid_v5($namespace, $name)
    {
        if (!uuid_is_valid($namespace)) {
            return false;
        }
        // Get hexadecimal components of namespace
        $nhex = str_replace(array('-', '{', '}'), '', $namespace);
        // Binary Value
        $nstr = '';
        // Convert Namespace UUID to bits
        $iMax = mb_strlen($nhex);
        for ($i = 0; $i < $iMax; $i += 2) {
            $nstr .= mb_chr(hexdec($nhex[$i] . $nhex[$i + 1]));
        }
        // Calculate hash value
        $hash = sha1($nstr . $name);

        return sprintf('%08s-%04s-%04x-%04x-%12s', // 32 bits for "time_low"
                       mb_substr($hash, 0, 8), // 16 bits for "time_mid"
                       mb_substr($hash, 8, 4), // 16 bits for "time_hi_and_version",

            // four most significant bits holds version number 5
                       (hexdec(mb_substr($hash, 12, 4)) & 0x0fff) | 0x5000, // 16 bits, 8 bits for "clk_seq_hi_res",

            // 8 bits for "clk_seq_low",

            // two most significant bits holds zero and one for variant DCE1.1
                       (hexdec(mb_substr($hash, 16, 4)) & 0x3fff) | 0x8000, // 48 bits for "node"
                       mb_substr($hash, 20, 12));
    }
}
