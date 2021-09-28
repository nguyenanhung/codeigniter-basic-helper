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
                $type    = 'loc';
                $loc     = isset($meta['loc']) ? $meta['loc'] : '';
                $lastmod = isset($meta['lastmod']) ? $meta['lastmod'] : '';
                $newline = isset($meta['newline']) ? $meta['newline'] : "\n";
                $str     .= "\n<sitemap>\n";
                $str     .= '<' . $type . '>' . base_url($loc . '.xml') . '</loc>';
                $str     .= "\n<lastmod>" . $lastmod . "</lastmod>";
                $str     .= "\n</sitemap>";
                $str     .= $newline;
            }

            return $str;
        }

        return null;
    }
}
