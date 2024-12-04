<?php


class DashboardController {
    public $modelTK;
    public function __construct(){
        $this->modelTK = new adminThongKe();
    }
    public function index() {
        // Lấy dữ liệu từ sản phẩm bán chạy nhất
        $SpBanChay = $this->modelTK->SpBanChay();
        // Lấy dữ liệu tổng đơn hàng trong tháng
        $DonHangThang = $this->modelTK->TongHoaDon();
        // Lấy dữ liệu doanh thu trong tháng
        $DoanhThuThang = $this->modelTK->TongDoanhThu();
        $DinhDangTien = number_format($DoanhThuThang['total_revenue'], 0, ',', '.') . " VND";

        // Load view dashboard

        require_once "./views/dashboard.php";
    }

}