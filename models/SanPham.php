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

    // Lấy sản phẩm theo danh mục
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

    // Lọc sản phẩm theo kích thước
    public function getSanPhamBySize($size, $start, $limit)
    {
        try {
            $sql = "SELECT san_phams.*, size_sp.size
                FROM san_phams
                JOIN size_sp ON san_phams.id = size_sp.san_pham_id
                WHERE size_sp.size = :size
                LIMIT :start, :limit";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':size', $size, PDO::PARAM_STR);
            $stmt->bindValue(':start', $start, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }

    // Lấy tổng số sản phẩm
    public function getTotalSanPham()
    {
        try {
            $sql = "SELECT COUNT(*) FROM san_phams";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }

    // Lấy tổng số sản phẩm theo danh mục
    public function getTotalSanPhamByDanhMuc($danhMucId)
    {
        try {
            $sql = "SELECT COUNT(*) FROM san_phams WHERE danh_muc_id = :danh_muc_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":danh_muc_id" => $danhMucId]);
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }

    // Lấy tổng số sản phẩm theo kích thước
    public function getTotalSanPhamBySize($size)
    {
        try {
            $sql = "SELECT COUNT(*) 
                FROM san_phams 
                JOIN size_sp ON san_phams.id = size_sp.san_pham_id
                WHERE size_sp.size = :size";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':size', $size, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (Exception $e) {
            echo "Có lỗi: " . $e->getMessage();
        }
    }







    // Lấy tổng số sản phẩm theo danh mục
    // public function getTotalSanPhamByDanhMuc($danhMucId)
    // {
    //     try {
    //         $sql = "SELECT COUNT(*) AS total FROM san_phams WHERE danh_muc_id = :danh_muc_id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
    //         $stmt->execute();
    //         return $stmt->fetchColumn();  // Trả về tổng số sản phẩm trong danh mục
    //     } catch (Exception $e) {
    //         echo "Lỗi: " . $e->getMessage();
    //     }
    // }

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



    public function getSizeById($size_id)
    {
        try {
            $sql = "SELECT * FROM size_sp WHERE id = :size_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':size_id' => $size_id]);
            return $stmt->fetch();  // Trả về thông tin size
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getTaiKhoanFromEMail($email) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }



    public function getSanPhamById($san_pham_id)
    {
        try {
            $sql = "SELECT * FROM san_phams WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id' => $san_pham_id]);
            return $stmt->fetch();  // Trả về thông tin sản phẩm
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function getAllSizeSP()
    {
        try {
            $sql = "SELECT * FROM size_sp";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    public function getSizeSP($san_pham_id) {
        try {
            $sql = "SELECT size_sp.*, san_phams.ten_san_pham
                    FROM size_sp
                    INNER JOIN san_phams ON size_sp.san_pham_id = san_phams.id
                    WHERE size_sp.san_pham_id = :san_pham_id
                    ORDER BY size_sp.size ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':san_pham_id' => $san_pham_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

}
