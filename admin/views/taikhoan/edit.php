<!-- header -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Toggle CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"
    rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<!-- Custom Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #f3f4f7, #ffffff);
    }

    .content-wrapper {
        margin-top: 20px;
        padding: 30px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }

    .content-header h1 {
        color: #4b6584;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #555;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 20px;
    }

    .form-control:focus {
        border-color: #00b09b;
        box-shadow: 0 0 5px rgba(0, 176, 155, 0.5);
    }

    .btn-primary {
        background: linear-gradient(to right, #00b09b, #96c93d);
        border: none;
        border-radius: 30px;
        font-size: 16px;
        font-weight: 600;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(to right, #00b09b, #5cc75c);
        box-shadow: 0px 4px 10px rgba(0, 176, 155, 0.4);
    }

    .container {
        max-width: 900px;
        margin-top: 50px;
    }

    .card {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    .card-header {
        background: linear-gradient(to right, #485563, #29323c);
        color: #ffffff;
        font-size: 18px;
        font-weight: 600;
    }

    .card-body {
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .form-control:focus {
        border-color: #00b09b;
        box-shadow: 0px 0px 10px rgba(0, 176, 155, 0.3);
    }

    /* Custom Toggle Switch */
    .toggle-status {
        transform: scale(1.2);
    }
</style>
<?php require './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper container  ">
    <!-- Content Header (Page header) -->

    <div class="container mt-5">
        <h2 class="mb-4">Cập nhật thông tin</h2>
        
            
                <form action="<?= BASE_URL_ADMIN . '?act=update' ?>" method="POST">
                    <div class="mb-3">
                        <label for="ho_ten" class="form-label">Họ và Tên:</label>
                        <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?= $obj['ho_ten'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="usename" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="usename" name="usename"
                            value="<?= $obj['usename'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $obj['email'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="mat_khau" class="form-label">Mật khẩu:</label>
                        <input type="text" class="form-control" id="mat_khau" name="mat_khau"
                            value="<?= $obj['mat_khau'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="so_dien_thoai" class="form-label">Số điện thoại:</label>
                        <input type="tel" class="form-control" id="so_dien_thoai" name="so_dien_thoai"
                            pattern="[0-9]{10}" value="<?= $obj['so_dien_thoai'] ?>">
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
</div>


<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
<!-- End Footer -->
<!-- Page specific script -->

<!-- Code injected by live-server -->
<script>
    $(function () {
        $('.toggle-status').bootstrapToggle();
    });
</script>

</body>

</html>