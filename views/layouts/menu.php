<div class="main-wrapper boxed-layout bg-white_color">
    <!-- Begin Loading Area -->
    <div class="loading">
        <div class="text-center middle">
            <span class="loader">
                <span class="loader-inner"></span>
            </span>
        </div>
    </div>
    <!-- Loading Area End Here -->

    <!-- Begin Main Header Area -->
    <header class="main-header_area">
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="header-top_nav">
                    <div class="row">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6">
                            <div class="header-top_right">
                                <ul>
                                    <li>
                                        <a href="<?= BASE_URL . '?act=' ?>">My Account</a>
                                    </li>
                                    <?php

                                    if (!isset($_SESSION['user_id'])) { ?>
                                        <li>
                                            <a href="<?= BASE_URL . '?act=formlogin' ?>"> Login | Logout</a>
                                        </li>
                                    <?php } ?>



                                    <?php

                                    if (isset($_SESSION['user_id'])) { ?>
                                        <li>
                                            <a href="<?= BASE_URL . '?act=logout' ?>"> Logout</a>
                                        </li>
                                    <?php } ?>

                                    <?php

                                    if (isset($_SESSION['user_chuc_vu'])  &&  $_SESSION['user_chuc_vu'] == 1) { ?>
                                        <li>
                                            <a href="<?= BASE_URL . '?act=admin' ?>"> Admin</a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-middle_nav">
                            <div class="header-search_area d-none d-lg-block">
                                <form class="search-form" action="<?= BASE_URL . '?act=search' ?>" method="POST">
                                    <input type="text" name="keyword" placeholder="Nhập từ khóa..." required>
                                    <button class="search-button" type="submit"><i class="ion-ios-search"></i></button>
                                </form>
                            </div>
                            <div class="header-logo_area">
                                <a href="index.html">
                                    <img src="assets/images/menu/logo/1.png" alt="Header Logo">
                                </a>
                            </div>
                            <div class="header-right_area d-none d-lg-block">
                                <ul>
                                    <li class="minicart-wrap">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count">03</span>
                                                <i class="ion-bag"></i>
                                            </div>
                                            <div class="minicart-front_text">
                                                <span>Cart:</span>
                                                <span class="total-price">462.4</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-right_area header-right_area-2 d-block d-lg-none">
                                <ul>
                                    <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                            <i class="ion-android-menu"></i>
                                        </a>
                                    </li>
                                    <li class="minicart-wrap">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <div class="minicart-count_area">
                                                <span class="item-count">03</span>
                                                <i class="ion-bag"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#searchBar" class="search-btn toolbar-btn">
                                            <i class="ion-android-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="header-bottom_area d-none d-lg-block">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-menu_area position-relative">
                                        <nav class="main-nav d-flex justify-content-center">
                                            <ul>
                                                <li class="dropdown-holder"><a href="<?= BASE_URL ?>">Home</a>

                                                </li>
                                                <li class="megamenu-holder position-static"><a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Shop <i class="ion-chevron-down"></i></a>
                                                    <ul class="kenne-dropdown">
                                                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                                                            <li>
                                                                <a href="<?= BASE_URL . '?act=danh-sach-san-pham&danh_muc_id=' . $danhMuc['id'] ?>" style="white-space: nowrap;"><?= $danhMuc['ten_danh_muc']; ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Pages <i class="ion-chevron-down"></i></a>
                                                    <ul class="kenne-dropdown">
                                                        <li><a href="coming-soon_page.html">Coming Soon</a></li>
                                                        <li><a href="404.html">Error 404</a></li>
                                                        <li><a href="faq.html">FAQ</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Blog <i class="ion-chevron-down"></i></a>
                                                    <ul class="kenne-dropdown">
                                                        <li><a href="blog-grid_view.html">Grid View</a></li>
                                                        <li><a href="blog-list_view.html">List View</a></li>
                                                        <li><a href="blog-details.html">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="<?= BASE_URL . '?act=contact' ?>">Contact Us</a></li>
                                                <li><a href="about-us.html">About Us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-minicart_wrapper" id="miniCart">
                        <div class="offcanvas-menu-inner">
                            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                            <div class="minicart-content">
                                <div class="minicart-heading">
                                    <h4>Shopping Cart</h4>
                                </div>
                                <ul class="minicart-list">
                                    <li class="minicart-product">
                                        <a class="product-item_remove" href="#"><i
                                                class="ion-android-close"></i></a>
                                        <div class="product-item_img">
                                            <img src="assets/images/product/1-1.jpg" alt="Kenne's Product Image">
                                        </div>
                                        <div class="product-item_content">
                                            <a class="product-item_title" href="shop-left-sidebar.html">Autem ipsa ad</a>
                                            <span class="product-item_quantity">1 x $145.80</span>
                                        </div>
                                    </li>
                                    <li class="minicart-product">
                                        <a class="product-item_remove" href="#"><i
                                                class="ion-android-close"></i></a>
                                        <div class="product-item_img">
                                            <img src="assets/images/product/2-1.jpg" alt="Kenne's Product Image">
                                        </div>
                                        <div class="product-item_content">
                                            <a class="product-item_title" href="shop-left-sidebar.html">Tenetur illum
                                                amet</a>
                                            <span class="product-item_quantity">1 x $150.80</span>
                                        </div>
                                    </li>
                                    <li class="minicart-product">
                                        <a class="product-item_remove" href="#"><i
                                                class="ion-android-close"></i></a>
                                        <div class="product-item_img">
                                            <img src="assets/images/product/3-1.jpg" alt="Kenne's Product Image">
                                        </div>
                                        <div class="product-item_content">
                                            <a class="product-item_title" href="shop-left-sidebar.html">Non doloremque
                                                placeat</a>
                                            <span class="product-item_quantity">1 x $165.80</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="minicart-item_total">
                                <span>Subtotal</span>
                                <span class="ammount">$462.4‬0</span>
                            </div>
                            <div class="minicart-btn_area">
                                <a href="cart.html" class="kenne-btn kenne-btn_fullwidth">Minicart</a>
                            </div>
                            <div class="minicart-btn_area">
                                <a href="checkout.html" class="kenne-btn kenne-btn_fullwidth">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu_wrapper" id="mobileMenu">
                        <div class="offcanvas-menu-inner">
                            <div class="container">
                                <a href="#" class="btn-close white-close_btn"><i class="ion-android-close"></i></a>
                                <div class="offcanvas-inner_logo">
                                    <a href="index.html">
                                        <img src="assets/images/menu/logo/1.png" alt="Header Logo">
                                    </a>
                                </div>
                                <nav class="offcanvas-navigation">
                                    <ul class="mobile-menu">
                                        <li class="menu-item-has-children active"><a href="#"><span class="mm-text">Home</span></a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="index.html">
                                                        <span class="mm-text">Home One</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-2.html">
                                                        <span class="mm-text">Home Two</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="index-3.html">
                                                        <span class="mm-text">Home Three</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                <span class="mm-text">Shop</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children">
                                                    <a href="#">
                                                        <span class="mm-text">Grid View</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="shop-fullwidth.html">
                                                                <span class="mm-text">Grid Fullwidth</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-left-sidebar.html">
                                                                <span class="mm-text">Left Sidebar</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-right-sidebar.html">
                                                                <span class="mm-text">Right Sidebar</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">
                                                        <span class="mm-text">Shop List</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="shop-list-fullwidth.html">
                                                                <span class="mm-text">Full Width</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list-left-sidebar.html">
                                                                <span class="mm-text">Left Sidebar</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-list-right-sidebar.html">
                                                                <span class="mm-text">Right Sidebar</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">
                                                        <span class="mm-text">Single Product Style</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="single-product-gallery-left.html">
                                                                <span class="mm-text">Gallery Left</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-gallery-right.html">
                                                                <span class="mm-text">Gallery Right</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-tab-style-left.html">
                                                                <span class="mm-text">Tab Style Left</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-tab-style-right.html">
                                                                <span class="mm-text">Tab Style Right</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-sticky-left.html">
                                                                <span class="mm-text">Sticky Left</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-sticky-right.html">
                                                                <span class="mm-text">Sticky Right</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">
                                                        <span class="mm-text">Single Product Type</span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="single-product.html">
                                                                <span class="mm-text">Single Product</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-sale.html">
                                                                <span class="mm-text">Single Product Sale</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-group.html">
                                                                <span class="mm-text">Single Product Group</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-variable.html">
                                                                <span class="mm-text">Single Product Variable</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-affiliate.html">
                                                                <span class="mm-text">Single Product Affiliate</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-slider.html">
                                                                <span class="mm-text">Single Product Slider</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                <span class="mm-text">Blog</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children has-children">
                                                    <a href="blog-grid_view.html">
                                                        <span class="mm-text">Grid View</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item-has-children has-children">
                                                    <a href="blog-list_view.html">
                                                        <span class="mm-text">List View</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item-has-children has-children">
                                                    <a href="blog-details.html">
                                                        <span class="mm-text">Blog Details</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">
                                                <span class="mm-text">Pages</span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="my-account.html">
                                                        <span class="mm-text">About Us</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="my-account.html">
                                                        <span class="mm-text">Contact</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="my-account.html">
                                                        <span class="mm-text">My Account</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="login-register.html">
                                                        <span class="mm-text">Login | Register</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">
                                                        <span class="mm-text">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">
                                                        <span class="mm-text">Cart</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html">
                                                        <span class="mm-text">Checkout</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="compare.html">
                                                        <span class="mm-text">Compare</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="faq.html">
                                                        <span class="mm-text">FAQ</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="404.html">
                                                        <span class="mm-text">Error 404</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <nav class="offcanvas-navigation user-setting_area">
                                    <ul class="mobile-menu">
                                        <li class="menu-item-has-children active">
                                            <a href="#">
                                                <span class="mm-text">User
                                                    Setting
                                                </span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="my-account.html">
                                                        <span class="mm-text">My Account</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="login-register.html">
                                                        <span class="mm-text">Login | Register</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#"><span class="mm-text">Currency</span></a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="#">
                                                        <span class="mm-text">EUR €</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="mm-text">USD $</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#"><span class="mm-text">Language</span></a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="#">
                                                        <span class="mm-text">English</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="mm-text">Français</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="mm-text">Romanian</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="mm-text">Japanese</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-search_wrapper" id="searchBar">
                        <div class="offcanvas-menu-inner">
                            <div class="container">
                                <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                                <!-- Begin Offcanvas Search Area -->
                                <div class="offcanvas-search">
                                    <form action="#" class="hm-searchbox">
                                        <input type="text" placeholder="Search for item...">
                                        <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </form>
                                </div>
                                <!-- Offcanvas Search Area End Here -->
                            </div>
                        </div>
                    </div>
                    <div class="global-overlay"></div>
    </header>
    <!-- Main Header Area End Here -->