<?php


// Include your layout files here
require_once './views/layouts/header.php';
require_once './views/layouts/navbar.php';
require_once './views/layouts/sidebar.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-12 text-center">
            <h2 class="text-uppercase font-weight-bold">BẢNG THỐNG KÊ THÁNG 12</h2>
            <p class="text-muted">Tổng quan hoạt động trong tháng</p>
          </div>
        </div>
<?php 
// Giới hạn tên sản phẩm nếu quá dài (ví dụ 30 ký tự)
$maxLength = 25; // Số ký tự tối đa
$productName = $SpBanChay['ten_san_pham']; // Tên sản phẩm

if (strlen($productName) > $maxLength) {
    $productName = substr($productName, 0, $maxLength) . '...';
}

?>

        <!-- Info boxes -->
        <div class="row d-flex justify-content-between">
          <!-- Sản phẩm bán chạy -->
          <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Sản phẩm bán chạy</span>
                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $SpBanChay['san_pham_id'] ?>">
                  <span class="info-box-number"><?= $productName ?></span>
                </a>
              </div>
            </div>
          </div>

          <!-- Tổng đơn hàng -->
          <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Tổng đơn hàng</span>
                <a href="<?= BASE_URL_ADMIN . '?act=don-hang'  ?>"><span class="info-box-number"><?= $DonHangThang['total_order'] ?></span></a>
              </div>
            </div>
          </div>

          <!-- Doanh thu -->
          <div class="col-12 col-sm-6 col-md-4 mb-4">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dollar-sign"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Doanh thu</span>
                <span class="info-box-number"><?= $DinhDangTien ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php require_once './views/layouts/footer.php'; ?>

<!-- Custom CSS -->
<style>
/* Cấu trúc chung cho các ô */
.info-box {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-radius: 10px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
}

/* Đặt màu nền của các icon */
.info-box .info-box-icon {
  border-radius: 10px 0 0 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60px;
  height: 60px;
}

/* Nội dung trong các ô */
.info-box .info-box-content {
  padding: 15px;
}

/* Phần chữ mô tả */
.info-box .info-box-text {
  font-size: 1rem;
  font-weight: bold;
  color: #444;
}

/* Số liệu trong ô */
.info-box .info-box-number {
  font-size: 1.5rem;
  font-weight: bold;
  color: #000;
}

/* Thêm hiệu ứng hover cho các ô */
.info-box:hover {
  transform: translateY(-5px); /* Di chuyển nhẹ lên */
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); /* Tăng cường hiệu ứng bóng đổ */
  background-color: #f7f7f7; /* Đổi màu nền nhẹ */
  cursor: pointer; /* Thêm con trỏ tay */
}

/* Hiệu ứng cho các icon */
.info-box-icon:hover {
  background-color: #e0e0e0; /* Chỉnh màu nền của icon khi hover */
}

/* Cấu trúc cho các ô trong một hàng */
.row {
  margin-left: 0;
  margin-right: 0;
}

@media (max-width: 767px) {
  .info-box {
    margin-bottom: 15px; /* Thêm khoảng cách dưới cho các ô khi màn hình nhỏ */
  }
}
</style>
<!-- End Footer -->

<!-- Page specific script -->
<!-- Include any necessary scripts below -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</html>
