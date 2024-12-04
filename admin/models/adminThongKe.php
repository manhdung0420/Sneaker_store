<?php
include_once "models/BaseModel.php";

class adminThongKe extends BaseModel
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function SpBanChay()
    {
        $sql = "SELECT ct.san_pham_id, SUM(ct.so_luong) AS total_quantity,sp.ten_san_pham FROM chi_tiet_don_hangs ct
    INNER JOIN don_hangs dh ON ct.don_hang_id = dh.id
    INNER JOIN san_phams sp ON ct.san_pham_id = sp.id
    WHERE MONTH(dh.ngay_dat) = MONTH(CURRENT_DATE())
      AND YEAR(dh.ngay_dat) = YEAR(CURRENT_DATE())
    GROUP BY ct.san_pham_id
    ORDER BY total_quantity DESC
    LIMIT 3";
     return $this->getRowData($sql);
    }
    public function TongHoaDon(){
        $sql = "SELECT COUNT(*) as total_order FROM don_hangs WHERE MONTH(ngay_dat) = MONTH(CURRENT_DATE()) AND YEAR(ngay_dat) = YEAR(CURRENT_DATE())";
        return $this->getRowData($sql);
    }
    public function TongDoanhThu(){
        $sql = "SELECT SUM(dh.tong_tien) as total_revenue FROM don_hangs dh WHERE MONTH(dh.ngay_dat) = MONTH(CURRENT_DATE()) AND YEAR(dh.ngay_dat) = YEAR(CURRENT_DATE()) AND trang_thai_id = 4";
        return $this->getRowData($sql);
    }
}

?>