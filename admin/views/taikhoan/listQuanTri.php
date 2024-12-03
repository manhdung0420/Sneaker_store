<?php require './views/layouts/auth.php'; ?>
<!-- header -->
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Toggle CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom, #ececec, #ffffff);
    }
    .content-wrapper {
      padding: 20px;
      background: #f9f9f9;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .table th {
      background-color: #343a40;
      color: #fff;
    }
    .btn-group button {
      margin-right: 5px;
    }
    .card-header {
      background-color: #6c757d;
      color: #fff;
    }
    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }
    .btn-primary:hover {
      background-color: #084298;
    }
  </style>
<?php require './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<<div class="content-wrapper">
  <section class="content-header mb-4">
    <h1 class="text-primary text-center">Quản lý tài khoản quản trị viên</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <a href="<?= BASE_URL_ADMIN . '?act=formAddTK' ?>">
            <button class="btn btn-success"><i class="fas fa-user-plus"></i> Thêm Tài Khoản</button>
          </a>
        </div>
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
                <td>
                  <form action="<?= BASE_URL_ADMIN . '?act=trangthai' ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $quantri['id'] ?>">
                    <input type="hidden" name="current_status" value="<?= $quantri['trang_thai'] ?>">
                    <input type="checkbox" class="toggle-status" <?= $quantri['trang_thai'] ? 'checked' : '' ?>
                      data-toggle="toggle" data-on="Hoạt động" data-off="Chưa kích hoạt"
                      data-onstyle="success" data-offstyle="danger" onchange="this.form.submit()">
                  </form>
                </td>
                <td class="d-flex justify-content-between">
                  <a href="<?= BASE_URL_ADMIN . '?act=edit&id=' . $quantri['id'] ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Sửa
                  </a>
                  <a href="<?= BASE_URL_ADMIN . '?act=detail&id=' . $quantri['id'] ?>" class="btn btn-info btn-sm">
                    <i class="fas fa-info-circle"></i> Chi tiết
                  </a>
                  <a href="<?= BASE_URL_ADMIN . '?act=formphanquyen&id=' . $quantri['id'] ?>" class="btn btn-success btn-sm">
                    <i class="fas fa-user-shield"></i> Phân quyền
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
      </div>
    </div>
  </section>
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



</body>

</html>