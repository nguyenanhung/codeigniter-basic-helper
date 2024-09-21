# CodeIgniter Basic Helper

[![Latest Stable Version](https://img.shields.io/packagist/v/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![Total Downloads](https://img.shields.io/packagist/dt/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![Daily Downloads](https://img.shields.io/packagist/dd/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![Monthly Downloads](https://img.shields.io/packagist/dm/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![License](https://img.shields.io/packagist/l/nguyenanhung/codeigniter-basic-helper.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)
[![PHP Version Require](https://img.shields.io/packagist/dependency-v/nguyenanhung/codeigniter-basic-helper/php)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)

## Summary

1 vài helper cơ bản khi sử dụng với CodeIgniter 3.

Có thể đưa vào nhiều bộ code hay framework khác, tuy nhiên có 1 số function require framework `CodeIgniter`, tuy nhiên
không ảnh hưởng tới hiệu suất sử dụng

Trong trường hợp tích hợp gói này vào các framework, source khác ngoài `CodeIgniter`, bạn cần cài kèm thêm
gói `nguyenanhung/polyfill-codeigniter-built-in` để sử dụng tốt nhất

1 vài framework tôi cũng thường dùng với gói này là

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

## 1 số helper được hỗ trợ sẵn

Dưới đây là danh sách các Helper được hỗ trợ trong bộ thư viện này

### AlphaID Helper

- [x] Helper Function: `generateAlphaId` - Hàm giúp tạo 1 Id unique `4ew68i32xc` dựa trên 1 int đầu vào như `1234`

### Array Helper

- [x] Helper Function: `arrayToObject `- Hàm giúp chuyển 1 array thành 1 object
- [x] Helper Function: `to_array` - Converts a string or an object to an array.
- [x] Helper Function: `arrayToXml` - Hàm giúp chuyển array thành 1 chuỗi XML
- [x] Helper Function: `removeArrayElementWithValue` - Loại bỏ 1 giá trị trong array theo key và value
- [x] Helper Function: `arrayRecursiveDiff` - Diff 2 array bằng đệ quy
- [x] Helper Function: `arrayIsAssoc` - Detects if the given value is an associative array.
- [x] Helper Function: `arrayFirstElement` - Returns the first element of an array.
- [x] Helper Function: `arrayLastElement` - Returns the last element of an array.
- [x] Helper Function: `arrayGetElement` - Gets a value in an array by dot notation for the keys.
- [x] Helper Function: `arraySetElement` - Sets a value in an array using the dot notation.

### Assets Helper

- [x] Helper Function: `assets_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets` trong thư mục `public/`.
  Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file
  CSS, JS
- [x] Helper Function: `static_url` - Hàm lấy ra Static Resource Url, điều kiện tồn tại cấu
  hình `config_item('static_url')` trong config của website. Trong trường hợp trong file `config.php` tồn tại
  biến `assets_version` sẽ tự động thêm version vào
  đằng sau các file CSS, JS
- [x] Helper Function: `templates_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `templates` trong thư
  mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng
  sau các file CSS,
  JS
- [x] Helper Function: `editor_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets/editors/` trong thư
  mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng
  sau các file
  CSS, JS
- [x] Helper Function: `favicon_url`- Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets/favicon/` trong thư
  mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng
  sau các file
  CSS, JS
- [x] Helper Function: `favicon_html_tag`- Hàm lấy ra đoạn HTML thể hiện Favicon dựa vào URL folder favicon đầu vào
- [x] Helper Function: `storage_url` - Need config `storage_url` item in config.php file.
  VD: `$config['storage_url'] = 'https://storage.nguyenanhung.com/';`
- [x] Helper Function: `go_url` - Need config `go_url` item in `config.php` file.
  VD: `$config['go_url'] = 'https://go.nguyenanhung.com/';`
- [x] Helper Function: `assets_mobile` - Lấy ra đường dẫn assets của giao diện mobile (thực tế ít dùng, duy trì cho các
  dự án cũ)
- [x] Helper Function: `assets_themes` - Lấy ra đường dẫn assets của giao diện pc (thực tế ít dùng, duy trì cho các dự
  án cũ)
- [x] Helper Function: `assets_themes_dashboard` - Lấy ra đường dẫn assets của giao diện dashboard (thực tế ít dùng, duy
  trì cho các dự án cũ)
- [x] Helper Function: `assets_themes_comingsoon` - Lấy ra đường dẫn assets của giao diện coming soon (thực tế ít dùng,
  duy trì cho các dự án cũ)
- [x] Helper Function: `assets_themes_error` - Lấy ra đường dẫn assets của giao diện error (thực tế ít dùng, duy trì cho
  các dự án cũ)
- [x] Helper Function: `cdn_js_url` - Resource JS, CSS từ CDN của Cloudflare
- [x] Helper Function: `google_fonts_url` - Resource Google Font
- [x] Helper Function: `bootstrapcdn_url` - Resource CDN từ Bootstrap

### Blogspot Helper

- [x] Helper Function: `blogspotDescSortWithPublishedTime` - Sắp xếp dữ liệu feed từ blogspot theo Published Time
- [x] Helper Function: `blogspotUSort` - Sắp xếp dữ liệu feed từ blogspot theo USort và Published Time theo DESC
- [x] Helper Function: `blogspotFormatInformationItem` - Format dữ liệu đầu vào blogspot item

### Bytes Helper

- [x] Helper Function: `bytesHumanFormat` - Hiển thị format nội dung dễ đọc từ byte dữ liệu

### Chart Render Helper

- [x] Helper Function: `bear_framework_default_get_data_chart`
- [x] Helper Function: `bear_framework_default_get_data_chart_report`

### Common Helper

- [x] Helper Function: `isEmpty ` - Kiểm tra 1 input đầu vào xem có phải là rỗng hay không
- [x] Helper Function: `defaultCompressHtmlOutput ` - Compress HTML output, default configure
- [x] Helper Function: `generateRandomUniqueId ` - Tạo 1 chuỗi Unique ID ngẫu nhiên, sử dụng UUID
- [x] Helper Function: `generateRandomNanoUniqueId ` - Tạo 1 chuỗi Unique ID ngẫu nhiên, sử dụng NanoID

### Database Helper

- [x] Helper Function: `generate_list_id_with_parent_id ` - Tạo 1 list các ID, trong đó chứa các tập con phụ thuộc của
  ID đó. VD: Dùng trong trường hợp muốn hiển thị nội dung của category cha và các category con trong cùng 1 page content

### Date Helper

- [x] Helper Function: `dayFloor` - Hàm lấy ra khoảng cách giữa 2 ngày
- [x] Helper Function: `getZuluTime` - Hàm lấy ra tham số date theo Zulu time
- [x] Helper Function: `iso_8601_utc_time` - tương tự hàm getZuluTime
- [x] Helper Function: `getYesterday` - Hàm ấy ra ngày trước đó liền kề
- [x] Helper Function: `smart_bear_date_range` - Lấy ra 1 mảng dữ liệu chứa các ngày theo khoảng cách
- [x] Helper Function: `format_datetime_vn` - Format lại thông tin ngày theo kiểu Việt Nam
- [x] Helper Function: `get_start_and_end_date_for_week` - Lấy ra ngày đầu và ngày cuối của 1 tuần

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

- [x] Helper Function: `widget_facebook_div_init` - Hàm tạo ra `<div id="fb-root"></div>`
- [x] Helper Function: `widget_facebook_script_init` - Hạm tạo ra đoạn script init trong trường hợp cần nhúng JS
  Facebook
- [x] Helper Function: `widget_facebook_comments` - Hàm tạo ra khung comment facebook
- [x] Helper Function: `widget_facebook_share_button` - Hàm tạo ra nút share facebook
- [x] Helper Function: `widget_facebook_like_button` - Hàm tạo ra nút like facebook
- [x] Helper Function: `widget_facebook_save_button` - Hàm tạo ra nút lưu nội dung vào facebook

### File Helper

- [x] Helper Function: `formatSizeUnits` - Hàm format 1 int đầu vào thành 1 format để dễ đọc dung lượng file
- [x] Helper Function: `generateFileIndex` - Tự động tạo nội dung file `index.html`
- [x] Helper Function: `generateFileHtaccess` - Tự động tạo nội dung file `.htaccess`
- [x] Helper Function: `generateFileReadme` - Tự động tạo nội dung file `README.md`
- [x] Helper Function: `makeNewFolder` - Hàm tạo 1 thư mục mới và generate sẵn trong đó 3 file: `README.md`, `index.html`
  , `.htaccess`. Tạo thêm file `.gitkeep` nếu tham số thứ 2 được truyền là true
- [x] Helper Function: `new_folder` - Chức năng tương tự với hàm `makeNewFolder`
- [x] Helper Function: `scan_folder` - Quét và lấy ra danh sách các thông tin dữ liệu trong folder
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

- [x] Helper Function: `google_image_resize` - Resize Image sử dụng Google Gadget Proxy
- [x] Helper Function: `google_image_proxy_dns_prefetch` - Hàm cung cấp DNS Prefetch trong trường hợp sử
  dụng `google_image_resize`
- [x] Helper Function: `wordpress_proxy` - Resize & Cache Image sử dụng WordPress Proxy
- [x] Helper Function: `wordpress_proxy_dns_prefetch` - Hàm cung cấp DNS Prefetch trong trường hợp sử
  dụng `wordpress_proxy`
- [x] Helper Function: `bear_framework_image_url` - Hàm format Image Url - dành riêng cho BEAR framework
- [x] Helper Function: `create_image_thumbnail` - Hàm create thumbnail - dành riêng cho BEAR framework

### IP Helper

- [x] Helper Function: `getIPAddress` - Hàm lấy ra địa chỉ IP thực tế của người dùng
- [x] Helper Function: `getIPAddressByHaProxy` - Hàm lấy ra địa chỉ IP thực tế của người dùng nhưng ở server có chạy Ha
  Proxy, thông qua biến `HTTP_X_FORWARDED_FOR`
- [x] Helper Function: `validateIP` - Hàm validate 1 string có phải IP ko. TRUE nếu đó là IP
- [x] Helper Function: `validateIPV4` - Hàm validate 1 string có phải IP v4 ko. TRUE nếu đó là IP
- [x] Helper Function: `validateIPV6` - Hàm validate 1 string có phải IP v6 ko. TRUE nếu đó là IP
- [x] Helper Function: `getIpInformation` - Khởi tạo 1 request đến `IP-API` để lấy thông tin của địa chỉ IP

### Meta Helper

- [x] Helper Function: `setupMetaDnsPrefetch` - Hàm hỗ trợ gen ra 1 đoạn HTML Dns Prefetch tương
  tự `<link href='//data.nguyenanhung.com/' rel='dns-prefetch' />`

### Money Helper

- [x] Helper Function: `money_number_format` - format money currency will detect the current locale

### NanoID Helper

Helper này sử dụng gói `hidehalo/nanoid-php` để gen ra 1 mã random Id nhỏ, nhẹ và an toàn hơn nhiều so với UUID.

Hiện tại việc sử dụng nanoid đang là xu hướng so với uuid truyền thống

Để sử dụng được gói này, cần cài packages `nguyenanhung/nanoid-helper` bằng
lệnh `composer require nguyenanhung/nanoid-helper`

- [x] Helper Function: `randomNanoId`

### Number Helper

- [x] Helper Function: `convertNumberToWords` - Tác dụng convert 1 số thành chữ, ví dụ `123`
  thành `One Hundred Twenty Three`

### Paging Helper

- [x] Helper Function: `view_paginations`
- [x] Helper Function: `view_more`
- [x] Helper Function: `select_page`
- [x] Helper Function: `get_paginations_title`
- [x] Helper Function: `get_paginations_number`
- [x] Helper Function: `bear_framework_news_view_pagination` - Hàm phân trang chế riêng cho BEAR Project

### PlaceHolder Helper

- [x] Helper Function: `placeholder_img`

### Request Helper

- [x] Helper Function: `sendSimpleGetRequest` - Tiến hành thực thi 1 request đơn giản sử dụng CURL với phương thức GET
- [x] Helper Function: `sendSimpleRestfulExecuteRequest` - Thực thi 1 simple request tới Restful API sử dụng CURL
- [x] Helper Function: `bear_post_async_request` - Make an asynchronous POST request - Thực hiện yêu cầu POST không đồng
  bộ trong nội bộ site mà không cần chờ phản hồi => Không ảnh hưởng, không trì hoãn tiến trình đang chạy
- [x] Helper Function: `get_http_response_code` - Get HTTP Response Code with `get_headers`

### Security Helper

- [x] Helper Function: `xssValidation` - Validation dữ liệu đầu vào có bị dính lỗi XSS hay không. Hàm này không có tác
  dụng escape, nếu muốn, hãy cài thêm packages `nguyenanhung/security`

### Sentry Helper

- [x] Helper Function: `log_to_sentry` - Logging lên Sentry thông qua Monolog Handler

### String Helper

- [x] Helper Function: `countStringsInText` - Hàm đếm số từ trong đoạn văn bản
- [x] Helper Function: `findMiddleInString` - Hàm lấy chuỗi ở giữa chuỗi bắt đầu và chuỗi kết thúc
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

- [x] Helper Function: `short_url_with_tinyurl` - Hàm hỗ trợ shortUrl dựa trên API của TinyURL

### URL Helper

- [x] Helper Function: `encodeId_Url_byHungDEV`
- [x] Helper Function: `decodeId_Url_byHungDEV`
- [x] Helper Function: `convertToLatin`
- [x] Helper Function: `specialCharToNormalChar`
- [x] Helper Function: `alphabetOnly`
- [x] Helper Function: `boDauTiengViet`
- [x] Helper Function: `removeSpecialChar`
- [x] Helper Function: `getPermalinksSEO`
- [x] Helper Function: `share_url` - Create ra URL share chuẩn cho các MXH, hỗ trợ rất tốt cho SEO
- [x] Helper Function: `private_url` - Hàm customize dành riêng cho framework CodeIgniter
- [x] Helper Function: `private_api_url` - Hàm customize dành riêng cho framework CodeIgniter
- [x] Helper Function: `cdn_url` - Hàm customize dành riêng cho framework CodeIgniter
- [x] Helper Function: `images_url` - Hàm customize dành riêng cho framework CodeIgniter
- [x] Helper Function: `audio_url` - Hàm customize dành riêng cho framework CodeIgniter
- [x] Helper Function: `append_params_into_url` - Append parameters to URL
- [x] Helper Function: `append_query_string_to_current_url` - Get current URL including query string - Hàm customize
  dành riêng cho framework CodeIgniter

### UUID Helper

- [x] Helper Function: `generate_uuid_v4` - Hàm tạo ra 1 chuỗi UUID v4 ngẫu nhiên

### VN Province Helper

- [x] Helper Function: `check_vn_province_code` - Check Provin Code của 1 số tỉnh thành Việt Nam

### Video Embed Helper

- [x] Helper Function: `convert_video_embed_vimeo` - Convert Video URL to Embed Vimeo (ít dùng, lưu tại đây vì còn nhiều
  project cũ đang sử dụng)
- [x] Helper Function: `convert_video_embed_dailymotion` - Convert Video URL to Embed DailyMotion (ít dùng, lưu tại đây
  vì còn nhiều project cũ đang sử dụng)
- [x] Helper Function: `convert_video_embed_youtube` - Convert Video URL to Embed YouTube (ít dùng, lưu tại đây vì còn
  nhiều project cũ đang sử dụng)
- [x] Helper Function: `convert_video_v_embed_youtube` - Convert Video URL to Embed YouTube (ít dùng, lưu tại đây vì còn
  nhiều project cũ đang sử dụng)
- [x] Helper Function: `youtube_image_thumbnail` - Convert YoutubeID to Youtube Thumbnail URL

### XML Helper

- [x] Helper Function: `parse_sitemap` - Hàm hỗ trợ render ra nội dung cho Sitemap
- [x] Helper Function: `parse_sitemap_index` - Hàm hỗ trợ render ra nội dung cho Sitemap Index
- [x] Helper Function: `xml_convert` - Convert Reserved XML characters to Entities
- [x] Helper Function: `xml_get_value` - Get Value from XML string
- [x] Helper Function: `xml_to_json` - Convert XML string to JSON

### Simple RESTful Helper

Class cung cấp phương thức nhanh gọn để gọi tới các API tuân chuẩn RESTful

- [x] Execute request to RESTful API Service: `SimpleRestful::execute($url, $type, $data)`

### Simple cURL Helper

Class cung cấp phương thức nhanh gọn để gọi để thực hiện các request ra bên ngoài, sử dụng Curl đơn giản, ví dụ

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

Class cung cấp 1 số phương thức giúp xử lý hình ảnh

- [x] Method `googleGadgetsProxy` - Tạo URL Resize sử dụng Google Gadgets Proxy
- [x] Method `googleGadgetsProxyDnsPrefetch` - Setup DNS Prefetch cho Google Gadgets Proxy, nhằm tăng tốc độ truy vấn
- [x] Method `wordpressProxy` - Tạo URL Resize sử dụng WordPress Proxy
- [x] Method `wordpressProxyDnsPrefetch` - Setup DNS Prefetch cho WordPress Proxy, nhằm tăng tốc độ truy vấn
- [x] Method `createThumbnail` - Hàm tạo Thumbnail, để sử dụng cần cài thêm gói `nguyenanhung/image`
- [x] Method `createThumbnailWithCodeIgniterCache` - Hàm tạo Thumbnail kết hợp thư viện Cache của CodeIgniter, để sử
  dụng cần cài thêm gói `nguyenanhung/image`

## Maintainer & Supporter

| STT | Name        | Email                | Website                  | Github        |
|-----|-------------|----------------------|--------------------------|---------------|
| 1   | Hung Nguyen | dev@nguyenanhung.com | https://nguyenanhung.com | @nguyenanhung |
