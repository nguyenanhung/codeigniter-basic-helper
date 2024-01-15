<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 22/03/2023
 * Time: 13:13
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

use Exception;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * SimpleRequests Class
 *
 * This class provides basic functionalities for sending HTTP requests.
 * Refactored for better structure, readability, and PHP > 5.6 compatibility.
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class SimpleRequests
{
    protected $DEBUG = false;
    protected $logger = null;
    protected $logger_path = null;
    protected $timeout = 60;
    protected $header = array();

    /**
     * SimpleRequests constructor.
     *
     * @param $options
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @author   : 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct($options = [])
    {
        $monolog = array(
            'dateFormat' => "Y-m-d H:i:s u",
            'outputFormat' => "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
            'monoBubble' => true,
            'monoFilePermission' => 0777
        );

        if (isset($options['logger_path'])) {
            $this->logger_path = $options['logger_path'];
        }

        if (isset($options['debug_status'])) {
            $this->DEBUG = $options['debug_status'];
        }

        // create a log channel
        $formatter = new LineFormatter($monolog['outputFormat'], $monolog['dateFormat']);
        $stream = new StreamHandler($this->logger_path . 'Simple-Requests/Log-' . date('Y-m-d') . '.log', Logger::INFO, $monolog['monoBubble'], $monolog['monoFilePermission']);
        $stream->setFormatter($formatter);
        $this->logger = new Logger('SimpleRequests');
        $this->logger->pushHandler($stream);

    }

    /**
     * Function setTimeout
     *
     * @param $timeout
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 31:11z
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * Function setHeader
     *
     * @param array $header
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 31:22
     */
    public function setHeader($header = array())
    {
        $this->header = $header;
        return $this;
    }

    /**
     * Function sendRequest
     *
     * @param string $url
     * @param array $data
     * @param string $method
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/18/2021 54:32
     */
    public function sendRequest($url = '', $data = array(), $method = 'GET')
    {
        try {
            $getMethod = mb_strtoupper($method);
            if ($this->DEBUG === true) {
                $this->logger->info('||=========== Logger Send Requests ===========||');
                $this->logger->info('Send ' . $getMethod . ' Request to URL: ' . $url, $data);
            }

            $curl = new BasicCurl();
            $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_ENCODING, "utf-8");
            $curl->setOpt(CURLOPT_MAXREDIRS, 10);
            $curl->setOpt(CURLOPT_TIMEOUT, 300);

            if ('POST' === $getMethod) {
                $curl->post($url, $data);
            } else {
                $curl->get($url, $data);
            }


            if ($curl->error) {
                $response = "cURL Error: " . $curl->error_message;
            } else {
                $response = $curl->response;
            }


            $curl->close();


            if ($this->DEBUG === true) {
                if (is_array($response) || is_object($response)) {
                    $this->logger->info('Response: ' . json_encode($response));
                } else {
                    $this->logger->info('Response: ' . $response);
                }

                if (isset($curl->request_headers)) {
                    if (is_array($curl->request_headers)) {
                        $this->logger->info('Request Header: ', $curl->request_headers);
                    } else {
                        $this->logger->info('Request Header: ' . json_encode($curl->request_headers));
                    }
                }

                if (isset($curl->response_headers)) {
                    if (is_array($curl->response_headers)) {
                        $this->logger->info('Response Header: ', $curl->response_headers);
                    } else {
                        $this->logger->info('Response Header: ' . json_encode($curl->response_headers));
                    }
                }
            }

            return $response;
        } catch (Exception $e) {
            log_message('error', __get_error_message__($e));
            log_message('error', __get_error_trace__($e));
            return null;
        }
    }

    /**
     * Function xmlRequest
     *
     * @param string $url
     * @param string $data
     * @param int $timeout
     *
     * @return bool|string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 32:35
     */
    public function xmlRequest($url = '', $data = '', $timeout = 60)
    {
        if (empty($url) || empty($data)) {
            return null;
        }

        try {
            if ($this->DEBUG === true) {
                $this->logger->info('||=========== Logger xmlRequest ===========||');
                $this->logger->info('Send POST XML Request to URL: ' . $url . ' with DATA: ' . $data);
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            $head[] = "Content-type: text/xml;charset=utf-8";
            curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $response = curl_exec($ch);
            curl_close($ch);

            if ($this->DEBUG === true) {
                $this->logger->info('Response from Request: ' . $response);
            }

            return $response;
        } catch (Exception $e) {
            log_message('error', __get_error_message__($e));
            log_message('error', __get_error_trace__($e));
            return null;
        }
    }

    /**
     * Function xmlGetValue
     *
     * @param $xml
     * @param $openTag
     * @param $closeTag
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/08/2023 49:39
     */
    public function xmlGetValue($xml, $openTag, $closeTag)
    {
        $f = mb_strpos($xml, $openTag) + mb_strlen($openTag);
        $l = mb_strpos($xml, $closeTag);
        return ($f <= $l) ? mb_substr($xml, $f, $l - $f) : "";
    }
}
