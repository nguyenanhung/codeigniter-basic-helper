<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/07/2021
 * Time: 01:12
 */
if (!function_exists('arrayToObject')) {
    /**
     * Function arrayToObject
     *
     * @param array|mixed $array
     *
     * @return array|false|\stdClass
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 07/27/2021 36:10
     */
    function arrayToObject($array = array())
    {
        if (!is_array($array)) {
            return $array;
        }
        $object = new stdClass();
        $countArray = count($array);
        if ($countArray > 0) {
            foreach ($array as $name => $value) {
                if (!empty($name)) {
                    $object->$name = arrayToObject($value);
                }
            }

            return $object;
        }

        return false;
    }
}
if (!function_exists('arrayToXml')) {
    /**
     * Function arrayToXml
     *
     * @param array|mixed $array
     * @param string      $namespace
     * @param mixed       $file_output
     *
     * @return bool|string|null
     * @throws \Exception
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 13:21
     */
    function arrayToXml($array = array(), $namespace = '', $file_output = null)
    {
        if (class_exists('SimpleXMLElement')) {
            $xml_object = new SimpleXMLElement("<?xml version=\"1.0\"?><" . $namespace . "></" . $namespace . ">"); // creating object of SimpleXMLElement
            convertArrayToXml($array, $xml_object); // function call to convert array to xml
            $xml_file = $file_output !== null ? $xml_object->asXML($file_output) : $xml_object->asXML(); // saving generated xml file

            return !empty($xml_file) ? $xml_file : null;
        }

        return null;
    }
}
if (!function_exists('convertArrayToXml')) {
    /**
     * Function convertArrayToXml
     *
     * @param $array
     * @param $SimpleXMLElement
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/07/2021 19:35
     */
    function convertArrayToXml($array, &$SimpleXMLElement)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subNode = $SimpleXMLElement->addChild((string) $key);
                } else {
                    $subNode = $SimpleXMLElement->addChild("item" . $key);
                }
                convertArrayToXml($value, $subNode);
            } else {
                $SimpleXMLElement->addChild((string) $key, htmlspecialchars((string) $value));
            }
        }
    }
}
if (!function_exists('removeArrayElementWithValue')) {
    /**
     * Function removeArrayElementWithValue - Loại bỏ 1 giá trị trong array theo key và value
     *
     * @param $array
     * @param $key
     * @param $value
     *
     * @return mixed
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/12/2022 37:59
     */
    function removeArrayElementWithValue($array, $key, $value)
    {
        foreach ($array as $subKey => $subArray) {
            if (isset($subArray[$key]) && $subArray[$key] === $value) {
                unset($array[$subKey]);
            }
        }

        return $array;
    }
}
if (!function_exists('arrayRecursiveDiff')) {
    /**
     * Function arrayRecursiveDiff - Diff 2 array bằng đệ quy
     *
     * @param $aArray1
     * @param $aArray2
     *
     * @return array
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 12/12/2022 39:34
     */
    function arrayRecursiveDiff($aArray1, $aArray2)
    {
        $aReturn = array();

        foreach ($aArray1 as $mKey => $mValue) {
            if (array_key_exists($mKey, $aArray2)) {
                if (is_array($mValue)) {
                    $aRecursiveDiff = arrayRecursiveDiff($mValue, $aArray2[$mKey]);
                    if (count($aRecursiveDiff)) {
                        $aReturn[$mKey] = $aRecursiveDiff;
                    }
                } elseif ($mValue !== $aArray2[$mKey]) {
                    $aReturn[$mKey] = $mValue;
                }
            } else {
                $aReturn[$mKey] = $mValue;
            }
        }

        return $aReturn;
    }
}
if (!function_exists('arrayIsAssoc')) {
    /**
     * Function arrayIsAssoc - Detects if the given value is an associative array.
     *
     * ### arrayIsAssoc
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * arrayIsAssoc( array $array ): boolean
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *     'foo' => 'bar'
     * ];
     *
     * arrayIsAssoc( $array );
     *
     * // bool(true)
     * ```
     *
     * @param array $array
     * Any type of array.
     *
     * @return bool
     * True if the array is associative, false otherwise.
     */
    function arrayIsAssoc($array)
    {
        if (!is_array($array) || $array === array()) {
            return false;
        }

        return array_keys($array) !== range(0, count($array) - 1);
    }
}
if (!function_exists('arrayFirstElement')) {
    /**
     * Function arrayFirstElement - Returns the first element of an array.
     *
     * ### arrayFirstElement
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * arrayFirstElement( array $array ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => 'qux'
     * ];
     *
     * arrayFirstElement( $array )
     *
     * // bar
     * ```
     *
     * @param array $array
     * The concerned array.
     *
     * @return mixed
     * The value of the first element, without key. Mixed type.
     *
     */
    function arrayFirstElement($array)
    {
        return $array[array_keys($array)[0]];
    }
}
if (!function_exists('arrayLastElement')) {
    /**
     * Function arrayLastElement - Returns the last element of an array.
     *
     * ### arrayLastElement
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * arrayLastElement( array $array ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => 'qux'
     * ];
     *
     * arrayLastElement( $array )
     *
     * // qux
     * ```
     *
     * @param array $array
     * The concerned array.
     *
     * @return mixed
     * The value of the last element, without key. Mixed type.
     */
    function arrayLastElement($array)
    {
        return $array[array_keys($array)[count($array) - 1]];
    }
}
if (!function_exists('arrayGetElement')) {
    /**
     * Function arrayGetElement - Gets a value in an array by dot notation for the keys.
     *
     * ### arrayGetElement
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * arrayGetElement( string key, array $array ): mixed
     * ```
     *
     * #### Example
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => [
     *          'qux => 'foobar'
     *      ]
     * ];
     *
     * arrayGetElement( 'baz.qux', $array );
     *
     * // foobar
     * ```
     *
     * @param string $key
     * The key by dot notation.
     * @param array  $array
     * The array to search in.
     *
     * @return mixed
     * The searched value, null otherwise.
     */
    function arrayGetElement($key, $array)
    {
        if (is_string($key) && is_array($array)) {
            $keys = explode('.', $key);

            while (count($keys) >= 1) {
                $k = array_shift($keys);

                if (!isset($array[$k])) {
                    return null;
                }

                if (count($keys) === 0) {
                    return $array[$k];
                }

                $array = &$array[$k];
            }
        }

        return null;
    }
}
if (!function_exists('arraySetElement')) {
    /**
     * Function arraySetElement - Sets a value in an array using the dot notation.
     *
     * ### arraySetElement
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * arraySetElement( string key, mixed value, array $array ): boolean
     * ```
     *
     * #### Example 1
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => [
     *          'qux => 'foobar'
     *      ]
     * ];
     *
     * arraySetElement( 'baz.qux', 'bazqux', $array );
     *
     * // (
     * //     [foo] => bar
     * //     [baz] => [
     * //         [qux] => bazqux
     * //     ]
     * // )
     * ```
     *
     * #### Example 2
     * ```php
     * $array = [
     *      'foo' => 'bar',
     *      'baz' => [
     *          'qux => 'foobar'
     *      ]
     * ];
     *
     * arraySetElement( 'baz.foo', 'bar', $array );
     *
     * // (
     * //     [foo] => bar
     * //     [baz] => [
     * //         [qux] => bazqux
     * //         [foo] => bar
     * //     ]
     * // )
     * ```
     *
     * @param string $key
     * The key to set using dot notation.
     * @param mixed  $value
     * The value to set on the specified key.
     * @param array  $array
     * The concerned array.
     *
     * @return bool
     * True if the new value was successfully set, false otherwise.
     */
    function arraySetElement($key, $value, &$array)
    {
        if (is_string($key) && !empty($key)) {

            $keys = explode('.', $key);
            $arrTmp = &$array;

            while (count($keys) >= 1) {
                $k = array_shift($keys);

                if (!is_array($arrTmp)) {
                    $arrTmp = array();
                }

                if (!isset($arrTmp[$k])) {
                    $arrTmp[$k] = array();
                }

                if (count($keys) === 0) {
                    $arrTmp[$k] = $value;

                    return true;
                }

                $arrTmp = &$arrTmp[$k];
            }
        }

        return false;
    }
}
if (!function_exists('to_array')) {
    /**
     * Function to_array - Converts a string or an object to an array.
     *
     * ### to_array
     * Related global function (description see above).
     *
     * > #### [( jump back )](#available-php-functions)
     *
     * ```php
     * to_array( string|object $var ): array|null
     * ```
     *
     * #### Example 1 (string)
     * ```php
     * $var = 'php';
     * to_array( $var );
     *
     * // (
     * //     [0] => p
     * //     [1] => h
     * //     [2] => p
     * // )
     *
     * ```
     * #### Example 2 (object)
     * ```php
     * $var = new stdClass;
     * $var->foo = 'bar';
     *
     * to_array( $var );
     *
     * // (
     * //     [foo] => bar
     * // )
     * ```
     *
     * @param string|object $var
     * String or object.
     *
     * @return array|null
     * An array representation of the converted string or object.
     * Returns null on error.
     */
    function to_array($var)
    {
        if (is_string($var)) {
            return str_split($var);
        }

        if (is_object($var)) {
            return json_decode(json_encode($var), true);
        }

        return null;
    }
}
if (!function_exists('arrayToAttributes')) {
    /**
     * Takes an array of attributes and turns it into a string for an html tag
     *
     * @param array $attr
     *
     * @return    string
     */
    function arrayToAttributes($attr)
    {
        $attr_str = '';

        foreach ((array) $attr as $property => $value) {
            // Ignore null/false
            if ($value === null || $value === false) {
                continue;
            }

            // If the key is numeric then it must be something like selected="selected"
            if (is_numeric($property)) {
                $property = $value;
            }

            $attr_str .= $property . '="' . str_replace('"', '&quot;', $value) . '" ';
        }

        // We strip off the last space for return
        return trim($attr_str);
    }
}
