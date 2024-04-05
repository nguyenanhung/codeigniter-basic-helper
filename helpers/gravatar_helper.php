<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 20/01/2023
 * Time: 00:30
 */
if ( ! function_exists('bear_framework_gravatar_init')) {
	/**
	 * Function bear_framework_gravatar_init
	 *
	 * @param $username
	 *
	 * @return mixed|string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 20/01/2023 36:48
	 */
	function bear_framework_gravatar_init($username = 'nguyenanhung')
	{
		if ( ! function_exists('config_item') || ! function_exists('get_instance')) {
			return '';
		}

		$url = 'https://vi.gravatar.com/' . trim($username) . '.json';
		$file = md5($url);

		$cms = &get_instance();
		$cms->load->driver('cache', array('adapter' => 'file', 'backup' => 'dummy'));
		if ( ! $res = $cms->cache->get($file)) {
			$respond = sendSimpleGetRequest($url);
			$res = json_decode($respond, false);
			$cms->cache->save($file, $res, 86400);
		}

		return $res;
	}
}
if ( ! function_exists('bear_framework_show_gravatar')) {
	/**
	 * Function bear_framework_show_gravatar
	 *
	 * @param $username
	 * @param $size
	 *
	 * @return string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 20/01/2023 37:08
	 */
	function bear_framework_show_gravatar($username = 'nguyenanhung', $size = 300)
	{
		return bear_framework_gravatar_init($username)->entry[0]->thumbnailUrl . '?' . http_build_query(
				array('size' => $size)
			);
	}
}
