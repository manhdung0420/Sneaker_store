<?php
class LienHeModel
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function themLienHe($name, $email, $mo_ta)
    {
        try {
            $sql = "INSERT INTO lien_he (name, email, mo_ta)
                    VALUES (:name, :email, :mo_ta)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':mo_ta' => $mo_ta,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
            return false;
        }
    }
}
