<?php
class SanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả sản phẩm có phân trang
    public function getAllSanPham($start, $limit)
    {
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
    public function getSanPhamByDanhMuc($danhMucId, $start, $limit)
    {
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
    public function getTotalSanPham($danhMucId = null)
    {
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
    public function getTotalSanPhamByDanhMuc($danhMucId)
    {
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
    public function getAllDanhMuc()
    {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM san_phams WHERE id = :id AND trang_thai = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về một mảng với thông tin sản phẩm
    }

    //Lấy hình ảnh thu nhỏ sản phẩm
    public function getProductImages($id)
    {
        $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy bình luận của sản phẩm
    public function getCommentProduct($id)
    {
        $sql = "SELECT a.noi_dung, a.ngay_dang, b.ho_ten FROM binh_luans a join tai_khoán b on a.tai_khoan_id = b.id WHERE san_pham_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    // Lấy sản phẩm có liên quan có phân trang
    public function getSanPhamLienQuan($product, $start, $limit)
    {
        try {
            $sql = "SELECT san_phams.id, san_phams.ten_san_pham, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, san_phams.hinh_anh, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.danh_muc_id = :danh_muc_id AND san_phams.id <> :id
                    LIMIT :start, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':danh_muc_id', $product['danh_muc_id'], PDO::PARAM_INT);
            $stmt->bindValue(':id', $product['id'], PDO::PARAM_INT);
            $stmt->bindValue(':start', $start, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }
}
