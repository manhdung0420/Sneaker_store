<?php require_once './views/layouts/header.php' ?>
<?php require_once './views/layouts/menu.php' ?>
<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- Begin Kenne's Page Content Area -->
<main class="page-content">
    <div class="account-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Bảng điều khiển</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address" role="tab" aria-controls="account-address" aria-selected="false">Thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-logout-tab" href="<?= BASE_URL . '?act=logout' ?>" role="tab" aria-selected="false">Đăng Xuất</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <?php if (isset($_SESSION["success"])) { ?>
                        <div class="alert alert-success"><?= $_SESSION["success"] ?></div>
                        <?php unset($_SESSION["success"]); ?>
                    <?php } ?>
                    <?php if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) { ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($_SESSION["error"] as $error) { ?>
                                    <li><?= $error ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php unset($_SESSION["error"]); ?>
                    <?php } ?>
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-dashboard">
                                <p>Xin chào <b><?= $thongTin["ho_ten"] ?></b> (Không phải <?= $thongTin["ho_ten"] ?>? <a href="<?= BASE_URL . '?act=logout' ?>">Sign
                                        out</a>)</p>
                                <p>Từ bảng điều khiển tài khoản, bạn có thể xem các đơn hàng gần đây, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và thông tin tài khoản.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                            <div class="myaccount-address">
                                <p>Các địa chỉ sau đây sẽ được sử dụng trên trang thanh toán theo mặc định.</p>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="small-title">Thông tin thanh toán</h4>
                                        <p><b>Họ tên: </b><?= $thongTin["ho_ten"] ?></p>
                                        <p><b>Email: </b><?= $thongTin["email"] ?></p>
                                        <p><b>Phone: </b><?= $thongTin["so_dien_thoai"] ?></p>
                                        <p><b>Địa chỉ: </b><?= $thongTin["dia_chi"] ?></p>
                                    </div>
                                    <div class="col">
                                        <h4 class="small-title">Thông tin giao hàng</h4>
                                        <p><b>Họ tên: </b><?= $thongTin["ho_ten"] ?></p>
                                        <p><b>Email: </b><?= $thongTin["email"] ?></p>
                                        <p><b>Phone: </b><?= $thongTin["so_dien_thoai"] ?></p>
                                        <p><b>Địa chỉ: </b><?= $thongTin["dia_chi"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                            <div class="myaccount-details">
                                <div class="myaccount-details">
                                    <form action="<?= BASE_URL . '?act=sua-mat-khau' ?>" method="post">
                                        <!-- Mật khẩu cũ -->
                                        <div class="single-input">
                                            <label class="col-md-3 control-label">Mật khẩu cũ</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="password" name="old_pass" value="">
                                                <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <!-- Mật khẩu mới -->
                                        <div class="single-input">
                                            <label class="col-md-3 control-label">Mật khẩu mới</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="password" name="new_pass" value="">
                                                <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <!-- Nhập lại mật khẩu mới -->
                                        <div class="single-input">
                                            <label class="col-md-3 control-label">Nhập lại mật khẩu mới</label>
                                            <div class="col-md-12">
                                                <input class="form-control" type="password" name="confirm_pass" value="">
                                                <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- Nút lưu thay đổi -->
                                        <div class="single-input">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Account Page Area End Here -->
    <?php require_once './views/layouts/footer.php' ?>