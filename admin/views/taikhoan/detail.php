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
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Chi Tiết Tài Khoản</h2>
        <div class="card">
            <div class="card-body">
                <!-- Họ và Tên -->
                <div class="mb-3">
                    <strong>Họ và Tên:</strong>
                    <p><?php echo isset($obj['ho_ten']) ? htmlspecialchars($obj['ho_ten']) : 'N/A'; ?></p>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <strong>Username:</strong>
                    <p><?php echo isset($obj['usename']) ? htmlspecialchars($obj['usename']) : 'N/A'; ?></p>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <strong>Email:</strong>
                    <p><?php echo isset($obj['email']) ? htmlspecialchars($obj['email']) : 'N/A'; ?></p>
                </div>

                <!-- Số điện thoại -->
                <div class="mb-3">
                    <strong>Số Điện Thoại:</strong>
                    <p><?php echo isset($obj['so_dien_thoai']) ? htmlspecialchars($obj['so_dien_thoai']) : 'N/A'; ?></p>
                </div>
                <div class="mb-3">
                    <strong>Chức vụ:</strong>
                    <p><?php
                    if ($obj['chuc_vu_id']== 1 ) {
                      echo"admin";
                    }else{
                      echo"User";
                    }
                 ?></p>
                </div>

                <!-- Địa chỉ -->
                <div class="mb-3">
                    <strong>Địa Chỉ:</strong>
                    <p><?php echo isset($obj['dia_chi']) ? htmlspecialchars($obj['dia_chi']) : 'N/A'; ?></p>
                </div>

                <!-- Nút quay lại -->
                <div class="d-flex justify-content-end">
                    <a href="<?= BASE_URL_ADMIN . '?act=tai-khoan'?>" class="btn btn-secondary">Quay Lại</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>