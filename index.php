<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/GioHangController.php';
require_once './controllers/DonHangController.php';




// Require toàn bộ file Models
require_once './models/GioHang.php';
require_once './models/SanPham.php';
require_once './models/DonHang.php';
require_once './models/userModel.php';




// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->index(),

    'search' => (new HomeController())->search(),
    'formlogin' => (new HomeController())->formlogin(),
    'login'=> (new HomeController())->login(),
    'logout'=> (new HomeController())->logout(),
    'admin' => (new HomeController())->checkAdmin(),
    'register'=> (new HomeController())->register(),

    'danh-sach-san-pham' =>(new SanPhamController())->danhSachSanPham(),
    'chi-tiet-san-pham' =>(new SanPhamController())->chiTietSanPham($_GET['id']),

    'them-gio-hang' =>(new GioHangController())->addGioHang(),
    'gio-hang' =>(new GioHangController())->gioHang(),
    'xoa-gio-hang' => (new GioHangController())->deleteSPGioHang(),

    'thanh-toan' =>(new DonHangController())->thanhToan(),
    'xu-ly-thanh-toan' =>(new DonHangController())->postThanhToan(),
    'lich-su-mua-hang' =>(new DonHangController())->lichSuMuaHang(),
    'chi-tiet-mua-hang' =>(new DonHangController())->chiTietMuaHang(),
    'huy-don-hang' =>(new DonHangController())->huyDonHang(),
    
};