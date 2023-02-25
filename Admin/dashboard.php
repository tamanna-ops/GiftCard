<?php
session_start();
include 'includes/connection.php';
include 'includes/encryption.php';

$lgmail = $_SESSION['admin_login_email'];
$lgname = $_SESSION['admin_login_name'];

if (strlen($lgmail) == 0) {
    header("location: index.php");
} else {
?>
    <!doctype html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark" data-layout-mode="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- ========== Header Start ========== -->
            <?php include 'header.php'; ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php'; 
            ?>

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
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="">
                                        <ol class="breadcrumb m-0">

                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php include 'card-tiles.php'; ?>
                     
                    </div>
                    <!-- container-fluid -->
                </div>
              
                <!-- end modal -->
                <?php include 'footer.php'; ?>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
            
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- JAVASCRIPT -->

        <?php include 'script.php'; ?>

    </body>

    </html>
<?php } ?>