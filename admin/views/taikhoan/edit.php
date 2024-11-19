<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cập nhật thông tin</h2>
        <form action="<?= BASE_URL_ADMIN . '?act=update' ?>" method="POST">
            <div class="mb-3">
                <label for="ho_ten" class="form-label">Họ và Tên:</label>
                <input type="text" class="form-control" id="ho_ten" name="ho_ten"  value="<?= $obj['ho_ten'] ?>">
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
                <input type="password" class="form-control" id="mat_khau" name="mat_khau" value="<?= $obj['mat_khau'] ?>">
            </div>

            <div class="mb-3">
                <label for="so_dien_thoai" class="form-label">Số điện thoại:</label>
                <input type="tel" class="form-control" id="so_dien_thoai" name="so_dien_thoai" pattern="[0-9]{10}" value="<?= $obj['so_dien_thoai'] ?>">
            </div>

            <div class="mb-3">
                <label for="dia_chi" class="form-label">Địa chỉ:</label>
                <textarea class="form-control" id="dia_chi" name="dia_chi" rows="4" value="<?= $obj['dia_chi'] ?>"></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $obj['id']?>">

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional for additional functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
