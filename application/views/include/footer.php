
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js"></script>

<script>
    $(document).ready(function() {
        <?php if($this->uri->segment(1)=='company' && $this->uri->segment(2)=='add'){
        ?>
        
        
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                thumbnail.src = URL.createObjectURL(file)
            }
            }
            <?php
        }?>
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
    function delete_company(){
        bootbox.dialog({
            message: "Are you sure you want to Delete ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
            success: {
            label: "No",
            className: "btn-success",
            callback: function() {
            $('.bootbox').modal('hide');
            }
            },
            danger: {
            label: "Delete!",
            className: "btn-danger",
            callback: function() {
            $.ajax({
            type: 'POST',
            url: 'deleteRecords.php',
            data: 'empid=1'
            })
            .done(function(response){
            bootbox.alert(response);
            parent.fadeOut('slow');
            })
            .fail(function(){
            bootbox.alert('Error....');
            })
            }
            }
            }
            });
    }
    $(function(){
        $("#company_form").submit(function(e){
            e.preventDefault();
            //company_form
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>company/process',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    // setting a timeout
                    spinner.show();
                },
                success: function (data) {
                    $(".modal-body").html(data);
                    $("#exampleModalToggleLabel").html("Company Details")
                    $("#firstmodal").modal('toggle');
                },
                complete: function() {
                    spinner.hide();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
        


    
    

</script>
<div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Show a second modal and hide this one with the button below.</p>
            </div>
            <div class="modal-footer">
                <!-- Toogle to second dialog -->
                <button class="btn btn-primary" data-bs-target="#secondmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Open Second Modal</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>