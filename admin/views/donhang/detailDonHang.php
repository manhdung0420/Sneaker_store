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
          <h1>Quản lý chi tiết đơn hàng</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  
  <section class="content">
  <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
                if($donHang["trang_thai_id"] == 1){
                    $colorAlerts = 'primary';
                }elseif($donHang["trang_thai_id"] >=2 && $donHang["trang_thai_id"] <=9){
                    $colorAlerts = "warning";
                }elseif($donHang["trang_thai_id"] == 10 ){
                    $colorAlerts = "success";
                }else{
                    $colorAlerts = "danger";
                }        
            ?>  
          <div class="alert alert-<?= $colorAlerts; ?>" role="alert">
             Đơn Hàng: <?= $donHang["ten_trang_thai"] ?>
          </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-cat"></i> Shop sneaker store
                    <small class="float-right">Ngày đặt:<?= formatDate($donHang['ngay_dat']); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Thông tin người đặt
                  <address>
                    <strong><?= $donHang['ho_ten'] ?></strong><br>
                    Email: <?= $donHang['email'] ?><br>
                    Số điện thoại: <?= $donHang['so_dien_thoai'] ?><br>
                  </address>
                </div>
                
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Thông tin đơn hàng
                  <address>
                    <strong>Mã đơn hàng:<?= $donHang['ma_don_hang'] ?></strong><br>
                    Ghi chú: <?= $donHang['ghi_chu'] ?><br>
                    Thanh Toán: <?= $donHang['ten_phuong_thuc'] ?><br>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $tong_tien=0; ?>
                    <?php foreach($sanPhamDonHang as$key =>$sanpham): ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $sanpham['ten_san_pham'] ?></td>
                      <td><?= number_format($sanpham['don_gia'], 0, ',', '.') ?> VND </td>
                      <td><?= $sanpham['so_luong'] ?></td>
                      <td><?= number_format($sanpham['thanh_tien'], 0, ',', '.') ?> VND</td>
                    </tr>
                    <?php $tong_tien += $sanpham['thanh_tien']; ?>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Ngày đặt hàng: <?= $donHang['ngay_dat'] ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Thành Tiền:</th>
                        <td>
                            <?= number_format($tong_tien, 0, ',', '.') ?> VNĐ
                        </td>
                      </tr>
                      <tr>
                        <th>Vận Chuyển:</th>
                        <td>30.000 VNĐ</td>
                      </tr>
                      <tr>
                        <th>Tổng tiền:</th>
                        <td>
                        <?= number_format($tong_tien += 30000 , 0, ',', '.') ?> VNĐ
                      </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
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

</body>

</html>