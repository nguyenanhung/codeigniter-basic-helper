<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 18/01/2023
 * Time: 00:36
 */
if (!function_exists('convertNumberToWords')) {
    function convertNumberToWords($num)
    {
        $ones = array(
            0  => "",
            1  => "One",
            2  => "Two",
            3  => "Three",
            4  => "Four",
            5  => "Five",
            6  => "Six",
            7  => "Seven",
            8  => "Eight",
            9  => "Nine",
            10 => "Ten",
            11 => "Eleven",
            12 => "Twelve",
            13 => "Thirteen",
            14 => "Fourteen",
            15 => "Fifteen",
            16 => "Sixteen",
            17 => "Seventeen",
            18 => "Eighteen",
            19 => "Nineteen"
        );
        $tens = array(
            0 => "",
            1 => "Ten",
            2 => "Twenty",
            3 => "Thirty",
            4 => "Forty",
            5 => "Fifty",
            6 => "Sixty",
            7 => "Seventy",
            8 => "Eighty",
            9 => "Ninety"
        );
        $hundreds = array(
            "Hundred",
            "Thousand",
            "Million",
            "Billion",
            "Trillion",
            "Quadrillion"
        );
        $num = number_format($num, 2, ".", ",");
        $num_arr = explode(".", $num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",", $wholenum));
        krsort($whole_arr);
        $returnTxt = "";
        foreach ($whole_arr as $key => $i) {
            if ($i < 20) {
                $returnTxt .= $ones[$i];
            } elseif ($i < 100) {
                $returnTxt .= $tens[mb_substr($i, 0, 1)];
                $returnTxt .= " " . $ones[mb_substr($i, 1, 1)];
            } else {
                $returnTxt .= $ones[mb_substr($i, 0, 1)] . " " . $hundreds[0];
                $returnTxt .= " " . $tens[mb_substr($i, 1, 1)];
                $returnTxt .= " " . $ones[mb_substr($i, 2, 1)];
            }
            if ($key > 0) {
                $returnTxt .= " " . $hundreds[$key] . " ";
            }
        }
        if ($decnum > 0) {
            $returnTxt .= " and ";
            if ($decnum < 20) {
                $returnTxt .= $ones[$decnum];
            } elseif ($decnum < 100) {
                $returnTxt .= $tens[mb_substr($decnum, 0, 1)];
                $returnTxt .= " " . $ones[mb_substr($decnum, 1, 1)];
            }
        }

        return $returnTxt;
    }
}
if (!function_exists('convert_number_to_words')) {
    function convert_number_to_words($num)
    {
        return convertNumberToWords($num);
    }
}
