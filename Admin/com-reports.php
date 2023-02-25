<?php
session_start();
include 'includes/connection.php';
$lgmail = $_SESSION['admin_login_email'];
$lgname = $_SESSION['admin_login_name'];

if (strlen($lgmail) == 0) {
    header("location: index.php");
} else {

    if (isset($_POST['find_com_details']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $com_names = trim($_POST['com_names']);
        $getMem = $conn->prepare("SELECT tbl_committee.com_opendate,tbl_committee.com_name,tbl_committee.com_id,tbl_committee.com_duration,tbl_open_committee.opcom_amount FROM tbl_committee JOIN tbl_open_committee ON tbl_open_committee.com_id=tbl_committee.com_id WHERE tbl_committee.com_name='$com_names'");
        $getMem->execute();
        $memData = $getMem->fetchAll(PDO::FETCH_ASSOC);
        if (count($memData) > 0) {
          $name = $memData[0]['com_name'];
          $comm_id = $memData[0]['com_id'];
          $com_duration = $memData[0]['com_duration'];
          $opcom_amount = $memData[0]['opcom_amount'];
          $openDate = $memData[0]['com_opendate'];


          $getDiv=$conn->prepare("SELECT run_com_amt,divi_amt,run_com_month FROM tbl_run_committee WHERE com_id='$comm_id'");
          $getDiv->execute();
          $getAllData= $getDiv->fetchAll(PDO::FETCH_ASSOC);
          $revenue=0;

          for($i=0;$i<count($getAllData);$i++){
            $revenue+= $getAllData[$i]['divi_amt'];
          }
          
          if(count($getAllData)>0){
          echo  '<div class="card">
           
          <div class="card-body">
              <div class="table-responsive">
          <table class="table align-middle table-striped table-bordered border-2 border-solid" id="response_table3">
          <thead>
            <tr>
                <th rowspan="2">Months <i class="bx bx-down-arrow-alt"></i></th>
                <th>'.$name .'<i class="bx bx-right-arrow-alt"></i></th>
                <th>'. date("d/m/Y",strtotime($openDate)).'</th>
            </tr>
            <tr>
                <td>'."Max Value = ".'<strong>'."&#8377;"." ".$opcom_amount.'</strong>'.'</td>
                <td>Total Revenue = '.'<strong>'."&#8377;"." ".$revenue.'</strong>'.'</td>
            </tr>
            
        </thead>
          <tbody>';
          foreach ($getAllData as  $getAllData) {
            echo '<tr>                                
                   <td data-field="email">' .  $getAllData['run_com_month'] . '</td>
                    <td data-field="mobile">' . "&#8377;"." ".$getAllData['run_com_amt'] . '</td>
                    <td data-field="mobile">' ."&#8377;"." ".$getAllData['divi_amt'] . '</td>                    
                </tr>';
        }
        echo '</tbody>     
           </table> 
           </div>
           </div>
           </div>';

           }else{  echo '<h4 class="text-info">Committee Not Participated</h4>';  }
        } else { echo '<h4 class="text-danger">No Committee Found !</h4>'; }
    }
}
