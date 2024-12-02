<?php require_once './views/layouts/header.php' ?>
<link rel="stylesheet" href="assets/css/donHang.css">
<?php require_once './views/layouts/menu.php' ?>

<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Shop Related</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->
<!-- checkout main wrapper start -->
<div class="checkout-page-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
                <div class="checkoutaccordion" id="checkOutAccordion">
                    <div class="card">
                        <h6>Thêm mã giảm giá <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click
                                Here To Enter Your Code</span></h6>
                        <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <div class="cart-update-option">
                                    <div class="apply-coupon-wrapper">
                                        <form action="#" method="post" class=" d-block d-md-flex">
                                            <input type="text" placeholder="Enter Your Coupon Code" required />
                                            <button class="btn btn-sqr">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout Login Coupon Accordion End -->
            </div>
        </div>
        <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="post">
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h5 class="checkout-title">Thông tin người nhận</h5>
                        <div class="billing-form-wrap">


                            <div class="single-input-item">
                                <label for="ten_nguoi_nhan" class="required">Tên người nhận</label>
                                <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Tên người nhận" required />
                            </div>

                            <div class="single-input-item">
                                <label for="email_nguoi_nhan">Địa chỉ email</label>
                                <input type="text" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Địa chỉ email" />
                            </div>

                            <div class="single-input-item">
                                <label for="sdt_nguoi_nhan">Số điện thoại</label>
                                <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Địa chỉ email" />
                            </div>

                            <div class="single-input-item">
                                <label for="dia_chi_nguoi_nhan">Địa chỉ </label>
                                <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ email" />
                            </div>



                            <div class="single-input-item">
                                <label for="ghi_chu">Ghi chú</label>
                                <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Ghi chú đơn hàng"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h5 class="checkout-title">Thông tin sản phẩm</h5>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Size</th>
                                            <th>Số lượng</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tongGioHang = 0;
                                        foreach ($chiTietGioHang as $key => $sanPham):
                                        ?>
                                            <tr>
                                                <td><a href=""><?= $sanPham['ten_san_pham'] ?></a></td>
                                                <td><?= $sanPham['size'] ?></td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td>
                                                    <?php
                                                    $tongTien = 0;
                                                    if ($sanPham["gia_khuyen_mai"]) {
                                                        $tongTien = $sanPham["gia_khuyen_mai"] * $sanPham["so_luong"];
                                                    } else {
                                                        $tongTien = $sanPham["gia_san_pham"] * $sanPham["so_luong"];
                                                    }
                                                    $tongGioHang += $tongTien;
                                                    echo formatPrice($tongTien) . 'đ';
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">Tổng tiền sản phẩm</td>
                                            <td><strong><?= formatPrice($tongGioHang) . 'đ' ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Shipping</td>
                                            <td><strong>30.000 đ</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Tổng đơn hàng</td>
                                            <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 30000 ?>">
                                            <td><strong><?= formatPrice($tongGioHang + 30000) . 'đ' ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Order Payment Method -->
                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" value="1" name="phuong_thuc_thanh_toan_id" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="cashon">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input" />
                                            <label class="custom-control-label" for="directbank">Thanh toán online</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" class="custom-control-input" id="terms" required />
                                        <label class="custom-control-label" for="terms">Xác nhận đặt hàng</label>
                                    </div>
                                    <button type="submit" class="btn btn-sqr">Tiến hành đặt hàng</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- checkout main wrapper end -->

<!-- Begin Brand Area -->
<div class="brand-area ">
    <div class="container">
        <div class="brand-nav border-top ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kenne-element-carousel brand-slider slider-nav" data-slick-options='{
                                "slidesToShow": 6,
                                "slidesToScroll": 1,
                                "infinite": false,
                                "arrows": false,
                                "dots": false,
                                "spaceBetween": 30
                                }' data-slick-responsive='[
                                {"breakpoint":992, "settings": {
                                "slidesToShow": 4
                                }},
                                {"breakpoint":768, "settings": {
                                "slidesToShow": 3
                                }},
                                {"breakpoint":576, "settings": {
                                "slidesToShow": 2
                                }}
                            ]'>

                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/1.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/2.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/3.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/4.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/5.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/6.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/1.png" alt="Brand Images">
                            </a>
                        </div>
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/images/brand/2.png" alt="Brand Images">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Area End Here -->
<style>
    .btn-sqr {
        color: #fff;
        font-size: 15px;
        border-radius: 0;
        background-color: #c29958;
        padding: 12px 25px;
    }

    .btn-sqr:hover {
        color: #fff;
        background-color: #222222;
    }
</style>

<?php require_once './views/layouts/footer.php' ?>


<!-- Mirrored from htmldemo.net/kenne/kenne/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:13:37 GMT -->

</html>