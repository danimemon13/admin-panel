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
                            <h4 class="mb-sm-0 font-size-18">Edit <?=$company[0]['CompanyName'];?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>company">Company List</a></li>
                                    <li class="breadcrumb-item active">Edit Company</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?=$company[0]['CompanyName'];?> Company Details</h4>
                            </div>
                            <div class="card-body p-4">
                                <form method="post" id="company_edit_form" action="<?=base_url()?>company/process" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Company Name</label>
                                                    <input required name="CompanyID" class="form-control hidden" type="text" value="<?=$company[0]['CompanyID'];?>" id="example-text-input">
                                                    <input required name="CompanyName" class="form-control" type="text" value="<?=$company[0]['CompanyName'];?>" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-email-input" class="form-label">Company Address</label>
                                                    <textarea name="CompanyAddress" required class="form-control"><?=$company[0]['CompanyAddress'];?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-url-input" class="form-label">Company Logo</label>
                                                    <input name="CompanyLogo" accept="image/*" id="imgInp" class="form-control" type="file" value="<?=base_url()?><?=$company[0]['CompanyLogo'];?>" id="example-url-input">
                                                </div>
                                                <div class="mb-3">
                                                    <img id="thumbnail" class="img-thumbnail" alt="200x200" width="200" src="<?=base_url()?><?=$company[0]['CompanyLogo'];?>" data-holder-rendered="true">
                                                </div>
                                                <input name="CompanyStatus" type="checkbox" id="switch1" switch="none" checked />
                                                <label for="switch1" data-on-label="Active" data-off-label="In-Active"></label>
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