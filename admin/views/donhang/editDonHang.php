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
                    <h1>Sửa trạng thái đơn hàng</h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="btn btn-secondary">Quay lại</a>
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
                        <h3 class="card-title">Thông tin đơn hàng</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="post">
                    <input type="hidden" name="id_don_hang" value="<?= $donHang['id'] ?>">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="trang_thai_don_hang">Trạng thái đơn hàng</label>
                                <select name="trang_thai" id="trang_thai">
                                    <?php foreach ($trangThaiOptions as $option): ?>
                                        <option value="<?= $option['id'] ?>" <?= $donHang['trang_thai_id'] == $option['id'] ? 'selected' : '' ?>>
                                            <?= $option['ten_trang_thai'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
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

</html>