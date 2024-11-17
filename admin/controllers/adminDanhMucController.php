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
    
}
?>