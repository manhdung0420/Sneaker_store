<?php
class adminSanPhamController
{
    public $modleSanPham;

    public function __construct()
    {
        $this->modleSanPham = new adminSanPham();

    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modleSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }
    
}
