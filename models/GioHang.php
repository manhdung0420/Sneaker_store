<?php
class GioHang
{
    public $conn; //Khai báo phương thức
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getGioHangFromUser($id)
    {
        try {
            $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':tai_khoan_id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function getDetailGiohang($id){
        try {
            $sql = "SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.gia_khuyen_mai , size_sp.size
                    FROM chi_tiet_gio_hangs
                    INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                    INNER JOIN size_sp ON chi_tiet_gio_hangs.size_id = size_sp.id
                    WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $id]); // Correct parameter key
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    public function addGioHang($id){
        try {
            $sql = "INSERT INTO gio_hangs (tai_khoan_id) VALUES (:id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong,$size_id)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hangs
                    SET so_luong = :so_luong
                    WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id AND size_id = :size_id  
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id, ':so_luong' => $so_luong, ':size_id' => $size_id]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
        }
    }

    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong ,$size_id)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong, size_id)
                    VALUES (:gio_hang_id, :san_pham_id, :so_luong, :size_id)   
                ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id, ':so_luong' => $so_luong, ':size_id' => $size_id]);
            return true;
        } catch (Exception $e) {
            echo "Loi" . $e->getMessage();
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

    
}