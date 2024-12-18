<?php
class adminDonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();  // Kết nối với cơ sở dữ liệu
    }

    // Lấy tất cả đơn hàng
    public function getAllDonHang()
    {
        try {
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }


    // Lấy chi tiết đơn hàng theo ID
    public function getDetailDonHang($id)
    {
        try {
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai,tai_khoans.ho_ten,tai_khoans.email,tai_khoans.so_dien_thoai,phuong_thuc_thanh_toans.ten_phuong_thuc
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
                    INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
                    INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
                    WHERE don_hangs.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function getListSpDonHang($id)
    {
        try {
            $sql = "SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham
            FROM chi_tiet_don_hangs
            INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_don_hangs.don_hang_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
    // Lấy tất cả các trạng thái từ bảng trang_thai_don_hangs
    public function getAllTrangThai()
    {
        $sql = "SELECT id, ten_trang_thai FROM trang_thai_don_hangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách trạng thái
    }


    // Kiểm tra xem ID trạng thái có hợp lệ không
    public function isValidTrangThai($trang_thai)
    {
        $sql = "SELECT COUNT(*) FROM trang_thai_don_hangs WHERE id = :trang_thai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':trang_thai' => $trang_thai]);
        return $stmt->fetchColumn() > 0; // Nếu số lượng > 0, tức là trạng thái hợp lệ
    }

    // Cập nhật trạng thái cho đơn hàng
    public function updateTrangThaiDonHang($id, $trang_thai)
    {
        try {
            // Câu lệnh SQL để cập nhật trạng thái đơn hàng
            $sql = "UPDATE don_hangs SET trang_thai_id = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai' => $trang_thai,
                ':id' => $id,
            ]);

            // Kiểm tra số lượng bản ghi bị thay đổi
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                // Nếu không có bản ghi nào bị thay đổi, có thể do trạng thái không thay đổi
                return false;
            }
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
            return false;
        }
    }



    // Xóa đơn hàng
    public function destroyDonHang($id)
    {
        try {
            $sql = "DELETE FROM don_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
}
