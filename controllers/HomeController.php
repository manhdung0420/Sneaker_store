<?php 

class HomeController
{
    public $modelSanPham;

     
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function index() {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/home.php';
    }

    // public function chiTietSanPham(){
    //     require_once './views/trangChiTietSanPham.php';
    // }

    
}
    