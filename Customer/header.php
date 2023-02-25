<?php

$adminid = $_SESSION['admin_login_email'];

$getAdminName = "SELECT * FROM tbl_admin WHERE admin_email='$adminid'";
$adminName = $conn->prepare($getAdminName);
$adminName->execute();
$admin = $adminName->fetch(PDO::FETCH_ASSOC);

?>
<header id="page-topbar">
<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="dashboard.php" class="logo logo-dark">
                <span class="logo-sm">
                    <!-- <img src="assets/images/logo.png" alt="" height="22"> -->
                    <img src="assets/images/logo.png" alt="" height="70px" width="100%">
                </span>
                <span class="logo-lg">
                    <!-- <img src="assets/images/logo-dark.png" alt="" height="17"> -->
                    <img src="assets/images/logo-dark.png" alt="" height="70px" width="100%">
                </span>
            </a>
            

            <a href="dashboard.php" class="logo logo-light">
                <span class="logo-sm">
                    <!-- <img src="assets/images/logo-light.png" alt="" height="22"> -->
                    <img src="assets/images/logo-light.png" alt="" height="70px" width="100%">
                </span>
                <span class="logo-lg">
                    <!-- <img src="assets/images/logo-light.png" alt="" height="19"> -->
                    <img src="assets/images/logo-light.png" alt="" height="70px" width="100%">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
            <li class="nav-item d-none d-sm-inline-block">
      
      <a href="#" class="nav-link">Welcome, <strong title="Admin Name"><?php echo $admin['admin_name']; ?></strong></a>
    </li>
        </button>

        <!-- App Search-->
        <!--<form class="app-search d-none d-lg-block">
            <div class="position-relative">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="bx bx-search-alt"></span>
            </div>
        </form>-->

  
    </div>

    <div class="d-flex">

        <div class="dropdown d-inline-block d-lg-none ms-2">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-magnify"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-search-dropdown">

                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="dropdown d-inline-block">
            

        </div>

       

<!--        
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-bell bx-tada"></i>
                <span class="badge bg-danger rounded-pill"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-notifications-dropdown">
                <div class="p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0" key="t-notifications"> Notifications </h6>
                        </div>
                        <div class="col-auto">
                            <a href="#!" class="small" key="t-view-all"> View All</a>
                        </div>
                    </div>
                </div>
                <div data-simplebar style="max-height: 230px;">
                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                    <i class="bx bx-cart"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex">
                            <img src="assets/images/users/avatar-3.jpg"
                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">James Lemire</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                    <i class="bx bx-badge-check"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="javascript: void(0);" class="text-reset notification-item">
                        <div class="d-flex">
                            <img src="assets/images/users/avatar-4.jpg"
                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Salena Layfield</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-2 border-top d-grid">
                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
                    </a>
                </div>
            </div>
        </div> -->

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!--/<img class="rounded-circle header-profile-user" src="assets/images/users/.jpg"
                    alt="">-->
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">Admin</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="profile.php"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo" href="profile.php"><i class="bx bx-edit font-size-16 align-middle me-1"></i> <span key="t-profile">Change Password</span></a>
                
                <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
            </div>
        </div>

        

        <!-- <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                <i class="bx bx-cog bx-spin"></i>
            </button>
        </div> -->
        

    </div>

    
</div>

</header>
<?php
if (isset($_POST['change_pass'])) {
  $newpassword = ($_POST['newpassword']);
  $confirmPassword = ($_POST['confirmPassword']);
  if ($newpassword == $confirmPassword) {
    $sqltoupdate = "UPDATE tbl_admin SET admin_password=:newpassword WHERE admin_email='$adminid'";
    $querytoupdate = $conn->prepare($sqltoupdate);
    $querytoupdate->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $querytoupdate->execute();
    //--------------------------------------------------------------------------
    if ($querytoupdate) {
      echo '<script>alert("Password Updated successfully")</script>';
      echo '<script>window.location.replace("dashboard.php");</script>';
    } else {
      echo '<script>alert("Password & Confirm Password Does Not Match")</>';
      // echo '<script>window.location.replace("dashboard.php");</script>';
    }
  } else {
    echo '<script>alert("Password & Confirm Password Does Not Match")</script>';
  }
} ?>
    <!-- change pass model -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel">Change Admin Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">New Password<span class="mandatory">*</span></label>
                            <input type="password" class="form-control" name="newpassword" required placeholder="Enter New Password">

                        </div>
                        <div class="mb-3">
                        <label for="inputProduct" class=" col-form-label">Confirm New Password<span class="mandatory">*</span></label>
              <input type="password" class="form-control" name="confirmPassword" required placeholder="Enter Confirm New Password">
                        </div>
                       
                    
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="change_pass">Change</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>