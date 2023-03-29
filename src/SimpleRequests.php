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
 * Class SimpleRequests
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class SimpleRequests
{
    protected $mono;
    protected $DEBUG       = false;
    protected $logger_path = null;
    protected $logger_file;
    protected $timeout     = 60;
    protected $header      = array();

    /**
     * Requests constructor.
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct()
    {
        $this->logger_file = 'Log-' . date('Y-m-d') . '.log';
        $this->mono = array(
            'dateFormat'         => "Y-m-d H:i:s u",
            'outputFormat'       => "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
            'monoBubble'         => true,
            'monoFilePermission' => 0777
        );
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
     * @param array  $data
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
            $getMethod = strtoupper($method);
            // create a log channel
            $formatter = new LineFormatter($this->mono['outputFormat'], $this->mono['dateFormat']);
            $stream = new StreamHandler($this->logger_path . 'sendRequest/' . $this->logger_file, Logger::INFO, $this->mono['monoBubble'], $this->mono['monoFilePermission']);
            $stream->setFormatter($formatter);
            $logger = new Logger('Curl');
            $logger->pushHandler($stream);
            if ($this->DEBUG === true) {
                $logger->info('||=========== Logger Requests ===========||');
                $logger->info('Method: ' . $getMethod);
                $logger->info('Request: ' . $url, $data);
            }
            // Curl
            $curl = new BasicCurl();
            $curl->setOpt(CURLOPT_RETURNTRANSFER, true);
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setOpt(CURLOPT_ENCODING, "utf-8");
            $curl->setOpt(CURLOPT_MAXREDIRS, 10);
            $curl->setOpt(CURLOPT_TIMEOUT, 300);
            // Request
            if ('POST' === $getMethod) {
                $curl->post($url, $data);
            } else {
                $curl->get($url, $data);
            }
            // Response
            if ($curl->error) {
                $response = "cURL Error: " . $curl->error_message;
            } else {
                $response = $curl->response;
            }
            // Close Request
            $curl->close();
            // Log Response
            if ($this->DEBUG === true) {
                if (is_array($response) || is_object($response)) {
                    $logger->info('Response: ' . json_encode($response));
                } else {
                    $logger->info('Response: ' . $response);
                }
                if (isset($curl->request_headers)) {
                    if (is_array($curl->request_headers)) {
                        $logger->info('Request Header: ', $curl->request_headers);
                    } else {
                        $logger->info('Request Header: ' . json_encode($curl->request_headers));
                    }
                }
                if (isset($curl->response_headers)) {
                    if (is_array($curl->response_headers)) {
                        $logger->info('Response Header: ', $curl->response_headers);
                    } else {
                        $logger->info('Response Header: ' . json_encode($curl->response_headers));
                    }
                }
            }

            // Return Response
            return $response;
        } catch (Exception $e) {
            log_message('error', __get_error_message__($e));
            log_message('error', __get_error_trace__($e));

            return null;
        }
    }

    // ========================================================================== //

    /**
     * Function xmlRequest
     *
     * @param string $url
     * @param string $data
     * @param int    $timeout
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
            // create a log channel
            $formatter = new LineFormatter($this->mono['outputFormat'], $this->mono['dateFormat']);
            $stream = new StreamHandler($this->logger_path . 'xmlRequest/' . $this->logger_file, Logger::INFO, $this->mono['monoBubble'], $this->mono['monoFilePermission']);
            $stream->setFormatter($formatter);
            $logger = new Logger('request');
            $logger->pushHandler($stream);
            if ($this->DEBUG === true) {
                $logger->info('||=========== Logger xmlRequest ===========||');
                $logger->info('Request URL: ' . $url);
                $logger->info('Request Data: ' . $data);
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
            $page = curl_exec($ch);
            curl_close($ch);
            if ($this->DEBUG === true) {
                $logger->info('Response from Request: ' . $page);
            }

            return $page;
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
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 32:32
     */
    public function xmlGetValue($xml, $openTag, $closeTag)
    {
        $f = strpos($xml, $openTag) + strlen($openTag);
        $l = strpos($xml, $closeTag);

        return ($f <= $l) ? substr($xml, $f, $l - $f) : "";
    }
}
