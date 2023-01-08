# CodeIgniter Basic Helper

[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/v)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![Total Downloads](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/downloads)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/v/unstable)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![License](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/license)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/require/php)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)

## Summary

1 vài helper cơ bản khi sử dụng với CodeIgniter 3.

Có thể đưa vào nhiều bộ code khác, tuy nhiên có 1 số function require framework `CodeIgniter`, tuy nhiên không ảnh hưởng tới hiệu suất sử dụng

Trong trường hợp tích hợp gói này vào các framework, source khác ngoài `CodeIgniter`, bạn cần cài kèm thêm gói `nguyenanhung/polyfill-codeigniter-built-in` để sử dụng tốt nhất

## Table of Contents

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

- [x] Helper Function: `assets_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file CSS, JS
- [x] Helper Function: `static_url` - Hàm lấy ra Static Resource Url, điều kiện tồn tại cấu hình `config_item('static_url')` trong config của website. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào
  đằng sau các file CSS, JS
- [x] Helper Function: `templates_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `templates` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file CSS,
  JS
- [x] Helper Function: `editor_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets/editors/` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file
  CSS, JS
- [x] Helper Function: `favicon_url`- Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets/favicon/` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file
  CSS, JS
- [x] Helper Function: `favicon_html_tag`- Hàm lấy ra đoạn HTML thể hiện Favicon dựa vào URL folder favicon đầu vào
- [x] Helper Function: `storage_url` - Need config `storage_url` item in config.php file. VD: `$config['storage_url'] = 'https://storage.nguyenanhung.com/';`
- [x] Helper Function: `go_url` - Need config `go_url` item in `config.php` file. VD: `$config['go_url'] = 'https://go.nguyenanhung.com/';`
- [x] Helper Function: `assets_mobile`
- [x] Helper Function: `assets_themes`
- [x] Helper Function: `assets_themes_dashboard`
- [x] Helper Function: `assets_themes_comingsoon`
- [x] Helper Function: `assets_themes_error`
- [x] Helper Function: `cdn_js_url` - Resource JS, CSS từ CDN của Cloudflare
- [x] Helper Function: `google_fonts_url` - Resource Google Font
- [x] Helper Function: `bootstrapcdn_url` - Resource CDN từ Bootstrap

### Blogspot Helper

- [x] Helper Function: `blogspotDescSortWithPublishedTime` - Sắp xếp dữ liệu feed từ blogspot theo Published Time
- [x] Helper Function: `blogspotUSort` - Sắp xếp dữ liệu feed từ blogspot theo USort và Published Time theo DESC

### Bytes Helper

- [x] Helper Function: `bytesHumanFormat` - Hiển thị format nội dung dễ đọc từ byte dữ liệu

### Chart Render Helper

- [x] Helper Function: `bear_framework_default_get_data_chart`
- [x] Helper Function: `bear_framework_default_get_data_chart_report`

### Common Helper

- [x] Helper Function: `isEmpty ` - Kiểm tra 1 input đầu vào xem có phải là rỗng hay không
- [x] Helper Function: `defaultCompressHtmlOutput ` - Compress HTML output, default configure

### Date Helper

- [x] Helper Function: `dayFloor` - Hàm lấy ra khoảng cách giữa 2 ngày
- [x] Helper Function: `getZuluTime` - Hàm lấy ra tham số date theo Zulu time
- [x] Helper Function: `iso_8601_utc_time` - tương tự hàm getZuluTime
- [x] Helper Function: `getYesterday` - Hàm ấy ra ngày trước đó liền kề

### Debug Helper

- [x] Helper Function: `dd`
- [x] Helper Function: `ddd`

### ENV Helper

- [x] Helper Function: `bear_get_env` - Hàm lấy giá trị từ file .env

### Facebook Helper

- [x] Helper Function: `widget_facebook_div_init` - Hàm tạo ra `<div id="fb-root"></div>`
- [x] Helper Function: `widget_facebook_script_init` - Hạm tạo ra đoạn script init trong trường hợp cần nhúng JS Facebook
- [x] Helper Function: `widget_facebook_comments` - Hàm tạo ra khung comment facebook
- [x] Helper Function: `widget_facebook_share_button` - Hàm tạo ra nút share facebook
- [x] Helper Function: `widget_facebook_like_button` - Hàm tạo ra nút like facebook
- [x] Helper Function: `widget_facebook_save_button` - Hàm tạo ra nút lưu nội dung vào facebook

### File Helper

- [x] Helper Function: `formatSizeUnits` - Hàm format 1 int đầu vào thành 1 format để dễ đọc dung lượng file
- [x] Helper Function: `genarateFileIndex` - Tự động tạo nội dung file `index.html`
- [x] Helper Function: `genarateFileHtaccess` - Tự động tạo nội dung file `.htaccess`
- [x] Helper Function: `genarateFileReadme` - Tự động tạo nội dung file `README.md`
- [x] Helper Function: `makeNewFolder` - Hàm tạo 1 thư mục mới và genre sẵn trong đó 3 file: `README.md`, `index.html`, `.htaccess`
- [x] Helper Function: `new_folder` - Chức năng tương tự với hàm `makeNewFolder`
- [x] Helper Function: `scan_folder` - Quét và lấy ra danh sách các thông tin dữ liệu trong folder
- [x] Helper Function: `getAllFileSizeInFolder` - Get all File size in Folder
- [x] Helper Function: `getAllFileInFolder` - Get all File in Folder

### HTML Helper

- [x] Helper Function: `meta_dns_prefetch`
- [x] Helper Function: `meta_property`
- [x] Helper Function: `tachPage`
- [x] Helper Function: `stripHtmlTag`
- [x] Helper Function: `strip_only_tags`
- [x] Helper Function: `tracking_google_analytics`
- [x] Helper Function: `tracking_google_gtag_analytics_default`

### Image Helper

- [x] Helper Function: `google_image_resize` - Resize Image sử dụng Google Gadget Proxy
- [x] Helper Function: `google_image_proxy_dns_prefetch` - Hàm cung cấp DNS Prefetch trong trường hợp sử dụng `google_image_resize`
- [x] Helper Function: `wordpress_proxy` - Resize & Cache Image sử dụng Wordpress Proxy
- [x] Helper Function: `wordpress_proxy_dns_prefetch` - Hàm cung cấp DNS Prefetch trong trường hợp sử dụng `wordpress_proxy`
- [x] Helper Function: `bear_framework_image_url` - Hàm format Image Url - dành riêng cho BEAR framework
- [x] Helper Function: `create_image_thumbnail` - Hàm create thumbnail - dành riêng cho BEAR framework

### IP Helper

- [x] Helper Function: `getIPAddress` - Hàm lấy ra địa chỉ IP thực tế của người dùng
- [x] Helper Function: `getIPAddressByHaProxy` - Hàm lấy ra địa chỉ IP thực tế của người dùng nhưng ở server có chạy Ha Proxy, thông qua biến `HTTP_X_FORWARDED_FOR`
- [x] Helper Function: `validateIP` - Hàm validate 1 string có phải IP ko. TRUE nếu đó là IP
- [x] Helper Function: `validateIPV4` - Hàm validate 1 string có phải IP v4 ko. TRUE nếu đó là IP
- [x] Helper Function: `validateIPV6` - Hàm validate 1 string có phải IP v6 ko. TRUE nếu đó là IP
- [x] Helper Function: `getIpInformation` - Khởi tạo 1 request đến `IP-API` để lấy thông tin của địa chỉ IP

### Meta Helper

- [x] Helper Function: `setupMetaDnsPrefetch` - Hàm hỗ trợ gen ra 1 đoạn HTML Dns Prefetch tương tự `<link href='//data.nguyenanhung.com/' rel='dns-prefetch' />`

### NanoID Helper

Helper này sử dụng gói `hidehalo/nanoid-php` để gen ra 1 mã random Id nhỏ, nhẹ và an toàn hơn nhiều so với UUID.

Hiện tại việc sử dụng nanoid đang là xu hướng so với uuid truyền thống

Để sử dụng được gói này, cần cài packages `nguyenanhung/nanoid-helper` bằng lệnh `composer require nguyenanhung/nanoid-helper`

- [x] Helper Function: `randomNanoId`

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
- [x] Helper Function: `bear_post_async_request` - Make an asynchronous POST request - Thực hiện yêu cầu POST không đồng bộ trong nội bộ site mà không cần chờ phản hồi => Không ảnh hưởng, không trì hoãn tiến trình đang chạy

### Security Helper

- [x] Helper Function: `xssValidation` - Validation dữ liệu đầu vào có bị dính lỗi XSS hay không

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
- [x] Helper Function: `str_limit_characters` - Limit the number of characters in a string. Put value of $end to the string end.
- [x] Helper Function: `str_contains` - Tests if a string contains a given element
- [x] Helper Function: `str_ignore_contains` - Tests if a string contains a given element. Ignore case sensitivity.
- [x] Helper Function: `str_starts_with` - Determine if a given string starts with a given substring.
- [x] Helper Function: `str_ignore_starts_with` - Determine if a given string starts with a given substring. Ignore case sensitivity.
- [x] Helper Function: `str_ends_with` - Determine if a given string ends with a given substring.
- [x] Helper Function: `str_ignore_ends_with` - Determine if a given string ends with a given substring. Ignore case sensitivity.
- [x] Helper Function: `str_after_last` - Return the part of a string after the last occurrence of a given search value.

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

### TinyUrl Helper

- [x] Helper Function: `short_url_with_tinyurl` - Hàm hỗ trợ shortUrl dựa trên API của TinyURL

### URL Helper

- [x] Helper Function: `share_url` - Create ra URL share chuẩn cho các MXH, hỗ trợ rất tốt cho SEO
- [x] Helper Function: `encodeId_Url_byHungDEV`
- [x] Helper Function: `decodeId_Url_byHungDEV`
- [x] Helper Function: `convertToLatin`
- [x] Helper Function: `specialCharToNormalChar`
- [x] Helper Function: `alphabetOnly`
- [x] Helper Function: `boDauTiengViet`
- [x] Helper Function: `removeSpecialChar`
- [x] Helper Function: `getPermalinksSEO`
- [x] Helper Function: `private_url` - Hàm customize dành riêng cho framework CodeIgniter
- [x] Helper Function: `private_api_url` - Hàm customize dành riêng cho framework CodeIgniter
- [x] Helper Function: `cdn_url` - Hàm customize dành riêng cho framework CodeIgniter

### UUID Helper

- [x] Helper Function: `generate_uuid_v4` - Hàm tạo ra 1 chuỗi UUID v4 ngẫu nhiên

### VN Province Helper

- [x] Helper Function: `check_vn_province_code`

### XML Helper

- [x] Helper Function: `parse_sitemap_index` - Hàm hỗ trợ render ra nội dung cho Sitemap index

### Simple RESTful Helper

Class cung cấp phương thức nhanh gọn để gọi tới các API tuân chuẩn RESTful

- [x] Execute request to RESTful API Service: `SimpleRestful::execute($url, $type, $data)`

## Maintainer & Supporter

| STT | Name        | Email                | Website                  | Github        |
|-----|-------------|----------------------|--------------------------|---------------|
| 1   | Hung Nguyen | dev@nguyenanhung.com | https://nguyenanhung.com | @nguyenanhung |