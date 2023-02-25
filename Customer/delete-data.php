<?php
session_start();
include 'includes/connection.php';
 
 
if(isset($_POST['deleteId'])){
 $id=$_POST['deleteId'];
   
    delete_data($conn, $id);
}
// delete data query
function delete_data($conn, $id){
   $mem_status=0;
    $query=$conn->prepare("UPDATE tbl_members SET mem_status=:mem_status WHERE mem_id='$id'");
    $query->bindParam(':mem_status', $mem_status, PDO::PARAM_INT);
    $query->execute();
    echo 1;
   

}
?>