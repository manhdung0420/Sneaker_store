<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tài Khoản</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
</body>
</html>
