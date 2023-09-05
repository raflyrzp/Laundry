<?php
$rootPath = realpath(__DIR__ . '/../');
include($rootPath . '/config.php')
?>

<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://www.instagram.com/rabbzp_/">Rafly RZP</a>.</strong>
  All rights reserved.
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $base_url ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $base_url ?>/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $base_url ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- overlayScrollbars -->
<script src="<?= $base_url ?>/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $base_url ?>/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= $base_url ?>/assets/dist/js/pages/dashboard.js"></script>

<!-- InputMask -->
<script src="<?= $base_url ?>/assets/plugins/moment/moment.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= $base_url ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?= $base_url ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= $base_url ?>/assets/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?= $base_url ?>/assets/plugins/select2/js/select2.full.min.js"></script>

<script>
  // DATA TABLES
  $(function() {
    $("#example1")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");
    $("#example2").DataTable({
      paging: true,
      lengthChange: false,
      searching: false,
      ordering: true,
      info: true,
      autoWidth: false,
      responsive: true,
    });
  });


  // ALERT EDIT SUCCESS
  $(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('edit_success')) {
      toastr.success('Data berhasil diperbarui.');
    }
  });


  // $(function() {
  //   var Toast = Swal.mixin({
  //     toast: true,
  //     position: "top-end",
  //     showConfirmButton: false,
  //     timer: 3000,
  //   });

  //   $(".toastrDefaultSuccess").click(function() {
  //     toastr.success(
  //       "Berhasil menambahkan data."
  //     );
  //   });
  // });

  // ALERT CREATE SUCCESS
  $(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('create_success')) {
      toastr.success('Berhasil menambahkan data');
    }
  });

  // ALERT CREATE FAILED
  $(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('create_failed')) {
      toastr.error('Gagal menambahkan data');
    }
  });


  $(function() {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Initialize Select2 Elements
    $(".select2bs4").select2({
      theme: "bootstrap4",
    });

    // DATA MASK
    $("[data-mask]").inputmask();
  });
</script>
</body>

</html>