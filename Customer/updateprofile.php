<?php 
session_start();
include 'includes/connection.php';
$adminid = $_SESSION['admin_login_email'];   

$admin_name = $_POST['admin_name'];
   $admin_email = $_POST['admin_email'];
    $admin_mobile = $_POST['admin_mobile'];
$admin_address = $_POST['admin_address'];
$filename=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];
 $location="assets/images";
 move_uploaded_file($tmp_name,$location.$filename);
 
 if($filename==''){
   $getAdminName = "SELECT admin_profile FROM tbl_admin where admin_email='$adminid'";
   $adminProfile = $conn->prepare($getAdminName);
   $adminProfile->execute();
   $admin = $adminProfile->fetch(PDO::FETCH_ASSOC);
   $filename=$admin['admin_profile'];
}
    
    
   $sqltoupdate = "UPDATE tbl_admin SET admin_name='$admin_name', admin_email='$admin_email', admin_profile='$filename', admin_address='$admin_address', admin_mobile ='$admin_mobile' where admin_email='$adminid'";
    $querytoupdate = $conn->prepare($sqltoupdate);

     $querytoupdate->execute();
     header('location:profile.php');

?>
