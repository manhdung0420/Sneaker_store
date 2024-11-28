<!-- header -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .btn-gradient-primary {
            background: linear-gradient(45deg, #007bff, #6f42c1);
            color: white;
            border: none;
        }
        .btn-gradient-primary:hover {
            background: linear-gradient(45deg, #0056b3, #4e2a8e);
        }
        .bg-gradient-primary {
            background: linear-gradient(45deg, #007bff, #6f42c1);
            color: white;
        }
    </style>

<body>
    <!-- Nội dung form của bạn -->
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Optional: jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

<?php require './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container mt-5">
    <div class="card border-0 shadow-lg rounded-lg">
        <div class="card-header bg-gradient-primary text-white text-center py-4">
            <h3 class="card-title mb-0">Phân Quyền Tài Khoản</h3>
        </div>
        <div class="card-body p-4">
            <form action="<?= BASE_URL_ADMIN . '?act=phanquyen' ?>" method="POST">
                <!-- Thông tin người dùng -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="ho_ten" class="form-label fw-bold">Họ và Tên:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control bg-light" value="<?= $obj['ho_ten'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="usename" class="form-label fw-bold">Username:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person-badge-fill"></i></span>
                            <input type="text" class="form-control bg-light" value="<?= $obj['usename'] ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control bg-light" value="<?= $obj['email'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="so_dien_thoai" class="form-label fw-bold">Số Điện Thoại:</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control bg-light" value="<?= $obj['so_dien_thoai'] ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="dia_chi" class="form-label fw-bold">Địa chỉ:</label>
                    <textarea class="form-control bg-light" rows="2" readonly><?= $obj['dia_chi'] ?></textarea>
                </div>

                <!-- Dropdown phân quyền -->
                <div class="form-group mt-4">
                    <label for="chuc_vu_id" class="form-label fw-bold">Phân Quyền:</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-shield-lock-fill"></i></span>
                        <select name="chuc_vu_id" id="chuc_vu_id" class="form-select">
                            <?php foreach ($getChucVu as $value): ?>
                                <option 
                                    <?= ($obj['chuc_vu_id'] == $value['chuc_vu_id']) ? "selected" : "" ?>
                                    value="<?= $value['chuc_vu_id'] ?>">
                                    <?= $value['ten_chuc_vu'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Nút hành động -->
                <input type="hidden" name="id" value="<?= $obj['id'] ?>">
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-gradient-primary btn-lg">
                        <i class="bi bi-save-fill"></i> Cập Nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


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