
<?php

session_start();
include 'includes/connection.php';

$lgmail = $_SESSION['admin_login_email'];
if(isset($_POST['add_member'])){
     $mem_name=$_POST['name'];
     $mem_mobile=$_POST['mobile'];
     if(strlen($_POST['email'])==0 || $_POST['email']==""){
        $mem_email="None";
     }else{  $mem_email=$_POST['email']; }
    
    
 $mem_status=1;


 $getMember = "SELECT * FROM tbl_members WHERE mem_mobile='$mem_mobile' OR mem_email='$mem_email'";
 $Selectquery = $conn->prepare($getMember);
 $Selectquery->execute();
 $results = $Selectquery->fetchAll(PDO::FETCH_OBJ);
 if ($Selectquery->rowCount() > 0) {
  echo "0";
 }else{

 $sql= "INSERT INTO tbl_members(mem_name,mem_mobile,mem_email,mem_status) VALUE (:mem_name,:mem_mobile,:mem_email,:mem_status)";
    $query = $conn->prepare($sql);
    $query->bindParam(':mem_name', $mem_name, PDO::PARAM_STR);
    $query->bindParam(':mem_mobile', $mem_mobile, PDO::PARAM_STR);
    $query->bindParam(':mem_email', $mem_email, PDO::PARAM_STR);
    $query->bindParam(':mem_status', $mem_status, PDO::PARAM_STR);
    $query->execute();
    echo "1";
 }
}


// --------------------EDIT------------------------------------------------------------
if(isset($_POST['update'])){
 $mem_id = $_POST['id'];
// echo "hii";
$mem_name = $_POST['name'];
 $mem_email = $_POST['email'];
 $mem_mobile = $_POST['mobile'];
 
 $sqltoupdate = "UPDATE tbl_members SET mem_name='$mem_name', mem_mobile ='$mem_mobile' , mem_email='$mem_email' where mem_id='$mem_id'";
    $querytoupdate = $conn->prepare($sqltoupdate);

     $querytoupdate->execute();
     echo "Updated";
}
    //   header('location:add-member.php');
      
 

?>
  
