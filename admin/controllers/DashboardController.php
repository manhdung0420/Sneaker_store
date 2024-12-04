<?php


class DashboardController {
    public $modelTK;
    public function __construct(){
        $this->modelTK = new adminThongKe();
    }
    public function index() {
        // Lấy dữ liệu sản phẩm bán chạy
        $SpBanChay = $this->modelTK->SpBanChay();
    
        if ($SpBanChay) {
            // Giới hạn tên sản phẩm nếu quá dài
            $maxLength = 25; // Số ký tự tối đa
            $productName = $SpBanChay['ten_san_pham'];
            if (strlen($productName) > $maxLength) {
                $productName = substr($productName, 0, $maxLength) . '...';
            }
        } else {
            // Nếu không có sản phẩm bán chạy
            $productName = "Không có dữ liệu sản phẩm bán chạy";
        }
    
        // Lấy dữ liệu tổng đơn hàng trong tháng
        $DonHangThang = $this->modelTK->TongHoaDon();
        // Lấy dữ liệu doanh thu trong tháng
        $DoanhThuThang = $this->modelTK->TongDoanhThu();
        $DinhDangTien = number_format($DoanhThuThang['total_revenue'], 0, ',', '.') . " VND";
    
        // Load view dashboard
        require_once "./views/dashboard.php";
    }
    

}