<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 08/01/2023
 * Time: 23:34
 */
if ( ! function_exists('log_to_sentry')) {
	/**
	 * Function log_to_sentry
	 *
	 * @param  string  $message
	 * @param  array  $context
	 * @param  string  $name
	 *
	 * @return bool|string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 07/27/2021 37:41
	 */
	function log_to_sentry($message, $context, $name = 'hungng')
	{
		if ( ! function_exists('get_instance') || ! function_exists('config_item') || ! class_exists(
				'\Sentry\ClientBuilder'
			)) {
			return false;
		}
		try {
			$CI =& get_instance();
			$CI->load->config('config_sentry');
			// Init config sentry
			$config = config_item('config_sentry');
			// Init logger use Monolog
			$logger = new Monolog\Logger($name);
			$client = Sentry\ClientBuilder::create(array('dsn' => $config['dsn']))->getClient();
			$handler = new Sentry\Monolog\Handler(new Sentry\State\Hub($client));
			$logger->pushHandler($handler);
			$logger->error($message, $context);
			return true;
		} catch (Exception $e) {
			$errorMsg = __get_error_message__($e);
			if (function_exists('log_message')) {
				log_message('error', $errorMsg);
			}
			return $errorMsg;
		}
	}
}
