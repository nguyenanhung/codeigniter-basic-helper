<?php

/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 16/06/2022
 * Time: 10:12
 */
if ( ! function_exists('check_vn_province_code')) {
	/**
	 * Function check_vn_province_code
	 *
	 * @param  string  $code
	 *
	 * @return bool|string
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 22/08/2022 10:07
	 */
	function check_vn_province_code($code = "")
	{
		$arr = array(
			'MB' => 'Miền Bắc',
			'MT' => 'Miền Trung',
			'MN' => 'Miền Nam',
			'AG' => 'An Giang',
			'VT' => 'Bà Rịa - Vũng Tàu',
			'BG' => 'Bắc Giang',
			'BK' => 'Bắc Cạn',
			'BL' => 'Bạc Liêu',
			'BTH' => 'Bình Thuận',
			'BT' => 'Bến Tre',
			'BDG' => 'Bình Dương',
			'BD' => 'Bình Định',
			'BP' => 'Bình Phước',
			'CM' => 'Cà Mau',
			'DL' => 'Đắc lắk',
			'Dak Nong' => 'Đắk Nông',
			'DAKNONG' => 'Đắk Nông',
			'DN' => 'Đà Nẵng',
			'DT' => 'Đồng Tháp',
			'GL' => 'Gia Lai',
			'HN' => 'Miền Bắc',
			'HT' => 'Hà Tĩnh',
			'HG' => 'Hậu Giang',
			'KH' => 'Khánh Hòa',
			'KG' => 'Kiên Giang',
			'KT' => 'Kon Tum',
			'LD' => 'Lâm Đồng',
			'VL' => 'Vĩnh Long',
			'L' => 'Long An',
			'NA' => 'Nghệ An',
			'NT' => 'Ninh Thuận',
			'QB' => 'Quảng Bình',
			'QNG' => 'Quảng Ngãi',
			'QN' => 'Quảng Nam',
			'QT' => 'Quảng Trị',
			'ST' => 'Sóc Trăng',
			'TN' => 'Tây Ninh',
			'TG' => 'Tiền Giang',
			'TV' => 'Trà Vinh',
			'PY' => 'Phú Yên',
			'CT' => 'Cần Thơ',
			'DNA' => 'Đồng Nai',
			'HCM' => 'Hồ Chí Minh',
			'TP' => 'Hồ Chí Minh',
			'DNO' => 'Đắc Nông',
			'LA' => 'Long An',
			'H' => 'Thừa Thiên Huế',
			'TTH' => 'Thừa Thiên Huế',
			'HUE' => 'Thừa Thiên Huế'
		);

		if (isset($arr[$code])) {
			return $arr[$code];
		}

		return false;
	}
}
