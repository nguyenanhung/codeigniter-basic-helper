<?php
/**
 * Project codeigniter-basic-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/01/2023
 * Time: 00:26
 */
if (!function_exists('blogspotDescSortWithPublishedTime')) {
	function blogspotDescSortWithPublishedTime($item1, $item2)
	{
		if ($item1['published']['$t'] === $item2['published']['$t']) {
			return 0;
		}
		return ($item1['published']['$t'] < $item2['published']['$t']) ? 1 : -1;
	}
}
if (!function_exists('blogspotUSort')) {
	function blogspotUSort($data)
	{
		usort($data, 'blogspotDescSortWithPublishedTime');
		return $data;
	}
}
if (!function_exists('blogspotFormatInformationItem')) {
	function blogspotFormatInformationItem($blog)
	{
		if (isset($blog['media$thumbnail']['url'])) {
			$blogThumb = trim($blog['media$thumbnail']['url']);
		} else {
			$blogThumb = 'https://c2.staticflickr.com/8/7858/32668285888_8da8a3c105_z.jpg';
		}
		$blogThumb = str_replace(
			array('/s72-c-d/', '/s72-c/', '/s72-d/', 'http://'),
			array('/s320/', '/s320/', '/s320/', 'https://'),
			$blogThumb
		);
		$blogTitle = trim($blog['title']['$t']);
		$cleanBlogTitle = strip_quotes($blogTitle);
		$cleanBlogTitle = stripslashes($cleanBlogTitle);
		$blogLink = '';
		foreach ($blog['link'] as $link) {
			if ($link['rel'] === 'alternate') {
				$blogLink .= $link['href'];
			} else {
				$blogLink .= '';
			}
		}
		$blogPublished = trim($blog['published']['$t']);
		return array(
			'thumb' => $blogThumb,
			'name' => $blogTitle,
			'title' => $cleanBlogTitle,
			'url' => $blogLink,
			'published' => $blogPublished
		);
	}
}
