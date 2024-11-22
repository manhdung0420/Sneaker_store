<?php

class SanPhamController
{
    private $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function danhSachSanPham()
    {
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
    // public function chiTietSanPham(){
    //         require_once './views/trangChiTietSanPham.php';
    //     }   
    public function chiTietSanPham($id)
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        // Tạo đối tượng model để lấy dữ liệu sản phẩm
        $productModel = new SanPham();

        // Lấy chi tiết sản phẩm theo ID
        $sanpham = $productModel->getProductById($id);

        //Lấy hình ảnh thu nhỏ sản phẩm
        $imageSanPham = $productModel->getProductImages($id);


        if ($sanpham) {
            //Lấy các sản phẩm liên quan
            $sanPhamsByDanhMuc = $productModel->getSanPhamLienQuan($sanpham, 0, 8);

            // Truyền dữ liệu sản phẩm vào view
            include_once 'views/trangChiTietSanPham.php';
        } else {
            echo "Sản phẩm không tồn tại!";
        }
    }
}
