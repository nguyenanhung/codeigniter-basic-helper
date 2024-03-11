<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 30/07/2022
 * Time: 15:55
 */
if (!function_exists('xssValidation')) {
	/**
	 * Function xssValidation
	 *
	 * @param $value
	 *
	 * @return bool
	 * @author   : 713uk13m <dev@nguyenanhung.com>
	 * @copyright: 713uk13m <dev@nguyenanhung.com>
	 * @time     : 30/07/2022 57:32
	 */
	function xssValidation($value)
	{
		$value = preg_replace('/%3A%2F%2F/', '', $value); // :// to empty
		$value = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $value);
		$value = preg_replace('/%u0([a-z0-9]{3})/i', '&#x\\1;', $value);
		$value = preg_replace('/%([a-z0-9]{2})/i', '&#x\\1;', $value);
		$value = str_ireplace(
			array(
				'&#x53;&#x43;&#x52;&#x49;&#x50;&#x54;',
				'&#x26;&#x23;&#x78;&#x36;&#x41;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x31;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x36;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x31;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x33;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x33;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x32;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x39;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x30;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x34;&#x3B;',
				'/*',
				'*/',
				'<!--',
				'-->',
				'<!-- -->',
				'&#x0A;',
				'&#x0D;',
				'&#x09;',
				''
			),
			'',
			$value
		);

		$search = '/&#[xX]0{0,8}(21|22|23|24|25|26|27|28|29|2a|2b|2d|2f|30|31|32|33|34|35|36|37|38|39|3a|3b|3d|3f|40|41|42|43|44|45|46|47|48|49|4a|4b|4c|4d|4e|4f|50|51|52|53|54|55|56|57|58|59|5a|5b|5c|5d|5e|5f|60|61|62|63|64|65|66|67|68|69|6a|6b|6c|6d|6e|6f|70|71|72|73|74|75|76|77|78|79|7a|7b|7c|7d|7e);?/i';
		$value = preg_replace_callback($search, static function ($m) {
			return mb_chr(hexdec($m[1]));
		}, $value);

		$search = '/&#0{0,8}(33|34|35|36|37|38|39|40|41|42|43|45|47|48|49|50|51|52|53|54|55|56|57|58|59|61|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|86|87|88|89|90|91|92|93|94|95|96|97|98|99|100|101|102|103|104|105|106|107|108|109|110|111|112|113|114|115|116|117|118|119|120|121|122|123|124|125|126);?/i';
		$value = preg_replace_callback($search, static function ($m) {
			return mb_chr($m[1]);
		}, $value);

		$search = array(
			'&#60',
			'&#060',
			'&#0060',
			'&#00060',
			'&#000060',
			'&#0000060',
			'&#60;',
			'&#060;',
			'&#0060;',
			'&#00060;',
			'&#000060;',
			'&#0000060;',
			'&#x3c',
			'&#x03c',
			'&#x003c',
			'&#x0003c',
			'&#x00003c',
			'&#x000003c',
			'&#x3c;',
			'&#x03c;',
			'&#x003c;',
			'&#x0003c;',
			'&#x00003c;',
			'&#x000003c;',
			'&#X3c',
			'&#X03c',
			'&#X003c',
			'&#X0003c',
			'&#X00003c',
			'&#X000003c',
			'&#X3c;',
			'&#X03c;',
			'&#X003c;',
			'&#X0003c;',
			'&#X00003c;',
			'&#X000003c;',
			'&#x3C',
			'&#x03C',
			'&#x003C',
			'&#x0003C',
			'&#x00003C',
			'&#x000003C',
			'&#x3C;',
			'&#x03C;',
			'&#x003C;',
			'&#x0003C;',
			'&#x00003C;',
			'&#x000003C;',
			'&#X3C',
			'&#X03C',
			'&#X003C',
			'&#X0003C',
			'&#X00003C',
			'&#X000003C',
			'&#X3C;',
			'&#X03C;',
			'&#X003C;',
			'&#X0003C;',
			'&#X00003C;',
			'&#X000003C;',
			'\x3c',
			'\x3C',
			'\u003c',
			'\u003C'
		);
		$value = str_ireplace($search, '<', $value);

		$search = array(
			'expression' => '/e\s*x\s*p\s*r\s*e\s*s\s*s\s*i\s*o\s*n/si',
			'javascript' => '/j\s*a\s*v\s*a\s*s\s*c\s*r\s*i\s*p\s*t/si',
			'livescript' => '/l\s*i\s*v\s*e\s*s\s*c\s*r\s*i\s*p\s*t/si',
			'behavior' => '/b\s*e\s*h\s*a\s*v\s*i\s*o\s*r/si',
			'vbscript' => '/v\s*b\s*s\s*c\s*r\s*i\s*p\s*t/si',
			'script' => '/s\s*c\s*r\s*i\s*p\s*t/si',
			'applet' => '/a\s*p\s*p\s*l\s*e\s*t/si',
			'alert' => '/a\s*l\s*e\s*r\s*t/si',
			'document' => '/d\s*o\s*c\s*u\s*m\s*e\s*n\s*t/si',
			'write' => '/w\s*r\s*i\s*t\s*e/si',
			'cookie' => '/c\s*o\s*o\s*k\s*i\s*e/si',
			'window' => '/w\s*i\s*n\s*d\s*o\s*w/si',
			'data:' => '/d\s*a\s*t\s*a\s*\:/si'
		);
		$value = preg_replace(array_values($search), array_keys($search), $value);
		if (preg_match('/(expression|javascript|behavior|vbscript|mocha|livescript)(\:*)/', $value)) {
			return false;
		}

		if (strcasecmp($value, strip_tags($value)) !== 0) {
			return false;
		}

		$disableCommands = array(
			'base64_decode',
			'cmd',
			'passthru',
			'eval',
			'exec',
			'system',
			'fopen',
			'fsockopen',
			'file',
			'file_get_contents',
			'readfile',
			'unlink'
		);
		if (preg_match('#(' . implode('|', $disableCommands) . ')(\s*)\((.*?)\)#si', $value)) {
			return false;
		}

		return true;
	}
}
