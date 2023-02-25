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
        <title>Add Members || Admin Panel </title>
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
                                    <h3 class="mb-sm-0 font-size-18" style="display: none;" id="headi">Add Members</h3>
                                    <button type="button" class="btn btn-success" onclick="showRow()" id="btnShow"><i class="bx bx-plus"></i>Add Members</button>
                                    <div class="">
                                        <ol class="breadcrumb m-0">
                                            <li>Dashboard / </li>
                                            <li>Add Members</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row" id="regRow" style="display: none;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Basic Information</h4> -->

                                        <form id="myform" method="POST">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="mem_name">Name<span class="text-danger">*</span></label>
                                                        <input id="mem_name" name="mem_name" type="text" class="form-control" placeholder="Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label class="control-label">Mobile<span class="text-danger">*</span></label>
                                                        <input id="mem_mobile" name="mem_mobile" type="number" min="1000000000" max="9999999999" class="form-control" placeholder="Mobile" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="mem_email">Email</label>
                                                        <input id="mem_email" name="mem_email" type="email" class="form-control" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <input type="submit" onclick="return add_member()" value="Add Member" class="btn btn-primary waves-effect waves-light">
                                                <!-- <input type="submit" class="btn btn-primary waves-effect waves-light" id="sa-success" value="Click me"> -->


                                                <button type="button" class="btn btn-secondary waves-effect waves-light" onclick="return CloseRow()">Cancel</button>
                                            </div>
                                        </form>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 mb-2">

                                        </div>



                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="bg-dark text-white p-2">
                                        <h3 class="card-title">All Members</h3>
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
                                                                <th>Member Name</th>
                                                                <th>Member Mobile</th>
                                                                <th>Member Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $getMember = " SELECT * FROM tbl_members WHERE mem_status=1 ORDER BY mem_id DESC";
                                                            $Selectquery = $conn->prepare($getMember);
                                                            $Selectquery->execute();
                                                            $results = $Selectquery->fetchAll(PDO::FETCH_OBJ);
                                                            if ($Selectquery->rowCount() > 0) {
                                                                $sr = 1;
                                                                foreach ($results as $result) {
                                                            ?>
                                                                    <tr>
                                                                        <td data-field="id"><?php echo $sr; ?></td>
                                                                        <td style="display:none" data-field="mem_id"><?php echo htmlentities($result->mem_id); ?></td>
                                                                        <td data-field="name"><?php echo htmlentities($result->mem_name); ?></td>
                                                                        <td data-field="mobile"><?php echo htmlentities($result->mem_mobile); ?></td>
                                                                        <td data-field="email"><?php echo htmlentities($result->mem_email); ?></td>



                                                                        <td style="width: 100px">
                                                                            <a class="btn btn-outline-info btn-sm edit" title="Edit">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                            <a class="btn btn-outline-danger  btn-sm deletes" title="Delete" onclick="return delete_record(<?php echo htmlentities($result->mem_id); ?>)">
                                                                                <i class="fas fa-trash"></i>
                                                                            </a>
                                                                        </td>

                                                                    </tr>
                                                            <?php $sr++;
                                                                }
                                                            } else {
                                                                echo "No Record Found !";
                                                            }
                                                            ?>


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
        <script src="assets/js/addMember.js"></script>

       

    </body>

    </html>
<?php }  ?>