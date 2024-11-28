<?php
class GioHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getGioHangFromUser($tai_khoan_id)
    {
        try {
            $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi " . $e->getMessage();
            
        }
    }

    public function getDetailGiohang($gio_hang_id)
    {
        try {
            $sql = "SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.gia_khuyen_mai, size.size
                    FROM chi_tiet_gio_hangs chi_tiet_gio_hangs
                    INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                    INNER JOIN size_SP size ON chi_tiet_gio_hangs.size_id = size.id
                    WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function addGioHang($tai_khoan_id)
    {
        try {
            $sql = "INSERT INTO gio_hangs (tai_khoan_id) VALUES (:tai_khoan_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong, $size_id)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hangs
                    SET so_luong = :so_luong
                    WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id AND size_id = :size_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,
                ':size_id' => $size_id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong, $size_id)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong, size_id)
                    VALUES (:gio_hang_id, :san_pham_id, :so_luong, :size_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,
                ':size_id' => $size_id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function clearDetailGioHang($gioHangId,)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gioHangId]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function clearGioHang($taiKhoanID)
    {
        try {
            $sql = "DELETE FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $taiKhoanID]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getDetailChiTietGioHang($id) {
        try {
            $sql = "SELECT * FROM chi_tiet_gio_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function destroyGioHang($id) {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id'=>$id
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }
}
