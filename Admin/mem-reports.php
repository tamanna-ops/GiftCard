<?php
session_start();
include 'includes/connection.php';
$lgmail = $_SESSION['admin_login_email'];
$lgname = $_SESSION['admin_login_name'];

if (strlen($lgmail) == 0) {
    header("location: index.php");
} else {

    if (isset($_POST['find_details']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $memb = $_POST['phone'];
        $getMem = $conn->prepare("SELECT mem_name,mem_id,mem_mobile,mem_email FROM tbl_members WHERE mem_mobile='$memb'");
        $getMem->execute();
        $memData = $getMem->fetchAll(PDO::FETCH_ASSOC);
        if (count($memData) > 0) {
            $name = $memData[0]['mem_name'];
            $mem_id = $memData[0]['mem_id'];
            $mem_mobile = $memData[0]['mem_mobile'];
            $mem_email = $memData[0]['mem_email'];


            $getComId = $conn->prepare("SELECT com_id FROM tbl_open_committee WHERE opcom_mem LIKE '%$mem_id%'");
            $getComId->execute();
            $CommitteeId = $getComId->fetchAll(PDO::FETCH_ASSOC);


            foreach ($CommitteeId as $CommitteeId) {
                $commi_id = $CommitteeId['com_id'];
                $getDivident = $conn->prepare("SELECT tbl_committee.com_name,tbl_run_committee.divi_amt,tbl_run_committee.run_com_month FROM tbl_run_committee JOIN tbl_committee ON tbl_committee.com_id=tbl_run_committee.com_id WHERE tbl_run_committee.com_id='$commi_id'");
                $getDivident->execute();
                $get_idData[] = $getDivident->fetchAll(PDO::FETCH_ASSOC);
            }

            $getAllDetails = $conn->prepare("SELECT tbl_members.mem_name,tbl_run_committee.divi_amt, tbl_run_committee.run_com_amt ,tbl_run_committee.run_com_month,tbl_committee.com_name FROM tbl_run_committee JOIN tbl_committee ON tbl_committee.com_id=tbl_run_committee.com_id JOIN tbl_members ON tbl_members.mem_id=tbl_run_committee.opcom_mem_id WHERE tbl_run_committee.opcom_mem_id='$mem_id' ORDER BY tbl_run_committee.run_com_id DESC");
            $getAllDetails->execute();
            $getAllDetaildATA = $getAllDetails->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($getAllDetaildATA) > 0) {
                $details = $getAllDetaildATA;
                echo '
                    <div class="card">
                                    <div class="bg-dark text-white p-2 text-center">
                                        <span class="card-title mx-5">Member Name : '.$name.'</span> 
                                        <span class="card-title mx-5">Mobile : '.$mem_mobile.'</span> 
                                        <span class="card-title mx-5">Email : '.$mem_email.'</span> 
                                    </div>
                                    <div class="card-body">
                                            <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <table class="table align-middle table-striped table-bordered border-2" id="response_table2">
                    <thead>
                        <tr>                            
                            <th>Committee Name</th>
                            <th>Taken Amount(&#8377;)</th>
                            <th>Months</th>
                           
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($getAllDetaildATA as $getAllDetaildATA) {

                    echo '<tr> 

                            <td data-field="name">' . $getAllDetaildATA['com_name'] . '</td>
                            <td data-field="mobile">' . "&#8377;"." ".$getAllDetaildATA['run_com_amt'] . '</td>
                            <td data-field="email">' . $getAllDetaildATA['run_com_month'] . '</td>
                           
                        </tr>';
                }
                echo '</tbody>     
                   </table> 
                   </div> 
                   <div class="col-lg-6 col-md-6 col-sm-12">
                   <table class="table  table-striped table-bordered border-2" id="response_table">
                    <thead>
                        <tr>
                            <th>Committee Name</th>
                            <th>Rate(&#8377;)</th>
                            <th>Months</th>
                           
                        </tr>
                    </thead>
                    <tbody>';
                               
                for ($j = 0; $j < count($get_idData); $j++) 
                {
                    for ($k = 0; $k < count($get_idData[$j]); $k++) 
                    {
                       
                        echo
                        '<tr>
                            <td>' .$get_idData[$j][$k]['com_name'] . '</td>
                            <td>' ."&#8377;"." ".$get_idData[$j][$k]['divi_amt']. '</td>
                            <td>' . $get_idData[$j][$k]['run_com_month']. '</td>
                           
                        </tr>';

                        
                    }
                     
                }
                echo '</tbody>
                    </table>
                         
                    </div>
                    </div>
                   
                </div>

                    </div>
                   ';
                   
            } else {  echo '<h4 class="text-info">Not Participated in Committee</h4>';     }
        } else { echo '<h4 class="text-danger">No Member Found !</h4>'; }
    }
}
