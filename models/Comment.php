<?php
class Comment {
    private $conn;

    public function __construct() {
        $this->conn = connectDB(); // Kết nối đến cơ sở dữ liệu
    }

    // Lấy bình luận của sản phẩm theo ID sản phẩm
    public function getCommentsByProductId($san_pham_id) {
        $sql = "SELECT binh_luans.*, tai_khoans.ho_ten FROM binh_luans
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                WHERE binh_luans.san_pham_id = :san_pham_id
                ORDER BY binh_luans.ngay_dang DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':san_pham_id', $san_pham_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm bình luận mới
    public function addComment($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang) {
        $sql = "INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang)
                VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, :ngay_dang)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':san_pham_id', $san_pham_id);
        $stmt->bindParam(':tai_khoan_id', $tai_khoan_id);
        $stmt->bindParam(':noi_dung', $noi_dung);
        $stmt->bindParam(':ngay_dang', $ngay_dang);

        return $stmt->execute();
    }
}
?>
