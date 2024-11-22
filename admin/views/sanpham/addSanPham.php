<!-- header -->
<?php require './views/layouts/header.php'; ?>
<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh sách sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Sản Phẩm</h3>
                        </div>

                        <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="post" enctype="multipart/form-data">
                            <div class="row card-body ">
                                <div class="form-group col-12">
                                    <label>Tên sản Phẩm</label>
                                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["ten_san_pham"]) ? $_SESSION["errors"]["ten_san_pham"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-6">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập Giá sản phẩm">
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["gia_san_pham"]) ? $_SESSION["errors"]["gia_san_pham"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-6">
                                    <label>giá khuyến mãi</label>
                                    <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["gia_khuyen_mai"]) ? $_SESSION["errors"]["gia_khuyen_mai"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-6">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh" placeholder="Nhập Hình ảnh">
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["hinh_anh"]) ? $_SESSION["errors"]["hinh_anh"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-6">
                                    <label>Album ảnh</label>
                                    <input type="file" class="form-control" name="img_array[]" multiple>
                                </div>

                                <div class="form-group col-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" name="so_luong" placeholder="Nhập Số lượng">
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["so_luong"]) ? $_SESSION["errors"]["so_luong"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-6">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>

                                        <?php foreach ($listDanhMuc as $danhMuc) : ?>
                                            <option value="<?= $danhMuc["id"] ?>"><?= $danhMuc["ten_danh_muc"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["danh_muc_id"]) ? $_SESSION["errors"]["danh_muc_id"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <!-- Thêm Size -->
                                <div class="form-group col-6">
                                    <label>Chọn Size</label>
                                    <select class="form-control" name="size">
                                        <option selected disabled>Chọn size sản phẩm</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                    </select>
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["size"]) ? $_SESSION["errors"]["size"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <!-- Thêm Màu -->
                                <div class="form-group col-6">
                                    <label>Chọn Màu</label>
                                    <select class="form-control" name="mau">
                                        <option selected disabled>Chọn màu sản phẩm</option>
                                        <option value="Red">Red</option>
                                        <option value="Green">Green</option>
                                        <option value="Yellow">Yellow</option>
                                        <option value="Black">Black</option>
                                        <option value="White">White</option>
                                    </select>
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["mau"]) ? $_SESSION["errors"]["mau"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap" placeholder="Nhập Ngày nhập">
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["ngay_nhap"]) ? $_SESSION["errors"]["ngay_nhap"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-6">
                                    <label>Trang Thai</label>
                                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn trạng thái sản phẩm</option>
                                        <option value="1">Còn bán</option>
                                        <option value="2">Dừng bán</option>
                                    </select>
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["trang_thai"]) ? $_SESSION["errors"]["trang_thai"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
                                </div>

                                <div class="form-group col-12">
                                    <label>Mô tả</label>
                                    <textarea name="mo_ta" id="" class="form-control" placeholder="Nhập mô tả"></textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
<!-- End Footer -->


</body>

</html>