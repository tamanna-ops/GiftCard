<?php
session_start();
include 'includes/connection.php';
$adminid = $_SESSION['admin_login_email'];

$getAdminName = "SELECT * FROM tbl_admin where admin_email='$adminid'";
$adminName = $conn->prepare($getAdminName);
$adminName->execute();
$admin = $adminName->fetch(PDO::FETCH_ASSOC);
?>




<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Profile | Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .avatar-md {
            height: 4.5rem;
            width: 7.5rem;
        }

        .mb-4 {
            margin-bottom: 4.5rem !important;
        }

        /* element.style {
} */
        .avatar-md {
            height: 4.5rem;
            width: 7.5rem;
        }

        .profile-user-wid {
            margin-top: -56px;
        }

        .fas {
            font-family: "Font Awesome 5 Free";
            font-size: 20px;
            font-weight: 900;
            height: 100px;
        }
    </style>


</head>

<body data-sidebar="dark" data-layout-mode="light">



    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include 'header.php'; ?>

        <!-- ========== Left Sidebar Start ========== -->

        <?php include 'sidebar.php'; ?>
        <!-- Left Sidebar End -->




        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Profile</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li><a href="#">Contacts</a>/</li>
                                        <li>Profile</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card overflow-hidden">
                                <div class="bg-primary bg-soft">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="text-primary p-3">
                                                <h5 class="text-primary">Welcome Back !</h5>
                                                <p>It will seem like simplified</p>
                                            </div>
                                        </div>
                                        <div class="col-5 align-self-end">
                                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="avatar-md profile-user-wid mb-4">

                                                <img src="assets/images<?php echo $admin['admin_profile']; ?>" alt="" class="img-thumbnail rounded-circle" height="100px" width="200px">

                                            </div>



                                            <h5 class="font-size-15 text-truncate"><?php echo $admin['admin_name']; ?></h5>
                                            <!-- <p class="text-muted mb-0 text-truncate">Admin</p> -->



                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fas fa-edit fa-fw text-danger"></i></a>
                                        </div>

                                        <div class="col-sm-8">
                                            <!-- <div class="pt-4">

                                                <div class="row">

                                                </div>

                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Personal Information</h4>

                                    <!-- <p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p> -->
                                    <div class="table-responsive">
                                        <table class="table table-nowrap mb-0">
                                            
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Full Name :</th>
                                                    <td><?php echo $admin['admin_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mobile :</th>
                                                    <td><?php echo $admin['admin_mobile']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">E-mail :</th>
                                                    <td><?php echo $admin['admin_email']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address :</th>
                                                    <td><?php echo $admin['admin_address']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- end row -->

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


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="updateprofile.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Full Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="admin_name" value="<?php echo $admin['admin_name']; ?>">

                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Mobile<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Mobile Number" name="admin_mobile" value="<?php echo $admin['admin_mobile']; ?>">

                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">E-mail<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Enter Email" name="admin_email" value="<?php echo $admin['admin_email']; ?>">

                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Address<span class="text-danger">*</span></label>
                            <textarea name="admin_address" class="form-control" placeholder="Enter Full Address"><?php echo $admin['admin_address']; ?></textarea>

                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Profile Picture<span class="text-danger">*</span></label>
                            </br>
                            <input type="file" name="file"><img src="assets/images<?php echo $admin['admin_profile']; ?>" alt="" class="img-thumbnail rounded-circle" height="100px" width="100px">



                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="submit" />
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
    </div> <!-- end preview-->




    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
 
    <script src="assets/js/pages/modal.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>


</body>


</html>