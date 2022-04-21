
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
<?php if($this->uri->segment(1)=='dashboard'){?>
<!-- dashboard init -->
<script src="<?=base_url()?>assets/js/pages/dashboard.init.js"></script>
<?php } ?>

<!-- dropzone js -->
<script src="<?=base_url()?>assets/libs/dropzone/min/dropzone.min.js"></script>

<script src="<?=base_url()?>assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- init js -->
<script src="<?=base_url()?>assets/js/pages/form-advanced.init.js"></script>
<script src="<?=base_url()?>assets/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js"></script>
<script src="<?=base_url()?>assets/js/node_modules/socket.io/client-dist/socket.io.js"></script>
<!-- choices js -->
<script>
    
    var socket = io('http://localhost:3000', { transports : ['websocket'] });
   //var socket = io.connect( 'http://localhost:3000' );

</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.toast.js"></script>
<script>
    function roledatatable(){
        //datatable-role
        //Buttons examples
        table = $('#datatable-role').DataTable();
        table.destroy();
        var table = $('#datatable-role').DataTable({
            "ajax": "<?=base_url()?>role/response",
            dom: 'Blfrtip'
        });

        table.buttons().container()
            .appendTo('#datatable-role_wrapper .col-md-6:eq(0)');
    }
    function companydatatable(){
        //Buttons examples
        table = $('#datatable-company').DataTable();
        table.destroy();
        var table = $('#datatable-company').DataTable({
            "ajax": "<?=base_url()?>company/response",
            dom: 'Blfrtip'
        });

        table.buttons().container()
            .appendTo('#datatable-company_wrapper .col-md-6:eq(0)');
    }
    function departmentdatatable(){
        table = $('#datatable-department').DataTable();
        table.destroy();
        var table = $('#datatable-department').DataTable({
            "ajax": "<?=base_url()?>department/response",
            dom: 'Blfrtip'
        });

        table.buttons().container()
            .appendTo('#datatable-department_wrapper .col-md-6:eq(0)');
    }
    function teamdatatable(){
        table = $('#datatable-team').DataTable();
        table.destroy();
        var table = $('#datatable-team').DataTable({
            "ajax": "<?=base_url()?>team/response",
            dom: 'Blfrtip'
        });

        table.buttons().container()
            .appendTo('#datatable-team_wrapper .col-md-6:eq(0)');
    }
    function regiondatatable(){
        table = $('#datatable-region').DataTable();
        table.destroy();
        var table = $('#datatable-region').DataTable({
            "ajax": "<?=base_url()?>region/response",
            dom: 'Blfrtip'
        });

        table.buttons().container()
            .appendTo('#datatable-region_wrapper .col-md-6:eq(0)');
    }
    $(document).ready(function() {
        
        var user = '<?=$_SESSION["is_login"]?>';
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
        regiondatatable();
        teamdatatable();
        roledatatable();
        companydatatable();
        departmentdatatable();
           
    });
    function delete_company(CompanyID){
        var CompanyID = CompanyID;
        var user = '<?=$_SESSION["is_login"]?>';
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
            url: '<?=base_url()?>company/delete',
            data: 'CompanyID='+CompanyID
            })
            .done(function(response){
                bootbox.alert({
                    message: response,
                    callback: function () {
                        companydatatable();
                        socket.emit( 'DeleteCompany', { userid: user, message: "Delete The Company" } );
                    }  
                });
            })
            .fail(function(){
            bootbox.alert('Error....');
            })
            }
            }
            }
        });
    }
    function delete_department(DeparmentID){
        var DeparmentID = DeparmentID;
        var user = '<?=$_SESSION["is_login"]?>';
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
            url: '<?=base_url()?>department/delete',
            data: 'DeparmentID='+DeparmentID
            })
            .done(function(response){
                bootbox.alert({
                    message: response,
                    callback: function () {
                        departmentdatatable();
                        socket.emit( 'DeleteDeparment', { userid: user, message: "Delete The Deparment" } );
                    }  
                });
            })
            .fail(function(){
            bootbox.alert('Error....');
            })
            }
            }
            }
        });
    }
    function delete_role(RoleID){
        var RoleID = RoleID;
        var user = '<?=$_SESSION["is_login"]?>';
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
            url: '<?=base_url()?>role/delete',
            data: 'RoleID='+RoleID
            })
            .done(function(response){
                bootbox.alert({
                    message: response,
                    callback: function () {
                        roledatatable();
                        socket.emit( 'DeleteRole', { userid: user, message: "Delete The Role" } );
                    }  
                });
            })
            .fail(function(){
            bootbox.alert('Error....');
            })
            }
            }
            }
        });
    }
    function get_role(value){
        var RoleID = value;
        $.ajax({
            type:'post',
            url:'<?=base_url()?>permission/permission_response',
            data:{'RoleID':RoleID},
            success:function(response){
                $("#response").html(response)
            }
        });
    }
    $(function(){
        
        socket.on( 'addDepartment', function( data ) {
            $("#btn_bell").addClass("shaker");
            setTimeout(function(){
                $("#btn_bell").removeClass("shaker");
            },1000);
            $.toast({
                heading: 'Information',
                position: 'bottom-right',
                text: data.message,
                stack: false,
                icon: 'info',
                loader: true,        // Change it to false to disable loader
                loaderBg: '#9EC600'  // To change the background
            });
            departmentdatatable();
        });
        socket.on( 'addRole', function( data ) {
            $("#btn_bell").addClass("shaker");
            setTimeout(function(){
                $("#btn_bell").removeClass("shaker");
            },1000);
            $.toast({
                heading: 'Information',
                position: 'bottom-right',
                text: data.message,
                stack: false,
                icon: 'info',
                loader: true,        // Change it to false to disable loader
                loaderBg: '#9EC600'  // To change the background
            });
            roledatatable();
        });
        socket.on( 'addCompany', function( data ) {
            $("#btn_bell").addClass("shaker");
            setTimeout(function(){
                $("#btn_bell").removeClass("shaker");
            },1000);
            $.toast({
                heading: 'Information',
                position: 'bottom-right',
                text: data.message,
                stack: false,
                icon: 'info',
                loader: true,        // Change it to false to disable loader
                loaderBg: '#9EC600'  // To change the background
            });
            companydatatable();
        });
        socket.on( 'DeleteCompany', function( data ) {
            $("#btn_bell").addClass("shaker");
            setTimeout(function(){
                $("#btn_bell").removeClass("shaker");
            },1000);
            $.toast({
                heading: 'Error',
                position: 'bottom-right',
                text: data.message,
                stack: false,
                icon: 'error',
                loader: true,        // Change it to false to disable loader
                loaderBg: '#9EC600'  // To change the background
            });
            companydatatable();
        });
        socket.on( 'DeleteDeparment', function( data ) {
            $("#btn_bell").addClass("shaker");
            setTimeout(function(){
                $("#btn_bell").removeClass("shaker");
            },1000);
            $.toast({
                heading: 'Error',
                position: 'bottom-right',
                text: data.message,
                stack: false,
                icon: 'error',
                loader: true,        // Change it to false to disable loader
                loaderBg: '#9EC600'  // To change the background
            });
            departmentdatatable();
        });
        var user = '<?=$_SESSION["is_login"]?>';
        /*Company Functions */
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
                    socket.emit( 'addCompany', { userid: user, message: "New Company Added" } );
                    
                },
                complete: function() {
                    spinner.hide();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        $("#company_edit_form").submit(function(e){
            e.preventDefault();
            //company_form
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>company/edit_process',
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
                    socket.emit( 'addCompany', { userid: user, message: "New Company Added" } );
                    
                },
                complete: function() {
                    spinner.hide();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        /*Company Functions End*/
        
        /* Department Functions */
        $("#department_form").submit(function(e){
            e.preventDefault();
            //company_form
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>department/process',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    // setting a timeout
                    spinner.show();
                },
                success: function (data) {
                    $(".modal-body").html(data);
                    $("#exampleModalToggleLabel").html("Department Details")
                    $("#firstmodal").modal('toggle');
                    socket.emit( 'addDepartment', { userid: user, message: "New Department Added" } );
                    
                },
                complete: function() {
                    spinner.hide();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        $("#department_edit_form").submit(function(e){
            e.preventDefault();
            //company_form
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>department/edit_process',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    // setting a timeout
                    spinner.show();
                },
                success: function (data) {
                    $(".modal-body").html(data);
                    $("#exampleModalToggleLabel").html("Department Details")
                    $("#firstmodal").modal('toggle');
                    socket.emit( 'addDepartment', { userid: user, message: "New Department Added" } );
                    
                },
                complete: function() {
                    spinner.hide();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        /* Department Functions End*/
        //
        //
        /* Role Functions */
        $("#role_form").submit(function(e){
            e.preventDefault();
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>role/process',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    // setting a timeout
                    spinner.show();
                },
                success: function (data) {
                    $(".modal-body").html(data);
                    $("#exampleModalToggleLabel").html("Role Details")
                    $("#firstmodal").modal('toggle');
                    socket.emit( 'addRole', { userid: user, message: "New Department Added" } );
                    
                },
                complete: function() {
                    spinner.hide();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        $("#role_edit_form").submit(function(e){
            e.preventDefault();
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>role/edit_process',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    // setting a timeout
                    spinner.show();
                },
                success: function (data) {
                    $(".modal-body").html(data);
                    $("#exampleModalToggleLabel").html("Role Details")
                    $("#firstmodal").modal('toggle');
                    socket.emit( 'addRole', { userid: user, message: "New Department Added" } );
                    
                },
                complete: function() {
                    spinner.hide();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        /* Role Functions End*/
        //
        $("#team_form").submit(function(e){
            e.preventDefault();
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>team/process',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    // setting a timeout
                    spinner.show();
                },
                success: function (data) {
                    $(".modal-body").html(data);
                    $("#exampleModalToggleLabel").html("Team Details")
                    $("#firstmodal").modal('toggle');
                    socket.emit( 'addRole', { userid: user, message: "New Department Added" } );
                    
                },
                complete: function() {
                    spinner.hide();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
        $("#team_edit_form").submit(function(e){
            e.preventDefault();
            var spinner = $('#loading');
            
            var formData = new FormData(this);
            $.ajax({
                url: '<?=base_url()?>team/edit_process',
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    // setting a timeout
                    spinner.show();
                },
                success: function (data) {
                    $(".modal-body").html(data);
                    $("#exampleModalToggleLabel").html("Team Details")
                    $("#firstmodal").modal('toggle');
                    socket.emit( 'addRole', { userid: user, message: "New Department Added" } );
                    
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
function shortcut(value){
    var url = '<?=base_url()?>'+value.toLowerCase();
    window.location.href = url;
}        


    


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