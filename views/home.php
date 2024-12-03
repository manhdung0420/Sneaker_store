<?php require_once './views/layouts/header.php' ?>
<?php
if (isset($_SESSION['error_message'])) {
    $errorMessage = $_SESSION['error_message'];
    echo "<script>alert('$errorMessage');</script>";
    unset($_SESSION['error_message']); // Xóa thông báo sau khi hiển thị
}
?>


<?php require_once './views/layouts/menu.php' ?>

<!-- Begin Slider Area Three -->
<div class="slider-area slider-area-3">

    <div class="kenne-element-carousel home-slider home-slider-3 arrow-style" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": false,
                "autoplay" : true,
                "fade" : true,
                "autoplaySpeed" : 5000,
                "pauseOnHover" : false,
                "pauseOnFocus" : false
                }' data-slick-responsive='[
                {"breakpoint":768, "settings": {
                "slidesToShow": 1
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1
                }}
            ]'>
        <div class="slide-item bg-5 animation-style-01">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span>Ưu Đãi Đặc Biệt - Giảm 20% Tuần Này</span>
                    <h2>Giày Thể Thao <br> Khám Phá Mẫu Mới</h2>
                    <p class="short-desc">Được thiết kế cho mọi hoạt động, giày thể thao bền đẹp và mang lại cảm giác thoải mái mỗi khi vận động.</p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item bg-6 animation-style-01">
            <div class="slider-progress"></div>
            <div class="container">
                <div class="slide-content">
                    <span>Ưu Đãi Đặc Biệt - Giảm 10% Tuần Này</span>
                    <h2>Giày Dành Cho Nữ <br> Phong Cách & Tiện Dụng</h2>
                    <p class="short-desc-2">Giày nữ thiết kế hiện đại, chất liệu da cao cấp mang đến sự thoải mái và bền bỉ.</p>
                    <div class="slide-btn">
                        <a class="kenne-btn" href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- Slider Area Three End Here -->

<!-- Begin Service Area -->
<div class="service-area">
    <div class="container">
        <div class="service-nav">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="service-item">
                        <div class="content">
                            <h6>Giao hàng</h6>
                            <p>Miễn phí giao hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-item">
                        <div class="content">
                            <h6>Hoàn tiền</h6>
                            <p>Hoàn tiền trong 30 ngày khi lỗi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="service-item">
                        <div class="content">
                            <h6>Hỗ trợ</h6>
                            <p>Hỗ trợ 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Area End Here -->

<!-- Begin Banner Area -->
<div class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-6 custom-xxs-col">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img src="assets/images/banner/4-1.jpg" alt="Banner" width="350px" height="250px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6 custom-xxs-col">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img src="assets/images/banner/3-4.jpg" alt="Banner" width="350px" height="250px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6 custom-xxs-col">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img src="assets/images/banner/4-2.jpg" alt="Banner" width="350px" height="250px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End Here -->

<!-- Search Product Area -->

<?php
if (isset($keyword)) {
?>
    <div class="product-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Keyword: <?= $keyword ?>
                        </h3>

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

                        <?php

                        foreach ($searchproducts as $value): ?>
                            <div class="product-item">

                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $value['id'] ?>">
                                            <img class="primary-img" src="<?= $value['hinh_anh'] ?>"
                                                style="width: 200px; height: 250px; object-fit: cover;"
                                                alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Mới</span>
                                        <div class="add-actions">
                                            <ul>
                                                <!-- <li class="quick-view-btn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter"><a href="#" data-bs-toggle="tooltip"
                                                        data-placement="right" title="Quick View"><i
                                                            class="ion-ios-search"></i></a>
                                                </li> -->
                                                <!-- <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                        title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                        title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                </li> -->
                                                <!-- <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                        title="Add To cart"><i class="ion-bag"></i></a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a
                                                    href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $value['id'] ?>"><?= $value['ten_san_pham'] ?></a></h3>
                                            <div class="price-box">
                                                <span class="new-price"><?= $value['gia_san_pham'] ?></span>
                                                <span class="old-price"><?= $value['gia_khuyen_mai'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="alert fs-2 text-danger" role="alert">
                                <?php if ($searchproducts == []) {
                                    echo "<br> Không có sản phẩm:  $keyword";
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->

<?php
} else {
?>


    <!-- Begin Product Area -->
    <div class="product-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Sản phẩm mới</h3>
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
                        <?php foreach ($products as $value): ?>
                            <div class="product-item">

                                <div class="single-product" style="width: 255px; height: 390px;">
                                    <div class="product-img">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $value['id'] ?>">
                                            <img class="primary-img" src="<?= $value['hinh_anh'] ?>"
                                                style="width: 200px; height: 250px; object-fit: cover;"
                                                alt="Kenne's Product Image">
                                        </a>
                                        <span class="sticker">Mới</span>
                                        <div class="add-actions">
                                            <ul>
                                                <!-- <li class="quick-view-btn" data-bs-toggle="modal"
                                                    data-bs-target=""><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $value['id'] ?>" data-bs-toggle="tooltip"
                                                        data-placement="right" title="Chi tiết sản phẩm"><i
                                                            class="ion-ios-search"></i></a>
                                                </li> -->
                                                <!-- <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                        title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                        title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                </li> -->
                                                <!-- <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                        title="Thêm giỏ hàng"><i class="ion-bag"></i></a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a
                                                    href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $value['id'] ?>"><?= $value['ten_san_pham'] ?></a></h3>
                                            <div class="price-box">
                                                <span class="new-price"><?= formatPrice($value['gia_san_pham']) ?>đ</span>
                                                <span class="old-price"><?= formatPrice($value['gia_khuyen_mai']) ?>đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- Product Area End Here -->

<!-- Begin Banner Area Two -->
<div class="banner-area banner-area-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img class="img-full" src="assets/images/banner/4-3.jpg" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="banner-item img-hover_effect">
                    <div class="banner-img">
                        <a href="javascrip:void(0)">
                            <img class="img-full" src="assets/images/banner/4-4.jpg" alt="Banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area Two End Here -->

<!-- Begin Product Tab Area -->
<div class="product-tab_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Tất cả sản phẩm</h3>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-content kenne-tab_content">
                    <div id="bag" class="tab-pane active show" role="tabpanel">
                        <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow"
                            data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
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
                            <?php foreach ($products as $value): ?>
                                <div class="product-item">

                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $value['id'] ?>">
                                                <img class="primary-img" src="<?= $value['hinh_anh'] ?>"
                                                    style="width: 200px; height: 250px; object-fit: cover;"
                                                    alt="Kenne's Product Image">
                                            </a>
                                            <span class="sticker">Bestseller</span>
                                            <div class="add-actions">
                                                <!-- <ul>
                                                    <li class="quick-view-btn" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter"><a href="#"
                                                            data-bs-toggle="tooltip" data-placement="right"
                                                            title="Quick View"><i class="ion-ios-search"></i></a>
                                                    </li>
                                                    <li><a href="wishlist.html" data-bs-toggle="tooltip"
                                                            data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                    </li>
                                                    <li><a href="compare.html" data-bs-toggle="tooltip"
                                                            data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                    </li>
                                                    <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                            title="Add To cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                </ul> -->
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h3 class="product-name"><a
                                                        href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $value['id'] ?>"><?= $value['ten_san_pham'] ?></a></h3>
                                                <div class="price-box">
                                                    <span class="new-price"><?= formatPrice($value['gia_san_pham']) ?>đ</span>
                                                    <span class="old-price"><?= formatPrice($value['gia_khuyen_mai']) ?>đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Tab Area End Here -->

<!-- Begin Latest Blog Area -->
<!-- <div class="latest-blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Latest <span>Blog</span></h3>
                    <div class="latest-blog_arrow"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="kenne-element-carousel latest-blog_slider slider-nav" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": true,
                        "dots": false,
                        "spaceBetween": 30,
                        "appendArrows": ".latest-blog_arrow"
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":768, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>

                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/1.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in
                                section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="#">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/2.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in
                                section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="#">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/3.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in
                                section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="#">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-item">
                        <div class="blog-img img-hover_effect">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/1.jpg" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="heading">
                                <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                            </h3>
                            <p class="short-desc">
                                The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in
                                section 1.10.32.
                            </p>
                            <div class="blog-meta">
                                <ul>
                                    <li>Oct.20.2019</li>
                                    <li>
                                        <a href="#">02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Latest Blog Area End Here -->

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