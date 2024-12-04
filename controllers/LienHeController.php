<?php
class LienHeController
{
    public $model;
    public $modelSanPham;
    public $modelTaikhoan;
    public $modelGioHang;

    public function __construct()
    {
        $this->model = new LienHeModel();
        $this->modelSanPham = new SanPham();
        $this->modelTaikhoan = new UserModel();
        $this->modelGioHang = new GioHang();
    }

    public function formAddLienHe()
    {
        $userModel = new UserModel();
        if (isset($_SESSION["user_email"])) {
            $user = $userModel->getTaiKhoanFromEMail($_SESSION["user_email"]);
            $gioHang = $this->modelGioHang->getGioHangFromUser($user["id"]);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user["id"]);
                $gioHang = ['id' => $gioHangId];
            }

            // Đếm số lượng sản phẩm trong giỏ hàng
            $tongSanPham = $this->modelGioHang->countSanPhamTrongGioHang($gioHang["id"]);
        }
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once 'views/contact.php';
    }
    public function addLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
    
            // Validate dữ liệu
            if (empty($name) || empty($email) || empty($mo_ta)) {
                $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin!";
            } else {
                // Gọi model để lưu thông tin
                $lienhe = $this->model->themLienHe($name, $email, $mo_ta);
    
                if ($lienhe) {
                    $_SESSION['message'] = "Gửi liên hệ thành công!";
                } else {
                    $_SESSION['message'] = "Có lỗi khi gửi liên hệ!";
                }
            }
    
            // Chuyển hướng lại form hoặc trang liên hệ
            header('Location: ' . BASE_URL . '?act=form-add-contact');
            exit;
        }
    }
}
