<?php require_once './views/layouts/header.php' ?>

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
<!-- Begin Uren's Cart Area -->
<div class="kenne-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="kenne-product-remove">remove</th>
                                    <th class="kenne-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="kenne-product-price">Unit Price</th>
                                    <th class="kenne-product-price">Size</th>
                                    <th class="kenne-product-quantity">Quantity</th>
                                    <th class="kenne-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tongGioHang = 0;
                                foreach ($chiTietGioHang as $key => $sanPham):
                                ?>
                                    <tr>
                                        <td class="kenne-product-remove"><a href="<?= BASE_URL . '?act=xoa-gio-hang&id=' . $sanPham['id'] ?>"><i class="fa fa-trash"
                                                    title="Remove"></i></a></td>
                                        <td class="kenne-product-thumbnail"><a href="#"><img src="<?= $sanPham["hinh_anh"] ?>" style="width: 70px; height: 70px" alt="Uren's Cart Thumbnail"></a></td>
                                        <td class="kenne-product-name"><a href="#"><?= $sanPham["ten_san_pham"] ?></a></td>
                                        <td class="kenne-product-price"><span class="amount"><?php if ($sanPham["gia_khuyen_mai"]) { ?>
                                                    <?= formatPrice($sanPham["gia_khuyen_mai"]) . 'VNĐ' ?></span></td>
                                    <?php } else { ?>
                                        <?= formatPrice($sanPham["gia_san_pham"]) . 'VNĐ' ?></span></td>
                                    <?php } ?>
                                    <td class="kenne-product-size"><span class="amount"><?= $sanPham["size"] ?></span></td>
                                    <td class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="<?= $sanPham["so_luong"] ?>" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">
                                            <?php
                                            $tongTien = 0;
                                            if ($sanPham["gia_khuyen_mai"]) {
                                                $tongTien = $sanPham["gia_khuyen_mai"] * $sanPham["so_luong"];
                                            } else {
                                                $tongTien = $sanPham["gia_san_pham"] * $sanPham["so_luong"];
                                            }
                                            $tongGioHang += $tongTien;
                                            echo formatPrice($tongTien) . 'VNĐ';
                                            ?></span>
                                    </td>
                                    </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="cart-page-total">
                                <h2>Tổng đơn hàng</h2>
                                <ul>
                                    <li>Tổng tiền sản phẩm <span><?= formatPrice($tongGioHang) . 'VNĐ' ?></span></li>
                                    <li>Vận chuyển<span>30.000 VNĐ</span></li>
                                    <li>Tổng Thanh Toán<span><?= formatPrice($tongGioHang + 30000) . 'đ' ?></span></li>
                                </ul>
                                <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="button">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Uren's Cart Area End Here -->

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


<?php require_once './views/layouts/footer.php' ?>


<!-- Mirrored from htmldemo.net/kenne/kenne/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:13:37 GMT -->

</html>