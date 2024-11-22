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
        <h2 class="mb-4">Thêm Tài Khoản Mới</h2>
        <form action="<?= BASE_URL_ADMIN . '?act=add'  ?>" method="POST">
            <!-- Họ và Tên -->
            <div class="mb-3">
                <label for="ho_ten" class="form-label">Họ và Tên</label>
                <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập họ và tên" required>
            </div>

            <!-- Username -->
            <div class="mb-3">
                <label for="usename" class="form-label">Username</label>
                <input type="text" class="form-control" id="usename" name="usename" placeholder="Nhập username" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
            </div>

            <!-- Mật khẩu -->
            <div class="mb-3">
                <label for="mat_khau" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu" required>
            </div>

            <!-- Số điện thoại -->
            <div class="mb-3">
                <label for="so_dien_thoai" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" placeholder="Nhập số điện thoại" required>
            </div>

            <!-- Địa chỉ -->
            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ</label>
                <textarea class="form-control" id="dia_chi" name="dia_chi" rows="4" placeholder="Nhập địa chỉ" required></textarea>
            </div>
            <div class="mb-3">
                <label for="dia_chi" class="form-label">Chức vụ</label>
                <select name="chuc_vu_id" id="">
                   <?php foreach ($getChucVu as $item) {?>
                    <option  value="<?=$item['chuc_vu_id']?>"><?=$item['ten_chuc_vu']?></option>
                   <?php }?>
                </select>
            </div>

            <!-- Nút gửi form -->
            <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>


</body>

</html>
