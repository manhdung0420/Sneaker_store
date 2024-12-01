<?php
class LienHeController
{
    public $model;

    public function __construct()
    {
        $this->model = new LienHeModel();
    }

    public function formAddLienHe()
    {
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
