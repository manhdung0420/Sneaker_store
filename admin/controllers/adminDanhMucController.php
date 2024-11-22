<?php 
class adminDanhMucController
{
    public $modleDanhMuc;
    public function __construct()
    {
        $this->modleDanhMuc = new adminDanhMuc();
    }
    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modleDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc()
    {
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function postAddDanhMuc()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ten_danh_muc = $_POST["ten_danh_muc"];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors["ten_danh_muc"] = "Tên danh mục là bắt buộc.";
            }

            if (empty($errors)) {
                $this->modleDanhMuc->insertDanhMuc($ten_danh_muc);
                unset($_SESSION['errors']);
                header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
            } else {
                $_SESSION["errors"] = $errors;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-danh-muc');
                exit();
            }
        }
    }
    public function formEditDanhMuc()
    {
        $id = $_GET["id_danh_muc"];
        $danhMuc = $this->modleDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function postEditDanhMuc()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id_danh_muc"];
            $ten_danh_muc = $_POST["ten_danh_muc"];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors["ten_danh_muc"] = "Tên danh mục là bắt buộc.";
            }
            

            if (empty($errors)) {
                $this->modleDanhMuc->updateDanhMuc($id, $ten_danh_muc);
                unset($_SESSION['errors']);
                header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
            } else {
                $_SESSION["errors"] = $errors;
                header("location:" . BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $id);
                exit();
            }
            
        }
    }
    public function deleteDanhMuc()
    {
        $id = $_GET["id_danh_muc"];
        $danhMuc = $this->modleDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            $this->modleDanhMuc->destroyDanhMuc($id);
        }

        header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }

    public function detailDanhMuc()
    {
        $id = $_GET["id_danh_muc"];
        $danhMuc = $this->modleDanhMuc->getDetailDanhMuc($id);

        if ($danhMuc) {
            require_once './views/danhmuc/detailDanhMuc.php';
        } else {
            header("location:" . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    
}
?>