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
                    <h1>Sửa thông tin danh mục <?= $danhMuc['ten_danh_muc'] ?></h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="btn btn-secondary">Quay lại</a>
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
                        <h3 class="card-title">Thông tin danh mục</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id_danh_muc" value="<?= $danhMuc['id'] ?>">
                            <div class="form-group">
                                <label for="ten_danh_muc">Tên danh mục</label>
                                <input type="text" id="ten_danh_muc" name="ten_danh_muc" class="form-control" value="<?= $danhMuc['ten_danh_muc'] ?>">
                                <span class="text-danger">
                                    <?= !empty($_SESSION["errors"]["ten_danh_muc"]) ? $_SESSION["errors"]["ten_danh_muc"] : '' ?>
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