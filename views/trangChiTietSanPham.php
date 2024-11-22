<?php require_once './views/layouts/header.php' ?>

<?php require_once './views/layouts/menu.php' ?>

<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Single Product Type</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Single Product</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Single Product Area -->
<div class="sp-area">
    <div class="container">
        <div class="sp-nav">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sp-img_area">
                        <div class="sp-img_slider slick-img-slider kenne-element-carousel" data-slick-options='{
                                "slidesToShow": 1,
                                "arrows": false,
                                "fade": true,
                                "draggable": false,
                                "swipe": false,
                                "asNavFor": ".sp-img_slider-nav"
                                }'>
                            <!-- Hiển thị hình ảnh sản phẩm -->
                            <div class="single-slide">
                                <img src="<?= BASE_URL . $sanpham['hinh_anh']; ?>" alt="Product Image">
                            </div>
                        </div>
                        <div class="sp-img_slider-nav slick-slider-nav kenne-element-carousel arrow-style-2 arrow-style-3" data-slick-options='{
                                "slidesToShow": 3,
                                "asNavFor": ".sp-img_slider",
                                "focusOnSelect": true,
                                "arrows" : true,
                                "spaceBetween": 30
                                }'>
                            <!-- Hiển thị hình thu nhỏ -->
                            <?php if ($imageSanPham) : ?>
                                <?php foreach ($imageSanPham as $image): ?>
                                    <div class="single-slide">
                                        <img src="<?= BASE_URL . $image['link_hinh_anh']; ?>" alt="Product Thumbnail">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="sp-content">
                        <div class="sp-heading">
                            <h5><a href="#"><?php echo $sanpham['ten_san_pham']; ?></a></h5>
                        </div>
                        <span class="reference">Số lượng: <?php echo $sanpham['id']; ?></span>
                        <div class="rating-box">
                            <ul>
                                <li><i class="ion-android-star"></i></li>
                                <li><i class="ion-android-star"></i></li>
                                <li><i class="ion-android-star"></i></li>
                                <li class="silver-color"><i class="ion-android-star"></i></li>
                                <li class="silver-color"><i class="ion-android-star"></i></li>
                            </ul>
                        </div>
                        <div class="sp-essential_stuff">
                            <ul>
                                
                                <li>Mã sản phẩm: <a href="javascript:void(0)">Sản phẩm <?php echo $sanpham['id']; ?></a></li>
                                <li>Tình trạng: <a href="javascript:void(0)"><?php echo $sanpham['trang_thai'] > 0 ? 'Còn bán' : 'Dừng bán'; ?></a></li>
                                <li>Giá gốc: <a href="javascript:void(0)"><span>$<?php echo number_format($sanpham['gia_san_pham'], 2); ?></span></a></li>
                                <?php if ($sanpham['gia_khuyen_mai'] > 0): ?>
                                    <li>Giá khuyến mãi: <a href="javascript:void(0)"><span>$<?php echo number_format($sanpham['gia_khuyen_mai'], 2); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="product-size_box">
                            <span>Size</span>
                            <select class="myniceselect nice-select">
                                <!-- Ví dụ size, bạn có thể tùy chỉnh thêm nếu cần -->
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                            </select>
                        </div>
                        <div class="product-size_box">
                            <span>Màu</span>
                            <select class="myniceselect nice-select">

                                <option value="1">Trắng</option>
                                <option value="2">Đen</option>
                                <option value="3">Đỏ</option>
                                <option value="4">vàng</option>
                                <option value="5">Xanh</option>
                            </select>
                        </div>
                        <div class="quantity">
                            <label>Quantity</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </div>
                        <div class="qty-btn_area">
                            <ul>
                                <li><a class="qty-cart_btn" href="cart.html">Add To Cart</a></li>
                                <li><a class="qty-wishlist_btn" href="wishlist.html" data-bs-toggle="tooltip" title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                <li><a class="qty-compare_btn" href="compare.html" data-bs-toggle="tooltip" title="Compare This Product"><i class="ion-ios-shuffle-strong"></i></a></li>
                            </ul>
                        </div>
                        
                        <div class="kenne-social_link">
                            <ul>
                                <li class="facebook"><a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                <li class="twitter"><a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter"><i class="fab fa-twitter-square"></i></a></li>
                                <li class="youtube"><a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                <li class="google-plus"><a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
                                <li class="instagram"><a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kenne's Single Product Area End Here -->

<!-- Begin Product Tab Area Two -->
<div class="product-tab_area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="sp-product-tab_nav">
                    <div class="product-tab">
                        <ul class="nav product-menu">
                            <li><a class="active" data-bs-toggle="tab" href="#description"><span>Description</span></a>
                            </li>
                            <li><a data-bs-toggle="tab" href="#reviews"><span>Reviews (1)</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content uren-tab_content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <ul>
                                    <li></li>
                                    <span><?= $sanpham['mo_ta'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="tab-pane active" id="tab-review">
                                <form class="form-horizontal" id="form-review">
                                    <div id="review">
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;"><strong>Customer</strong></td>
                                                    <td class="text-right">26/10/19</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <p>Good product! Thank you very much</p>
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h2>Write a review</h2>
                                    <div class="form-group required">
                                        <div class="col-sm-12 p-0">
                                            <label>Your Email <span class="required">*</span></label>
                                            <input class="review-input" type="email" name="con_email" id="con_email" required>
                                        </div>
                                    </div>
                                    <div class="form-group required second-child">
                                        <div class="col-sm-12 p-0">
                                            <label class="control-label">Share your opinion</label>
                                            <textarea class="review-textarea" name="con_message" id="con_message"></textarea>
                                            <div class="help-block"><span class="text-danger">Note:</span> HTML is
                                                not
                                                translated!</div>
                                        </div>
                                    </div>
                                    <div class="form-group last-child required">
                                        <div class="col-sm-12 p-0">
                                            <div class="your-opinion">
                                                <label>Your Rating</label>
                                                <span>
                                                    <select class="star-rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="kenne-btn-ps_right">
                                            <button class="kenne-btn">Continue</button>
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
<!-- Product Tab Area Two End Here -->


<!-- phần best seller -->
<div class="product-area pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Sản phẩm liên quan</h3>
                    <div class="product-arrow"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": false,
                        "arrows": true,
                        "dots": false,
                        "spaceBetween": 30,
                        "appendArrows": ".product-arrow"
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint":768, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":575, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>
                    <?php if (!empty($sanPhamsByDanhMuc)) : ?>
                        <?php foreach ($sanPhamsByDanhMuc as $sanPhamByDanhMuc) : ?>
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="index.php?act=chi-tiet-san-pham&id=<?= $sanPhamByDanhMuc['id'] ?>">
                                            <img src="<?= BASE_URL . $sanPhamByDanhMuc['hinh_anh']; ?>" alt="Product Image">
                                        </a>
                                        <span class="sticker-2">Hot</span>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="javascript:void(0)" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                            class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="index.php?act=sanphamct"><?= $sanPhamByDanhMuc['ten_san_pham'] ?></a></h3>
                                            <div class="price-box">
                                                <span class="new-price">$<?= number_format($sanPhamByDanhMuc['gia_san_pham'], 2) ?></span>
                                                <span class="old-price">$<?= number_format($sanPhamByDanhMuc['gia_khuyen_mai'], 2); ?></span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li><i class="ion-ios-star"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                    <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Begin Brand Area -->
<div class="brand-area pt-90">
    <div class="container">
        <div class="brand-nav border-top border-bottom">
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