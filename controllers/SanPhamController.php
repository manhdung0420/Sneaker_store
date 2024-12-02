<?php

class SanPhamController
{
    private $modelSanPham;
    private $commentModel;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->commentModel = new Comment();
    }

    public function danhSachSanPham()
    {
        // Lấy thông tin từ request
        
        $danhMucId = isset($_GET['danh_muc_id']) ? (int)$_GET['danh_muc_id'] : null;
        $size = isset($_GET['size']) && $_GET['size'] !== '' ? $_GET['size'] : null; // Chỉ lấy size khi không rỗng
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 9;
        $start = ($currentPage - 1) * $limit;

        // Lọc sản phẩm theo danh mục hoặc kích thước
        if (!empty($danhMucId)) {
            $listSanPham = $this->modelSanPham->getSanPhamByDanhMuc($danhMucId, $start, $limit);
            $totalSanPham = $this->modelSanPham->getTotalSanPhamByDanhMuc($danhMucId);
        } elseif (!empty($size)) {
            $listSanPham = $this->modelSanPham->getSanPhamBySize($size, $start, $limit);
            
            $totalSanPham = $this->modelSanPham->getTotalSanPhamBySize($size);
        } else {
            $listSanPham = $this->modelSanPham->getAllSanPham($start, $limit);
            $totalSanPham = $this->modelSanPham->getTotalSanPham();
        }

        // Tính tổng số trang
        $totalPages = ceil($totalSanPham / $limit);

        // Lấy thêm danh mục và kích thước để hiển thị bộ lọc
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listSizeSP = $this->modelSanPham->getAllSizeSP();

        // Xóa tham số size khỏi URL nếu không lọc theo size
        if (empty($size) && isset($_GET['size'])) {
            unset($_GET['size']);
        }
        
        // Gửi dữ liệu sang view
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
        $listSizeSP = $this->modelSanPham->getSizeSP($id);

        //Lấy hình ảnh thu nhỏ sản phẩm
        $imageSanPham = $productModel->getProductImages($id);

        //Lấy comment của sản phẩm 
        $comments = $this->commentModel->getCommentsByProductId($id);

        if ($sanpham) {
            //Lấy các sản phẩm liên quan
            $sanPhamsByDanhMuc = $productModel->getSanPhamLienQuan($sanpham, 0, 8);

            // Truyền dữ liệu sản phẩm vào view
            require_once 'views/trangChiTietSanPham.php';
        } else {
            echo "Sản phẩm không tồn tại!";
        }
    }
}
