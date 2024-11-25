<!-- header -->
<?php require './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý chi tiết đơn hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content container">
    <h2 class="mb-4">Chi tiết đơn hàng</h2>
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="card-body ">
          <h4 class="mb-3"><strong style="font-size: 20px;">Mã đơn hàng: </strong><small><?= $donHang['ma_don_hang']; ?></small></h4>
          <h4 class="mb-3"><strong style="font-size: 20px;">Tài khoản: </strong> <small><?= $donHang['tai_khoan_id']; ?></small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Tên khách hàng: </strong> <small><?= $donHang['ten_nguoi_nhan']; ?></small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Số điện thoại: </strong> <small><?= $donHang['sdt_nguoi_nhan']; ?></small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Địa chỉ giao hàng: </strong> <small><?= $donHang['dia_chi_nguoi_nhan']; ?></small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Ngày đặt: </strong> <small><?= $donHang['ngay_dat']; ?></small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Tổng tiền: </strong> <small><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VND </small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Ghi chú: </strong> <small><?= $donHang['ghi_chu']; ?></small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Phương thức thanh toán: </strong> <small><?= $donHang['phuong_thuc_thanh_toan_id']; ?></small></h4>
            <h4 class="mb-3"><strong style="font-size: 20px;">Trạng thái: </strong> <small><?= $donHang['ten_trang_thai']; ?></small></h4>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>

</html>
