<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 08:55
 */
if (!function_exists('parse_sitemap_index')) {
    /**
     * Function parse_sitemap_index
     *
     * @param string|array $loc
     * @param string       $lastmod
     * @param string       $type
     * @param string       $newline
     *
     * @return string|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 57:45
     */
    function parse_sitemap_index($loc = '', $lastmod = '', $type = 'property', $newline = "\n")
    {
        if (function_exists('base_url')) {
            // Since we allow the data to be passes as a string, a simple array
            // or a multidimensional one, we need to do a little prepping.
            if (!is_array($loc)) {
                $loc = array(
                    array(
                        'loc'     => $loc,
                        'lastmod' => $lastmod,
                        'type'    => $type,
                        'newline' => $newline
                    )
                );
            } elseif (isset($loc['loc'])) {
                // Turn single array into multidimensional
                $loc = array($loc);
            }
            $str = '';
            foreach ($loc as $meta) {
                $type = 'loc';
                $loc = isset($meta['loc']) ? $meta['loc'] : '';
                $lastmod = isset($meta['lastmod']) ? $meta['lastmod'] : '';
                $newline = isset($meta['newline']) ? $meta['newline'] : "\n";
                $str .= "\n<sitemap>\n";
                $str .= '<' . $type . '>' . base_url($loc . '.xml') . '</loc>';
                $str .= "\n<lastmod>" . $lastmod . "</lastmod>";
                $str .= "\n</sitemap>";
                $str .= $newline;
            }

            return $str;
        }

        return null;
    }
}
if (!function_exists('parse_sitemap')) {
    /**
     * Function parse_sitemap
     *
     * @param string|array $domain
     * @param string|array $loc
     * @param string       $lastmod
     * @param string       $type
     * @param string       $newline
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/21/2021 13:07
     */
    function parse_sitemap($domain = '', $loc = '', $lastmod = '', $type = 'property', $newline = "\n")
    {
        // Since we allow the data to be passes as a string, a simple array
        // or a multidimensional one, we need to do a little prepping.
        if (!is_array($loc)) {
            $loc = [
                [
                    'loc'     => $loc,
                    'lastmod' => $lastmod,
                    'type'    => $type,
                    'newline' => $newline
                ]
            ];
        } elseif (isset($loc['loc'])) {
            // Turn single array into multidimensional
            $loc = [
                $loc
            ];
        }
        $str = '';
        foreach ($loc as $meta) {
            $type = 'loc';
            $loc = isset($meta['loc']) ? $meta['loc'] : '';
            $lastmod = isset($meta['lastmod']) ? $meta['lastmod'] : '';
            $newline = isset($meta['newline']) ? $meta['newline'] : "\n";
            $str .= "\n<sitemap>\n";
            $str .= '<' . $type . '>' . trim($domain) . trim($loc) . '.xml' . '</loc>';
            $str .= "\n<lastmod>" . $lastmod . "</lastmod>";
            $str .= "\n</sitemap>";
            $str .= $newline;
        }

        return $str;
    }
}
if (!function_exists('xml_convert')) {
    /**
     * Function xml_convert - Convert Reserved XML characters to Entities
     *
     * @param $str
     * @param $protect_all
     *
     * @return array|string|string[]|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/02/2023 20:16
     */
    function xml_convert($str, $protect_all = false)
    {
        $temp = '__TEMP_AMPERSANDS__';

        // Replace entities to temporary markers so that
        // ampersands won't get messed up
        $str = preg_replace('/&#(\d+);/', $temp . '\\1;', $str);

        if ($protect_all === true) {
            $str = preg_replace('/&(\w+);/', $temp . '\\1;', $str);
        }

        $str = str_replace(['&', '<', '>', '"', "'", '-'], ['&amp;', '&lt;', '&gt;', '&quot;', '&apos;', '&#45;'], $str);

        // Decode the temp markers back to entities
        $str = preg_replace('/' . $temp . '(\d+);/', '&#\\1;', $str);

        if ($protect_all === true) {
            return preg_replace('/' . $temp . '(\w+);/', '&\\1;', $str);
        }

        return $str;
    }
}
if (!function_exists('xml_get_value')) {
    /**
     * Function xml_get_value
     *
     * @param $xml
     * @param $openTag
     * @param $closeTag
     *
     * @return false|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/02/2023 12:23
     */
    function xml_get_value($xml, $openTag, $closeTag)
    {
        $f = strpos($xml, $openTag) + strlen($openTag);
        $l = strpos($xml, $closeTag);

        return ($f <= $l) ? substr($xml, $f, $l - $f) : "";
    }
}
