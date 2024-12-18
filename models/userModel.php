<?php
include_once "admin/models/BaseModel.php";

class UserModel extends BaseModel
{
    // Hàm kiểm tra thông tin đăng nhập
    public function login($email, $mat_khau)
    {
        // Câu lệnh SQL để kiểm tra thông tin đăng nhập
        $sql = "SELECT * FROM tai_khoans WHERE email = '$email' AND mat_khau = '$mat_khau'";

        // Trả về thông tin người dùng nếu tìm thấy
        return $this->getRowData($sql);
    }

    // Hàm lấy thông tin người dùng theo ID
    public function getUserById($userId)
    {
        $userId = intval($userId); // Chuyển đổi sang số nguyên
        $sql = "SELECT * FROM tai_khoans WHERE id = $userId";

        return $this->getRowData($sql);
    }

    // Hàm kiểm tra email tồn tại (dùng cho chức năng đăng ký hoặc quên mật khẩu)
    public function checkEmailExists($email)
    {
        // Hàm kiểm tra email tồn tại

        $sql = "SELECT COUNT(*) as count FROM tai_khoans WHERE email = '$email'";
        $data = $this->getRowData($sql, ['email' => $email]);

        // Kiểm tra nếu kết quả có dữ liệu và giá trị `count` > 0
        return $data && $data['count'] > 0;

    }

    // Hàm đăng ký người dùng
    public function registerUser($ho_ten, $usename, $email, $mat_khau, $so_dien_thoai)
    {
        $sql = "INSERT INTO `tai_khoans` ( `ho_ten`, `usename`, `email`, `mat_khau`, `so_dien_thoai` )
        VALUES ( '$ho_ten', '$usename', '$email', '$mat_khau', '$so_dien_thoai');";
        $params = [
            'ho_ten' => $ho_ten,
            'usename' => $usename,
            'email' => $email,
            'mat_khau' => $mat_khau,
            'so_dien_thoai' => $so_dien_thoai
        ];

        // Thực hiện truy vấn
        $result = $this->getRowData($sql, $params);

        // Nếu thực thi thành công, trả về true
        return $result !== null;
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

    public function resetPassword($id, $mat_khau) {
        try {
            // var_dump($trang_thai_id);die;
            $sql = 'UPDATE `tai_khoans` 
                    SET 
                        mat_khau = :mat_khau
                    WHERE id = :id';
            // var_dump($sql);die;
            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id

            ]);
    
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI:" . $e->getMessage();
        }
    }
}
?>