<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'   , 'http://localhost/Sneaker_store/');
define('BASE_URL_ADMIN'   , 'http://localhost/Sneaker_store/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);

define('DB_NAME'    , 'sneaker_store');  // Tên database
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8');

define('PATH_ROOT'    , __DIR__ . '/../');
