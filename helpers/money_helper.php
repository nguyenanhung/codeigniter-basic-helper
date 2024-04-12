<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 15/02/2023
 * Time: 00:40
 */
if (!function_exists('money_number_format')) {
    function money_number_format($input, $showCents = true, $locale = null)
    {
        if (function_exists('numfmt_create') && function_exists('numfmt_format_currency') && function_exists(
                'locale_get_default'
            )) {
            setlocale(LC_MONETARY, $locale ?: locale_get_default());
            $numberOfDecimalPlaces = $showCents ? 2 : 0;
            $formatter = numfmt_create('en_US', NumberFormatter::CURRENCY);
            $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $numberOfDecimalPlaces);

            return numfmt_format_currency($formatter, $input, trim(localeconv()['int_curr_symbol']));
        }

        return $input;
    }
}
