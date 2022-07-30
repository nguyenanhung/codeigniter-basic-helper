<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 25/04/2022
 * Time: 23:25
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

use Exception;

/**
 * Class SimpleElasticsearch
 *
 * @package   nguyenanhung\CodeIgniter\BasicHelper
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class SimpleElasticsearch extends BaseHelper
{
    protected $host = 'http://localhost';
    protected $port = 9200;

    /**
     *  Function setHost
     *
     * @param string $host
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Function Host
     *
     * @return string
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     *  Function setPort
     *
     * @param int $port
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Function Port
     *
     * @return int
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function getPort()
    {
        return $this->port;
    }

    public function complexSearch($string = null, $fields = array("_all"), $sort = array(), $index = null, $page = 1, $limit = 10, $fullResponse = false, $extraParams = null)
    {
        try {
            $elasticHost = $this->host;
            $elasticPort = $this->port;

            $error_msg = $httpCode = null;

            if (empty($index) || empty($string)) {
                return false;
            }

            $query_string = array(
                "query" => array(
                    "multi_match" => array(
                        "query"  => $string,
                        "fields" => $fields
                    )
                ),
                "size"  => $limit
            );
            if (!empty($sort) && is_array($sort)) {
                $query_string['sort'] = $sort;
            }

            $page && $query_string['from'] = ($page - 1) * $limit;

            $endpoint = $elasticHost . ':' . $elasticPort . '/' . $index . "/_search";

            if ($extraParams !== null && is_array($extraParams)) {
                $endpoint .= '?' . http_build_query($extraParams);
            }

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL            => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'GET',
                CURLOPT_POSTFIELDS     => json_encode($query_string),
                CURLOPT_HTTPHEADER     => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            // echo PHP_EOL . ' GET Request - ' . $elasticHost . ':' . $elasticPort . '/' . $index . '/_search   |-> ' . json_encode($query_string, JSON_PRETTY_PRINT) . ' | -> Response: ' . $response . PHP_EOL;


            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
                $httpCode  = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            }

            curl_close($curl);
            if ($fullResponse === true) {
                return self::fullDataResponse($response, $page, $limit, $error_msg, $httpCode);
            }

            // đoạn này đang resize lại để lấy bản ghi đầu tiên
            return self::resolutionResponse($response, $page, $limit, $error_msg, $httpCode);
        } catch (Exception $e) {
            return [
                'statusCode' => 0,
                'errors'     => "Co loi khi tim kiem san pham, kiem tra lai he thong!"
            ];
        }
    }

    public function filterSearch($index, $query_string, $page = 1, $limit = 10, $fullResponse = false, $extraParams = null)
    {
        try {
            $elasticHost = $this->host;
            $elasticPort = $this->port;
            $error_msg   = $httpCode = null;
            if (empty($index) || empty($query_string)) {
                return false;
            }
            $page && $query_string['from'] = ($page - 1) * $limit;
            $endpoint = $elasticHost . ':' . $elasticPort . '/' . $index . "/_search";
            if ($extraParams !== null && is_array($extraParams)) {
                $endpoint .= '?' . http_build_query($extraParams);
            }
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL            => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'GET',
                CURLOPT_POSTFIELDS     => json_encode($query_string),
                CURLOPT_HTTPHEADER     => array(
                    'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            // echo PHP_EOL . ' GET Request - ' . $elasticHost . ':' . $elasticPort . '/' . $index . '/_search   |-> ' . json_encode($query_string, JSON_PRETTY_PRINT) . ' | -> Response: ' . $response . PHP_EOL;


            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
                $httpCode  = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            }

            curl_close($curl);
            if ($fullResponse === true) {
                return self::fullDataResponse($response, $page, $limit, $error_msg, $httpCode);
            }

            // đoạn này đang resize lại để lấy bản ghi đầu tiên
            return self::resolutionResponse($response, $page, $limit, $error_msg, $httpCode);
        } catch (Exception $exception) {
            return [
                'statusCode' => 0,
                'errors'     => "Co loi khi tim kiem san pham, kiem tra lai he thong!"
            ];
        }
    }

    public static function resolutionResponse($data, $page = 1, $limit = 10, $error_msg = null, $httpCode = null)
    {
        if ($error_msg) {
            $statusCode = $httpCode !== null ? 0 : $httpCode;

            return array(
                'statusCode' => $statusCode,
                'errors'     => $error_msg
            );
        }

        if (!$data) {
            return false;
        }

        $response = json_decode($data, false);

        $total = isset($response->hits->total->value) ? $response->hits->total->value : 0;
        if (isset($response->hits->hits[0]->_source) && !empty($response->hits->hits[0]->_source)) {
            $data = $response->hits->hits[0]->_source;
        } else {
            $data = array();
        }

        return array(
            'total'        => $total,
            'current_page' => $page,
            'per_page'     => $limit,
            'fully_data'   => $response,
            'data'         => $data
        );
    }

    public static function fullDataResponse($data, $page = 1, $limit = 10, $error_msg = null, $httpCode = null)
    {
        if ($error_msg) {
            $statusCode = $httpCode !== null ? 0 : $httpCode;

            return array(
                'statusCode' => $statusCode,
                'errors'     => $error_msg
            );
        }

        if (!$data) {
            return false;
        }

        $response = json_decode($data, false);
        $total    = isset($response->hits->total->value) ? $response->hits->total->value : 0;
        if (isset($response->hits->hits) && !empty($response->hits->hits)) {
            $data = $response->hits->hits;
        } else {
            $data = array();
        }

        return array(
            'total'        => $total,
            'current_page' => $page,
            'per_page'     => $limit,
            'data'         => $data
        );
    }

    public function syncDataElasticsearch($data, $action, $id, $index)
    {
        try {
            $elasticHost = $this->host;
            $elasticPort = $this->port;

            if (empty($index) || empty($action)) {
                return false;
            }


            if ($action !== 'delete' && empty($data)) {
                return false;
            }
            if ($action === 'create' && !($data instanceof Model)) {
                return false;
            }


            $url             = $elasticHost . ':' . $elasticPort . '/' . $index . '/_doc/' . $id;
            $data_config_url = [
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'DELETE',
                CURLOPT_HTTPHEADER     => array(
                    'Content-Type: application/json'
                ),
            ];

            switch ($action) {
                case 'delete':
                    if (!$id) {
                        return false;
                    }
                    $data_config_url[CURLOPT_URL]           = $url;
                    $data_config_url[CURLOPT_CUSTOMREQUEST] = 'DELETE';

                    break;
                case 'update_or_create':
                    $data = is_array($data) ? $data : (array) $data;
                    if (!$id) {
                        return false;
                    }
                    if ($data === null) {
                        return false;
                    }
                    $data_config_url[CURLOPT_URL]           = $url;
                    $data_config_url[CURLOPT_CUSTOMREQUEST] = 'POST';
                    $data_config_url[CURLOPT_POSTFIELDS]    = json_encode($data);
                    break;
                default:
                    return false;

            }


            $curl = curl_init();

            curl_setopt_array($curl, $data_config_url);
            $response = curl_exec($curl);

            echo PHP_EOL . $data_config_url[CURLOPT_CUSTOMREQUEST] . ' - ' . $url . ' |-> ' . json_encode($data, JSON_PRETTY_PRINT) . ' | -> Response: ' . $response . PHP_EOL;

            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }
            curl_close($curl);

            if (isset($error_msg)) {
                // echo 'error sync :' . $id . '__:' . json_encode($error_msg) . 'id :' . $index . 'action :' . $action . PHP_EOL;
                Log::info('error sync :' . $id . '__:' . json_encode($error_msg) . 'id :' . $index . 'action :' . $action);
            }

            return true;
        } catch (Exception $e) {
            // echo 'error sync :' . $id . '__:' . $e->getMessage() . 'id :' . $index . 'action :' . $action . PHP_EOL;
            Log::info('error sync :' . $id . '__:' . $e->getMessage() . 'id :' . $index . 'action :' . $action);
            // echo $e->getTraceAsString();
            throw new Exception($e->getMessage());
        }
    }

    public static function createIndexElasticsearch($index, $listFields, $specialFields): bool
    {
        try {
            $elasticHost = env('ELASTICSEARCH_HOST', self::DEFAULT_ELASTICSEARCH_HOST);
            $elasticPort = env('ELASTICSEARCH_PORT', self::DEFAULT_ELASTICSEARCH_PORT);

            $settings = [
                'number_of_shards'   => 2,
                'number_of_replicas' => 1,
                'analysis'           => [
                    'char_filter' => [
                        'replace' => [
                            'type'     => 'mapping',
                            'mappings' => [
                                '&=> and '
                            ],
                        ],
                    ],
                    'filter'      => [
                        'word_delimiter' => [
                            'type'                  => 'word_delimiter',
                            'split_on_numerics'     => false,
                            'split_on_case_change'  => true,
                            'generate_word_parts'   => true,
                            'generate_number_parts' => true,
                            'catenate_all'          => true,
                            'preserve_original'     => true,
                            'catenate_numbers'      => true,
                        ]
                    ],
                    'analyzer'    => [
                        'default'           => [
                            'type'        => 'custom',
                            'char_filter' => [
                                'html_strip',
                                'replace',
                            ],
                            'tokenizer'   => 'whitespace',
                            'filter'      => [
                                'lowercase',
                                'word_delimiter',
                            ],
                        ],
                        'my_analyzer'       => [
                            'type'      => 'custom',
                            'tokenizer' => 'standard',
                            'filter'    => [
                                'lowercase'
                            ]
                        ],
                        "my_email_analyzer" => [
                            "type"      => "custom",
                            "tokenizer" => "uax_url_email",
                            'filter'    => [
                                'lowercase',
                                'stop',
                            ],
                        ]
                    ],
                ]
            ];

            $data                           = array();
            $data['settings']               = $settings;
            $data['mappings']               = [];
            $data['mappings']['properties'] = [];

            foreach ($listFields as $field) {
                if ($field === '_id') {
                    $field = 'id';
                }
                if (array_key_exists($field, $specialFields)) {
                    $data['mappings']['properties'][$field] = $specialFields[$field];
                } else {
                    $data['mappings']['properties'][$field] = [
                        'type'     => 'text',
                        'analyzer' => 'my_analyzer'
                    ];
                }
            }
            $url             = $elasticHost . ':' . $elasticPort . '/' . $index . '?pretty';
            $data_config_url = [
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => '',
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => 'PUT',
                CURLOPT_POSTFIELDS     => json_encode($data),
                CURLOPT_HTTPHEADER     => array(
                    'Content-Type: application/json'
                ),
            ];

            $curl = curl_init();

            curl_setopt_array($curl, $data_config_url);
            $response = curl_exec($curl);

            echo PHP_EOL . $data_config_url[CURLOPT_CUSTOMREQUEST] . ' - ' . $url . ' |-> ' . json_encode($data, JSON_PRETTY_PRINT) . ' | -> Response: ' . $response . PHP_EOL;

            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }
            curl_close($curl);

            if (isset($error_msg)) {
                Log::info('error sync :' . $index . '__:' . json_encode($error_msg));
            }

            return true;
        } catch (Exception $e) {
            // echo 'error sync :' . $id . '__:' . $e->getMessage() . 'id :' . $index . 'action :' . $action . PHP_EOL;
            Log::info('error sync :' . $index . '__:' . $e->getMessage());
            // echo $e->getTraceAsString();
            throw new Exception($e->getMessage());
        }
    }

    public static function preparePaging($result, $currentPage, $pageUrl)
    {
        if ($result === false || isset($result['errors'])) {
            return $result;
        }
        $nextPage = $currentPage + 1;
        $perPage  = $result['per_page'] ?? 0;
        $total    = $result['total'] ?? 0;
        $from     = ($currentPage - 1) * $perPage;
        $to       = ($from - 1) + $perPage;
        $lastPage = round($total / $perPage);


        return [
            'current_page'   => $currentPage,
            "first_page_url" => $pageUrl . '?' . http_build_query(array('page' => 1)),
            "from"           => $from,
            "last_page"      => $lastPage,
            "last_page_url"  => $pageUrl . '?' . http_build_query(array('page' => $lastPage)),
            "next_page_url"  => $pageUrl . '?' . http_build_query(array('page' => $nextPage)),
            "per_page"       => $perPage,
            "to"             => $to,
            "total"          => $total,
            "data"           => $result['data'] ?? []
        ];
    }
}
