<?php
include_once "models/BaseModel.php";
class adminTaiKhoan extends BaseModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();

    }
    // public function getAllTaiKhoan($chuc_vu_id) {
    //     try {
    //         $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute([':chuc_vu_id'=>$chuc_vu_id]);
    //         return $stmt->fetchAll();
    //     } catch (Exception $e) {
    //         echo "CÓ LỖI:".$e->getMessage();
    //     } 
    // }
    public function getAllTaiKhoan()
    {
        $sql = "SELECT * FROM tai_khoans inner join chuc_vus on `tai_khoans`.chuc_vu_id = `chuc_vus`.chuc_vu_id";
        return $this->getAllData($sql);
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM `tai_khoans` WHERE `id` = $id";
        return $this->getRowData($sql);
    }
    public function update($id, $ho_ten, $usename, $email, $mat_khau, $so_dien_thoai, $dia_chi)
    {
        $sql = "UPDATE `tai_khoans` SET `ho_ten` = '$ho_ten', `usename` = '$usename', `email` = '$email', 
        `mat_khau` = '$mat_khau', `so_dien_thoai` = '$so_dien_thoai', `dia_chi` = '$dia_chi' WHERE `tai_khoans`.`id` = $id;";
        return $this->getRowData($sql);
    }
    // public function addAcount($tenKhoa,$diaChi,$email,$sdt,$idGV){
    //     $sql = "INSERT INTO `khoa` ( `tenKhoa`, `diaChi`, `email`, `sdt`, `idGV`) VALUES ('$tenKhoa', '$diaChi', '$email', '$sdt', '$idGV')";
    //     return $this->getRowData($sql);
    // }
    public function getChucVu()
    {
        $sql = "SELECT * FROM chuc_vus";
        return $this->getAllData($sql);
    }
    public function addTK($ho_ten, $usename, $email, $mat_khau, $so_dien_thoai, $dia_chi, $chuc_vu_id)
    {
        $sql = "INSERT INTO `tai_khoans` ( `ho_ten`, `usename`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `chuc_vu_id`)
         VALUES ( '$ho_ten', '$usename', '$email', '$mat_khau', '$so_dien_thoai', '$dia_chi', '$chuc_vu_id');";
        return $this->getRowData($sql);
    }
}