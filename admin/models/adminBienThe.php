<?php
class adminBienThe{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSizeSP() {
        try {
            $sql = "SELECT size_sp.*, san_phams.ten_san_pham
                    FROM size_sp
                    INNER JOIN san_phams ON size_sp.san_pham_id = san_phams.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // Lấy tất cả dữ liệu
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function insertSize($size, $san_pham_id)
    {
        try {
            $sql = "INSERT INTO size_sp (size, san_pham_id) VALUES (:size, :san_pham_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':size' => $size,
                ':san_pham_id' => $san_pham_id,
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Lỗi SQL: " . $e->getMessage();
            return false;
        }
    }

    public function destroySize($id)
    {
        try {
            $sql = "DELETE FROM size_sp WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getDetailSize($id)
    {
        try {
            $sql = "SELECT * FROM size_sp WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
}