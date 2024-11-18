<?php 
session_start();

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
    'form-them-san-pham'=>(new adminSanPhamController())->formAddSanPham(),
    'them-san-pham'=>(new adminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham'=>(new adminSanPhamController())->formEditSanPham(),
    'sua-san-pham'=>(new adminSanPhamController())->postEditSanPham(),
    // 'sua-album-anh-san-pham'=>(new adminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham'=>(new adminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham'=>(new adminSanPhamController())->detailSanPham(),


    // route quản lý tài khoản
    'tai-khoan'=>(new adminTaiKhoanController())->danhSachQuanTri(),
};