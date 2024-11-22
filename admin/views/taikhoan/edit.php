<!-- header -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <h1>Quản lý tài Khoản quản trị viên</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container mt-5">
        <h2 class="mb-4">Cập nhật thông tin</h2>
        <form action="<?= BASE_URL_ADMIN . '?act=update' ?>" method="POST">
            <div class="mb-3">
                <label for="ho_ten" class="form-label">Họ và Tên:</label>
                <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?= $obj['ho_ten'] ?>">
            </div>

            <div class="mb-3">
                <label for="usename" class="form-label">Username:</label>
                <input type="text" class="form-control" id="usename" name="usename" value="<?= $obj['usename'] ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $obj['email'] ?>">
            </div>

            <div class="mb-3">
                <label for="mat_khau" class="form-label">Mật khẩu:</label>
                <input type="password" class="form-control" id="mat_khau" name="mat_khau"
                    value="<?= $obj['mat_khau'] ?>">
            </div>

            <div class="mb-3">
                <label for="so_dien_thoai" class="form-label">Số điện thoại:</label>
                <input type="tel" class="form-control" id="so_dien_thoai" name="so_dien_thoai" pattern="[0-9]{10}"
                    value="<?= $obj['so_dien_thoai'] ?>">
            </div>

            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ:</label>
                <textarea class="form-control" id="dia_chi" name="dia_chi" rows="4"
                    value="<?= $obj['dia_chi'] ?>"></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $obj['id'] ?>">

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
<!-- End Footer -->
<!-- Page specific script -->
<script>
  $(function () {
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
<!-- Code injected by live-server -->
<script>
  $(function () {
    $('.toggle-status').bootstrapToggle();
  });
</script>

</body>

</html>