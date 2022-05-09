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
                            <h4 class="mb-sm-0 font-size-18">Add New Payment</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Payments</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>invoices">Payment List</a></li>
                                    <li class="breadcrumb-item active">Add Payment</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Payment Details</h4>
                            </div>
                            <div class="card-body p-4">
                                <form method="post" id="payment_form" action="<?=base_url()?>department/process" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Invoice Code</label>
                                                    <input required name="LeadCode" class="form-control" type="text" value="" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Mode Of Payment</label>
                                                    <select class="form-control" data-trigger name="BrandsID" id="choices-single-default" placeholder="This is a search placeholder">
                                                        <option value="" selected>Select Mode Of Payment</option>
                                                        <option value="1">Stripe</option>
                                                        <option value="2">Bank Transfer</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Account Name</label>
                                                    <select class="form-control" data-trigger name="BrandsID" id="choices-single-default" placeholder="This is a search placeholder">
                                                        <option value="" selected>Select Account Name</option>
                                                        <?php 
                                                        foreach($account as $accounts){
                                                        //$role[0]['DepartmentName']
                                                        ?>
                                                        <option value="<?=$accounts["AccountID"]?>"><?=$accounts["AccountName"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-url-input" class="form-label">Payment Slip</label>
                                                    <input name="PaymentSlip" required accept="image/*" id="imgInp" class="form-control" type="file" id="example-url-input">
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

