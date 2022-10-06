<?php
$showerror="false";
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $signup_email=$_POST['signupemail'];
    $signup_password=$_POST['signuppassword'];
    $cpassword=$_POST['signupcpassword'];
    $phone_no=$_POST['phno'];
    $hall_name=$_POST['hallname'];
    $room_no=$_POST['roomno'];

    $existsql="SELECT * FROM `users` WHERE user_email='$signup_email'";
    $result=mysqli_query($conn,$existsql);

    $num=mysqli_num_rows($result);
    // $row=mysqli_fetch_assoc($result);
    // $verification_status=$row['user_verification_status'];
    

    if($num > 0){
        // echo "user already exist";
        echo 2;
    }
    else{
        if($signup_password == $cpassword){

            $otp=rand(111111,999999);
            smtp_mailer($signup_email,"OTP for user verification","Your otp is : ".$otp);

            $hash=password_hash($signup_password,PASSWORD_DEFAULT);

            session_start();
            $_SESSION['otp']=$otp;
            $_SESSION['firstname']=$firstname;
            $_SESSION['lastname']=$lastname;
            $_SESSION['signup_email']=$signup_email;
            $_SESSION['password']=$hash;
            $_SESSION['phone_no']=$phone_no;
            $_SESSION['hall-name']=$hall_name;
            $_SESSION['room_no']=$room_no;

            // $sql="INSERT INTO `users` (`first name`, `last name`, `user_email`, `user_password`, `user_phone_no`, `user_hall_name`, `user_room_no`, `otp`, `user_verification_status`, `time`) VALUES ('$firstname', '$lastname', '$signup_email', '$hash', '$phone_no', '$hall_name', '$room_no', '$otp', '0', current_timestamp());";
            // $result=mysqli_query($conn,$sql);
            // if($result){
                $showalert=true;
                // header("location:/mini_project/partials/_verification.php?verification=false&email=$signup_email");
                // exit();
                // echo "Succesfully inserted";
                echo 1;
            // }
        }
        else{
            // echo "password doesn't match";
            echo 0;
        }
    }
    // header("location:/mini_project/index.php?signupsuccess=false&error=$showerror");
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