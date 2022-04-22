<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $Dashboard; ?> | Minia - Admin & Dashboard Template</title>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.ico">
    <link href="<?=base_url()?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- preloader css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?=base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
        <!-- DataTables -->
    <link href="<?=base_url()?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?=base_url()?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- dropzone css -->
    <link href="<?=base_url()?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- choices css -->
    <link href="<?=base_url()?>assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.toast.min.css">
  <style>
        @media screen and (min-width: 767px){
            .dt-buttons.btn-group.flex-wrap {
                float: left;
                width: 32%;
                margin-right: 55%;
            }
            div#datatable-company_length {
                float: left;
            }
        }
  </style>  
    
</head>
<!--All Vertical Pages-->


<body <?php echo ($_SESSION["menu_align"] == 'horizontal') ? 'data-topbar="light" data-layout="horizontal"': '';?>>
    <div id="loading"></div>

    <!-- Begin page -->
    <div id="layout-wrapper">