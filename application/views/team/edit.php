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
                            <h4 class="mb-sm-0 font-size-18">Edit Team</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Team</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>team">Team List</a></li>
                                    <li class="breadcrumb-item active">Edit Team</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Team Details</h4>
                            </div>
                            <div class="card-body p-4">
                                <form method="post" id="team_edit_form" action="<?=base_url()?>department/process" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Team Name</label>
                                                    <input required name="TeamID" class="form-control hidden" type="text" value="<?=$team[0]['TeamID'];?>" id="example-text-input">
                                                    <input required name="TeamName" class="form-control" type="text" value="<?=$team[0]['TeamName'];?>" id="example-text-input">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Select Department</label>
                                                    <select class="form-control" data-trigger name="DeparmentID" id="choices-single-default" placeholder="This is a search placeholder">
                                                        <option value="" selected>Select Department</option>
                                                        <?php 
                                                        foreach($department as $departments){
                                                        //$role[0]['DepartmentName']
                                                        $selection = ($departments["DeparmentID"] == $team[0]['DeparmentID']) ? 'selected' : ''
                                                        ?>
                                                        <option <?=$selection?> value="<?=$departments["DeparmentID"]?>"><?=$departments["DepartmentName"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Select Company</label>
                                                    <select class="form-control" data-trigger name="CompanyID" id="choices-single-default" placeholder="This is a search placeholder">
                                                        <option value="" selected>Select Company</option>
                                                        <?php 
                                                        foreach($company as $company){
                                                        //$role[0]['DepartmentName']
                                                        $selection = ($company["CompanyID"] == $team[0]['CompanyID']) ? 'selected' : ''
                                                        ?>
                                                        <option <?=$selection?> value="<?=$company["CompanyID"]?>"><?=$company["CompanyName"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <input name="TeamStatus" type="checkbox" id="switch1" switch="none" checked />
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