<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/15/2021
 * Time: 00:23
 */
if (!function_exists('short_url_with_tinyurl')) {
    /**
     * Function short_url_with_tinyurl
     *
     * @param string $longUrl
     *
     * @return bool|string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 29:39
     */
    function short_url_with_tinyurl($longUrl = '')
    {
        return sendSimpleGetRequest('https://tinyurl.com/api-create.php', array('url' => $longUrl));
    }
}
