<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 12/12/2022
 * Time: 23:14
 */
if (!function_exists('countStringsInText')) {
    /**
     * Function countStringsInText - Hàm đếm số từ trong đoạn văn bản
     *
     * @param $str
     *
     * @return int
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/12/2022 19:18
     */
    function countStringsInText($str)
    {
        if (empty($str)) {
            return 0;
        }
        $str = strip_tags($str);
        $str = str_replace(PHP_EOL, '', $str);
        $arr = explode(' ', $str);

        return count($arr);
    }
}
if (!function_exists('findMiddleInString')) {
    /**
     * Function findMiddleInString - Hàm lấy chuỗi ở giữa chuỗi bắt đầu và chuỗi kết thúc
     *
     * @param $str       : toàn bộ chuỗi;
     * @param $str_begin : chuỗi bắt đầu cuối cùng.
     * @param $str_end   : chuỗi kết thúc đầu tiên
     *
     * @return string: trả về chuỗi ở giữa chuỗi bắt đầu và chuỗi kết thúc, nếu không có thì trả về chính chuỗi đó..
     *
     */
    function findMiddleInString($str, $str_begin, $str_end)
    {
        if (empty($str_begin)) {
            $to = strpos($str, $str_end);

            return trim(substr($str, 0, $to));
        }
        $from = strrpos($str, $str_begin) + strlen($str_begin) - 1;
        if (empty($str_end)) {

            return trim(substr($str, $from + 1));
        }
        $str = substr($str, $from + 1);
        $to = strpos($str, $str_end);
        $str = substr($str, 0, $to);

        return trim($str);
    }
}
if (!function_exists('str_insert')) {
    /**
     * Function str_insert - Inserts one or more strings into another string on a defined position.
     *
     * ### str_insert
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_insert( array $keyValue, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $keyValue = [
     *      ':color' => 'brown',
     *      ':animal' => 'dog'
     * ]
     * $string = 'The quick :color fox jumps over the lazy :animal.';
     *
     * str_insert( $keyValue, $string );
     *
     * // The quick brown fox jumps over the lazy dog.
     * ```
     *
     * @param array  $keyValue
     * An associative array with key => value pairs.
     * @param string $string
     * The text with the strings to be replaced.
     *
     * @return string
     * The replaced string.
     */
    function str_insert($keyValue, $string)
    {
        if (arrayIsAssoc($keyValue)) {
            foreach ($keyValue as $search => $replace) {
                $string = str_replace($search, $replace, $string);
            }
        }

        return $string;
    }
}
if (!function_exists('str_between')) {
    /**
     * Function str_between - Return the content in a string between a left and right element.
     *
     * ### str_between
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_between( string $left, string $right, string $string ): array
     * ```
     *
     * #### Example
     * ```php
     * $string = '<tag>foo</tag>foobar<tag>bar</tag>'
     *
     * str_between( '<tag>', '</tag>' $string );
     *
     * // (
     * //     [0] => foo
     * //     [1] => bar
     * // )
     * ```
     *
     *
     * @param string $left
     * The left element of the string to search.
     * @param string $right
     * The right element of the string to search.
     * @param string $string
     * The string to search in.
     *
     * @return array
     * A result array with all matches of the search.
     */
    function str_between($left, $right, $string)
    {
        preg_match_all('/' . preg_quote($left, '/') . '(.*?)' . preg_quote($right, '/') . '/s', $string, $matches);

        return array_map('trim', $matches[1]);
    }
}
if (!function_exists('str_after')) {
    /**
     * Function str_after - Return the part of a string after a given value.
     *
     * ### str_after
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_after( string $search, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_after( 'fox' $string );
     *
     * // jumps over the lazy dog
     * ```
     *
     * @param string $search
     * The string to search for.
     * @param string $string
     * The string to search in.
     *
     * @return string
     * The found string after the search string. Whitespaces at beginning will be removed.
     */
    function str_after($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string, 2))[0]);
    }
}
if (!function_exists('str_before')) {
    /**
     * Function str_before - Get the part of a string before a given value.
     *
     * ### str_before
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_before( string $search, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_before( 'fox' $string );
     *
     * // The quick brown
     * ```
     *
     * @param string $search
     * The string to search for.
     * @param string $string
     * The string to search in.
     *
     * @return string
     * The found string before the search string. Whitespaces at end will be removed.
     */
    function str_before($search, $string)
    {
        return $search === '' ? $string : rtrim(explode($search, $string)[0]);
    }
}
if (!function_exists('str_limit_words')) {
    /**
     * Function str_limit_words - Limit the number of words in a string. Put value of $end to the string end.
     *
     * ### str_limit_words
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_limit_words( string $string, int $limit = 10, string $end = '...' ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_limit_words( $string, 3 );
     *
     * // The quick brown...
     * ```
     *
     * @param string $string
     * The string to limit the words.
     * @param int    $limit
     * The number of words to limit. Defaults to 10.
     * @param string $end
     * The string to end the cut string. Defaults to '...'
     *
     * @return string
     * The limited string with $end at the end.
     */
    function str_limit_words($string, $limit = 10, $end = '...')
    {
        $arrayWords = explode(' ', $string);

        if (count($arrayWords) <= $limit) {
            return $string;
        }

        return implode(' ', array_slice($arrayWords, 0, $limit)) . $end;
    }
}
if (!function_exists('str_limit_characters')) {
    /**
     * Function str_limit_characters - Limit the number of characters in a string. Put value of $end to the string end.
     *
     * ### str_limit_characters
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_limit_characters( string $string, int $limit = 100, string $end = '...' ): string
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     *
     * str_limit_characters( $string, 15 );
     *
     * // The quick brown...
     * ```
     *
     * @param string $string
     * The string to limit the characters.
     * @param int    $limit
     * The number of characters to limit. Defaults to 100.
     * @param string $end
     * The string to end the cut string. Defaults to '...'
     *
     * @return string
     * The limited string with $end at the end.
     */
    function str_limit_characters($string, $limit = 100, $end = '...')
    {
        if (mb_strwidth($string, 'UTF-8') <= $limit) {
            return $string;
        }

        return rtrim(mb_strimwidth($string, 0, $limit, '', 'UTF-8')) . $end;
    }
}
if (!function_exists('str_contains')) {
    /**
     * Function str_contains - Tests if a string contains a given element
     *
     * ### str_contains
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_contains( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'cat',
     *      'fox'
     * ];
     *
     * str_contains( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * A string or an array of strings.
     * @param string       $haystack
     * The string to search in.
     *
     * @return bool
     * True if $needle is found, false otherwise.
     */
    function str_contains($needle, $haystack)
    {
        foreach ((array) $needle as $ndl) {
            if (strpos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_ignore_contains')) {
    /**
     * Function str_ignore_contains - Tests if a string contains a given element. Ignore case sensitivity.
     *
     * ### str_ignore_contains
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_ignore_contains( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'Cat',
     *      'Fox'
     * ];
     *
     * str_ignore_contains( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * A string or an array of strings.
     * @param string       $haystack
     * The string to search in.
     *
     * @return bool
     * True if $needle is found, false otherwise.
     */
    function str_ignore_contains($needle, $haystack)
    {
        foreach ((array) $needle as $ndl) {
            if (stripos($haystack, $ndl) !== false) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_starts_with')) {
    /**
     * Function str_starts_with - Determine if a given string starts with a given substring.
     *
     * ### str_starts_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_starts_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'Cat',
     *      'The'
     * ];
     *
     * str_starts_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     * @param string       $haystack
     * The string to search in.
     *
     * @return bool
     * True if $needle was found, false otherwise.
     */
    function str_starts_with($needle, $haystack)
    {
        foreach ((array) $needle as $ndl) {
            if ($ndl !== '' && strpos($haystack, (string) $ndl) === 0) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_ignore_starts_with')) {
    /**
     * Function str_ignore_starts_with - Determine if a given string starts with a given substring. Ignore case sensitivity.
     *
     * ### str_ignore_starts_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_ignore_starts_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'cat',
     *      'the'
     * ];
     *
     * str_ignore_starts_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     * @param string       $haystack
     * The string to search in.
     *
     * @return bool
     * True if $needle was found, false otherwise.
     */
    function str_ignore_starts_with($needle, $haystack)
    {
        $hs = strtolower($haystack);

        foreach ((array) $needle as $ndl) {
            $n = strtolower($ndl);
            if ($n !== '' && strpos($hs, $n) === 0) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_ends_with')) {
    /**
     * Function str_ends_with - Determine if a given string ends with a given substring.
     *
     * ### str_ends_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_ends_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'cat',
     *      'dog'
     * ];
     *
     * str_ends_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     *
     * @param string       $haystack
     * The string to search in.
     *
     * @return bool
     * True if $needle was found, false otherwise.
     */
    function str_ends_with($needle, $haystack)
    {
        foreach ((array) $needle as $ndl) {
            $length = strlen($ndl);
            if ($length === 0 || (substr($haystack, -$length) === (string) $ndl)) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_ignore_ends_with')) {
    /**
     * Function str_ignore_ends_with - Determine if a given string ends with a given substring.
     *
     * ### str_ignore_ends_with
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_ignore_ends_with( string|array $needle, string $haystack ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $string = 'The quick brown fox jumps over the lazy dog';
     * $array = [
     *      'Cat',
     *      'Dog'
     * ];
     *
     * str_ignore_ends_with( $array, $string );
     *
     * // bool(true)
     * ```
     *
     * @param string|array $needle
     * The string or array of strings to search for.
     * @param string       $haystack
     * The string to search in.
     *
     * @return bool
     * True if $needle was found, false otherwise.
     */
    function str_ignore_ends_with($needle, $haystack)
    {
        $hs = strtolower($haystack);

        foreach ((array) $needle as $ndl) {
            $n = strtolower($ndl);
            $length = strlen($ndl);
            if ($length === 0 || (substr($hs, -$length) === $n)) {
                return true;
            }
        }

        return false;
    }
}
if (!function_exists('str_after_last')) {
    /**
     * Function str_after_last - Return the part of a string after the last occurrence of a given search value.
     *
     * ### str_after_last
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * str_after_last( string $search, string $string ): string
     * ```
     *
     * #### Example
     * ```php
     * $path = "/var/www/html/public/img/image.jpg";
     *
     * str_after_last( '/' $path );
     *
     * // image.jpg
     * ```
     *
     * @param string $search
     * The string to search for.
     * @param string $string
     * The string to search in.
     *
     * @return string
     * The found string after the last occurrence of the search string. Whitespaces at beginning will be removed.
     */
    function str_after_last($search, $string)
    {
        return $search === '' ? $string : ltrim(array_reverse(explode($search, $string))[0]);
    }
}
if (!function_exists('hide_characters')) {
    function hide_characters($text)
    {
        $string_array = str_split($text);

        $return_text = "";

        for ($i = 0, $iMax = strlen($text); $i < $iMax; $i++) {
            if ($i % 3 === 2) {
                $return_text .= 'x';
            } else {
                $return_text .= $string_array[$i];
            }
        }

        return $return_text;
    }
}
