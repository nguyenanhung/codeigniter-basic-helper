<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 21/07/2022
 * Time: 11:43
 */
if (!function_exists('widget_facebook_comments')) {
	/**
	 * Function widget_facebook_comments
	 *
	 * @param string $url
	 * @param string $width
	 * @param int $num_posts
	 *
	 * @return string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 21/07/2022 48:16
	 */
	function widget_facebook_comments($url = '', $width = '', $num_posts = 5)
	{
		return '<div class="fb-comments" data-href="' . trim($url) . '" data-width="' . trim($width) . '" data-numposts="' . trim($num_posts) . '"></div>';
	}
}
if (!function_exists('widget_facebook_share_button')) {
	/**
	 * Function widget_facebook_share_button
	 *
	 * @param string $url
	 *
	 * @return string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 21/07/2022 45:46
	 */
	function widget_facebook_share_button($url = '')
	{
		return '<div class="fb-share-button" data-href="' . trim($url) . '" data-layout="button_count"></div>';
	}
}
if (!function_exists('widget_facebook_like_button')) {
	/**
	 * Function widget_facebook_like_button
	 *
	 * @param string $url
	 *
	 * @return string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 21/07/2022 45:46
	 */
	function widget_facebook_like_button($url = '')
	{
		return '<div class="fb-like" data-href="' . trim($url) . '" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>';
	}
}
if (!function_exists('widget_facebook_save_button')) {
	/**
	 * Function widget_facebook_save_button
	 *
	 * @param string $url
	 *
	 * @return string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 21/07/2022 45:46
	 */
	function widget_facebook_save_button($url = '')
	{
		return '<div class="fb-save" data-uri="' . trim($url) . '" data-size="large"></div>';
	}
}
if (!function_exists('widget_facebook_script_init')) {
	/**
	 * Function widget_facebook_script_init
	 *
	 * @param string $appId
	 * @param string $version
	 *
	 * @return string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 21/07/2022 50:42
	 */
	function widget_facebook_script_init($appId = '', $version = 'v14.0')
	{
		if (empty($version)) {
			$version = 'v14.0';
		}
		$url = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=' . trim($version) . '&appId=' . trim($appId) . '&autoLogAppEvents=1';
		return '<div id="fb-root"></div><script async defer crossorigin="anonymous" src="' . trim($url) . '" nonce="EOLK7Cbn"></script>';
	}
}
if (!function_exists('widget_facebook_div_init')) {
	/**
	 * Function widget_facebook_div_init
	 *
	 * @return string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 30/07/2022 18:56
	 */
	function widget_facebook_div_init()
	{
		return '<div id="fb-root"></div>';
	}
}
