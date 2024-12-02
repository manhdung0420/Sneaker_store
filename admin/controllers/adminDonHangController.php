<?php
class adminDonHangController
{
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new adminDonHang(); // Model quản lý đơn hàng
    }

    // Hiển thị danh sách đơn hàng
    public function danhSachDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }

    // Xem chi tiết đơn hàng
    public function chiTietDonHang()
    {
        $id = $_GET["id"];
        $donHang = $this->modelDonHang->getDetailDonHang($id);

        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($id);
        

        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThai();
        $trangThaiOptions = $this->modelDonHang->getAllTrangThai();
        if ($donHang) {
            require_once './views/donhang/detailDonHang.php';
        } else {
            header("location: " . BASE_URL_ADMIN . "?act=don-hang");
            exit();
        }
    }


    // Chỉnh sửa trạng thái đơn hàng
    public function formEditDonHang()
{
    $id = $_GET["id_don_hang"];
    // Lấy chi tiết đơn hàng theo ID
    $donHang = $this->modelDonHang->getDetailDonHang($id);
    
    // Lấy tất cả trạng thái đơn hàng từ bảng trang_thai_don_hangs
    $trangThaiOptions = $this->modelDonHang->getAllTrangThai();

    if ($donHang) {
        require_once './views/donhang/detailDonHang.php';
    } else {
        header("location:" . BASE_URL_ADMIN . '?act=don-hang');
        exit();
    }
}


public function postEditDonHang()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id_don_hang"];
        $trang_thai = $_POST["trang_thai"];

        $errors = [];
        
        // Kiểm tra xem trạng thái có hợp lệ không
        if (empty($trang_thai) || !$this->modelDonHang->isValidTrangThai($trang_thai)) {
            $errors["trang_thai"] = "Trạng thái đơn hàng không hợp lệ.";
        }

        if (empty($errors)) {
            // Cập nhật trạng thái đơn hàng
            if ($this->modelDonHang->updateTrangThaiDonHang($id, $trang_thai)) {
                $_SESSION['success'] = "Cập nhật trạng thái đơn hàng thành công!";
                header("location:" . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                $_SESSION['error'] = "Cập nhật trạng thái đơn hàng không thành công!";
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $id);
                exit();
            }
        } else {
            $_SESSION["errors"] = $errors;
            header("location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $id);
            exit();
        }
    }
}




    // Xóa đơn hàng
    public function xoaDonHang()
    {
        $id = $_GET["id"];
        $this->modelDonHang->destroyDonHang($id);
        header("location: " . BASE_URL_ADMIN . "?act=don-hang");
        exit();
    }
}
