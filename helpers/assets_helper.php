<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2021
 * Time: 01:11
 */
if (!function_exists('assets_url')) {
    /**
     * Function assets_url
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 11:56
     */
    function assets_url($uri = '', $protocol = null)
    {
        if (function_exists('base_url') && function_exists('config_item')) {
            $fileExt = mb_substr(trim($uri), mb_strrpos(trim($uri), '.') + 1);
            $fileExt = mb_strtoupper($fileExt);
            $version = '';
            if ($fileExt === 'CSS' || $fileExt === 'JS') {
                $version = config_item('assets_version');
            }

            return trim(base_url('assets/' . $uri, $protocol) . $version);
        }

        return trim($uri);

    }
}
if (!function_exists('static_url')) {
    /**
     * Function static_url
     *
     * @param string $uri
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 11:56
     */
    function static_url($uri = '')
    {
        if (function_exists('base_url') && function_exists('config_item')) {
            $fileExt = mb_substr(trim($uri), mb_strrpos(trim($uri), '.') + 1);
            $fileExt = mb_strtoupper($fileExt);
            $version = '';
            if ($fileExt === 'CSS' || $fileExt === 'JS') {
                $version = config_item('assets_version');
            }
            $host = config_item('static_url');

            return trim($host) . trim($uri) . trim($version);
        }

        return trim($uri);

    }
}
if (!function_exists('templates_url')) {
    /**
     * Function templates_url
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 12:12
     */
    function templates_url($uri = '', $protocol = null)
    {
        if (function_exists('base_url') && function_exists('config_item')) {
            $fileExt = mb_substr(trim($uri), mb_strrpos(trim($uri), '.') + 1);
            $fileExt = mb_strtoupper($fileExt);
            $version = '';
            if ($fileExt === 'CSS' || $fileExt === 'JS') {
                $version = config_item('assets_version');
            }

            return trim(base_url('templates/' . $uri, $protocol) . $version);
        }

        return trim($uri);
    }
}
if (!function_exists('editor_url')) {
    /**
     * Function editor_url
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 47:57
     */
    function editor_url($uri = '', $protocol = null)
    {
        $uri = 'editors/' . $uri;

        return assets_url($uri, $protocol);
    }
}
if (!function_exists('favicon_url')) {
    /**
     * Function favicon_url
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 47:51
     */
    function favicon_url($uri = '', $protocol = null)
    {
        $uri = 'favicon/' . $uri;

        return assets_url($uri, $protocol);
    }
}
if (!function_exists('fav_url')) {
    /**
     * Function fav_url - alias of favicon_url
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 47:51
     */
    function fav_url($uri = '', $protocol = null)
    {
        $uri = 'fav/' . $uri;

        return assets_url($uri, $protocol);
    }
}
if (!function_exists('favicon_html_tag')) {
    /**
     * Function favicon_html_tag
     *
     * @param $baseUrl
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 30/12/2022 03:21
     */
    function favicon_html_tag($baseUrl = '')
    {
        return (new \nguyenanhung\CodeIgniter\BasicHelper\Favicon())->faviconHtml($baseUrl);
    }
}
if (!function_exists('storage_url')) {
    /**
     * Function storage_url
     *
     * @param string $uri
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 48:52
     */
    function storage_url($uri = '')
    {
        if (function_exists('config_item')) {
            $fileExt = mb_substr(trim($uri), mb_strrpos(trim($uri), '.') + 1);
            $fileExt = mb_strtoupper($fileExt);
            $version = '';
            if ($fileExt === 'CSS' || $fileExt === 'JS') {
                $version = config_item('assets_version');
            }
            $storageUrl = trim(config_item('storage_url')) . trim($uri) . $version;

            return trim($storageUrl);
        }

        return $uri;
    }
}
if (!function_exists('public_storage_tmp_url')) {
    /**
     * Function public_storage_tmp_url
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 21/07/2022 41:10
     */
    function public_storage_tmp_url($uri = '', $protocol = null)
    {
        if (function_exists('base_url') && function_exists('config_item')) {
            $fileExt = mb_substr(trim($uri), mb_strrpos(trim($uri), '.') + 1);
            $fileExt = mb_strtoupper($fileExt);
            $version = '';
            if ($fileExt === 'CSS' || $fileExt === 'JS') {
                $version = config_item('assets_version');
            }

            return trim(base_url('storage/tmp/' . $uri, $protocol) . $version);
        }

        return trim($uri);

    }
}
if (!function_exists('go_url')) {
    /**
     * Function go_url
     *
     * @param string $uri
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/16/2021 41:37
     */
    function go_url($uri = '')
    {
        if (function_exists('config_item')) {
            $goUrl = trim(config_item('go_url')) . trim($uri);

            return trim($goUrl);
        }

        return $uri;
    }
}
if (!function_exists('assets_mobile')) {
    /**
     * Function assets_mobile
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 47:34
     */
    function assets_mobile($uri = '', $protocol = null)
    {
        $uri = 'mobile/assets/' . $uri;

        return assets_url($uri, $protocol);
    }
}
if (!function_exists('assets_themes')) {
    /**
     * Function assets_themes
     *
     * @param string      $themes
     * @param string      $uri
     * @param string      $folder
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 47:39
     */
    function assets_themes($themes = '', $uri = '', $folder = 'yes', $protocol = null)
    {
        // Hooks format
        $themes = str_replace('itravels', 'iTravels', $themes);
        // Pattern
        if ($themes !== '') {
            if ($folder !== 'no') {
                $uri = 'themes/' . $themes . '/assets/' . $uri;
            } else {
                $uri = 'themes/' . $themes . '/' . $uri;
            }
        } elseif ($folder === 'no') {
            $uri = 'themes/' . $uri;
        } else {
            $uri = 'themes/assets/' . $uri;
        }

        return assets_url($uri, $protocol);
    }
}
if (!function_exists('assets_themes_dashboard')) {
    /**
     * Function assets_themes_dashboard
     *
     * @param string      $themes
     * @param string      $uri
     * @param string      $folder
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 48:37
     */
    function assets_themes_dashboard($themes = '', $uri = '', $folder = 'yes', $protocol = null)
    {
        return assets_themes($themes, $uri, $folder, $protocol);
    }
}
if (!function_exists('assets_themes_comingsoon')) {
    /**
     * Function assets_themes_comingsoon
     *
     * @param string      $themes
     * @param string      $uri
     * @param string      $folder
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 48:22
     */
    function assets_themes_comingsoon($themes = '', $uri = '', $folder = '', $protocol = null)
    {
        return assets_themes($themes, $uri, $folder, $protocol);
    }
}
if (!function_exists('assets_themes_error')) {
    /**
     * Function assets_themes_error
     *
     * @param string      $themes
     * @param string      $uri
     * @param string      $folder
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/09/2020 48:14
     */
    function assets_themes_error($themes = '', $uri = '', $folder = 'yes', $protocol = null)
    {
        return assets_themes($themes, $uri, $folder, $protocol);
    }
}
if (!function_exists('assets_themes_metronic')) {
    /**
     * Function assets_themes_metronic
     *
     * @param string      $uri
     * @param string|null $protocol
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 10/05/2021 23:38
     */
    function assets_themes_metronic($uri = '', $protocol = null)
    {
        return assets_themes('metronic', $uri, 'yes', $protocol);
    }
}
if (!function_exists('cdn_js_url')) {
    /**
     * Function cdn_js_url
     *
     * @param string $uri
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 18:15
     */
    function cdn_js_url($uri = '')
    {
        $cdnJs = '//cdnjs.cloudflare.com/ajax/libs/';

        return $cdnJs . trim($uri);
    }
}
if (!function_exists('google_fonts_url')) {
    /**
     * Function google_fonts_url
     *
     * @param string $family
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 19:14
     */
    function google_fonts_url($family = '')
    {
        $fonts = '//fonts.googleapis.com/css?family=';

        return $fonts . trim($family);
    }
}
if (!function_exists('bootstrapcdn_url')) {
    /**
     * Function bootstrapcdn_url
     *
     * @param string $uri
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 22:45
     */
    function bootstrapcdn_url($uri = '')
    {
        $cdn = '//maxcdn.bootstrapcdn.com/bootstrap/';

        return $cdn . trim($uri);
    }
}
