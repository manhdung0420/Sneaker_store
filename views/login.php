<?php
if (isset($_SESSION['error_message'])) {
    $errorMessage = htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8');
    echo "<script>alert('$errorMessage');</script>";
    unset($_SESSION['error_message']); // Xóa thông báo sau khi hiển thị
}
?>

<?php
require_once './views/layouts/header.php'; ?>

<?php require_once './views/layouts/menu.php'; ?>

<div class="kenne-login-register_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6">
                <!-- Login Form s-->
                <form action="<?= BASE_URL . '?act=login' ?>" method="POST">
                
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <label>Email Address*</label>
                                <input type="email" name="email" placeholder="Email Address">
                            </div>

                            <div class="col-12 mb--20">
                                <label>Password</label>
                                <input type="password" name="mat_khau" placeholder="Password">
                            </div>
                            <div class="col-md-8">
                                <div class="check-box">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="kenne-login_btn">Login</button>
                            </div>
                        </div>
                    </div>
                   
                </form>

            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="<?= BASE_URL . '?act=register' ?>" method="POST">
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb--20">
                                <label>Họ và tên</label>
                                <input type="text" placeholder="Họ và tên" name="ho_ten">
                            </div>
                            <div class="col-md-6 col-12 mb--20">
                                <label>Tên đăng nhập</label>
                                <input type="text" placeholder="Tên đăng nhập" name="usename">
                            </div>
                            <div class="col-md-12">
                                <label>Địa chỉ email </label>
                                <input type="email" placeholder="Địa chỉ email" name="email">
                            </div>
                            <div class="col-md-12 col-12">
                                <label>Số điện thoại</label>
                                <input type="text" placeholder="Số điện thoại"   pattern="\d{10,11}"  name="so_dien_thoai">
                            </div>
                            <div class="col-md-6">
                                <label>Mật khẩu</label>
                                <input type="password" placeholder="Mật khẩu" name="mat_khau">
                            </div>
                            <div class="col-md-6">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" placeholder="Nhập lại mật khẩu" name="confirm_password">
                            </div>
                            <div class="col-12">
                                <button class="kenne-register_btn" type="submit">Register</button>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($error))
                        echo "<p style='color:red;'>$error</p>"; ?>
                    <?php if (!empty($success))
                        echo "<p style='color:green;'>$success</p>"; ?>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once './views/layouts/footer.php' ?>