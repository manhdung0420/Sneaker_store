<?php

class SanPhamController {
    private $modelSanPham;

    public function __construct() {
        $this->modelSanPham = new SanPham();
    }

    public function danhSachSanPham() {
        $danhMucId = $_GET['danh_muc_id'] ?? null;
        // Lấy trang hiện tại từ GET hoặc mặc định là 1
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Lấy trang hiện tại từ URL
        $perPage = 9;  // Số sản phẩm mỗi trang
        $start = ($currentPage - 1) * $perPage;  // Tính bắt đầu từ sản phẩm nào
    
        if ($danhMucId) {
            // Nếu có danh mục, lấy sản phẩm theo danh mục
            $listSanPham = $this->modelSanPham->getSanPhamByDanhMuc($danhMucId, $start, $perPage);
        } else {
            // Nếu không có danh mục, lấy tất cả sản phẩm
            $listSanPham = $this->modelSanPham->getAllSanPham($start, $perPage);
        }

        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
    
        // Lấy tổng số sản phẩm để tính tổng trang
        $totalSanPham = $this->modelSanPham->getTotalSanPham($danhMucId);
        $totalPages = ceil($totalSanPham / $perPage);  // Tính tổng số trang
    
        require_once './views/shopSanPham.php';
    }
}
