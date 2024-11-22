<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tài Khoản</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
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
