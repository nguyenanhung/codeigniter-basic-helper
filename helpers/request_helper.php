<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 10/05/2021
 * Time: 03:52
 */
if (!function_exists('sendSimpleGetRequest')) {
    /**
     * Function sendSimpleGetRequest
     *
     * @param string $url URL Target Endpoint
     * @param string|array|object $data Array Data to Request
     * @param string $method GET or POST
     *
     * @return bool|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/03/2021 20:38
     */
    function sendSimpleGetRequest($url = '', $data = array(), $method = 'GET')
    {
        $method = mb_strtoupper($method);
        if ((!empty($data) && (is_array($data) || is_object($data)))) {
            $target = $url . '?' . http_build_query($data);
        } else {
            $target = $url;
        }
        $parseUrl = parse_url($target);
        $UA = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.1.2 Safari/605.1.15';
        $curl = curl_init();
        $options = array(
            CURLOPT_URL => $target,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array($UA),
        );
        if (isset($parseUrl['scheme']) && $parseUrl['scheme'] === 'https') {
            $options[CURLOPT_SSLVERSION] = CURL_SSLVERSION_TLSv1_2;
        }
        if (isset($parseUrl['scheme']) && $parseUrl['scheme'] === 'http') {
            $options[CURLOPT_HTTP_VERSION] = CURL_HTTP_VERSION_1_1;
        }
        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $message = "cURL Error #: " . $err;
            if (function_exists('log_message')) {
                log_message('error', $message);
            }

            return null;
        }

        return $response;
    }
}
if (!function_exists('sendSimpleRestfulExecuteRequest')) {
    function sendSimpleRestfulExecuteRequest($url, $type, $data = "", $header = null)
    {
        return \nguyenanhung\CodeIgniter\BasicHelper\SimpleRestful::execute($url, $type, $data, $header);
    }
}
if (!function_exists('bear_post_async_request')) {
    /**
     * Make an asynchronous POST request
     * Thực hiện yêu cầu POST không đồng bộ trong nội bộ site mà không cần chờ phản hồi
     * => Không ảnh hưởng, không trì hoãn tiến trình đang chạy
     *
     * @param mixed $url
     * @param mixed $params
     * @param array $headers
     */
    function bear_post_async_request($url, $params, $headers = array())
    {
        ksort($params);
        $post_string = http_build_query($params);
        $parts = parse_url($url);
        $is_https = ($parts['scheme'] === 'https');
        $referer = $parts['scheme'] . '://' . $parts['host'];
        if (!$is_https) {
            $port = isset($parts['port']) ? $parts['port'] : 80;
            $port = (int)$port;
            $host = $parts['host'] . ($port !== 80 ? ':' . $port : '');
            isset($parts['port']) && $referer .= ':' . $parts['port'];
            $fp = fsockopen($parts['host'], $port, $errno, $errorMessage, 30);
        } else {
            $options = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false
                )
            );
            $context = stream_context_create($options);
            $port = isset($parts['port']) ? $parts['port'] : 443;
            $port = (int)$port;
            $host = $parts['host'] . ($port !== 443 ? ':' . $port : '');
            $referer .= ':' . (isset($parts['port']) ? $parts['port'] : 443);
            $fp = stream_socket_client(
                'ssl://' . $parts['host'] . ':' . $port,
                $errno,
                $errorMessage,
                30,
                STREAM_CLIENT_CONNECT,
                $context
            );
        }
        $path = isset($parts['path']) ? $parts['path'] : '/';
        if (isset($parts['query'])) {
            $path .= '?' . $parts['query'];
        }
        $out = "POST " . $path . " HTTP/1.1\r\n";
        $out .= "Host: " . $host . "\r\n";
        $out .= "User-Agent: BEAR Framework\r\n";
        $out .= "Referer: " . $referer . "\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "Content-Length: " . mb_strlen($post_string) . "\r\n";
        if (!empty($headers)) {
            foreach ($headers as $key => $value) {
                $out .= $key . ": " . $value . "\r\n";
            }
        }
        $out .= "Connection: Close\r\n\r\n";
        $out .= $post_string;

        fwrite($fp, $out);
        if ($is_https) {
            stream_set_timeout($fp, 1);
            stream_get_contents($fp, -1);
        }
        fclose($fp);
    }
}
if (!function_exists('get_http_response_code')) {
    /**
     * Function get_http_response_code
     *
     * @param $url
     *
     * @return int|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/08/2023 42:35
     */
    function get_http_response_code($url = '')
    {
        $uri = $url;
        if ($uri !== '') {
            $headers = get_headers($uri);
            return mb_substr($headers[0], 9, 3);
        }

        return 200;
    }
}
