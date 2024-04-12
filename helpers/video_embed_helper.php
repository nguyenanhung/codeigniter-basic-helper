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
        if (empty($vimeo)) {
            return $vimeo;
        }
        $vimeo = str_replace(
            array(
                'https://vimeo.com/',
                'http://vimeo.com/'
            ),
            '//player.vimeo.com/video/',
            $vimeo
        );

        return trim($vimeo);
    }
}
if (!function_exists('convert_video_embed_dailymotion')) {
    function convert_video_embed_dailymotion($dailymotion)
    {
        if (empty($dailymotion)) {
            return $dailymotion;
        }
        $dailymotion = str_replace(
            array(
                'https://www.dailymotion.com/video/',
                'http://www.dailymotion.com/video/'
            ),
            '//www.dailymotion.com/embed/video/',
            $dailymotion
        );

        return trim($dailymotion);
    }
}
if (!function_exists('convert_video_v_embed_youtube')) {
    function convert_video_v_embed_youtube($youtube)
    {
        if (empty($youtube)) {
            return $youtube;
        }
        $youtube = str_replace(
            array(
                'https://www.youtube.com/watch?v=',
                'http://www.youtube.com/watch?v=',
                'https://www.youtube.com/embed/',
                'http://www.youtube.com/embed/'
            ),
            '//www.youtube.com/v/',
            $youtube
        );

        return trim($youtube);
    }
}
if (!function_exists('convert_video_embed_youtube')) {
    function convert_video_embed_youtube($youtube)
    {
        if (empty($youtube)) {
            return $youtube;
        }
        $youtube = str_replace(
            array(
                'https://www.youtube.com/watch?v=',
                'http://www.youtube.com/watch?v=',
                'https://www.youtube.com/v/',
                'http://www.youtube.com/v/'
            ),
            '//www.youtube.com/embed/',
            $youtube
        );

        return trim($youtube);
    }
}
if (!function_exists('clean_youtube_allow_fullscreen')) {
    function clean_youtube_allow_fullscreen($youtube)
    {
        if (empty($youtube)) {
            return $youtube;
        }
        if ($youtube !== '') {
            $youtube = str_replace(
                array(
                    'allowfullscreen="undefined"',
                    'allowfullscreen="yes"',
                    'allowfullscreen="true"'
                ),
                'allowfullscreen',
                $youtube
            );
        }

        return $youtube;
    }
}
if (!function_exists('youtube_image_thumbnail')) {
    function youtube_image_thumbnail($id, $filename = 'hqdefault.jpg')
    {
        if (empty($id)) {
            return $id;
        }

        return 'https://i.ytimg.com/vi/' . trim($id) . '/' . trim($filename);
    }
}
