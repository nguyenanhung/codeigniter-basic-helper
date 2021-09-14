# CodeIgniter Basic Helper

[![Latest Stable Version](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/v)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![Total Downloads](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/downloads)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![Latest Unstable Version](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/v/unstable)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![License](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/license)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper) [![PHP Version Require](http://poser.pugx.org/nguyenanhung/codeigniter-basic-helper/require/php)](https://packagist.org/packages/nguyenanhung/codeigniter-basic-helper)

## Summary

1 vài helper cơ bản khi sử dụng với CodeIgniter 3.

Có thể đưa vào nhiều bộ code khác, tuy nhiên có 1 số function require framework CodeIgniter, tuy nhiên không ảnh hưởng tới hiệu suất sử dụng

## 1 số helper được hỗ trợ sẵn

Dưới đây là danh sách các Helper được hỗ trợ trong bộ thư viện này

### AlphaID Helper

- [x] Helper Function: `generateAlphaId`

### Array Helper

- [x] Helper Function: `arrayToObject`
- [x] Helper Function: `arrayToXml`
- [x] Helper Function: `convertArrayToXml`

### Assets Helper

- [x] Helper Function: `assets_url`
- [x] Helper Function: `templates_url`
- [x] Helper Function: `editor_url`
- [x] Helper Function: `favicon_url`
- [x] Helper Function: `assets_mobile`
- [x] Helper Function: `assets_themes`
- [x] Helper Function: `assets_themes_dashboard`
- [x] Helper Function: `assets_themes_comingsoon`
- [x] Helper Function: `assets_themes_error`

### Common Helper

- [x] Helper Function: `isEmpty`

### Debug Helper

- [x] Helper Function: `dd`
- [x] Helper Function: `ddd`

### File Helper

- [x] Helper Function: `formatSizeUnits`
- [x] Helper Function: `genarateFileIndex`
- [x] Helper Function: `genarateFileHtaccess`
- [x] Helper Function: `makeNewFolder`
- [x] Helper Function: `new_folder`

### HTML Helper

- [x] Helper Function: `meta_dns_prefetch`
- [x] Helper Function: `meta_property`
- [x] Helper Function: `tachPage`
- [x] Helper Function: `stripHtmlTag`
- [x] Helper Function: `strip_only_tags`
- [x] Helper Function: `tracking_google_analytics`

### Image Helper

- [x] Helper Function: `google_image_resize`
- [x] Helper Function: `wordpress_proxy`

### IP Helper

- [x] Helper Function: `getIPAddress`
- [x] Helper Function: `validateIP`
- [x] Helper Function: `validateIPV4`
- [x] Helper Function: `validateIPV6`
- [x] Helper Function: `getIpInformation`

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

- [x] Helper Function: `generate_uuid_v4`

### NanoID Helper

Helper này sử dụng gói `hidehalo/nanoid-php` để gen ra 1 mã random Id nhỏ, nhẹ và an toàn hơn nhiều so với UUID.

Hiện tại việc sử dụng nanoid đang là xu hướng so với uuid truyền thống

Để sử dụng được gói này, cần cài packages `hidehalo/nanoid-php` bằng lệnh `composer require hidehalo/nanoid-php`

- [x] Helper Function: `randomNanoId`

### XML Helper

- [x] Helper Function: `parse_sitemap_index`

## Maintainer & Supporter

| STT  | Name        | Email                | Github        |
| ---- | ----------- | -------------------- | ------------- |
| 1    | Hung Nguyen | dev@nguyenanhung.com | @nguyenanhung |