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
                            <h4 class="mb-sm-0 font-size-18">Add New Invoice</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>invoices">Invoice List</a></li>
                                    <li class="breadcrumb-item active">Add Invoice</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Invoice Details</h4>
                            </div>
                            <div class="card-body p-4">
                                <form method="post" id="invoice_form" action="<?=base_url()?>department/process" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Lead Code</label>
                                                    <input required name="LeadCode" class="form-control" type="text" value="" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Amount</label>
                                                    <input required name="amount" class="form-control" type="number" value="" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Select Currency</label>
                                                    <select class="form-control" data-trigger name="currency" id="choices-single-default" placeholder="This is a search placeholder">
                                                        <option value="" selected>Select Currency</option>
                                                        <?php 
                                                        foreach($currency as $currencys){
                                                        //$role[0]['DepartmentName']
                                                        ?>
                                                        <option value="<?=$currencys["CurrencyShortCode"]?>"><?=$currencys["CurrencyShortCode"]?></option>
                                                        <?php } ?>
                                                    </select>
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

