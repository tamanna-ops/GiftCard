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
        <title>Add Product</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- select2 css -->
        <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php include 'header.php';?>
            <?php include 'sidebar.php';?>
            
            

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
                                    <h4 class="mb-sm-0 font-size-18">Add Product</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li>Dashboard /</li>
                                            <li class="breadcrumb-item active">Add Product</li>
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
        
                                        <h4 class="card-title">Basic Information</h4>
                                        <p class="card-title-desc">Fill all information below</p>
        
                                        <form action="/" method="post" class="dropzone">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="productname">Product Name</label>
                                                        <input id="productname" name="productname" type="text" class="form-control" placeholder="Product Name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="manufacturername">Manufacturer Name</label>
                                                        <input id="manufacturername" name="manufacturername" type="text" class="form-control" placeholder="Manufacturer Name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="manufacturerbrand">Manufacturer Brand</label>
                                                        <input id="manufacturerbrand" name="manufacturerbrand" type="text" class="form-control" placeholder="Manufacturer Brand">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="price">Price</label>
                                                        <input id="price" name="price" type="text" class="form-control" placeholder="Price">
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="control-label">Category</label>
                                                        <select class="form-control select2">
                                                            <option>Select</option>
                                                            <option value="FA">Fashion</option>
                                                            <option value="EL">Electronic</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="control-label">Features</label>
        
                                                        <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                                            <option value="WI">Wireless</option>
                                                            <option value="BE">Battery life</option>
                                                            <option value="BA">Bass</option>
                                                        </select>
        
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="productdesc">Product Description</label>
                                                        <textarea class="form-control" id="productdesc" rows="5" placeholder="Product Description"></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                                    
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h4 class="card-title mb-3">Product Images</h4>

                                                            <div class="fallback">
                                                                <input name="file" type="file" multiple />
                                                            </div>
                            
                                                            <div class="dz-message needsclick">
                                                                <div class="mb-3">
                                                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                                </div>
                                                                
                                                                <h4>Drop files here or click to upload.</h4>
                                                        </div>
                                                    </div>
                                    </div>
                                </div>

                                
        
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Description</h4>
                                            <div class="row">
                                            <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="metadescription">Long Description</label>
                                                        <textarea class="form-control" id="metadescription" rows="5" placeholder="Long Description"></textarea>
                                                    </div>
                                                </div>
        
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="metadescription">Redeem Steps</label>
                                                        <textarea class="form-control" id="metadcription" rows="5" placeholder="Redeem Steps"></textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                                    
        
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                            </div>
                                        </form>
        
                                    </div>
                                </div>

                                </div> 
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Tinymce wysihtml5</h4>
                                        <form method="post">
                                            <textarea id="elm1" name="area"></textarea>
                                        </form>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

      

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>

        <!-- dropzone plugin -->
        <script src="assets/libs/dropzone/min/dropzone.min.js"></script>

        <!-- init js -->
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>
        <!-- <script src="assets/libs/tinymce/tinymce.min.js"></script> -->
        <script src="assets/js/pages/form-editor.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>
              
<?php }  ?>