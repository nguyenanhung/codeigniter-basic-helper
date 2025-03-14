# CodeIgniter Basic Helper

[![Latest Stable Version](https://img.shields.io/packagist/v/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![Total Downloads](https://img.shields.io/packagist/dt/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![Daily Downloads](https://img.shields.io/packagist/dd/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![Monthly Downloads](https://img.shields.io/packagist/dm/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![License](https://img.shields.io/packagist/l/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![PHP Version Require](https://img.shields.io/packagist/dependency-v/nguyenanhung/codeigniter-basic-helper/php)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)

## Summary

Some basic helpers when using with CodeIgniter 3.

Can be included in many other code sets or frameworks, however, there are some functions that require the `CodeIgniter`
framework, however
it does not affect the performance

In case of integrating this package into other frameworks, sources other than `CodeIgniter`, you need to install the
`nguyenanhung/polyfill-codeigniter-built-in` package for best use

Some frameworks I often use with this package are

- CodeIgniter
- Slim framework
- FuelPHP
- PhalconPHP
- Laravel

## Table of Contents

- [CodeIgniter Basic Helper](#codeigniter-basic-helper)
    * [Summary](#summary)
    * [Table of Contents](#table-of-contents)
    * [1 số helper được hỗ trợ sẵn](#1-số-helper-được-hỗ-trợ-sẵn)
        + [AlphaID Helper](#alphaid-helper)
        + [Array Helper](#array-helper)
        + [Assets Helper](#assets-helper)
        + [Blogspot Helper](#blogspot-helper)
        + [Bytes Helper](#bytes-helper)
        + [Chart Render Helper](#chart-render-helper)
        + [Common Helper](#common-helper)
        + [Database Helper](#database-helper)
        + [Date Helper](#date-helper)
        + [Debug Helper](#debug-helper)
        + [ENV Helper](#env-helper)
        + [Escape Helper](#escape-helper)
        + [Facebook Helper](#facebook-helper)
        + [File Helper](#file-helper)
        + [Form Helper](#form-helper)
        + [Gravatar Helper](#gravatar-helper)
        + [HTML Helper](#html-helper)
        + [Image Helper](#image-helper)
        + [IP Helper](#ip-helper)
        + [Meta Helper](#meta-helper)
        + [Money Helper](#money-helper)
        + [NanoID Helper](#nanoid-helper)
        + [Number Helper](#number-helper)
        + [Paging Helper](#paging-helper)
        + [PlaceHolder Helper](#placeholder-helper)
        + [Request Helper](#request-helper)
        + [Security Helper](#security-helper)
        + [Sentry Helper](#sentry-helper)
        + [String Helper](#string-helper)
        + [Text Helper](#text-helper)
        + [TinyUrl Helper](#tinyurl-helper)
        + [URL Helper](#url-helper)
        + [UUID Helper](#uuid-helper)
        + [VN Province Helper](#vn-province-helper)
        + [Video Embed Helper](#video-embed-helper)
        + [XML Helper](#xml-helper)
        + [Simple RESTful Helper](#simple-restful-helper)
        + [Simple cURL Helper](#simple-curl-helper)
        + [Simple Image Library](#simple-image-library)
    * [Maintainer & Supporter](#maintainer--supporter)

## Some Supported Helpers

Here is a list of supported Helpers in this library

### AlphaID Helper

- [x] Helper Function: `generateAlphaId` - Function to generate a unique Id `4ew68i32xc` based on an input int like
  `1234`

### Array Helper

- [x] Helper Function: `arrayToObject` - Function to convert an array to an object
- [x] Helper Function: `to_array` - Converts a string or an object to an array.
- [x] Helper Function: `arrayToXml` - Function to help convert array into an XML string
- [x] Helper Function: `removeArrayElementWithValue` - Remove 1 value in the array by key and value
- [x] Helper Function: `arrayRecursiveDiff` - Diff 2 arrays recursively
- [x] Helper Function: `arrayIsAssoc` - Detects if the given value is an associative array.
- [x] Helper Function: `arrayFirstElement` - Returns the first element of an array.
- [x] Helper Function: `arrayLastElement` - Returns the last element of an array.
- [x] Helper Function: `arrayGetElement` - Gets a value in an array by dot notation for the keys.
- [x] Helper Function: `arraySetElement` - Sets a value in an array using the dot notation.

### Assets Helper

- [x] Helper Function: `assets_url` - Function to get Assets Url, condition for existence of `assets` folder in
  `public/` folder.

In case in `config.php` file exists `assets_version` variable, it will automatically add version behind the files

CSS, JS

- [x] Helper Function: `static_url` - Function to get Static Resource Url, condition for existence of
  `config_item('static_url')` configuration in website config. In case in `config.php` file exists `assets_version`
  variable, it will automatically add version behind the files

CSS, JS

- [x] Helper Function: `templates_url` - Function to get Assets Url, condition for existence of `templates` folder in
  `public/` folder. In case the `config.php` file contains the variable `assets_version`, it will automatically add the
  version behind
  the CSS,
  JS files
- [x] Helper Function: `editor_url` - Function to get Assets Url, condition that the `assets/editors/` folder exists in
  the
  `public/` folder. In case the `config.php` file contains the variable `assets_version`, it will automatically add the
  version behind
  the CSS,
  JS files
- [x] Helper Function: `favicon_url` - Function to get Assets Url, condition that the `assets/favicon/` folder exists in
  the
  `public/` folder. In case the `config.php` file contains the `assets_version` variable, it will automatically add the
  version behind the

CSS, JS files

- [x] Helper Function: `favicon_html_tag`- Function to get the HTML segment representing the Favicon based on the input
  favicon folder URL
- [x] Helper Function: `storage_url` - Need config `storage_url` item in config.php file.
  Example: `$config['storage_url'] = 'https://storage.nguyenanhung.com/';`
- [x] Helper Function: `go_url` - Need config `go_url` item in `config.php` file.
  Eg: `$config['go_url'] = 'https://go.nguyenanhung.com/';`
- [x] Helper Function: `assets_mobile` - Get the assets path of the mobile interface (rarely used, maintained for old
  projects)
- [x] Helper Function: `assets_themes` - Get the assets path of the pc interface (rarely used, maintained for old
  projects)
- [x] Helper Function: `assets_themes_dashboard` - Get the assets path of the dashboard interface (rarely used,
  maintained for old
  projects)
- [x] Helper Function: `assets_themes_comingsoon` - Get the assets path of the coming soon interface (rarely used,
  maintained for old
  projects)
- [x] Helper Function: `assets_themes_error` - Get the assets path of the error interface (rarely used, maintained for
  old
  projects) maintenance for
  old projects)
- [x] Helper Function: `cdn_js_url` - JS, CSS resource from Cloudflare CDN
- [x] Helper Function: `google_fonts_url` - Google Font resource
- [x] Helper Function: `bootstrapcdn_url` - CDN resource from Bootstrap

### Blogspot Helper

- [x] Helper Function: `blogspotDescSortWithPublishedTime` - Sort feed data from blogspot by Published Time
- [x] Helper Function: `blogspotUSort` - Sort feed data from blogspot by USort and Published Time by DESC
- [x] Helper Function: `blogspotFormatInformationItem` - Format input data blogspot item

### Bytes Helper

- [x] Helper Function: `bytesHumanFormat` - Display readable content format from data bytes

### Chart Render Helper

- [x] Helper Function: `bear_framework_default_get_data_chart`
- [x] Helper Function: `bear_framework_default_get_data_chart_report`

### Common Helper

- [x] Helper Function: `isEmpty ` - Checks whether an input is empty
- [x] Helper Function: `defaultCompressHtmlOutput ` - Compresses HTML output, default configure
- [x] Helper Function: `generateRandomUniqueId ` - Generates a random Unique ID string, using UUID
- [x] Helper Function: `generateRandomNanoUniqueId ` - Generates a random Unique ID string, using NanoID

### Database Helper

- [x] Helper Function: `generate_list_id_with_parent_id ` - Generates a list of IDs, containing dependent subsets of

that ID. Example: Used in case you want to display the content of the parent category and the child categories in the
same page content

### Date Helper

- [x] Helper Function: `dayFloor` - Function to get the distance between 2 days
- [x] Helper Function: `getZuluTime` - Function to get the date parameter according to Zulu time
- [x] Helper Function: `iso_8601_utc_time` - Similar to the getZuluTime function
- [x] Helper Function: `getYesterday` - Function to get the previous day
- [x] Helper Function: `smart_bear_date_range` - Get an array of data containing dates according to the distance
- [x] Helper Function: `format_datetime_vn` - Format the date information according to Vietnamese style
- [x] Helper Function: `get_start_and_end_date_for_week` - Get the first and last days of a week

### Debug Helper

Các hàm này dùng debug

- [x] Helper Function: `dd`
- [x] Helper Function: `ddd`
- [x] Helper Function: `dump`

### ENV Helper

- [x] Helper Function: `bear_get_env` - Hàm lấy giá trị từ file .env

### Escape Helper

- [x] Helper Function: `bear_framework_basic_clean_str` - Simple Clean Input String

### Facebook Helper

- [x] Helper Function: `widget_facebook_div_init` - Function to create `<div id="fb-root"></div>`
- [x] Helper Function: `widget_facebook_script_init` - Function to create init script in case JS needs to be embedded

Facebook

- [x] Helper Function: `widget_facebook_comments` - Function to create facebook comment box
- [x] Helper Function: `widget_facebook_share_button` - Function to create facebook share button
- [x] Helper Function: `widget_facebook_like_button` - Function to create facebook like button
- [x] Helper Function: `widget_facebook_save_button` - Function to create save content button to facebook

### File Helper

- [x] Helper Function: `formatSizeUnits` - Function to format 1 input int into 1 format for easy read file size
- [x] Helper Function: `generateFileIndex` - Automatically generate the content of the file `index.html`
- [x] Helper Function: `generateFileHtaccess` - Automatically generate the content of the file `.htaccess`
- [x] Helper Function: `generateFileReadme` - Automatically generate the content of the file `README.md`
- [x] Helper Function: `makeNewFolder` - The function creates a new folder and generates 3 files in it: `README.md`,
  `index.html`
  , `.htaccess`. Create additional `.gitkeep` file if the second parameter passed is true
- [x] Helper Function: `new_folder` - Similar function to `makeNewFolder`
- [x] Helper Function: `scan_folder` - Scan and get list of data information in folder
- [x] Helper Function: `getAllFileSizeInFolder` - Get all File size in Folder
- [x] Helper Function: `getAllFileInFolder` - Get all File in Folder

### Form Helper

- [x] Helper Function: `join_value_multiple` - Join Value Multiple

### Gravatar Helper

- [x] Helper Function: `bear_framework_show_gravatar` - Show Gravatar URL with Custom Size and Username

### HTML Helper

- [x] Helper Function: `meta_dns_prefetch`
- [x] Helper Function: `meta_property`
- [x] Helper Function: `tachPage`
- [x] Helper Function: `stripHtmlTag`
- [x] Helper Function: `strip_only_tags`
- [x] Helper Function: `tracking_google_analytics`
- [x] Helper Function: `tracking_google_gtag_analytics_default`
- [x] Helper Function: `bear_framework_show_jsonld_script`

### Image Helper

- [x] Helper Function: `google_image_resize` - Resize Image using Google Gadget Proxy
- [x] Helper Function: `google_image_proxy_dns_prefetch` - Function to provide DNS Prefetch in case of using
  `google_image_resize`
- [x] Helper Function: `wordpress_proxy` - Resize & Cache Image using WordPress Proxy
- [x] Helper Function: `wordpress_proxy_dns_prefetch` - Function to provide DNS Prefetch in case of using
  `wordpress_proxy`
- [x] Helper Function: `bear_framework_image_url` - Function to format Image Url - specific to BEAR framework
- [x] Helper Function: `create_image_thumbnail` - Function to create thumbnail - specific to BEAR framework

### IP Helper

- [x] Helper Function: `getIPAddress` - Function to get the user's actual IP address
- [x] Helper Function: `getIPAddressByHaProxy` - Function to get the user's actual IP address but on the server running
  Ha
  Proxy, through the variable `HTTP_X_FORWARDED_FOR`
- [x] Helper Function: `validateIP` - Function to validate whether a string is an IP. TRUE if it is an IP
- [x] Helper Function: `validateIPV4` - Function to validate whether a string is an IP v4. TRUE if it is an IP
- [x] Helper Function: `validateIPV6` - Function to validate whether a string is an IP v6. TRUE if it is an IP
- [x] Helper Function: `getIpInformation` - Initiate a request to `IP-API` to get information about the IP address

### Meta Helper

- [x] Helper Function: `setupMetaDnsPrefetch` - Function to generate a similar HTML Dns Prefetch segment

### Money Helper

- [x] Helper Function: `money_number_format` - format money currency will detect the current locale

### NanoID Helper

This helper uses the `hidehalo/nanoid-php` package to generate a random Id code that is small, lightweight and much
safer than UUID.

Currently, using nanoid is a trend compared to traditional uuid

To use this package, you need to install the `nguyenanhung/nanoid-helper` package by
command `composer require nguyenanhung/nanoid-helper`

- [x] Helper Function: `randomNanoId`

### Number Helper

- [x] Helper Function: `convertNumberToWords` - Effect of converting a number into words, for example `123`
  to `One Hundred Twenty Three`

### Paging Helper

- [x] Helper Function: `view_paginations`
- [x] Helper Function: `view_more`
- [x] Helper Function: `select_page`
- [x] Helper Function: `get_paginations_title`
- [x] Helper Function: `get_paginations_number`
- [x] Helper Function: `bear_framework_news_view_pagination` - Pagination function specifically for BEAR Project

### PlaceHolder Helper

- [x] Helper Function: `placeholder_img`

### Request Helper

- [x] Helper Function: `sendSimpleGetRequest` - Execute a simple request using CURL with GET method
- [x] Helper Function: `sendSimpleRestfulExecuteRequest` - Execute a simple request to Restful API using CURL
- [x] Helper Function: `bear_post_async_request` - Make an asynchronous POST request - Execute asynchronous POST request
  within the site without waiting for a response => No impact, no delay in the running process
- [x] Helper Function: `get_http_response_code` - Get HTTP Response Code with `get_headers`

### Security Helper

- [x] Helper Function: `xssValidation` - Validate whether the input data is vulnerable to XSS or not. This function does
  not have an escape function, if you want, install the package `nguyenanhung/security`

### Sentry Helper

- [x] Helper Function: `log_to_sentry` - Logging to Sentry via Monolog Handler

### String Helper

- [x] Helper Function: `countStringsInText` - Function to count the number of words in a text paragraph
- [x] Helper Function: `findMiddleInString` - Function to get the string between the start string and the end string
- [x] Helper Function: `str_insert` - Inserts one or more strings into another string on a defined position.
- [x] Helper Function: `str_between` - Return the content in a string between a left and right element.
- [x] Helper Function: `str_after` - Return the part of a string after a given value.
- [x] Helper Function: `str_before` - Get the part of a string before a given value.
- [x] Helper Function: `str_limit_words` - Limit the number of words in a string. Put value of $end to the string end.
- [x] Helper Function: `str_limit_characters` - Limit the number of characters in a string. Put value of $end to the
  string end.
- [x] Helper Function: `str_contains` - Tests if a string contains a given element
- [x] Helper Function: `str_ignore_contains` - Tests if a string contains a given element. Ignore case sensitivity.
- [x] Helper Function: `str_starts_with` - Determine if a given string starts with a given substring.
- [x] Helper Function: `str_ignore_starts_with` - Determine if a given string starts with a given substring. Ignore case
  sensitivity.
- [x] Helper Function: `str_ends_with` - Determine if a given string ends with a given substring.
- [x] Helper Function: `str_ignore_ends_with` - Determine if a given string ends with a given substring. Ignore case
  sensitivity.
- [x] Helper Function: `str_after_last` - Return the part of a string after the last occurrence of a given search value.
- [x] Helper Function: `hide_characters` - Convert `nguyenanhung` to `ngxyexanxunx`, acts as a very simple and
  predictable character encoding function but is necessary to hide something simple

### Text Helper

- [x] Helper Function: `convert_string_utf8_to_vietnamese`
- [x] Helper Function: `clean_allowfullscreen`
- [x] Helper Function: `clean_text`
- [x] Helper Function: `clean_title`
- [x] Helper Function: `clean_text_mobile`
- [x] Helper Function: `bodautru`
- [x] Helper Function: `bodaunhay`
- [x] Helper Function: `searchs_snippets`
- [x] Helper Function: `tags_snippets`
- [x] Helper Function: `tags_clean`
- [x] Helper Function: `highlight_keyword_phrase` - Highlights a keyword within a text string
- [x] Helper Function: `format_keyword_highlight_phrase` - Format Keyword for Function `highlight_keyword_phrase`

### TinyUrl Helper

- [x] Helper Function: `short_url_with_tinyurl` - ShortUrl helper function based on TinyURL API

### URL Helper

- [x] Helper Function: `encodeId_Url_byHungDEV`
- [x] Helper Function: `decodeId_Url_byHungDEV`
- [x] Helper Function: `convertToLatin`
- [x] Helper Function: `specialCharToNormalChar`
- [x] Helper Function: `alphabetOnly`
- [x] Helper Function: `boDauTiengViet`
- [x] Helper Function: `removeSpecialChar`
- [x] Helper Function: `getPermalinksSEO`
- [x] Helper Function: `share_url` - Create standard sharing URL for social networks, very good support for SEO
- [x] Helper Function: `private_url` - Customize function specifically for CodeIgniter framework
- [x] Helper Function: `private_api_url` - Customize function specifically for CodeIgniter framework
- [x] Helper Function: `cdn_url` - Customize function specifically for CodeIgniter framework
- [x] Helper Function: `images_url` - Customize function specifically for CodeIgniter framework
- [x] Helper Function: `audio_url` - Customize function specifically for CodeIgniter framework
- [x] Helper Function: `append_params_into_url` - Append parameters to URL
- [x] Helper Function: `append_query_string_to_current_url` - Get current URL including query string - Customize
  function
  specific to CodeIgniter framework

### UUID Helper

- [x] Helper Function: `generate_uuid_v4` - Function to generate a random v4 UUID string

### VN Province Helper

- [x] Helper Function: `check_vn_province_code` - Check Provin Code of some provinces in Vietnam

### Video Embed Helper

- [x] Helper Function: `convert_video_embed_vimeo` - Convert Video URL to Embed Vimeo (rarely used, save here because
  there are still
  many old projects using it)
- [x] Helper Function: `convert_video_embed_dailymotion` - Convert Video URL to Embed DailyMotion (rarely used, save
  here because there are still
  many old projects using it)
- [x] Helper Function: `convert_video_embed_youtube` - Convert Video URL to Embed YouTube (rarely used, save here
  because there are still
  many old projects using it)
- [x] Helper Function: `convert_video_v_embed_youtube` - Convert Video URL to Embed YouTube (rarely used, save here
  because there are still
  many old projects using it)
- [x] Helper Function: `youtube_image_thumbnail` - Convert YoutubeID to Youtube Thumbnail URL

### XML Helper

- [x] Helper Function: `parse_sitemap` - Support function to render content for Sitemap
- [x] Helper Function: `parse_sitemap_index` - Support function to render content for Sitemap Index
- [x] Helper Function: `xml_convert` - Convert Reserved XML characters to Entities
- [x] Helper Function: `xml_get_value` - Get Value from XML string
- [x] Helper Function: `xml_to_json` - Convert XML string to JSON

### Simple RESTful Helper

Class provides a quick way to call RESTful APIs

- [x] Execute request to RESTful API Service: `SimpleRestful::execute($url, $type, $data)`

### Simple cURL Helper

Class provides a quick way to call to make external requests, using simple Curl, for example

```php
<?php
use nguyenanhung\CodeIgniter\BasicHelper\SimpleCurl;

$curl = new SimpleCurl();
$curl->setUrl('https://example.com')
    ->setPost(array('field1'=>'value1'))
    ->createCurl();

$response = $curl->getResponse();

```

### Simple Image Library

Class provides some methods to help process images

- [x] Method `googleGadgetsProxy` - Create Resize URL using Google Gadgets Proxy
- [x] Method `googleGadgetsProxyDnsPrefetch` - Setup DNS Prefetch for Google Gadgets Proxy, to increase query speed
- [x] Method `wordpressProxy` - Create Resize URL using WordPress Proxy
- [x] Method `wordpressProxyDnsPrefetch` - Setup DNS Prefetch for WordPress Proxy, to increase query speed
- [x] Method `createThumbnail` - Thumbnail creation function, to use it, you need to install the package
  `nguyenanhung/image`
- [x] Method `createThumbnailWithCodeIgniterCache` - Thumbnail creation function combined with CodeIgniter Cache
  library, to use it, you need to install the package `nguyenanhung/image`

## Maintainer & Supporter

| STT | Name        | Email                | Website                  | Github        |
|-----|-------------|----------------------|--------------------------|---------------|
| 1   | Hung Nguyen | dev@nguyenanhung.com | https://nguyenanhung.com | @nguyenanhung |
