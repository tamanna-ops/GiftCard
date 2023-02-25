<?php 
 error_reporting(0);
include 'includes/connection.php';

if(isset($_POST['reset_password']) && $_SERVER['REQUEST_METHOD']==='POST'){
 $mail=trim($_POST['cust_mail']);

 $getMail=$conn->prepare("SELECT cust_name,cust_password,cust_email FROM tbl_customer WHERE cust_email='$mail'");
 $getMail->execute();
 $cust_data=$getMail->fetchAll(PDO::FETCH_ASSOC);

 if(count($cust_data)>0){
    $name=$cust_data[0]['cust_name'];
    $password=$cust_data[0]['cust_password'];
    $mail1=$cust_data[0]['cust_email'];

    $email_to = $mail1;
    $email_subject = "Password Reset";
    $email_from = "project_email@gmail.com"; 
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $email_message = "<h3>Password For Your cust Account</h3>\n\n";
    $email_message .= "Your Name: ".$name."\n";
    $email_message .= "Password: ".$password."\n";
    $email_message .= "Subject: ".$email_subject."\n";
    $email_message .= "Message: "."Use this Password to Sign In. And then Reset your Password"."\n";
    if(mail($email_to, $email_subject, $email_message, $headers)){
        echo '<script>alert("Password Sent to Your Email Successfully!")</script>';

    }else{
    echo '<script>alert("Password Not Sent")</script>';

    }
 }else{
    echo '<script>alert("Please Enter Registered Email")</script>';
 }

//  echo '<script>location.replace("index.php");</script>';
 

}

?>

<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Recover Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/bc.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary"> Reset Password</h5>
                                            <p>Reset Password with Email</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.php">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo2.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="p-2">
                                    <div class="alert alert-success text-center mb-4" role="alert">
                                        Enter your Email and instructions will be sent to you!
                                    </div>
                                    <form class="form-horizontal" action="#" method="POST">
            
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="useremail" name="cust_mail" placeholder="Enter Your Email">
                                        </div>
                    
                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="reset_password">Reset</button>
                                        </div>
    
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Remember It ? <a href="index.php" class="fw-medium text-primary"> Sign In here</a> </p>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
       <?php include 'script.php'; ?>
    </body>
</html>
