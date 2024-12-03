<?php

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user_chuc_vu'])) {
    $_SESSION['error_message'] = "Bạn cần đăng nhập để vào admin.";
    header('Location: http://localhost/Sneaker_store/?act=formlogin'); // Chuyển hướng về trang đăng nhập
    exit();
}

// Kiểm tra nếu người dùng không phải là admin
if ($_SESSION['user_chuc_vu'] != 1 && strpos($_SERVER['REQUEST_URI'], '/admin/') !== false) {
    $_SESSION['error_message'] = "Bạn không có quyền truy cập vào trang admin.";
    header('Location: http://localhost/Sneaker_store/'); // Chuyển hướng về trang chính
    exit();
}
?>