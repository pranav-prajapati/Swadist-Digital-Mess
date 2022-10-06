<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
    session_start();
    include 'connection.php';
    $email=$_POST['loginemail1'];
	$password=$_POST['updatepassword'];
	
	$existsql="SELECT * FROM `users` WHERE user_email='$email'";
    $result=mysqli_query($conn,$existsql);

    $num=mysqli_num_rows($result);
    
    

    if($num == 1){
		$otp=rand(111111,999999);
		$hash=password_hash($password,PASSWORD_DEFAULT);
	
		$order_confirm=smtp_mailer($email,"OTP to set new password","Your otp is : ".$otp);
	
		$_SESSION['loginemail']=$email;
		$_SESSION['updatepassword']=$hash;
		$_SESSION['updateotp']=$otp;
	
		if($order_confirm === 1){
            echo 1;
        }
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