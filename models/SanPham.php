<?php
class SanPham {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    // Lấy tất cả sản phẩm có phân trang
    public function getAllSanPham($start, $limit) {
        try {
            $sql = "SELECT * FROM san_phams LIMIT :start, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':start', $start, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }
    

    // Lấy sản phẩm theo danh mục có phân trang
    public function getSanPhamByDanhMuc($danhMucId, $start, $limit) {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.danh_muc_id = :danh_muc_id
                    LIMIT :start, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
            $stmt->bindValue(':start', $start, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }
    

    // Lấy tổng số sản phẩm
    public function getTotalSanPham($danhMucId = null) {
        try {
            if ($danhMucId) {
                $sql = "SELECT COUNT(*) FROM san_phams WHERE danh_muc_id = :danh_muc_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([":danh_muc_id" => $danhMucId]);
            } else {
                $sql = "SELECT COUNT(*) FROM san_phams";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
            }
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }
    

    // Lấy tổng số sản phẩm theo danh mục
    public function getTotalSanPhamByDanhMuc($danhMucId) {
        try {
            $sql = "SELECT COUNT(*) AS total FROM san_phams WHERE danh_muc_id = :danh_muc_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn();  // Trả về tổng số sản phẩm trong danh mục
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy tất cả danh mục
    public function getAllDanhMuc() {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
