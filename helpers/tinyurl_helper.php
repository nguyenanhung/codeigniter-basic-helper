<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/15/2021
 * Time: 00:23
 */
if (!function_exists('short_url_with_tinyurl')) {
    /**
     * Function short_url_with_tinyurl
     *
     * @param string $longUrl
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 29:39
     */
    function short_url_with_tinyurl($longUrl = '')
    {
        $needUrl = 'https://tinyurl.com/api-create.php?url=' . $longUrl;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $needUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
