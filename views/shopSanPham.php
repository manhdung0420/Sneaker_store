<?php require_once './views/layouts/header.php' ?>

<?php require_once './views/layouts/menu.php' ?>

<!-- Begin Kenne's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Trang sản phẩm</h2>
            <ul>
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active">sản phẩm</li>
            </ul>
        </div>
    </div>
</div>
<!-- Kenne's Breadcrumb Area End Here -->

<!-- Begin Kenne's Content Wrapper Area -->
<div class="kenne-content_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 order-2 order-lg-1">
                <div class="kenne-sidebar-catagories_area">

                    <div class="kenne-sidebar_categories category-module">
                        <div class="kenne-categories_title">
                            <h5>Danh mục sản phẩm</h5>
                        </div>
                        <div class="sidebar-categories_menu">
                            <ul>
                                <?php foreach ($listDanhMuc as $danhMuc): ?>
                                    <li>
                                        <a href="<?= BASE_URL . '?act=danh-sach-san-pham&danh_muc_id=' . $danhMuc['id'] ?>" style="white-space: nowrap;"><?= $danhMuc['ten_danh_muc']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="kenne-sidebar_categories category-module">
                        <div class="kenne-categories_title">
                            <h5>Size</h5>
                        </div>
                        
                        <div class="sidebar-categories_menu">
                            <ul>
                                <?php
                                // Lọc các kích thước duy nhất
                                $uniqueSizes = array_unique(array_column($listSizeSP, 'size'));
                                sort($uniqueSizes);
                                foreach ($uniqueSizes as $size):
                                ?>
                                    <li>
                                        <a href="<?= BASE_URL . '?act=danh-sach-san-pham&size=' . urlencode($size) ?>" style="white-space: nowrap;"><?= $size; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                <div class="shop-toolbar">
                    <div class="product-view-mode">
                        <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="fa fa-th"></i></a>
                        <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top" title="List View"><i class="fa fa-th-list"></i></a>
                    </div>


                </div>
                <div class="shop-product-wrap grid gridview-3 row">
                    <?php foreach ($listSanPham as $sanPham): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="product-item" >
                                <div class="single-product" style="width: 255px; height: 360px; ">
                                    <div class="product-img" style="width: 213.4px; height: 213.4px; ">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $sanPham['id'] ?>">
                                            <img class="primary-img" src="<?= BASE_URL . $sanPham["hinh_anh"]; ?>" alt="Kenne's Product Image">
                                            <img class="secondary-img" src="<?= BASE_URL . $sanPham["hinh_anh"]; ?>" alt="Kenne's Product Image">
                                        </a>

                                        <?php
                                        // Tính số ngày từ ngày nhập đến hiện tại
                                        $ngayNhap = new DateTime($sanPham["ngay_nhap"]);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                        // Hiển thị nhãn "Mới" nếu sản phẩm nhập trong vòng 7 ngày
                                        if ($tinhNgay->days <= 7) {
                                        ?>
                                            <span class="sticker">Mới</span>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        // Kiểm tra và tính phần trăm giảm giá
                                        if ($sanPham["gia_khuyen_mai"] && $sanPham["gia_san_pham"]) {
                                            $giaGoc = $sanPham["gia_san_pham"];
                                            $giaKhuyenMai = $sanPham["gia_khuyen_mai"];
                                            $phanTramGiam = (($giaGoc - $giaKhuyenMai) / $giaGoc) * 100;

                                            // Hiển thị nhãn giảm giá nếu phần trăm giảm > 0
                                            if ($phanTramGiam > 0) {
                                        ?>
                                            <span class="sticker-2">
                                                Giảm <?= round($phanTramGiam) ?>%
                                            </span>
                                        <?php
                                            }
                                        }
                                        ?>

                                        <!-- <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="#" data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i
                                                            class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right" title="Add To Compare"><i
                                                            class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <h3 class="product-name"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id= ' . $sanPham['id'] ?>"><?= $sanPham["ten_san_pham"] ?></a></h3>
                                            <div class="price-box">
                                                <?php if ($sanPham["gia_khuyen_mai"]) { ?>
                                                    <span class="new-price"><?= formatPrice($sanPham["gia_khuyen_mai"])  ?>đ</span>
                                                    <span class="old-price"><del><?= formatPrice($sanPham["gia_san_pham"]) ?>đ</del></span>
                                                <?php } else { ?>
                                                    <span class="new-price"><?= formatPrice($sanPham["gia_san_pham"]) ?>đ</span>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-product_item">
                                <div class="single-product" >
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="<?= BASE_URL . $sanPham["hinh_anh"]; ?>" alt="Kenne's Product Image">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-desc_info">
                                            <div class="price-box">
                                                <span class="new-price"><?= formatPrice($sanPham["gia_khuyen_mai"]) ?>đ</span>
                                                <span class="old-price"><?= formatPrice($sanPham["gia_san_pham"]) ?>đ</span>
                                            </div>
                                            <h6 class="product-name"><a href="single-product.html"><?= $sanPham["ten_san_pham"] ?></a></h6>
                                            <div class="product-short_desc">
                                                <p><?= $sanPham["mo_ta"] ?></p>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul>
                                                <li class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><a href="#" data-bs-toggle="tooltip" data-placement="top" title="Quick View"><i class="ion-ios-search"></i></a>
                                                </li>
                                                <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                                                            class="ion-ios-heart-outline"></i></a>
                                                </li>
                                                <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="top" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                </li>
                                                <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top" title="Add To cart"><i class="ion-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="kenne-paginatoin-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="kenne-pagination-box primary-color">
                                        <!-- Phân trang các trang số -->
                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <li class="<?= $i == $currentPage ? 'active' : '' ?>">
                                                <a href="
                                    <?php
                                            if (isset($danhMucId) && !empty($danhMucId)) {
                                                echo BASE_URL . '?act=danh-sach-san-pham&danh_muc_id=' . $danhMucId . '&page=' . $i;
                                            } else {
                                                echo BASE_URL . '?act=danh-sach-san-pham&page=' . $i;
                                            }
                                    ?>
                                "><?= $i ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <!-- Liên kết Next (Chuyển sang trang tiếp theo) -->
                                        <?php if ($currentPage < $totalPages): ?>
                                            <li>
                                                <a class="Next" href="
                                    <?php
                                            if (isset($danhMucId) && !empty($danhMucId)) {
                                                echo BASE_URL . '?act=danh-sach-san-pham&danh_muc_id=' . $danhMucId . '&page=' . ($currentPage + 1);
                                            } else {
                                                echo BASE_URL . '?act=danh-sach-san-pham&page=' . ($currentPage + 1);
                                            }
                                    ?>
                                ">Next</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Content Wrapper Area End Here -->




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