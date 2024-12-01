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
          <h1>Quản lý liên hệ</h1>
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
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên người liên hệ</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th>Thao tác</th>
                  </tr>
                  
                </thead>
                  
                  <tbody>
                  <?php foreach($listLienHe as $key=>$lienhe):?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $lienhe['name'] ?></td>
                      <td><?= $lienhe['email'] ?></td>
                      <td><?= $lienhe['mo_ta'] ?></td>
                      
                      <td>
                        
                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-lien-he&id_lien_he=' . $lienhe['id'] ?>" 
                        onclick="return confirm('bạn có đồng ý xóa hay không')">
                          <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </a>
                        
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Tên người liên hệ</th>
                    <th>Email</th>
                    <th>Nội dung</th>
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
<!-- Code injected by live-server -->

</body>

</html>