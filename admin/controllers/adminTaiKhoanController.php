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
        $lstGV = $this->modelTaiKhoan->getChucVu();
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
}
?>