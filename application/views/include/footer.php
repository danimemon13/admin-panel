
<!-- Required datatable js -->
<script src="<?=base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?=base_url()?>assets/js/pages/datatables.init.js"></script>
<!-- App js -->

<!-- apexcharts -->
<script src="<?=base_url()?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="<?=base_url()?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- dashboard init -->
<script src="<?=base_url()?>assets/js/pages/dashboard.init.js"></script>


<!-- dropzone js -->
<script src="<?=base_url()?>assets/libs/dropzone/min/dropzone.min.js"></script>



<script src="<?=base_url()?>assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                thumbnail.src = URL.createObjectURL(file)
            }
            }
        //Buttons examples
        var table = $('#datatable-company').DataTable({
            "ajax": "<?=base_url()?>company/response",
            dom: 'Blfrtip'
        });

        table.buttons().container()
            .appendTo('#datatable-company_wrapper .col-md-6:eq(0)');

            var table = $('#datatable-department').DataTable({
            "ajax": "<?=base_url()?>department/response",
            dom: 'Blfrtip'
        });

        table.buttons().container()
            .appendTo('#datatable-department_wrapper .col-md-6:eq(0)');
    });
    


    
    

</script>
</body>

</html>