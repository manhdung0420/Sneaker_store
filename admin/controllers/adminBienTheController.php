<?php
class adminBienTheController{
    public $modelBienThe;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelBienThe = new adminBienThe();
        $this->modelSanPham = new adminSanPham();
    }
    public function danhSachBienThe(){
        $listSizeSP = $this->modelBienThe->getAllSizeSP();
        
        require_once './views/bienthesp/listBienThe.php';
    }

   

    
    public function formAddSize()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/bienthesp/addSizeSP.php';
    }

    public function postAddSize()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $size = $_POST["size"];
            $san_pham_id = $_POST["san_pham_id"];

            $errors = [];
            if (empty($size)) {
                $errors["size"] = "Tên danh mục là bắt buộc.";
            }

            if (empty($errors)) {
                $this->modelBienThe->insertSize($size, $san_pham_id);
                unset($_SESSION['errors']);
                header("location:" . BASE_URL_ADMIN . '?act=bien-the');
            } else {
                $_SESSION["errors"] = $errors;
                header("location:" . BASE_URL_ADMIN . '?act=form-them-size');
                exit();
            }
        }
    }

    public function deleteSize()
    {
        $id = $_GET["id"];
        $size = $this->modelBienThe->getDetailSize($id);
        // var_dump($id);die;

        if ($size) {
            $this->modelBienThe->destroySize($id);
        }

        header("location:" . BASE_URL_ADMIN . '?act=bien-the');
        exit();
    }
}