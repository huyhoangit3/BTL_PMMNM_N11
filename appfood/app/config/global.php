<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

define('CMS_HOST', 'localhost');
define('CMS_USER', 'phapluat_appfood');
define('CMS_PASS', 'dotrongnam2307200');
define('CMS_DB', 'phapluat_appfood');
define('CMS_PREFIX', 'cms_viet_ci_');

define('CMS_URL', 'https://appfood.baophapluat.org/');

define('CMS_CODE', preg_replace('/[^a-zA-Z0-9]+/i', '', base64_encode(CMS_URL)));
define('CMS_SUFFIX', '.html');

define('CMS_BACKEND', 'admin');

define('KEY_ACTIVE', '26b562a8f96c68a4ec67be9cee8a227c'); //Nhập key "e97c9f55838632b4dd64a5ffe3892ed3" chỉ để chạy trên

define('CMS_META', '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />');
