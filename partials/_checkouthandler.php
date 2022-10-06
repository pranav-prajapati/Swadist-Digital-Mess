<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $address=$_POST['address'];
    $payment=$_POST['paymentmethod'];
    $session_id=$_SESSION['user_id'];
    $email=$_SESSION['email'];
    
    
    $otp=rand(111111,999999);
   
    $_SESSION['checkoutotp']=$otp;
    $_SESSION['address']=$address;
    $_SESSION['payment_mode']=$payment;
        
    $order_confirm=smtp_mailer($email,"OTP to confirm Your order","Your otp is : ".$otp);

    
        if($order_confirm === 1){
            echo 1;
        }
        else{
            echo 0;
        }  
}

function smtp_mailer($to,$subject, $msg){
	require_once("C:/xampp1/htdocs/mini_project/partials/smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "pra9prajapati@gmail.com";
	$mail->Password = "@pra9prajapati#";
	$mail->SetFrom("pra9prajapati@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		echo "Mailer Error: " . $mail->ErrorInfo;
	}else{
		return 1;
	}
}
?>




























<!-- #codeByPra9 -->