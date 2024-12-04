<?php require_once './views/layouts/header.php'; ?>
<?php require_once './views/layouts/menu.php'; ?>

<div class="main-wrapper">
    <!-- Kiểm tra và hiển thị thông báo nếu có -->
    <?php if (isset($_SESSION['message'])): ?>
        <script>
            // Khi trang tải xong, hiển thị alert với thông báo
            window.onload = function() {
                alert("<?= $_SESSION['message']; ?>"); // Hiển thị thông báo trong alert
            }
        </script>
        <?php unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị 
        ?>
    <?php endif; ?>
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Khác</h2>
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li class="active">Liên hệ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Contact Main Page Area -->
    <div class="contact-main-page">
        <div class="container">
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8050743583904!2d105.73617257503177!3d21.04048408061179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134550ab1db2433%3A0x9febb50e17509deb!2zMTMgUC4gVHLhu4tuaCBWxINuIELDtCwgWHXDom4gUGjGsMahbmcsIE5hbSBU4burIExpw6ptLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1733062929250!5m2!1svi!2s" width="1105" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Contact Information -->
                <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contact Us</h3>
                        <p class="contact-page-message">If you have any questions that need to be resolved, please leave a message. We will support you wholeheartedly</p>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Address</h4>
                            <h5>HÀ NỘI:</h5>
                            <p>261 Phố Huế, Hai Bà Trưng </p>
                            <h5>THÀNH PHỐ HỒ CHÍ MINH:</h5>
                            <p>73 Lý Tự Trọng, Phường Bến Thành, Quận 1 </p>
                            <h5>ĐÀ NẴNG:</h5>
                            <p>371 Lê Duẩn, Phường Tân Chính, Quận Thanh Khê </p>
                        </div>
                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Phone</h4>
                            <p>Mobile: (84) 976322024</p>
                            <p>Hotline: 1009 653 259</p>
                        </div>
                        <div class="single-contact-block last-child">
                            <h4><i class="fa fa-envelope-o"></i> Email</h4>
                            <p>SneakerStore@gmail.com</p>
                            <p>support@hastech.company</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Tell Us Your Message</h3>
                        <div class="contact-form">
                            <form action="<?= BASE_URL . '?act=contact' ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" id="email" required>
                                </div>

                                <div class="form-group form-group-2">
                                    <label>Message</label>
                                    <textarea name="mo_ta" id="mo_ta" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="kenne-contact-form_btn">Send</button>
                                </div>
                            </form>


                        </div>
                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Main Page Area End -->

</div>

<?php require_once './views/layouts/footer.php'; ?>