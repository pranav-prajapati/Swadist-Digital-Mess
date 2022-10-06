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
            <h3 class="display-4">OTP VERIFICATION TO CONFIRM YOUR ORDER</h3>
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
                          $email=$_SESSION['email'];
                          $session_id=$_SESSION['user_id'];
                          // echo $email."<br>";
                          $otp=$_POST['otp'];
                          $sotp=$_SESSION['checkoutotp'];
                          

                          if($otp==$sotp){
                            $sql2="SELECT * FROM `order` where order_by=$session_id";
                            $result2=mysqli_query($conn,$sql2);

                                while($row2=mysqli_fetch_assoc($result2)){

                                    $orderto=$row2['order_for'];
                                    $quantity=$row2['quantity'];
                                    $amount=$row2['amount'];
                                    $address=$_SESSION['address'];
                                    $payment=$_SESSION['payment_mode'];
                                   
                                    // echo $session_id."<br>";
                                    // echo $orderto."<br>";
                                    // echo $address."<br>";
                                    // echo $payment."<br>";
                                    // echo "pending to confirm <br>";
                                    // echo $quantity."<br>";
                                    // echo $amount."<br>";
                                    // echo "<hr>";

                                    $sql=" INSERT INTO `order_details` (`order_from`, `order_to`, `address`, `payment_mode`, `status`, `qty`, `amount`, `date`) VALUES ('$session_id', '$orderto', '$address', '$payment', 'pending to confirm', '$quantity', '$amount', current_timestamp());";
                                    $result=mysqli_query($conn,$sql);

                                    if($result){
                            
                                        $sql="DELETE FROM `order` WHERE `order`.`order_by` = $session_id";
                                        $result=mysqli_query($conn,$sql);
                                        header('location:/mini_project/index.php?order=success');
                                    }
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