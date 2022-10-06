<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Verification</title>
</head>

<body>

    <div class="container my-5">

        <div class="jumbotron text-center" style="background-color: #02203d; color:white;">
            <h1 class="display-4">OTP VERIFICATION</h1>
            <p class="lead">A OTP has been sent to your E-mail ID.</p>
            <hr class="my-4" style="background-color: white;">
            <p>Please enter the OTP below to verify your E-mail ID.</p>
            <form method="POST">
                <input type="text" class="text-center" style="width:60%;" id="otp" name="otp" placeholder="Enter OTP"
                    required>
                <br>
                <button type="submit" id="submit" class="btn btn-success my-4">Verify</button><br>


                <?php
                      if($_SERVER['REQUEST_METHOD']=='POST'){
                          include 'connection.php';
                          
                          
                          $otp=$_POST['otp'];
                          $sotp=$_SESSION['updateotp'];
                          

                          if($otp==$sotp){
                           
                                $email=$_SESSION['loginemail'];
                                $password=$_SESSION['updatepassword'];


                                // echo $email;
                                // echo $password;
                                $sql="UPDATE `users` SET user_password = '$password' WHERE user_email = '$email'";
                                $result=mysqli_query($conn,$sql);

                                if($result){
                                    header('location:/mini_project/index.php?password_update=success');
                                }
                               
                            }
                          else{
                              echo '<span style="color:red">Please Enter Valid OTP<span>';
                          }
                          
                          
                      }
                ?>
        </div>
        </form>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>






















<!-- #codeByPra9 -->