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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=formAddTK' ?>">
                <button class="btn btn-success">Thêm Tài Khoản</button>
              </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>User</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listTK as $quantri): ?>
                    <tr>
                      <td><?= $quantri['id'] ?></td>
                      <td><?= $quantri['ho_ten'] ?></td>
                      <td><?= $quantri['email'] ?></td>
                      <td><?= $quantri['usename'] ?></td>
                      <td><?= $quantri['so_dien_thoai'] ?></td>
                      <td><?= $quantri['ten_chuc_vu'] ?></td>
                      <td><?= $quantri['dia_chi'] ?></td>
                      <td><?= $quantri['trang_thai'] == 1 ? 'Active' : 'Inactive' ?>

                        <form action="<?= BASE_URL_ADMIN . '?act=trangthai' ?>" method="POST">
                          <input type="hidden" name="id" value="<?= $quantri['id'] ?>">
                          <input type="hidden" name="current_status" value="<?= $quantri['trang_thai'] ?>">
                          <input type="checkbox" class="toggle-status" <?= $quantri['trang_thai'] ? 'checked' : '' ?>
                            data-toggle="toggle" data-on="Hoạt động" data-off="Chưa kích hoạt" data-onstyle="success"
                            data-offstyle="danger" onchange="this.form.submit()">
                        </form>

                      </td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=edit&id=' . $quantri['id'] ?>">
                          <button class="btn btn-warning">Sửa</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=xoaaccount&id=' . $quantri['id'] ?>"
                          onclick="return confirm('bạn có muốn Xóa tài khoản này hay không')">
                          <button class="btn btn-danger">Xóa</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=detail&id=' . $quantri['id'] ?>">
                          <button class="btn btn-danger">Chi tiết</button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>User</th>
                    <th>Số điện thoại</th>
                    <th>Chức vụ</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

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