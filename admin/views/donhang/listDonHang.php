<!-- header -->
<?php require './views/layouts/header.php'; ?>

<!-- Navbar -->
<?php include './views/layouts/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layouts/sidebar.php'; ?>
<!-- /.sidebar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- Thêm nút Thêm đơn hàng nếu cần -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Người nhận</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listDonHang as $key => $donhang): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $donhang['ma_don_hang'] ?></td>
                                            <td><?= $donhang['ten_nguoi_nhan'] ?></td>
                                            <td><?= $donhang['sdt_nguoi_nhan'] ?></td>
                                            <td><?= $donhang['dia_chi_nguoi_nhan'] ?></td>
                                            <td><?= date('d/m/Y', strtotime($donhang['ngay_dat'])) ?></td>

                                            <td>
                                                <span class="<?php
                                                                if ($donhang['ten_trang_thai'] == 'Đã hủy') {
                                                                    echo 'status-cancel';
                                                                } elseif ($donhang['ten_trang_thai'] == 'Đã giao hàng') {
                                                                    echo 'status-completed';
                                                                } elseif (in_array($donhang['ten_trang_thai'], ['Đã đặt', 'Đã xác nhận', 'Đang giao hàng'])) {
                                                                    echo 'status-pending';
                                                                }
                                                                ?>">
                                                    <?= $donhang['ten_trang_thai'] ?>
                                                </span>
                                            </td>


                                            <td>
                                                <!-- Xem chi tiết đơn hàng -->
                                                <a href="<?= BASE_URL_ADMIN . '?act=detail-don-hang&id=' . $donhang['id'] ?>">
                                                    <button class="btn btn-info"><i class="fas fa-eye"></i></button>
                                                </a>

                                                <!-- Nếu trạng thái đơn hàng là "Đã hủy" thì mới hiển thị nút Xóa -->
                                                <?php if ($donhang['ten_trang_thai'] == 'Hủy đơn' || $donhang['ten_trang_thai'] == 'Giao hàng thành công'): ?>
                                                    <a href="<?= BASE_URL_ADMIN . '?act=xoa-don-hang&id=' . $donhang['id'] ?>"
                                                        onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')">
                                                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Người nhận</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<style>
    .status-cancel {
        background-color: red;
        color: white;
        padding: 3px 10px;
        border-radius: 5px;
    }

    .status-completed {
        background-color: green;
        color: white;
        padding: 3px 10px;
        border-radius: 5px;
    }

    .status-pending {
        background-color: yellow;
        color: black;
        padding: 3px 10px;
        border-radius: 5px;
    }
</style>
</body>

</html>