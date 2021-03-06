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
     * @param string              $url    URL Target Endpoint
     * @param string|array|object $data   Array Data to Request
     * @param string              $method GET or POST
     *
     * @return bool|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/03/2021 20:38
     */
    function sendSimpleGetRequest($url = '', $data = array(), $method = 'GET')
    {
        $target = (!empty($data) && (is_array($data) || is_object($data))) ? $url . '?' . http_build_query($data) : $url;
        $method = strtoupper($method);
        $curl   = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $target,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_POSTFIELDS     => "",
            CURLOPT_HTTPHEADER     => array(),
        ));
        $response = curl_exec($curl);
        $err      = curl_error($curl);
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
     * Th???c hi???n y??u c???u POST kh??ng ?????ng b??? trong n???i b??? site m?? kh??ng c???n ch??? ph???n h???i
     * => Kh??ng ???nh h?????ng, kh??ng tr?? ho??n ti???n tr??nh ??ang ch???y
     *
     * @param mixed $url
     * @param mixed $params
     * @param array $headers
     */
    function bear_post_async_request($url, $params, $headers = array())
    {
        ksort($params);
        $post_string = http_build_query($params);
        $parts       = parse_url($url);

        $is_https = ($parts['scheme'] === 'https');
        $referer  = $parts['scheme'] . '://' . $parts['host'];
        if (!$is_https) {
            $port = isset($parts['port']) ? $parts['port'] : 80;
            $host = $parts['host'] . ($port != 80 ? ':' . $port : '');
            isset($parts['port']) && $referer .= ':' . $parts['port'];
            $fp = fsockopen($parts['host'], $port, $errno, $errstr, 30);
        } else {
            $context = stream_context_create(
                array(
                    "ssl" => array(
                        "verify_peer"      => false,
                        "verify_peer_name" => false
                    )
                )
            );
            $port    = isset($parts['port']) ? $parts['port'] : 443;
            $host    = $parts['host'] . ($port != 443 ? ':' . $port : '');
            $referer .= ':' . (isset($parts['port']) ? $parts['port'] : 443);
            $fp      = stream_socket_client('ssl://' . $parts['host'] . ':' . $port, $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);
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
        $out .= "Content-Length: " . strlen($post_string) . "\r\n";
        if (!empty($headers)) {
            foreach ($headers as $key => $value) {
                $out .= "{$key}: {$value}\r\n";
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
