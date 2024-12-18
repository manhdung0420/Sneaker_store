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
require_once 'controllers/adminBienTheController.php';
require_once 'controllers/adminDonHangController.php';
require_once 'controllers/adminBinhLuanController.php';
require_once 'controllers/adminLienHeController.php';

// Require toàn bộ file Models
require_once 'models/adminDanhMuc.php';
require_once 'models/adminSanPham.php';
require_once 'models/adminTaiKhoan.php';
require_once 'models/adminBienThe.php';
require_once 'models/adminDonHang.php';
require_once 'models/adminBinhLuan.php';
require_once 'models/adminLienHe.php';
require_once 'models/adminThongKe.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                 => (new DashboardController())->index(),


    // route quản lý danh mục
    'danh-muc'=>   (new adminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc'=>(new adminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc'=>(new adminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc'=>(new adminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc'=>(new adminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc'=>(new adminDanhMucController())->deleteDanhMuc(),


    // route quản lý sản phẩm
    'san-pham'=>(new adminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham'=>(new adminSanPhamController())->formAddSanPham(),
    'them-san-pham'=>(new adminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham'=>(new adminSanPhamController())->formEditSanPham(),
    'sua-san-pham'=>(new adminSanPhamController())->postEditSanPham(),
    'sua-album-anh-san-pham'=>(new adminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham'=>(new adminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham'=>(new adminSanPhamController())->detailSanPham(),


    // route quản lý tài khoản
    'tai-khoan'=>(new adminTaiKhoanController())->listTK(),
    // 'xoaaccount'=>(new adminTaiKhoanController())->deleteTKhoan($id),
    'edit'=>(new adminTaiKhoanController())->formEditTK(),
    'update'=>(new adminTaiKhoanController())->updateTK(),
    'detail'=>(new adminTaiKhoanController())->detail(),
    'formAddTK'=>(new adminTaiKhoanController())->formAdd(),
    'add'=>(new adminTaiKhoanController())->addTK(),
    'trangthai'=>(new adminTaiKhoanController())->toggleStatus(),
    'formphanquyen'=>(new adminTaiKhoanController())->formPQ(),
    'phanquyen'=>(new adminTaiKhoanController())->PhanQuyen(),



    // bien the
    'bien-the'=>(new adminBienTheController())->danhSachBienThe(),
    'form-them-size'=>(new adminBienTheController())->formAddSize(),
    'them-size'=>(new adminBienTheController())->postAddSize(),
    'xoa-size'=>(new adminBienTheController())->deleteSize(),

    
    // route quản lý đơn hàng
    'don-hang'=>(new adminDonHangController())->danhSachDonHang(),
    'form-sua-don-hang'=>(new adminDonHangController())->formEditDonHang(),
    'sua-don-hang'=>(new adminDonHangController())->postEditDonHang(),
    'xoa-don-hang'=>(new adminDonHangController())->xoaDonHang(),
    'detail-don-hang'=>(new adminDonHangController())->chiTietDonHang(),

    //bình luận
     // route quản lý đơn hàng
     'binh-luan'=>(new adminBinhLuanController())->danhSachBinhLuan(),
     'xoa-binh-luan'=>(new adminBinhLuanController())->xoaBinhLuan(),
     'detail-binh-luan'=>(new adminBinhLuanController())->chiTietBinhLuan(),



     // liên hệ
     'lien-he'=>(new adminLienHeController())->danhsachLienHe(),
     'xoa-lien-he'=>(new adminLienHeController())->deleteLienHe(),
};