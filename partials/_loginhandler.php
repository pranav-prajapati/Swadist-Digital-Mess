<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connection.php';
    $email=$_POST['loginemail'];
    $password=$_POST['loginpassword'];
    $sql="SELECT * FROM users WHERE user_email='$email'";
    $result=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);

    if($num==1){
        $row=mysqli_fetch_assoc($result);
        
        if(password_verify($password,$row['user_password'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$row['first name'];
            $_SESSION['lastname']=$row['last name'];
            $_SESSION['user_id']=$row['id'];
            $_SESSION['email']=$row['user_email'];
            header('location:/mini_project/index.php');
            // echo $_SESSION['user_id'];
        }
        else{
            // echo 1;
            $error="Wrong Login Credentials";
            header('location:/mini_project/index.php?loginfailed=true&error='.$error);
        }
       
    }
    else{
        // echo 2;
        $error="Wrong Login Credentials";
        header('location:/mini_project/index.php?loginfailed=true&error='.$error);
    }
    
}

?>



















<!-- #codeByPra9 -->