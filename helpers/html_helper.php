<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 08:59
 */
if (!function_exists('meta_dns_prefetch')) {
    /**
     * Function meta_dns_prefetch
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 31:33
     */
    function meta_dns_prefetch()
    {
        return "<!-- DNS prefetch -->\n<link rel='dns-prefetch' href='//www.google-analytics.com/'>\n<link rel='dns-prefetch' href='//fonts.googleapis.com'>\n<link rel='dns-prefetch' href='//ajax.googleapis.com'>\n<link rel='dns-prefetch' href='//maps.google.com'>\n<link rel='dns-prefetch' href='//connect.facebook.net/'>\n";
    }
}
if (!function_exists('meta_property')) {
    /**
     * Function meta_property
     *
     * @param string|array $property
     * @param string       $content
     * @param string       $type
     * @param string       $newline
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 31:45
     */
    function meta_property($property = '', $content = '', $type = 'property', $newline = "\n")
    {
        // Since we allow the data to be passes as a string, a simple array
        // or a multidimensional one, we need to do a little prepping.
        if (!is_array($property)) {
            $property = array(
                array(
                    'property' => $property,
                    'content'  => $content,
                    'type'     => $type,
                    'newline'  => $newline
                )
            );
        } elseif (isset($property['property'])) {
            // Turn single array into multidimensional
            $property = array($property);
        }
        $str = '';
        foreach ($property as $meta) {
            $type     = (isset($meta['type']) && $meta['type'] !== 'property') ? 'itemprop' : 'property';
            $property = isset($meta['property']) ? $meta['property'] : '';
            $content  = isset($meta['content']) ? $meta['content'] : '';
            $newline  = isset($meta['newline']) ? $meta['newline'] : "\n";
            $str      .= '<meta ' . $type . '="' . $property . '" content="' . $content . '" />' . $newline;
        }

        return $str;
    }
}
if (!function_exists('tachPage')) {
    /**
     * Function tachPage
     *
     * @param $input
     *
     * @return mixed
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 31:55
     */
    function tachPage($input)
    {
        preg_match('/(.*)-c(.*).html/U', $input, $output);

        return $output[1];
    }
}
if (!function_exists('stripHtmlTag')) {
    /**
     * Function stripHtmlTag
     *
     * @param $str
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 32:06
     */
    function stripHtmlTag($str)
    {
        $regEx          = '/([^<]*<\s*[a-z](?:[0-9]|[a-z]{0,9}))(?:(?:\s*[a-z\-]{2,14}\s*=\s*(?:"[^"]*"|\'[^\']*\'))*)(\s*\/?>[^<]*)/i';
        $chunks         = preg_split($regEx, $str, -1, PREG_SPLIT_DELIM_CAPTURE);
        $chunkCount     = count($chunks);
        $strippedString = '';
        for ($n = 1; $n < $chunkCount; $n++) {
            $strippedString .= $chunks[$n];
        }

        return $strippedString;
    }
}
if (!function_exists('strip_only_tags')) {
    /**
     * Function strip_only_tags
     *
     * @param       $str
     * @param       $tags
     * @param bool  $stripContent
     *
     * @return string|string[]|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 32:14
     */
    function strip_only_tags($str, $tags, $stripContent = false)
    {
        $content = '';
        if (!is_array($tags)) {
            $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags));
            if (end($tags) === '') {
                array_pop($tags);
            }
        }
        foreach ($tags as $tag) {
            if ($stripContent) {
                $content = '(.+</' . $tag . '(>|\s[^>]*>)|)';
            }
            $str = preg_replace('#</?' . $tag . '(>|\s[^>]*>)' . $content . '#is', '', $str);
        }

        return $str;
    }
}
if (!function_exists('tracking_google_analytics')) {
    /**
     * Function tracking_google_analytics
     *
     * @param string $analytics_id
     * @param string $analytics_mode
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 32:22
     */
    function tracking_google_analytics($analytics_id = '', $analytics_mode = 'auto')
    {
        $html = "<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', '" . $analytics_id . "', '" . $analytics_mode . "');
	  ga('send', 'pageview');

	</script>";

        return trim($html);
    }
}
if (!function_exists('tracking_google_gtag_analytics_default')) {
    /**
     * Function tracking_google_gtag_analytics_default
     *
     * @param string $ID
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 30/07/2022 15:59
     */
    function tracking_google_gtag_analytics_default($ID = '')
    {
        $html = "<!-- Global site tag (gtag.js) - Google Analytics -->" . PHP_EOL;
        $html .= "<script async src='https://www.googletagmanager.com/gtag/js?id=" . trim($ID) . "'></script>" . PHP_EOL;
        $html .= "<script>
                     window.dataLayer = window.dataLayer || [];
                        function gtag() {
                            dataLayer.push(arguments);
                        }
                        gtag('js', new Date());
                        gtag('config', '" . trim($ID) . "');
                    </script>";

        return $html;
    }
}
