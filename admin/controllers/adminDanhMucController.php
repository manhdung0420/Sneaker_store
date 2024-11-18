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
    public function create() {
        include 'views/danhmuc/create.php';
    }

    public function store() {
        if (!empty($_POST['name'])) {
            $this->modleDanhMuc->addDanhMuc($_POST['name']);
        }
        header("Location: ?route=categories");
    }
    
}
?>