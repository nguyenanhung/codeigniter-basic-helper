<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/11/2021
 * Time: 09:01
 */
if (!function_exists('convert_string_utf8_to_vietnamese')) {
    /**
     * Function convert_string_utf8_to_vietnamese
     *
     * @param string $input_string
     *
     * @return string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 36:04
     */
    function convert_string_utf8_to_vietnamese($input_string = '')
    {
        $str = $input_string;
        if ($str !== '') {
            $str = str_replace(
                array('&Aacute;', '&aacute;', '&Acirc;', '&acirc;', '&acute;', '&AElig;', '&aelig;', '&Agrave;', '&agrave;', '&alefsym;', '&Alpha;', '&alpha;', '&amp;', '&and;', '&ang;', '&Aring;', '&aring;', '&asymp;', '&Atilde;',
                      '&atilde;', '&Auml;', '&auml;', '&bdquo;', '&Beta;', '&beta;', '&brvbar;', '&bull;', '&cap;', '&Ccedil;', '&ccedil;', '&cedil;', '&cent;', '&Chi;', '&chi;', '&circ;', '&clubs;', '&cong;', '&copy;', '&crarr;',
                      '&cup;', '&curren;', '&dagger;', '&Dagger;', '&darr;', '&dArr;', '&deg;', '&Delta;', '&delta;', '&diams;', '&divide;', '&Eacute;', '&eacute;', '&Ecirc;', '&ecirc;', '&Egrave;', '&egrave;', '&empty;', '&emsp;',
                      '&ensp;', '&Epsilon;', '&epsilon;', '&equiv;', '&Eta;', '&eta;', '&ETH;', '&eth;', '&Euml;', '&euml;', '&euro;', '&exist;', '&fnof;', '&forall;', '&frac12;', '&frac14;', '&frac34;', '&frasl;', '&Gamma;',
                      '&gamma;', '&ge;', '&harr;', '&hArr;', '&hearts;', '&hellip;', '&Iacute;', '&iacute;', '&Icirc;', '&icirc;', '&iexcl;', '&Igrave;', '&igrave;', '&image;', '&infin;', '&int;', '&Iota;', '&iota;', '&iquest;',
                      '&isin;', '&Iuml;', '&iuml;', '&Kappa;', '&kappa;', '&Lambda;', '&lambda;', '&lang;', '&laquo;', '&larr;', '&lArr;', '&lceil;', '&ldquo;', '&le;', '&lfloor;', '&lowast;', '&loz;', '&lrm;', '&lsaquo;', '&lsquo;',
                      '&macr;', '&mdash;', '&micro;', '&middot;', '&minus;', '&Mu;', '&mu;', '&nabla;', '&nbsp;', '&ndash;', '&ne;', '&ni;', '&not;', '&notin;', '&nsub;', '&Ntilde;', '&ntilde;', '&Nu;', '&nu;', '&Oacute;', '&oacute;',
                      '&Ocirc;', '&ocirc;', '&OElig;', '&oelig;', '&Ograve;', '&ograve;', '&oline;',
                      '&Omega;', '&omega;', '&Omicron;', '&omicron;', '&oplus;', '&or;', '&ordf;', '&ordm;', '&Oslash;', '&oslash;', '&Otilde;', '&otilde;', '&otimes;', '&Ouml;', '&ouml;', '&para;', '&part;', '&permil;', '&perp;',
                      '&Phi;', '&phi;', '&Pi;', '&pi;', '&piv;', '&plusmn;', '&pound;', '&prime;', '&Prime;', '&prod;', '&prop;', '&Psi;', '&psi;', '&radic;', '&rang;', '&raquo;', '&rarr;', '&rArr;', '&rceil;', '&rdquo;', '&real;',
                      '&reg;', '&rfloor;', '&Rho;', '&rho;', '&rlm;', '&rsaquo;', '&rsquo;', '&sbquo;', '&Scaron;', '&scaron;', '&sdot;', '&sect;', '&shy;', '&Sigma;', '&sigma;', '&sigmaf;', '&sim;', '&spades;', '&sub;', '&sube;',
                      '&sum;', '&sup1;', '&sup2;', '&sup3;',
                      '&sup;', '&supe;', '&szlig;', '&Tau;', '&tau;', '&there4;', '&Theta;', '&theta;', '&thetasym;', '&thinsp;', '&THORN;', '&thorn;', '&tilde;', '&times;', '&trade;', '&Uacute;', '&uacute;', '&uarr;', '&uArr;',
                      '&Ucirc;', '&ucirc;', '&Ugrave;', '&ugrave;', '&uml;', '&upsih;', '&Upsilon;', '&upsilon;', '&Uuml;', '&uuml;', '&weierp;', '&Xi;',
                      '&xi;', '&Yacute;', '&yacute;', '&yen;', '&yuml;', '&Yuml;', '&Zeta;', '&zeta;', '&zwj;', '&zwnj;', '&gt;', '&lt;', '&quot;'),
                array('??', '??', '??', '??', '??', '??', '??', '??', '??', '???', '??', '??', '&', '???', '???', '??',
                      '??', '???', '??', '??', '??', '??', '???', '??', '??', '??', '???', '???', '??', '??', '??', '??',
                      '??', '??', '??', '???', '???', '??', '???', '???', '??', '???', '???', '???', '???', '??', '??', '??',
                      '???', '??', '??', '??', '??', '??', '??', '??', '???', '???', '???', '??', '??', '???', '??', '??',
                      '??', '??', '??', '??', '???', '???', '??', '???', '??', '??', '??', '???', '??', '??', '???', '???',
                      '???', '???', '???', '??', '??', '??', '??', '??', '??', '??', '???', '???', '???', '??', '??', '??',
                      '???', '??', '??', '??', '??', '??', '??', '???', '??', '???', '???', '???', '???', '???', '???', '???',
                      '???', '???', '???', '???', '??', '???', '??', '??', '???', '??', '??', '???', ' ', '???', '???', '???',
                      '??', '???', '???', '??', '??', '??', '??', '??', '??', '??', '??', '??',
                      '??', '??', '??', '???', '??', '??', '??', '??', '???', '???', '??', '??', '??', '??', '??', '??',
                      '???', '??', '??', '??', '???', '???', '???', '??', '??', '??', '??', '??', '??', '??', '???', '???',
                      '???', '???', '??', '??', '???', '???', '??', '???', '???', '???', '???', '???', '??', '???', '??', '??',
                      '???', '???', '???', '???', '??', '??', '???', '??', '??', '??', '??', '??', '???', '???', '???', '???',
                      '???', '??', '??', '??', '???', '???', '??', '??', '??', '???', '??', '??', '??', '???', '??', '??',
                      '??', '??', '???', '??', '??', '???', '???', '??', '??', '??', '??', '??', '??', '??', '??', '??',
                      '??', '???', '??', '??', '??', '??', '??', '??', '??', '??',
                      '??', '???', '???', '>', '<', '"'),
                $str
            );
        }

        return $str;
    }
}
if (!function_exists('clean_allowfullscreen')) {
    /**
     * Function clean_allowfullscreen
     *
     * @param string $att
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 02:16
     */
    function clean_allowfullscreen($att = '')
    {
        $output = $att;
        if ($output !== '') {
            $output = str_replace(array('allowfullscreen="undefined"', 'allowfullscreen="yes"', 'allowfullscreen="true"'), 'allowfullscreen', $output);
        }

        return $output;
    }
}
if (!function_exists('clean_text')) {
    /**
     * Function clean_text
     *
     * @param string $text
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 36:25
     */
    function clean_text($text = '')
    {
        $output = $text;
        if ($output !== '') {
            $output = convert_string_utf8_to_vietnamese($output);
            $output = clean_allowfullscreen($output);
            $output = trim($output);
        }

        return $output;
    }
}
if (!function_exists('clean_title')) {
    /**
     * Function clean_title
     *
     * @param string $text
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 36:32
     */
    function clean_title($text = '')
    {
        $output = $text;
        if ($output !== '') {
            $output = clean_text($output);
            $output = strip_tags($output);
            if (function_exists('html_escape')) {
                $output = html_escape($output);
            }
            $output = trim($output);
        }

        return $output;
    }
}
if (!function_exists('clean_text_mobile')) {
    /**
     * Function clean_text_mobile
     *
     * @param string $att
     *
     * @return string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/10/2020 36:37
     */
    function clean_text_mobile($att = '')
    {
        $output = $att;
        if ($output !== '') {
            $output = clean_text($output);
            $output = str_replace(
                array('width: 100px', 'width: 200px', 'width: 300px', 'width: 400px', 'width: 420px', 'width: 450px', 'width: 480px', 'width: 500px', 'width: 520px', 'width: 530px', 'width: 550px', 'width: 560px', 'width: 580px', 'width: 600px',
                      'width: 620px', 'width: 630px', 'width: 640px', 'width: 650px', 'width: 660px', 'width: 670px', 'width: 680px', 'width: 690px', 'width: 700px', 'width: 720px', 'width: 730px', 'width: 740px', 'width: 750px', 'width: 760px',
                      'width: 770px', 'width: 780px', 'width: 790px', 'width: 800px', 'width: 820px', 'width: 830px', 'width: 840px', 'width: 850px', 'width: 860px', 'width: 870px', 'width: 880px', 'width: 890px', 'width: 890px', 'width: 900px',
                      'width: 920px', 'width: 930px', 'width: 940px', 'width: 950px', 'width: 960px', 'width: 970px', 'width: 980px', 'width: 990px'),
                'width: 100%',
                $output
            );
        }

        return $output;
    }
}
if (!function_exists('bodautru')) {
    /**
     * Function bodautru
     *
     * @param string $string
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 03:17
     */
    function bodautru($string = '')
    {
        $output = $string;
        if ($output !== '') {
            $output = str_replace('-', '', $output);
        }

        return $output;
    }
}
if (!function_exists('bodaunhay')) {
    /**
     * Function bodaunhay
     *
     * @param string $string
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 03:23
     */
    function bodaunhay($string = '')
    {
        $output = $string;
        if ($output !== '') {
            $output = str_replace(array('"', "'"), '', $output);
        }

        return $output;
    }
}
if (!function_exists('searchs_snippets')) {
    /**
     * Function searchs_snippets
     *
     * @param string $keywords
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 03:28
     */
    function searchs_snippets($keywords = '')
    {
        $output = $keywords;
        if ($output !== '') {
            $output = urldecode($output);
            $output = trim($output);
            $output = bodaunhay($output);
            $output = str_replace(array('%20', ' ', ' - ', '---', '--', '-', '_'), '+', $output);
        }

        return $output;
    }
}
if (!function_exists('tags_snippets')) {
    /**
     * Function tags_snippets
     *
     * @param string $tags
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 03:35
     */
    function tags_snippets($tags = '')
    {
        $output = $tags;
        if ($output !== '') {
            $output = urldecode($output);
            $output = trim($output);
            $output = bodaunhay($output);
            $output = str_replace(array('%20', ' ', '+', '_'), '-', $output);
            // $output = getPermalinksSEO($output);
        }

        return $output;
    }
}
if (!function_exists('tags_clean')) {
    /**
     * Function tags_clean
     *
     * @param string $tags
     *
     * @return array|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/11/2021 03:40
     */
    function tags_clean($tags = '')
    {
        $output = $tags;
        if ($output !== '') {
            $output = urldecode($output);
            $output = trim($output);
            $output = bodaunhay($output);
            $output = str_replace(array('%20', '+', '-', '_'), ' ', $output);
        }

        return $output;
    }
}
