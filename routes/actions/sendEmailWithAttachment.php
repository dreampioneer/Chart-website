<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 require '../../controllers/BaseController.php';
    if($_SESSION['auth_result'] != "true") {
        Redirect('../login.php');
    }

    $mysql = new MySQL();
    $mysql->init_conn();
$file_name=''; 
     if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      // $expensions= array("jpeg","jpg","png","pdf");
      
      // if(in_array($file_ext,$expensions)=== false){
      //    $errors[]="extension not allowed, please choose a PDF, JPEG or PNG file.";
      // }
      
      // if($file_size > 2097152) {
      //    $errors[]='File size must be excately 2 MB';
      // }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../uploads/".$file_name); 
         // echo "Success";
      }else{
         // print_r($errors);
      }
   }

// PHPMailer script below

$email = $_REQUEST['sendto'];
$sendcc = $_REQUEST['sendcc'];  
$body = (!empty($_REQUEST['body'])) ? $_REQUEST['body'] : '';  
$subject = (!empty($_REQUEST['subject'])) ? $_REQUEST['subject'] : '';  
require_once '../../vendor/autoload.php'; 
 
$mail = new PHPMailer(true); 
$mail->IsSMTP();
$mail->SMTPAuth = true; 
//$mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
$mail->Username = "database@kctd.org"; // SMTP username
$mail->Password = "Ss7651!!"; // SMTP password
$mail->Host = 'ssl://mail.kctd.org:465';
$mail->addAttachment("../uploads/".$file_name);
$mail->From = $email;
$mail->AddCC($sendcc);

$mail->addAddress("database@kctd.org", "kctd.org"); // Send From Email Address 
$mail->Subject = $subject;
$mail->Body =$body; 

if(!$mail->Send())
{
   $_SESSION['error'] = "Email Fails to sent";
}else{
	unlink("../uploads/".$file_name); 
	$_SESSION['success'] = "Your email has been sent";
 header("Location: ../leads.php");
} 
?>