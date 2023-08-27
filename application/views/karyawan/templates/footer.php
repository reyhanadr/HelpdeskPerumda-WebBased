    <!-- END PAGE CONTENT-->
    <footer class="page-footer">
        <div class="font-13">2023 © <b>Perumda Air Minum Tirta Raharja</b> - All rights reserved.</div>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer>
    </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script>
        // Fungsi untuk pratinjau gambar
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('previewImage');

            var reader = new FileReader();
            reader.onload = function() {
                preview.src = reader.result;
            };

            reader.readAsDataURL(input.files[0]);
        }

            // Tambahkan event listener saat halaman selesai dimuat
            document.addEventListener('DOMContentLoaded', function() {
            var fotoInput = document.getElementById('inputImage');
            fotoInput.addEventListener('change', previewImage);
        });
    </script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?php echo base_url(); ?>assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
            });
        })
    </script>
    <!-- PLUGIN FONTAWESOME -->
    <script src="https://kit.fontawesome.com/eccb17b8b4.js" crossorigin="anonymous"></script>


</body>

</html>