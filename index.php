<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/SanPhamController.php';



// Require toàn bộ file Models
require_once './models/SanPham.php';




// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->index(),

    'search' => (new HomeController())->search(),

    'danh-sach-san-pham' =>(new SanPhamController())->danhSachSanPham(),
    'chi-tiet-san-pham' =>(new SanPhamController())->chiTietSanPham($_GET['id']),

};