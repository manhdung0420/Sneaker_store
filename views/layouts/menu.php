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
                                        <a href="<?= BASE_URL . '?act=thong-tin' ?>">My Account</a>
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
                                <a href="<?= BASE_URL ?>">
                                    <img src="assets/images/menu/logo/1.png" alt="Header Logo">
                                </a>
                            </div>
                            <div class="header-right_area d-none d-lg-block">
                                <ul>
                                    <li class="minicart-wrap">
                                        <a href="<?= BASE_URL . '?act=gio-hang' ?>" class="minicart-btn ">
                                            <div class="minicart-count_area">
                                                <!-- <span class="item-count">03</span> -->
                                                <i class="ion-bag"></i>
                                            </div>
                                            <div class="minicart-front_text">
                                                <span>Giỏ hàng</span>
                                            </div>
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
                                                <li><a href="#">Pages</a>
                                                </li>
                                                <li><a href="#">Blog </a>

                                                </li>
                                                <li><a href="<?= BASE_URL . '?act=form-add-contact' ?>">Contact Us</a></li>
                                                <li><a href="about-us.html">About Us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </header>
    <!-- Main Header Area End Here -->