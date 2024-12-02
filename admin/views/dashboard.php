<!-- header -->
<?php require_once './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php require_once './views/layouts/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php require_once './views/layouts/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
    <!-- Info boxes -->
    <div class="row justify-content-center">
      <div class="col-12 col-sm-6 col-md-3 mb-4">
        <div class="info-box">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Sản phẩm bán chạy</span>
            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $SpBanChay['san_pham_id'] ?>"><span class="info-box-number"><?=$SpBanChay['ten_san_pham'] ?></span></a>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3 mb-4">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Tổng đơn hàng </span>
            <span class="info-box-number">760</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3 mb-4">
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dollar-sign"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Doanh thu</span>
            <span class="info-box-number">2,000</span>
          </div>
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
<!-- End Footer -->
<!-- Page specific script -->

<!-- Code injected by live-server -->



</html>