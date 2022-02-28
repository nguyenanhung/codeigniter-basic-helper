# CodeIgniter Basic Helper

[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/v)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![Total Downloads](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/downloads)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/v/unstable)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![License](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/license)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/require/php)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)

## Summary

1 vài helper cơ bản khi sử dụng với CodeIgniter 3.

Có thể đưa vào nhiều bộ code khác, tuy nhiên có 1 số function require framework CodeIgniter, tuy nhiên không ảnh hưởng tới hiệu suất sử dụng

## 1 số helper được hỗ trợ sẵn

Dưới đây là danh sách các Helper được hỗ trợ trong bộ thư viện này

### AlphaID Helper

- [x] Helper Function: `generateAlphaId` - Hàm giúp tạo 1 Id unique `4ew68i32xc` dựa trên 1 int đầu vào như `1234`

### Array Helper

- [x] Helper Function: `arrayToObject `- Hàm giúp chuyển 1 array thành 1 object
- [x] Helper Function: `arrayToXml` - Hàm giúp chuyển array thành 1 chuỗi XML

### Assets Helper

- [x] Helper Function: `assets_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file CSS, JS
- [x] Helper Function: `templates_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `templates` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file CSS,
  JS
- [x] Helper Function: `editor_url` - Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets/editors/` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file
  CSS, JS
- [x] Helper Function: `favicon_url`- Hàm lấy ra Assets Url, điều kiện tồn tại thư mục `assets/favicon/` trong thư mục `public/`. Trong trường hợp trong file `config.php` tồn tại biến `assets_version` sẽ tự động thêm version vào đằng sau các file
  CSS, JS
- [x] Helper Function: `storage_url` - Need config `storage_url` item in config.php file. VD: `$config['storage_url'] = 'https://storage.nguyenanhung.com/';`
- [x] Helper Function: `go_url` - Need config `go_url` item in `config.php` file. VD: `$config['go_url'] = 'https://go.nguyenanhung.com/';`
- [x] Helper Function: `assets_mobile`
- [x] Helper Function: `assets_themes`
- [x] Helper Function: `assets_themes_dashboard`
- [x] Helper Function: `assets_themes_comingsoon`
- [x] Helper Function: `assets_themes_error`

### Common Helper

- [x] Helper Function: `isEmpty `- Kiểm tra 1 input đầu vào xem có phải là rỗng hay không

### Debug Helper

- [x] Helper Function: `dd`
- [x] Helper Function: `ddd`

### File Helper

- [x] Helper Function: `formatSizeUnits` - Hàm format 1 int đầu vào thành 1 format để dễ đọc dung lượng file
- [x] Helper Function: `genarateFileIndex` - Tự động tạo nội dung file `index.html`
- [x] Helper Function: `genarateFileHtaccess` - Tự động tạo nội dung file `.htaccess`
- [x] Helper Function: `genarateFileReadme` - Tự động tạo nội dung file `README.md`
- [x] Helper Function: `makeNewFolder` - Hàm tạo 1 thư mục mới và genre sẵn trong đó 3 file: `README.md`, `index.html`, `.htaccess`
- [x] Helper Function: `new_folder` - Chức năng tương tự với hàm `makeNewFolder`

### HTML Helper

- [x] Helper Function: `meta_dns_prefetch`
- [x] Helper Function: `meta_property`
- [x] Helper Function: `tachPage`
- [x] Helper Function: `stripHtmlTag`
- [x] Helper Function: `strip_only_tags`
- [x] Helper Function: `tracking_google_analytics`

### Image Helper

- [x] Helper Function: `google_image_resize`
- [x] Helper Function: `google_image_proxy_dns_prefetch`
- [x] Helper Function: `wordpress_proxy`
- [x] Helper Function: `wordpress_proxy_dns_prefetch`

### IP Helper

- [x] Helper Function: `getIPAddress` - Hàm lấy ra địa chỉ IP thực tế của người dùng
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

- [x] Helper Function: `share_url`
- [x] Helper Function: `encodeId_Url_byHungDEV`
- [x] Helper Function: `decodeId_Url_byHungDEV`
- [x] Helper Function: `convertToLatin`
- [x] Helper Function: `specialCharToNormalChar`
- [x] Helper Function: `alphabetOnly`
- [x] Helper Function: `boDauTiengViet`
- [x] Helper Function: `removeSpecialChar`
- [x] Helper Function: `getPermalinksSEO`

### UUID Helper

- [x] Helper Function: `generate_uuid_v4` - Hàm tạo ra 1 chuỗi UUID v4 ngẫu nhiên

### XML Helper

- [x] Helper Function: `parse_sitemap_index`

### Simple RESTful Helper

Class cung cấp phương thức nhanh gọn để gọi tới các API tuân chuẩn RESTful

- [x] Execute request to RESTful API Service: `SimpleRestful::execute($url, $type, $data)`

## Maintainer & Supporter

| STT  | Name        | Email                | Github        |
| ---- | ----------- | -------------------- | ------------- |
| 1    | Hung Nguyen | dev@nguyenanhung.com | @nguyenanhung |