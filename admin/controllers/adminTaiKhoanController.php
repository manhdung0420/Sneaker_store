<?php
class adminTaiKhoanController{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new adminTaiKhoan();
    }

    // public function danhSachQuanTri(){
    //     $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
    //     require_once './views/taikhoan/quantri/listQuanTri.php';
    // }
    public function listTK(){
        $listTK = $this->modelTaiKhoan->getAllTaiKhoan();
        require_once './views/taikhoan/listQuanTri.php';
    }
    public function formEditTK(){
        // $id = $_GET["id"];
        $getChucVu = $this->modelTaiKhoan->getChucVu();
        $obj = $this->modelTaiKhoan->getById($_GET['id']);
    //    var_dump($obj);
        require_once './views/taikhoan/edit.php';
    }
    public function updateTK(){
        $this->modelTaiKhoan->update(
            $_POST['id'],
            $_POST['ho_ten'],
            $_POST['usename'],
            $_POST['email'],
            $_POST['mat_khau'],
            $_POST['so_dien_thoai'],
            $_POST['dia_chi'],
        );
        
        header( 'Location:http://localhost/Sneaker_store/admin/?act=tai-khoan');
    }
    public function detail(){
        $obj = $this->modelTaiKhoan->getById($_GET['id']);
        $lstCV = $this->modelTaiKhoan->getChucVu();
        require_once './views/taikhoan/detail.php';
    }
    public function formAdd(){
        $getChucVu = $this->modelTaiKhoan->getChucVu();
        require_once './views/taikhoan/add.php';
    }
    public function addTK(): void{
        $this->modelTaiKhoan->addTK(
            $_POST['ho_ten'],
            $_POST['usename'],
            $_POST['email'],
            $_POST['mat_khau'],
            $_POST['so_dien_thoai'],
            $_POST['dia_chi'],
            $_POST['chuc_vu_id']
        );
        header('Location: http://localhost/Sneaker_store/admin/?act=tai-khoan');
    }
    public function toggleStatus()
    {
        // Kiểm tra phương thức request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $id = isset($_POST['id']) ? intval($_POST['id']) : null;
            $currentStatus = isset($_POST['current_status']) ? intval($_POST['current_status']) : null;

            if ($id === null || $currentStatus === null) {
                // Trường hợp dữ liệu không hợp lệ
                $_SESSION['error'] = 'Dữ liệu không hợp lệ!';
                header('Location: http://localhost/Sneaker_store/admin/?act=tai-khoan'); // Redirect về trang danh sách
                exit();
            }

            // Gọi model để đổi trạng thái
            $result = $this->modelTaiKhoan->toggleStatus($id, $currentStatus);

            // Kiểm tra kết quả
            if ($result) {
                $_SESSION['success'] = "Trạng thái tài khoản ID $id đã được cập nhật.";
            } else {
                $_SESSION['error'] = "Cập nhật trạng thái thất bại.";
            }

            // Redirect về trang danh sách
            header('Location: http://localhost/Sneaker_store/admin/?act=tai-khoan');
            exit();
        } else {
            // Trường hợp không phải phương thức POST
            http_response_code(405); // Method Not Allowed
            echo "Yêu cầu không hợp lệ.";
        }
    }
    public function formPQ(){
        $getChucVu = $this->modelTaiKhoan->getChucVu();
        $getTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
        $obj = $this->modelTaiKhoan->getById($_GET['id']); 
        require_once './views/taikhoan/phanquyen.php';
    }
    public function PhanQuyen(){
        $this->modelTaiKhoan->phanQuyen(
            $_POST['id'],
            $_POST['chuc_vu_id']
        );
        header( 'Location:http://localhost/Sneaker_store/admin/?act=tai-khoan');
    }
}
?>