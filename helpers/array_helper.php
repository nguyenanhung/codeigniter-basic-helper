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
        $object     = new stdClass();
        $countArray = count($array);
        if ($countArray > 0) {
            foreach ($array as $name => $value) {
                if (!empty($name)) {
                    $object->$name = arrayToObject($value);
                }
            }

            return $object;
        }

        return FALSE;
    }
}
if (!function_exists('arrayToXml')) {
    /**
     * Function arrayToXml
     *
     * @param array|mixed $array
     * @param string      $namespace
     * @param null        $file_output
     *
     * @return bool|string|null
     * @throws \Exception
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 08/20/2021 13:21
     */
    function arrayToXml($array = array(), $namespace = '', $file_output = NULL)
    {
        if (class_exists('SimpleXMLElement')) {
            $xml_object = new SimpleXMLElement("<?xml version=\"1.0\"?><" . $namespace . "></" . $namespace . ">"); // creating object of SimpleXMLElement
            convertArrayToXml($array, $xml_object); // function call to convert array to xml
            $xml_file = $file_output !== NULL ? $xml_object->asXML($file_output) : $xml_object->asXML(); // saving generated xml file

            return !empty($xml_file) ? $xml_file : NULL;
        }

        return NULL;
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
                    $subNode = $SimpleXMLElement->addChild("$key");
                } else {
                    $subNode = $SimpleXMLElement->addChild("item$key");
                }
                convertArrayToXml($value, $subNode);
            } else {
                $SimpleXMLElement->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}