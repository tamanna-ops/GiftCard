<?php
session_start();
include 'includes/connection.php';
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
        <title>Committee Report || Admin Panel </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <!-- DataTables -->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body data-sidebar="dark" data-layout-mode="light">

        <!-- Begin page -->
        <div id="layout-wrapper">
            <?php include 'header.php'; ?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php'; ?>
            <!-- Left Sidebar End -->
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
                                    <h3 class="mb-sm-0 font-size-18">Committee Report</h3>
                                    <!-- <button type="button" class="btn btn-success" onclick="showRow()" id="btnShow"><i class="bx bx-plus"></i>Committee Report</button> -->
                                    <div class="">
                                        <ol class="breadcrumb m-0">
                                            <li>Dashboard / Report /</li>
                                            <li>Committee Report</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Basic Information</h4> -->

                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-lg-3 col-lg-4 col-sm-8 mb-2">
                                                    <div class="mb-3">
                                                        <label for="mem_name">Committee Name<span class="text-danger">*</span></label>
                                                        <input id="com_names" name="com_name" type="text" class="form-control" placeholder="Committee Name" required>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-lg-4 col-sm-4">
                                                    <div class="mt-4">
                                                        <input type="submit" value="Find" name="find_com_details" onclick="return find_com()" class="btn btn-primary waves-effect waves-light">
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                     
                        <div class="row">
                            <div class="col-12">
                            

                                    <div id="finalResult"></div>
                                   
                                    <div id="chartContainer"></div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->



                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include 'footer.php'; ?>
        </div>
        <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Table Editable plugin -->

        <!-- App js -->
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/memrepo.js"></script>
    </body>

    </html>
<?php }  ?>