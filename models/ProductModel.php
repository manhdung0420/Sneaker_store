<?php
include_once "admin/models/BaseModel.php";
class ProductModel extends BaseModel
{
    public function getAllProduct()
    {
        $sql = "SELECT * FROM `san_phams` ORDER BY `ngay_nhap` DESC LIMIT 8";
        return $this->getAllData($sql);
    }
    public function searchProducts($keyword)
    {
        // Câu lệnh SQL với điều kiện tìm kiếm
        $sql = "SELECT * FROM `san_phams` WHERE ten_san_pham LIKE'%".$keyword."%'";

        // Gọi hàm getAllData với tham số chuẩn bị
        return $this->getAllData($sql);
    }


}