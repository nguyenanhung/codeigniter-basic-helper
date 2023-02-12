<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 12/02/2023
 * Time: 23:16
 */
if (!function_exists('convert_video_embed_vimeo')) {
    function convert_video_embed_vimeo($vimeo)
    {
        $vimeo = str_replace('https://vimeo.com/', '//player.vimeo.com/video/', $vimeo);
        $vimeo = str_replace('http://vimeo.com/', '//player.vimeo.com/video/', $vimeo);

        return trim($vimeo);
    }
}
if (!function_exists('convert_video_embed_dailymotion')) {
    function convert_video_embed_dailymotion($dailymotion)
    {
        $dailymotion = str_replace('https://www.dailymotion.com/video/', '//www.dailymotion.com/embed/video/', $dailymotion);
        $dailymotion = str_replace('http://www.dailymotion.com/video/', '//www.dailymotion.com/embed/video/', $dailymotion);

        return trim($dailymotion);
    }
}
