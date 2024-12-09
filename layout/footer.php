<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="assets-template/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 4 -->
<script src="assets-template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<!-- ChartJS -->
<script src="assets-template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets-template/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets-template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets-template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets-template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets-template/plugins/moment/moment.min.js"></script>
<script src="assets-template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets-template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets-template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets-template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets-template/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets-template/dist/js/pages/dashboard.js"></script>

<script src="assets-template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets-template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets-template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- load font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<!-- Load CKEditor 5 CDN -->
<script type="importmap">
            {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
                }
            }
        </script>
        <script type="module">
            import {
                ClassicEditor,
                Essentials,
                Paragraph,
                Bold,
                Italic,
                Font
            } from 'ckeditor5';

            ClassicEditor
                .create( document.querySelector( '#alamat' ), {
                    plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                    toolbar: [
						'undo', 'redo', '|', 'bold', 'italic', '|',
						'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( error => {
                    console.error( error );
                } );
        </script>


<script>
  new DataTable('#table');
</script>

<!-- data table client side -->
<script>
  $(function () {
    $('#example2').DataTable();
  });
</script>

<!-- data table server side -->
<script>
  new DataTable('#serverside', {
    ajax: {
      "url" : 'mahasiswa-serverside.php?action=table_data',
      "dataType" : "json",
      "type" : "POST",
    },
    columns: [
      {"data" : "no"},
      {"data" : "nama"},
      {"data" : "prodi"},
      {"data" : "jk"},
      {"data" : "telepon"},
      {"data" : "aksi"},
    ],
    processing: true,
    serverSide: true
  });
</script>

</body>
</html>
