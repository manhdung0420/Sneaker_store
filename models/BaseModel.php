<?php
require_once "common/env.php";
class BaseModel
{
    // Hàm lấy nhiều dòng dữ liệu
    function getAllData($query)
    {
        // $pdo = getConnect();         
        try {
            $pdo = connectDB();
            if ($pdo !== null) {
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll();
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return null;
        }
    }

    // Hàm lấy một dòng dữ liệu
    function getRowData($query, $params = [])
    {
        try {
            $pdo = connectDB();          // Kết nối tới cơ sở dữ liệu
            $stmt = $pdo->prepare($query); // Chuẩn bị câu truy vấn
            $stmt->execute($params);       // Thực thi với các tham số
            return $stmt->fetch();         // Trả về kết quả (một dòng dữ liệu)
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return null;
        }
    }

}

?>