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
<!-- cart main wrapper start -->
<div class="cart-main-wrapper section-padding">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Thông tin sản phẩm đơn hàng -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="6">Thông tin sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <th>Hình ảnh</th>
                                    <th style="width: 210px;">Tên sản phẩm</th>
                                    <th>Size</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành Tiền</th>
                                </tr>
                                <?php foreach ($chiTietDonHang as $item): ?>
                                    <tr>
                                        <td><img class="img-fluid" src="<?= BASE_URL . $item["hinh_anh"] ?>" alt="Product" width="100px" /></td>
                                        <td><?= $item["ten_san_pham"] ?></td>
                                        <td><?= $item["size"] ?></td>
                                        <td><?= number_format($item["don_gia"], 0, ',' . ',') ?>đ</td>
                                        <td><?= $item["so_luong"] ?></td>
                                        <td><?= number_format($item["thanh_tien"], 0, ',' . ',') ?>đ</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- Thông tin đơn hàng -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Thông tin đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Mã đơn hàng:</th>
                                    <td><?= $donHang["ma_don_hang"] ?></td>
                                </tr>
                                <tr>
                                    <th>Người nhận:</th>
                                    <td><?= $donHang["ten_nguoi_nhan"] ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?= $donHang["email_nguoi_nhan"] ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td><?= $donHang["dia_chi_nguoi_nhan"] ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày đặt:</th>
                                    <td><?= $donHang["ngay_dat"] ?></td>
                                </tr>
                                <tr>
                                    <th>Ghi chú:</th>
                                    <td><?= $donHang["ghi_chu"] ?></td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td><?= number_format($donHang["tong_tien"], 0, ',' . ',') ?>đ</td>
                                </tr>
                                <tr>
                                    <th>Phương thức thanh toán</th>
                                    <td><?= $PhuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái đơn hàng</th>
                                    <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->

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
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        /* Loại bỏ tràn ngang */
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 100%;
        padding: 15px;
        margin: 0 auto;
    }

    th,
    td {
        word-wrap: break-word;
        /* Cho phép nội dung xuống dòng */
        white-space: normal;
        /* Tự động xuống dòng khi quá dài */
        text-align: center;
    }

    thead th {
        background-color: #d4a559;
        /* Màu nền của tiêu đề */
        color: white;
        font-weight: bold;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        /* Bảo đảm các cột co lại khi không đủ chỗ */
    }
</style>

<?php require_once './views/layouts/footer.php' ?>


<!-- Mirrored from htmldemo.net/kenne/kenne/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:13:37 GMT -->

</html>