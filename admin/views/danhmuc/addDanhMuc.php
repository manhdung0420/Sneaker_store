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
                    <h1>Quản lý danh sách danh mục</h1>
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

                        <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?>" method="post" enctype="multipart/form-data">
                            <div class="row card-body ">
                                <div class="form-group col-12">
                                    <label>Tên danh mục</label>
                                    <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên danh mục">
                                    <span class="text-danger">
                                        <?= !empty($_SESSION["errors"]["ten_danh_muc"]) ? $_SESSION["errors"]["ten_danh_muc"] : '' ?>
                                        <!--ở đây là toán tử 3 ngôi  -->
                                    </span>
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