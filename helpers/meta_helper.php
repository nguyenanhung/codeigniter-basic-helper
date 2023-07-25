<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/15/2021
 * Time: 00:37
 */
if (!function_exists('setupMetaDnsPrefetch')) {
    /**
     * Function setupMetaDnsPrefetch
     *
     * @param string|array $dns
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 44:45
     */
    function setupMetaDnsPrefetch($dns = '')
    {
        if (is_array($dns)) {
            $html = '';
            foreach ($dns as $domain) {
                $domain = str_replace(array('https://', 'http://'), '', $domain);
                $domain = trim($domain, '/');
                $html .= "<link href='//" . $domain . "/' rel='dns-prefetch' />" . PHP_EOL;
            }

            return $html;
        }
        $dns = str_replace(array('https://', 'http://'), '', $dns);
        $dns = trim($dns, '/');

        return "<link href='//" . $dns . "/' rel='dns-prefetch' />" . PHP_EOL;
    }
}
