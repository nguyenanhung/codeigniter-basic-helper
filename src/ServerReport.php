<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 12/3/24
 * Time: 00:46
 */

namespace nguyenanhung\CodeIgniter\BasicHelper;

class ServerReport extends BaseHelper
{
	public static function report()
	{
		return array(
			'os_report' => self::os_report(),
			'memory_report' => self::memory_report(),
			'disk_report' => self::disk_report(),
		);
	}

	public static function disk_report($directory = '/')
	{
		return array(
			'raw_data' => array(
				'free_space' => disk_free_space($directory),
				'total_space' => disk_total_space($directory)
			),
			'data' => array(
				'free_space' => formatSizeUnits(disk_free_space($directory)),
				'total_space' => formatSizeUnits(disk_total_space($directory))
			),
			'message' => array(
				'text' => 'Free: ' . formatSizeUnits(disk_free_space($directory)) . ' / Total: ' . formatSizeUnits(disk_total_space($directory))
			)
		);
	}

	public static function memory_report()
	{
		return array(
			'raw_data' => array(
				'memory_usage' => memory_get_usage(),
				'memory_peak_usage' => memory_get_peak_usage()
			),
			'data' => array(
				'memory_usage' => formatSizeUnits(memory_get_usage()),
				'memory_peak_usage' => formatSizeUnits(memory_get_peak_usage())
			),
		);
	}

	public static function os_report()
	{
		return array(
			'raw_data' => array(
				'php_uname' => php_uname(),
			),
			'data' => array(
				'php_uname' => php_uname(),
			),
		);
	}
}
