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
                <div class="col-sm-11">
                    <h1>Sửa thông tin sản phẩm <?= $sanPham['ten_san_pham'] ?></h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Quat lại</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                            <div class="form-group">
                                <label for="ten_san_pham">Tên sản phẩm</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["ten_san_pham"]) ? $_SESSION["errors"]["ten_san_pham"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="gia_san_pham">Giá sản phẩm</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["gia_san_pham"]) ? $_SESSION["errors"]["gia_san_pham"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["gia_khuyen_mai"]) ? $_SESSION["errors"]["gia_khuyen_mai"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["hinh_anh"]) ? $_SESSION["errors"]["hinh_anh"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="so_luong">Số Lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["so_luong"]) ? $_SESSION["errors"]["so_luong"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="inputStatus">Danh mục sản phẩm</label>
                                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                    <?php foreach ($listDanhMuc as $danhMuc) :  ?>
                                        <option <?= $danhMuc["id"] == $sanPham["danh_muc_id"] ? 'selected' : '' ?> value="<?= $danhMuc["id"]; ?>"><?= $danhMuc["ten_danh_muc"]; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["danh_muc_id"]) ? $_SESSION["errors"]["danh_muc_id"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>



                            <!-- Thêm Size -->
                            <div class="form-group">
                                <label>Chọn Size</label>
                                <select class="form-control" name="size">
                                    <option selected disabled>Chọn size sản phẩm</option>
                                    <option <?= $sanPham["size"] == 35 ? 'selected' : '' ?> value="35">35</option>
                                    <option <?= $sanPham["size"] == 36 ? 'selected' : '' ?> value="36">36</option>
                                    <option <?= $sanPham["size"] == 37 ? 'selected' : '' ?> value="37">37</option>
                                    <option <?= $sanPham["size"] == 38 ? 'selected' : '' ?> value="38">38</option>
                                    <option <?= $sanPham["size"] == 39 ? 'selected' : '' ?> value="39">39</option>
                                    <option <?= $sanPham["size"] == 40 ? 'selected' : '' ?> value="40">40</option>
                                    <option <?= $sanPham["size"] == 41 ? 'selected' : '' ?> value="41">41</option>
                                    <option <?= $sanPham["size"] == 42 ? 'selected' : '' ?> value="42">42</option>
                                </select>
                            </div>

                            <!-- Thêm Màu -->
                            <div class="form-group">
                                <label>Chọn Màu</label>
                                <select class="form-control" name="mau">
                                    <option selected disabled>Chọn màu sản phẩm</option>
                                    <option <?= $sanPham["mau"] == 'Red' ? 'selected' : '' ?> value="Red">Red</option>
                                    <option <?= $sanPham["mau"] == 'Green' ? 'selected' : '' ?> value="Green">Green</option>
                                    <option <?= $sanPham["mau"] == 'yellow' ? 'selected' : '' ?> value="yellow">Yellow</option>
                                    <option <?= $sanPham["mau"] == 'Black' ? 'selected' : '' ?> value="Black">Black</option>
                                    <option <?= $sanPham["mau"] == 'White' ? 'selected' : '' ?> value="White">White</option>
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="ngay_nhap">Ngày nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["ngay_nhap"]) ? $_SESSION["errors"]["ngay_nhap"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="trang_thai">Trạng thái sản phẩm</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                    <option <?= $sanPham["trang_thai"] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                                    <option <?= $sanPham["trang_thai"] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>
                                </select>
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["trang_thai"]) ? $_SESSION["errors"]["trang_thai"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="mo_ta">Mô tả sản phẩm</label>
                                <input type="text" id="mo_ta" name="mo_ta" class="form-control" value="<?= $sanPham['mo_ta'] ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["mo_ta"]) ? $_SESSION["errors"]["mo_ta"] : '' ?>
                                    <!--ở đây là toán tử 3 ngôi  -->
                                </span>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layouts/footer.php'; ?>
<!-- End Footer -->

</body>
<!-- <script>
    var faqs_row = <?= count($listAnhSanPham); ?>;

    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="https://cdn.mobilecity.vn/mobilecity-vn/images/2021/12/tong-hop-meo-giup-ban-chup-nhung-buc-anh-dep-hon-ve-thu-cung-cua-minh.jpg.webp" style="width: 50px; height: 50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img_delete')
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script> -->

</html>