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
        <title>Add Customers || Admin Panel </title>
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
                                    <h3 class="mb-sm-0 font-size-18" style="display: none;" id="headi">Add Customers</h3>
                                    <button type="button" class="btn btn-success" onclick="showRow()" id="btnShow"><i class="bx bx-plus"></i>Add Customers</button>
                                    <div class="">
                                        <ol class="breadcrumb m-0">
                                            <li>Dashboard / </li>
                                            <li>Add Customers</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="bg-dark text-white p-2">
                                        <h3 class="card-title">All Customers</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class=" table-responsive">
                                                    <table class="table table-editable align-middle table-edits table-striped table-bordered border-2" id="myTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th style="display:none" data-field="mem_id"> mem_id</th>
                                                                <th>Customer Name</th>
                                                                <th>Customer Mobile</th>
                                                                <th>Customer Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           
                                                                    <tr>
                                                                        <td data-field="id">Sr hidden</td>
                                                                        <td style="display:none" data-field="mem_id">Hidden id to sebd</td>
                                                                        <td data-field="name">Name</td>
                                                                        <td data-field="mobile">Mobile</td>
                                                                        <td data-field="email">Email</td>
                                                                        <td style="width: 100px">
                                                                            <a class="btn btn-outline-info btn-sm edit" title="Edit">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                            <a class="btn btn-outline-danger  btn-sm deletes" title="Delete" onclick="return delete_record()">
                                                                                <i class="fas fa-trash"></i>
                                                                            </a>
                                                                        </td>

                                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <script src="assets/js/tableJs/table-editable.int.js"></script>
        <script src="assets/js/tableJs/table-edits.min.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/addCustomer.js"></script>

       

    </body>

    </html>
<?php }  ?>