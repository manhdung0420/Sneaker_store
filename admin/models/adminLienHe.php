<?php
 class AdminLienHe
 {
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllLienHe(){
        try {
            $sql = "SELECT * FROM lien_he";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "CÓ LỖI:".$e->getMessage();
        } 
    }

    public function getDetailLienHe($id)
    {
        try {
            $sql = "SELECT * FROM lien_he WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }
    public function destroyLienHe($id)
    {
        try {
            $sql = "DELETE FROM lien_he WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "CÓ LỖI: " . $e->getMessage();
        }
    }

 }
?>