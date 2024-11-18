<?php
class adminDanhMuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDanhMuc() {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
    public function addDanhMuc($tenDanhMuc) {
        try {
            $sql = "INSERT INTO danh_mucs (ten_danh_muc) VALUES (:tenDanhMuc)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tenDanhMuc', $tenDanhMuc);
            $stmt->execute();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

    
}
?>