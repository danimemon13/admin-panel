    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Add New Leads</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Leads</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>leads">Leads List</a></li>
                                    <li class="breadcrumb-item active">Add Lead</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Leads Details</h4>
                            </div>
                            <div class="card-body p-4">
                                <form method="post" id="lead_form" action="<?=base_url()?>department/process" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Customer Name</label>
                                                    <input required name="CustomerName" class="form-control" type="text" value="" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Customer Email</label>
                                                    <input required name="CustomerEmail" class="form-control" type="email" value="" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Customer Number</label>
                                                    <input required name="CustomerNumber" class="form-control" type="number" value="" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Select Website</label>
                                                    <select class="form-control" data-trigger name="BrandsID" id="choices-single-default" placeholder="This is a search placeholder">
                                                        <option value="" selected>Select Website</option>
                                                        <?php 
                                                        foreach($brands as $brand){
                                                        //$role[0]['DepartmentName']
                                                        ?>
                                                        <option value="<?=$brand["BrandsID"]?>"><?=$brand["BrandsName"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end cardaa -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        
    </div>
    <!-- end main content-->