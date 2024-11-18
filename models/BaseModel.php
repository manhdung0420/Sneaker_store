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
    function getRowData($query)
    {
        try {
            $pdo = connectDB();
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return null;
        }
    }
}

?>