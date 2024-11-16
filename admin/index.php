<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/adminDanhMucController.php';
require_once 'controllers/adminSanPhamController.php';
require_once 'controllers/adminTaiKhoanController.php';

// Require toàn bộ file Models
require_once 'models/adminDanhMuc.php';
require_once 'models/adminSanPham.php';
require_once 'models/adminTaiKhoan.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                 => (new DashboardController())->index(),


    // route quản lý danh mục
    'danh-muc'=>   (new adminDanhMucController())->danhSachDanhMuc(),



    // route quản lý sản phẩm
    'san-pham'=>(new adminSanPhamController())->danhSachSanPham(),


    // route quản lý tài khoản
    'tai-khoan'=>(new adminTaiKhoanController())->danhSachQuanTri(),
};